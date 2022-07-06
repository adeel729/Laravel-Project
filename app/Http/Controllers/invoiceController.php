<?php

namespace App\Http\Controllers;

use App\Models\invoicemaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT invoicemasters.invoicennumber,invoicemasters.invoicedate,invoicemasters.imasterid,customers.name
        // from invoicemasters 
        // INNER JOIN customers on invoicemasters.customerid=customers.customerid
        $invoices = DB::table('invoicemasters')
            ->join('customers', 'invoicemasters.customerid', '=', 'customers.customerid')
            ->limit(100)
            ->orderBy('invoicemasters.imasterid', 'desc')
            ->get(['invoicemasters.invoicennumber', 'invoicemasters.invoicedate', 'invoicemasters.imasterid', 'customers.name', 'invoicemasters.paid', 'invoicemasters.remaining', 'invoicemasters.status']);
        // last balance
        // DB::select("SELECT `remaining` FROM `invoicemasters` WHERE `imasterid`=?",[]);
        return view("invoices.invoicesviews", ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $warehouse = DB::table("warehouses")->select('warehouseid', 'warehousename')->get();
        $customer = DB::Select("SELECT `customerid`, `name` FROM `customers`");
        $cateogary = DB::Select("SELECT `categoryid`, `categoryname` FROM `cateogaries` ");
        return view("invoices.Invoice", ['warehouse' => $warehouse, 'customer' => $customer, 'cateogary' => $cateogary]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = "open";

        // getting warehouseid for stockout and invoicechildren
        $warehouseid = $request->warehouseid;
        $dcdate = $request->dcdate;
        // creating array of data for master
        $masterdata = array(
            'warehouseid' => $request->warehouseid,
            'customerid' => $request->customerid,
            'dcdate' => $request->dcdate,
            // 'totalwithouttax'=>$request->totalwithouttax,
            'status' => $status,
        );
        // inserting data in master table and getting last id
        $lastinsertedid = DB::table('dc_parents')->insertGetId($masterdata);
        // creating quotation number
        $dcnumber = "dc#" . $lastinsertedid;
        // updating quotation number column in master table in only one row
        DB::table('dc_parents')->where('dcparentid', $lastinsertedid)->limit(1)->update(array('dcnumber' => $dcnumber));
        $totalrows = count($request->categoryid);
        // use for loop to insert data in inovicechildrens and update inventory 
        for ($t = 0; $t < $totalrows; $t++) {
            $childata = array(
                'dcparentid' => $lastinsertedid,
                'warehouseid' => $warehouseid,
                'categoryid' => $request->categoryid[$t],
                'itemid' => $request->itemid[$t],
                'quantity' => $request->quantity[$t],
                'dcdate' => $dcdate
            );
            $childata = DB::table('dc_children')->insert($childata);
            //   for stock out    getting itemid,categoryid
            $categoryid = $request->categoryid[$t];
            $itemid = $request->itemid[$t];
            $quantity = $request->quantity[$t];
            //  insrtion in stock transaction table
            $stockoutarray = array(
                'warehouseid' => $warehouseid,
                'categoryid' => $categoryid,
                'itemid' => $itemid,
                'dcnumber' => $dcnumber,
                'stockoutdate' => $dcdate,
                'stockoutquantity' => $quantity,
            );
            DB::table('stocktransactions')->insert($stockoutarray);
            // GETTING quantity of item to out from stock
            while ($quantity > 0) {
                //  getting id of first found inventory
                $getinventoryid = DB::select("SELECT `inventoryid` FROM `inventories` WHERE `quantity`!=0 and `warehouseid`='$warehouseid' and `categoryid`='$categoryid' and `itemid`='$itemid' order by `expirydate` ASC Limit 1");
                foreach ($getinventoryid as $row) :
                    $inventoryid = $row->inventoryid;
                endforeach;

                // geeting quantity of item from inventories table using invrentoryid
                $getquantity = DB::select("SELECT `quantity` FROM `inventories` WHERE `inventoryid`=?", [$inventoryid]);
                foreach ($getquantity as $data) :
                    $inventoryquantity = $data->quantity;
                endforeach;
                if ($inventoryquantity == $quantity) {
                    DB::table('inventories')->where(['inventoryid' => $inventoryid])->limit(1)->update(['quantity' => 0]);
                    $quantity = 0;
                } elseif ($quantity < $inventoryquantity) {
                    $remainimgquantity = $inventoryquantity - $quantity;
                    DB::table('inventories')->where(['inventoryid' => $inventoryid])->limit(1)->update(['quantity' => $remainimgquantity]);
                    $quantity = 0;
                } else {
                    DB::table('inventories')->where(['inventoryid' => $inventoryid])->limit(1)->update(['quantity' => 0]);
                    $quantity = $quantity - $inventoryquantity;
                }
            }
        }

        // checking status for invoice using remainig
        $remaining = $request->remaining;
        if ($remaining > 0) {
            $staus = "open";
        } else {
            $staus = "close";
        }

        // getting invoicemaster id 
        $dcparentid = $lastinsertedid;
        $dcparentinfo = DB::Select("SELECT `warehouseid`, `dcnumber`, `customerid` FROM `dc_parents` WHERE `dcparentid`=$dcparentid");
        $warehouseid = $dcparentinfo[0]->warehouseid;
        $dcnumber = $dcparentinfo[0]->dcnumber;
        $customerid = $dcparentinfo[0]->customerid;
        // updating dc status to close   
        DB::table('dc_parents')->where('dcparentid', $dcparentid)->limit(1)->update(array('status' => 'close'));


        // creating array of data for master
        $masterdata = array(
            'warehouseid' => $warehouseid,
            'customerid' => $customerid,
            'invoicedate' => $request->dcdate,
            'dcparentid' => $dcparentid,
            'totalbeforetax' => $request->totalbeforetax,
            'gsttaxamount' => 0,
            'incometaxamount' => 0,
            'saletaxgovernmentamount' => 0,
            'totalaftertax' => $request->totalaftertax,
            'totalafterdiscount' => $request->totalafterdiscount,
            'nettotal' => $request->total,
            'paid' => $request->paid,
            'remaining' => $request->remaining,
            'status' => $staus,
            'customerntnno' => $request->customerntnno,
            'ponumber' => $request->ponumber,
        );
        // inserting data in master table and getting last id
        $lastinsertedid = DB::table('invoicemasters')->insertGetId($masterdata);
        // creating quotation number
        $invoicenumber = "#0" . $lastinsertedid;
        // updating quotation number column in master table in only one row
        DB::table('invoicemasters')->where('imasterid', $lastinsertedid)->limit(1)->update(array('invoicennumber' => $invoicenumber));
        $totalrows = count($request->categoryid);
        // use for loop to insert data in inovicechildrens and update inventory 
        for ($t = 0; $t < $totalrows; $t++) {
            $childata = array(
                'imasterid' => $lastinsertedid,
                'warehouseid' => $warehouseid,
                'categoryid' => $request->categoryid[$t],
                'itemid' => $request->itemid[$t],
                'unitprice' => $request->unitprice[$t],
                'quantity' => $request->quantity[$t],
                'totalprice' => $request->totalprice[$t],
                'tax' => $request->tax[$t],
                'aftertax' => $request->aftertax[$t],
                'discount' => $request->discount[$t],
                'afterDiscount' => $request->afterDiscount[$t]
            );
            $childata = DB::table('invoicechildren')->insert($childata);
        }
        // insertion in general ledger account
        // getting last balaance of gl account
        $getlastbalancequery = DB::select("SELECT  `balance` FROM `generalledgers`  ORDER BY ledgerid DESC LIMIT 1");
        foreach ($getlastbalancequery as $lastrow) :
            $lastrowbalance = $lastrow->balance;
        endforeach;
        // paid amount
        $paid = $request->paid;
        // $customerid=$request->customerid;
        $invoicedate = $request->dcdate;
        $newbalance = $lastrowbalance + $paid;
        $generalledgerdata = array(
            'imasterid' => $lastinsertedid,
            'customerid' => $customerid,
            'actiondate' => $invoicedate,
            'credit' => $paid,
            'balance' => $newbalance,
        );
        // insertion in gl account
        DB::table("generalledgers")->insert($generalledgerdata);
        // insertion in installment 
        $installmentdata = array(
            'imasterid' => $lastinsertedid,
            'invoicenumber' => $invoicenumber,
            'customerid' => $customerid,
            'totalbill' => $request->total,
            'installmentdate' => $request->dcdate,
            'installmentamount' => $request->paid,
            'currentremainig' => $request->remaining
        );
        DB::table("installments")->insert($installmentdata);
        return redirect("/invoice")->with("invoicegenerated", "Invoice Generated Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // getting items details from dc 
        $itemsdetails = DB::select("select cateogaries.categoryid,items.itemname,items.itemid,dc_children.quantity,dc_parents.dcparentid
        from dc_parents 
        inner join dc_children on dc_parents.dcparentid=dc_children.dcparentid
        inner join items on dc_children.itemid=items.itemid
        inner join cateogaries on dc_children.categoryid=cateogaries.categoryid
        where dc_parents.dcparentid=$id");
        return view('invoices.invoice', ['itemsdetails' => $itemsdetails]);

        //         $invoicemater=DB::table('invoicemasters')
        // ->join('customers','invoicemasters.customerid','=','customers.customerid')
        // ->where('invoicemasters.imasterid',$id)
        // ->get(['invoicemasters.imasterid','invoicemasters.invoicennumber','invoicemasters.invoicedate','invoicemasters.totalwithouttax','invoicemasters.discount','invoicemasters.afterdiscount','invoicemasters.taxamount','invoicemasters.nettotal','invoicemasters.paid','invoicemasters.remaining','invoicemasters.totalaftertax','customers.name'
        // ]);
        // // data from installment table
        //         $installmentdetails=DB::select("SELECT   `installmentdate`, `previousbalance`, `installmentamount`, `currentremainig` FROM `installments` WHERE `imasterid`=?",[$id]);
        //       return view('invoices.invoicerecieving',['invoicemater'=>$invoicemater,'installmentdetails'=>$installmentdetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoiceid = $id;

        // getting parent data of invoice
        //         SELECT invoicemasters.invoicennumber,invoicemasters.invoicedate,invoicemasters.totalwithouttax,invoicemasters.discount,invoicemasters.afterdiscount,invoicemasters.taxamount,invoicemasters.nettotal,invoicemasters.paid,invoicemasters.remaining,customers.name
        // FROM invoicemasters
        // inner JOIN customers on invoicemasters.customerid=customers.customerid
        // WHERE invoicemasters.imasterid=

        // child data
        // SELECT items.itemname,units.unitname,invoicechildren.quantity,invoicechildren.unitprice,invoicechildren.totalprice,invoicechildren.tax,invoicechildren.aftertax
        // from invoicemasters 
        // inner JOIN invoicechildren on invoicemasters.imasterid = invoicechildren.imasterid
        // inner join items on invoicechildren.itemid=items.itemid
        // INNER join units on items.unitid=units.unitid
        // where  invoicemasters.imasterid=1

        $invoicechild = DB::table('invoicemasters')
            ->join('invoicechildren', 'invoicemasters.imasterid', '=', 'invoicechildren.imasterid')
            ->join('items', 'invoicechildren.itemid', '=', 'items.itemid')
            ->join('units', 'items.unitid', '=', 'units.unitid')
            ->where('invoicemasters.imasterid', $invoiceid)
            ->get([
                'items.catalognumber', 'items.discription', 'items.itemname', 'units.unitname', 'invoicechildren.quantity','invoicechildren.afterdiscount', 'invoicechildren.unitprice', 'invoicechildren.totalprice', 'invoicechildren.tax', 'invoicechildren.aftertax'
            ]);


        // child array invoicemater
        $invoicemater = DB::table('invoicemasters')
            ->join('customers', 'invoicemasters.customerid', '=', 'customers.customerid')
            ->where('invoicemasters.imasterid', $invoiceid)
            ->get([
                'invoicemasters.imasterid','invoicemasters.dcparentid', 'invoicemasters.customerntnno', 'invoicemasters.ponumber', 'invoicemasters.invoicennumber', 'invoicemasters.invoicedate', 'invoicemasters.totalbeforetax', 'invoicemasters.gsttaxamount', 'invoicemasters.incometaxamount', 'invoicemasters.saletaxgovernmentamount', 'invoicemasters.nettotal', 'invoicemasters.paid', 'invoicemasters.remaining', 'invoicemasters.totalaftertax', 'customers.name'
            ]);
        $pdf = PDF::loadView('invoices.invoicepreview', ["invoicemater" => $invoicemater, "invoicechild" => $invoicechild]);
        return $pdf->stream('Invoice-' . $invoicemater[0]->invoicennumber . '-Date' . $invoicemater[0]->invoicedate . '.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // submit installment
    public function insertinstallments(Request $request)
    {
        $imasterid = $request->imasterid;

        $masterrowdata = DB::select("SELECT   `invoicennumber`,`paid`,`remaining`,`customerid`,`status` FROM `invoicemasters` WHERE `imasterid`=?", [$imasterid]);
        foreach ($masterrowdata as $row) :
            $invoicennumber = $row->invoicennumber;
            $customerid = $row->customerid;
            $paid = $row->paid;

        endforeach;
        // data insertion in installment table against invoice
        $installmentdata = array(
            'imasterid' => $imasterid,
            'invoicenumber' => $invoicennumber,
            'customerid' => $customerid,
            'installmentdate' => $request->installmentdate,
            'totalbill' => '0',
            'previousbalance' => $request->previousbalance,
            'installmentamount' => $request->installmentamount,
            'currentremainig' => $request->currentremainig,
            'chequenumber' => $request->chequenumber,
        );
        DB::table("installments")->insert($installmentdata);
        // updating invoice master table
        $currentpaid = $request->installmentamount;
        $updatepaid = $paid + $currentpaid;
        $updateremainig = $request->currentremainig;
        if ($updateremainig <= 0) {
            $status = 'close';
            DB::table('invoicemasters')
                ->where('imasterid', $imasterid)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('paid' => $updatepaid, 'remaining' => $updateremainig, 'status' => $status));  // update the record in the DB.
        } else {
            DB::table('invoicemasters')
                ->where('imasterid', $imasterid)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('paid' => $updatepaid, 'remaining' => $updateremainig));
        }
        DB::table('invoicemasters')
            ->where('imasterid', $imasterid)  // find your user by their email
            ->limit(1)  // optional - to ensure only one record is updated.
            ->update(array('paid' => $updatepaid, 'remaining' => $updateremainig));  // update the record in the DB.
        // updating genereal ledger table
        // getting last balaance of gl account
        $getlastbalancequery = DB::select("SELECT  `balance` FROM `generalledgers`  ORDER BY ledgerid DESC LIMIT 1");
        foreach ($getlastbalancequery as $lastrow) :
            $lastrowbalance = $lastrow->balance;
        endforeach;
        $updatedledgerbalance = $lastrowbalance + $currentpaid;
        $installmentledgerdata = array(
            'imasterid' => $imasterid,
            'customerid' => $customerid,
            'actiondate' => $request->installmentdate,
            'discription' => 'installment',
            'credit' => $currentpaid,
            'balance' => $updatedledgerbalance,
        );
        DB::table("generalledgers")->insert($installmentledgerdata);
        return redirect("/invoice");
    }
    // 
    public function masterbalance(Request $req)
    {
        $imasterid = $req->input('imasterid');
        $PreviousBalanceOfImaster = DB::select("SELECT  `imasterid`,`remaining`,`gsttaxamount` FROM `invoicemasters` WHERE `imasterid`=?", [$imasterid]);
        foreach ($PreviousBalanceOfImaster as $row) :
            $remainig = $row->remaining;
            $imasterid = $row->imasterid;
            $gsttaxamount = $row->gsttaxamount;
        endforeach;
        return json_encode(array('remainig' => $remainig, 'imasterid' => $imasterid, 'gsttaxamount' => $gsttaxamount));
    }
    // invoice recieving
    public function invoicerecieving($id)
    {
        $invoicemater = DB::table('invoicemasters')
            ->join('customers', 'invoicemasters.customerid', '=', 'customers.customerid')
            ->where('invoicemasters.imasterid', $id)
            ->get([
                'invoicemasters.imasterid', 'invoicemasters.customerntnno', 'invoicemasters.ponumber', 'invoicemasters.invoicennumber', 'invoicemasters.invoicedate', 'invoicemasters.totalbeforetax', 'invoicemasters.gsttaxamount', 'invoicemasters.incometaxamount', 'invoicemasters.saletaxgovernmentamount', 'invoicemasters.nettotal', 'invoicemasters.paid', 'invoicemasters.remaining', 'invoicemasters.totalaftertax', 'customers.name'
            ]);
        // data from installment table
        $installmentdetails = DB::select("SELECT   `installmentdate`, `previousbalance`, `installmentamount`, `currentremainig`,`chequenumber` FROM `installments` WHERE `imasterid`=?", [$id]);
        return view('invoices.invoicerecieving', ['invoicemater' => $invoicemater, 'installmentdetails' => $installmentdetails]);
    }

    //exporting data in pdf format 
    //    public function exportPDF() {

    //         $p = invoicemaster::all();

    //         view()->share('p', $p);
    //         $pdf_doc = PDF::loadView('export_pdf', $p);

    //         return $pdf_doc->download('pdf.pdf');
    //     }  

    public function invoicebill($id)
    {
        $invoiceid = $id;

        // getting parent data of invoice
        //         SELECT invoicemasters.invoicennumber,invoicemasters.invoicedate,invoicemasters.totalwithouttax,invoicemasters.discount,invoicemasters.afterdiscount,invoicemasters.taxamount,invoicemasters.nettotal,invoicemasters.paid,invoicemasters.remaining,customers.name
        // FROM invoicemasters
        // inner JOIN customers on invoicemasters.customerid=customers.customerid
        // WHERE invoicemasters.imasterid=

        // child data
        // SELECT items.itemname,units.unitname,invoicechildren.quantity,invoicechildren.unitprice,invoicechildren.totalprice,invoicechildren.tax,invoicechildren.aftertax
        // from invoicemasters 
        // inner JOIN invoicechildren on invoicemasters.imasterid = invoicechildren.imasterid
        // inner join items on invoicechildren.itemid=items.itemid
        // INNER join units on items.unitid=units.unitid
        // where  invoicemasters.imasterid=1

        $invoicechild = DB::table('invoicemasters')
            ->join('invoicechildren', 'invoicemasters.imasterid', '=', 'invoicechildren.imasterid')
            ->join('items', 'invoicechildren.itemid', '=', 'items.itemid')
            ->join('units', 'items.unitid', '=', 'units.unitid')
            ->where('invoicemasters.imasterid', $invoiceid)
            ->get([
                'items.catalognumber', 'items.itemname', 'units.unitname', 'invoicechildren.quantity','invoicechildren.discount', 'invoicechildren.unitprice', 'invoicechildren.totalprice', 'invoicechildren.tax', 'invoicechildren.afterdiscount'
            ]);


        // child array invoicemater
        $invoicemater = DB::table('invoicemasters')
            ->join('customers', 'invoicemasters.customerid', '=', 'customers.customerid')
            ->where('invoicemasters.imasterid', $invoiceid)
            ->get([
                'invoicemasters.imasterid','invoicemasters.dcparentid', 'invoicemasters.customerntnno', 'invoicemasters.ponumber', 'invoicemasters.invoicennumber', 'invoicemasters.invoicedate', 'invoicemasters.totalbeforetax', 'invoicemasters.gsttaxamount', 'invoicemasters.incometaxamount', 'invoicemasters.saletaxgovernmentamount', 'invoicemasters.nettotal', 'invoicemasters.paid', 'invoicemasters.remaining', 'invoicemasters.totalaftertax', 'customers.name'
            ]);
        $pdf = PDF::loadView('invoices.invoicebill', ["invoicemater" => $invoicemater, "invoicechild" => $invoicechild]);
        return $pdf->stream('bill-' . $invoicemater[0]->invoicennumber . '-Date' . $invoicemater[0]->invoicedate . '.pdf');
    }
}
