<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Dc_children;
use App\Models\stocktransaction;
use App\Models\inventory;

class DcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DcParentData = DB::table('dc_parents')
            ->join('customers', 'dc_parents.customerid', '=', 'customers.customerid')
            ->orderBy('dcparentid', 'desc')
            ->limit('10')
            ->get(['dc_parents.dcnumber', 'dc_parents.dcdate', 'dc_parents.dcparentid', 'customers.name', 'dc_parents.status']);
        // last balance
        return view("deliverychallan.deliveryrecord", ['DcParentData' => $DcParentData]);
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
        return view('deliverychallan.deliverychallan', ['warehouse' => $warehouse, 'customer' => $customer, 'cateogary' => $cateogary]);
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

        return redirect("/Delivery/")->with("dcgenerated", "dc Generated Successfully");


        // insertion in stock tansaction table


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $dcmaster = DB::table('dc_parents')
            ->join('customers', 'dc_parents.customerid', '=', 'customers.customerid')
            ->join('invoicemasters', 'dc_parents.dcparentid', '=', 'invoicemasters.dcparentid')
            ->where('dc_parents.dcparentid', $id)
            ->get([
                'dc_parents.dcparentid','invoicemasters.imasterid', 'dc_parents.dcnumber', 'dc_parents.dcdate', 'dc_parents.totalwithouttax', 'customers.name', 'customers.address'
            ]);
        $dcchild = DB::select("select items.itemname,items.discription,dc_children.quantity
                        from dc_parents 
                        inner join dc_children on dc_parents.dcparentid=dc_children.dcparentid
                        inner join items on dc_children.itemid=items.itemid
                        where dc_parents.dcparentid=$id
                        ");
        // data from installment table

        $pdf = PDF::loadView('deliverychallan.deliveryview', ['dcmaster' => $dcmaster, 'dcchild' => $dcchild]);
        return $pdf->stream('DeliveryChallan' . $dcmaster[0]->dcnumber . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    // $dcChildid=$id;
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

    // $dcchild=DB::table('dc_parents')
    // ->join('invoicechildren','dc_parents.dcparentid','=','invoicechildren.dcparentid')
    // ->join('items','invoicechildren.itemid','=','items.itemid')
    // ->join('units','items.unitid','=','units.unitid')
    // ->where('dc_parents.dcparentid',$dcChildid)
    // ->get(['items.catalognumber','items.itemname','units.unitname','invoicechildren.quantity','invoicechildren.unitprice','invoicechildren.totalprice','invoicechildren.tax','invoicechildren.aftertax'
    // ]);


    // child array invoicemater
    // $DcParentData=DB::table('dc_parents')
    // ->join('customers','invoicemasters.customerid','=','customers.customerid')
    // ->where('invoicemasters.dcparentid',$dcChildid)
    // ->get(['dc_parents.dcparentid','dc_parents.invoicennumber','dc_parents.invoicedate','dc_parents.totalwithouttax','dc_parents.discount','dc_parents.afterdiscount','dc_parents.taxamount','dc_parents.nettotal','dc_parents.paid','dc_parents.remaining','dc_parents.totalaftertax','customers.name'
    // ]);
    //         return view('delivery.deliveryview',["DcParentData"=>$DcParentData=DB::table('dc_parents')
    //         ,"invoicechild"=>$dcchild]);
    //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    // SELECT  p.dcnumber,c.dcdate,cust.name,cat.categoryname,it.itemname,ware.warehousename,inv.quantity
    // FROM dc_parents p
    // INNER JOIN dc_children c
    // ON p.dcparentid = c.dcparentid
    // inner join customers cust on p.customerid=cust.customerid
    // inner join cateogaries cat on c.categoryid=cat.categoryid
    // inner join items it on c.itemid=it.itemid
    // inner join warehouses ware on c.warehouseid=ware.warehouseid
    // inner join  inventories inv on c.quantity=inv.quantity  
    // ORDER BY `ware`.`warehousename` 
    // }

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
    // 
    // get items details
    public function get_item_detail_dc(Request $request)
    {
        $itemquantity = 0;
        $itemprice = 0;
       // $itemid = $request->get('item_id');
       // $categoryid = $request->get('cat_id');
        $warehouseid = $request->get('warehouseid');
          $batchnumber=$request->get('batchnumber');
        // total quantity of item
        $totalquantity = DB::select('SELECT sum(quantity) as total from inventories where  warehouseid=? and batchnumber=?', [ $warehouseid,$batchnumber]);
        if (empty($totalquantity)) {
            $itemquantity = 0;
        } else {
            $itemquantity = $totalquantity[0]->total;
        }

        $items = DB::select('SELECT itemid,itemname,categoryid from items where batchnumber=?', [$batchnumber]);
         if (empty( $items)) {
             $itemname = 0;
         } else {
             $itemname =  $items[0]->itemid;
             $itemname1 =  $items[0]->itemname;
            $itemname2 =  $items[0]->categoryid;
     }


        return ['itemquantity' => $itemquantity,'itemname' => $itemname,'itemname1'=>$itemname1,'itemname2'=>$itemname2];
    }

    public function edit(Request $req)
    {
        $dcparentid = $req->id;
        $dc_parents = DB::table("dc_parents")->where('dcparentid', $dcparentid)->first();
        $dcdate = $dc_parents->dcdate;

        $warehouseid = $dc_parents->warehouseid;
        $warehouseDetails = DB::table("warehouses")->select('warehouseid', 'warehousename')->where('warehouseid', $warehouseid)->get();

        $customerid = $dc_parents->customerid;
        $customerDetails = DB::table("customers")->select('name', 'customerid')->where('customerid', $customerid)->get();

        $itemDetails = DB::table("dc_children")
            ->join('items', 'dc_children.itemid', '=', 'items.itemid')
            ->join('cateogaries', 'dc_children.categoryid', '=', 'cateogaries.categoryid')
            ->where('dc_children.dcparentid', $dcparentid)
            ->get(['items.itemid', 'items.itemname', 'cateogaries.categoryname', 'dc_children.quantity']);

        $warehouse = DB::table("warehouses")->select('warehouseid', 'warehousename')->get();
        $customer = DB::Select("SELECT `customerid`, `name` FROM `customers`");
        $cateogary = DB::Select("SELECT `categoryid`, `categoryname` FROM `cateogaries` ");
        return view('deliverychallan.update_deliverychallan', ['warehouse' => $warehouse, 'customer' => $customer, 'cateogary' => $cateogary, 'warehouseDetails' => $warehouseDetails, 'customerDetails' => $customerDetails, 'dcdate' => $dcdate, 'itemDetails' => $itemDetails, 'dcparentid' => $dcparentid]);
    }

    public function update(Request $request)
    {

        $status = "open";
        $warehouseid = $request->warehouseid;
        $dcdate = $request->dcdate;
        $dcparentid = $request->dcparentid;
        // creating array of data for master
        $masterdata = array(
            'warehouseid' => $warehouseid,
            'customerid' => $request->customerid,
            'dcdate' => $dcdate,
            'status' => $status,
        );
        $result = DB::table('dc_parents')
            ->where('dcparentid', $dcparentid)
            ->limit(1)
            ->update($masterdata);
        $count = count($request->item_id);
        // updating child DC
        $childata = array(
            'warehouseid' => $warehouseid,
            'dcdate' => $dcdate,
        );
        $stockoutarray = array(
            'warehouseid' => $warehouseid,
            'stockoutdate' => $dcdate,
        );
        for ($i = 0; $i < $count; $i++) {
            $item_id = $request->item_id[$i];
            DB::table('dc_children')
                ->where([['dcparentid', $dcparentid], ['itemid', $item_id]])
                ->limit(1)
                ->update($childata);

            //Stockout update
            $dcnumber = 'dc#' . $dcparentid;
            DB::table('stocktransactions')
                ->where([['dcnumber', $dcnumber], ['itemid', $item_id]])
                ->limit(1)
                ->update($stockoutarray);
        }


        //inserting new stock
        // creating array of data for master
        $flag = $request->flag;
        if ($flag == 1) {
            $totalrows = count($request->categoryid);

            // inserting data in master table and getting last id
            $lastinsertedid = $dcparentid;
            // creating quotation number
            $dcnumber = "dc#" . $lastinsertedid;
            // updating quotation number column in master table in only one row
            DB::table('dc_parents')->where('dcparentid', $lastinsertedid)->limit(1)->update(array('dcnumber' => $dcnumber));
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
        }

        return redirect("editDC?id=$dcparentid")->with("dcgenerated", "DC Updated Successfully");
    }

    public function deleteItem(Request $req)
    {
        $dcparentid = $req->dcparentid;
        $itemId = $req->id;
        $dcnumber = 'dc#' . $dcparentid;
        $getQuantity =  Dc_children::where([['dcparentid', $dcparentid], ['itemid', $itemId]])->first();
        $quantity = $getQuantity->quantity;
        $categoryid = $getQuantity->categoryid;
        $whouseID = $getQuantity->warehouseid;

        $getRemainingQuantity =  inventory::where([['warehouseid', $whouseID], ['itemid', $itemId], ['categoryid', $categoryid]])->first();
        $remainingQuantity = $getRemainingQuantity->quantity;
        $total_quantity =  $remainingQuantity + $quantity;
        $inventoryid = $getRemainingQuantity->inventoryid;

        DB::table('inventories')->where(['inventoryid' => $inventoryid])->limit(1)->update(['quantity' => $total_quantity]);
        $data = Dc_children::where([['dcparentid', $dcparentid], ['itemid', $itemId]])->delete();
        $stocktransaction = stocktransaction::where([['dcnumber', $dcnumber], ['itemid', $itemId]])->delete();
        return 'done';
    }
}
