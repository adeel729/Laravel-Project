<?php

namespace App\Http\Controllers\purchaseorder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class purchaseorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseorderdetails=DB::Select("SELECT p.purchase_order_id,p.supplierid,s.name, p.purchase_order_date, p.totalbill, p.po_number, p.postatus
        FROM purchase_orders p
        inner join suppliers s on p.supplierid=s.supplierid
        order by p.purchase_order_id DESC");
        return view('purchaseorder.purchaseordersview',['purchaseorderdetails'=>$purchaseorderdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=DB::select("SELECT `categoryid`, `categoryname` FROM `cateogaries`");
        $suppliers=DB::select("SELECT `supplierid`, `name` FROM `suppliers` ");
        $units=DB::select("SELECT `unitid`, `unitname` FROM `units`");
        return view('purchaseorder.purchaseorder',['categories'=>$categories,'suppliers'=>$suppliers,'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating fields
        $request->validate([
            'supplierid' => 'required|integer',
            'purchase_order_date' => 'required|date',
            'totalbill' => 'required',
            'billnumber' => 'required'
        ]);
        // creating purchase order array
        $parentdata=array(
            'supplierid'=>$request->supplierid,
            'purchase_order_date'=>$request->purchase_order_date,
            'totalbill'=>$request->totalbill,
            'billnumber'=>$request->billnumber,
            'postatus'=>'inprogress',
            'current_payment'=>'0',
            'remaining'=>$request->totalbill,
            'refrence'=>$request->refrence
        );
        // insertion in purchase_order table and geting id
        $purchase_order_id=DB::table("purchase_orders")->insertGetId($parentdata);
        $ponumber="PO-".$purchase_order_id;
        DB::table("purchase_orders")->where("purchase_order_id",$purchase_order_id)->update(['po_number'=>"$ponumber"]);
        // insertion in child table 
        $rows=count($request->categoryid);
        for($i=0;$i<$rows;$i++)
        {
            $purchasechilarray=array(
                'purchase_order_id'=>$purchase_order_id,
                'categoryid'=>$request->categoryid[$i],
                'itemid'=>$request->itemid[$i],
                'unit_price'=>$request->unit_price[$i],
                'quantity'=>$request->quantity[$i],
                'total'=>$request->total[$i],
                'sale_price'=>'0'
            );
            DB::table("purchase_order_children")->insert($purchasechilarray);
        }
        return redirect("/purchaseorder");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $childdetails=DB::select("SELECT cat.categoryname,it.itemname,child.purchase_oredr_child_id,child.unit_price,child.quantity,child.total,child.sale_price,
        child.batchnumber,child.manufactureddate,child.expirydate
                from purchase_order_children child
                inner join cateogaries cat on child.categoryid=cat.categoryid
                inner join items it on it.itemid=child.itemid
        where child.purchase_oredr_child_id=?",[$id]);
        return view('purchaseorder.PurchaseOrderChildUpdate',['childdetails'=>$childdetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categories=DB::select("SELECT `categoryid`, `categoryname` FROM `cateogaries`");
        $suppliers=DB::select("SELECT p.discription,p.payment_type,p.purchase_order_id,p.current_payment,p.remaining,p.supplierid,s.name, purchase_order_date, totalbill, billnumber
        FROM purchase_orders p  
        inner join suppliers s on p.supplierid=s.supplierid
        WHERE purchase_order_id=?",[$id]);
        // child data
        $childdata=DB::select('SELECT c.purchase_oredr_child_id,c.unit_price,c.quantity,c.total,c.sale_price,cat.categoryname,it.itemname
        FROM purchase_orders p
        inner join purchase_order_children c on p.purchase_order_id=c.purchase_order_id
        inner join cateogaries cat on c.categoryid=cat.categoryid
        inner join items it on c.itemid=it.itemid
        WHERE c.purchase_order_id=?',[$id]);
        $units=DB::select("SELECT `unitid`, `unitname` FROM `units`");
        return view('purchaseorder.purchaseorderupdate',['categories'=>$categories,'suppliers'=>$suppliers,'units'=>$units,'childdata'=>$childdata]);
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
     
        // getting details of child table 
        $childrowdetails=DB::select("SELECT `purchase_order_id`,`total` FROM `purchase_order_children` WHERE `purchase_oredr_child_id`=?",[$id]);
        $purchase_order_id=$childrowdetails[0]->purchase_order_id;
        $child_total=$childrowdetails[0]->total;
        // getting details from parent totalpayment
        $parentdata=DB::select("SELECT `totalbill` FROM `purchase_orders` WHERE `purchase_order_id`=?",[$purchase_order_id]);
        $parenttotalbill=$parentdata[0]->totalbill;
        $updatebalancebeforeupdate=$parenttotalbill-$child_total;
        DB::table("purchase_orders")->where("purchase_order_id",$purchase_order_id)->update(["totalbill"=>$updatebalancebeforeupdate]);
        // validate
        $request->validate([
            'unitprice'=>'required',
            'quantity'=>'required',
            'total'=>'required',
            'manufactureddate'=>'required',
            'expirydate'=>'required',
            'batchnumber'=>'required',
        ]);
        // updated  detials
        $unitprice=$request->unitprice;
        $quantity=$request->quantity;
        $total=$request->total;
        $sale_price=$request->sale_price;
        $manufactureddate=$request->manufactureddate;
        $expirydate=$request->expirydate;
        $batchnumber=$request->batchnumber;
        // getting current balance of parent
        $parentdatabeforeupdate=DB::select("SELECT `totalbill` FROM `purchase_orders` WHERE `purchase_order_id`=?",[$purchase_order_id]);
       $parenttabletotalcurrent=$parentdatabeforeupdate[0]->totalbill;
        // UPDATE child table
        DB::table("purchase_order_children")->where('purchase_oredr_child_id',$id)->update(['unit_price'=>$unitprice,'quantity'=>$quantity,'total'=>$total,'sale_price'=>$sale_price,'manufactureddate'=>$manufactureddate,'expirydate'=>$expirydate,'batchnumber'=>$batchnumber]);
        // update parent table after update 
        $updateparentbalanceafterupdate=$parenttabletotalcurrent+$total;
        DB::table("purchase_orders")->where('purchase_order_id',$purchase_order_id)->update(['totalbill'=>$updateparentbalanceafterupdate]);
        // $urllast=url()->previous();
        return redirect('/purchaseorder/'.$purchase_order_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url=url()->previous();
        // selecting data from purchase order child table
        $data=DB::select("SELECT `purchase_order_id`,`total` FROM `purchase_order_children` WHERE `purchase_oredr_child_id`=?",[$id]);
        $purchase_order_id=$data[0]->purchase_order_id;
        $totalofchild=$data[0]->total;
        // getting total bill value from parent table 
        $data2=DB::Select("SELECT `totalbill` FROM `purchase_orders` WHERE `purchase_order_id`=?",[$purchase_order_id]);
        $totalbillparent=$data2[0]->totalbill;
        $updatedparenttotal=$totalbillparent-$totalofchild;
        DB::table("purchase_orders")
                ->where("purchase_order_id",$purchase_order_id)
                ->update(["totalbill"=>$updatedparenttotal]);
        DB::delete("DELETE FROM `purchase_order_children` WHERE `purchase_oredr_child_id`=?",[$id]);
        return redirect($url);
      
    }
    // destroy child entry
    public function PurchaseOrderview($id)
    {
     
        $poparentdetail=DB::select("SELECT pop.billnumber,pop.purchase_order_date,pop.postatus,pop.totalbill,pop.current_payment,pop.remaining,pop.refrence,sup.name,
        sup.contact,sup.address,pop.purchase_order_id
        FROM purchase_orders pop 
        inner join purchase_order_children poc on pop.purchase_order_id=poc.purchase_order_id
        inner join suppliers sup on pop.supplierid=sup.supplierid
        where pop.purchase_order_id=?
        ",[$id]);
        $childdata=DB::select("SELECT cat.categoryname,it.itemname,poc.unit_price,poc.quantity,poc.total
        FROM purchase_orders pop 
        inner join purchase_order_children poc on pop.purchase_order_id=poc.purchase_order_id
        inner join cateogaries cat on poc.categoryid=cat.categoryid
        inner join items it on poc.itemid=it.itemid
        where pop.purchase_order_id=?
        ",[$id]);
        $pdf=PDF::loadView('purchaseorder.purchaseorderview',compact("poparentdetail"),compact("childdata"));
        return $pdf->stream('PurchaseOrder-'.$poparentdetail[0]->billnumber.'-'.$poparentdetail[0]->purchase_order_date.'.pdf');

    }
    // delete purchase order entry
    public function PurchaseOrderDelete($id)
    {
        // select data from child totalbillparent

        // deleting from child table 
        DB::delete("DELETE FROM `purchase_order_children` WHERE `purchase_order_id`=?",[$id]);
        // deleting from parent table
        DB::delete("DELETE FROM `purchase_orders` WHERE `purchase_order_id`=?",[$id]);
        // getting previous url  
        $url=url()->previous();
            return redirect($url);
    }
    // update parent
    public function purchaseorderparentupdate(Request $request ){
        $request->validate(
            [
                'billnumber'=>'required',
                'totalbill'=>'required',
                'current_payment'=>'required',
                'remaining'=>'required',
                'purchase_order_date'=>'required',
                'payment_type'=>'required',
                'discription'=>'required'
            ]
        );
                    // getting data 
            $purchase_order_id=$request->purchase_order_id;
           
                $billnumber=$request->billnumber;
                $totalbill=$request->totalbill;
                $current_payment=$request->current_payment;
                $remaining=$request->remaining;
                $purchase_order_date=$request->purchase_order_date;
                $payment_type=$request->payment_type;
                $discription=$request->discription;
          
            // updating table parent
            DB::table("purchase_orders")->where('purchase_order_id','=',$purchase_order_id)->update(['billnumber'=>$billnumber,'totalbill'=>$totalbill,'current_payment'=>$current_payment,'remaining'=>$remaining,'purchase_order_date'=>$purchase_order_date,'payment_type'=>$payment_type,'discription'=>$discription]);
            return back();
        }
    // purchase order change status
    public function comletepoorder($id)
    {
        // select paid amount

        // select row where sale price is null 
        $saleprcieresult=DB::select('SELECT `sale_price` FROM `purchase_order_children` WHERE `purchase_order_id`=? and (sale_price<1) and `manufactureddate` is null and `expirydate` is null',[$id]);
        $rows=count($saleprcieresult);
        if($rows>0)
        {
            
            $url=url()->previous();
            echo '<script type="text/javascript">
            alert("Edit the Po order check the payment amount and sale price of each item");
              </script>';
            return redirect($url);
        }
        else
        {

        
        // changing status of purchase order  
         DB::table("purchase_orders")->where('purchase_order_id','=',$id)->update(['postatus'=>'recieved']);
        // getting details from parent table about purchase order
         $poparentdetails= DB::select('SELECT `purchase_order_id`, `po_number`,`supplierid`, `purchase_order_date`, `totalbill`, `current_payment`, `remaining`, `billnumber`, `postatus`,`payment_type`,`discription` FROM `purchase_orders` WHERE `purchase_order_id`=?',[$id]);
        $purchase_order_id=$poparentdetails[0]->purchase_order_id;
        $supplierid=$poparentdetails[0]->supplierid;
        $purchase_order_date=$poparentdetails[0]->purchase_order_date;
        $totalbill=$poparentdetails[0]->totalbill;
        $current_payment=$poparentdetails[0]->current_payment;
        $remaining=$poparentdetails[0]->remaining;
        $billnumber=$poparentdetails[0]->billnumber;
        $payment_type=$poparentdetails[0]->payment_type;
        $discription=$poparentdetails[0]->discription;
        $po_number=$poparentdetails[0]->po_number;
        // getting data from child table  
        $childdetails=DB::select("SELECT `purchase_oredr_child_id`, `categoryid`, `itemid`, `unit_price`, `quantity`, `total`, `sale_price` FROM `purchase_order_children` WHERE `purchase_order_id`=?",[$id]);
        // selecting prvious_balnce of supplier order
        $supplierbalnce=DB::select("SELECT `previousbalance` FROM `suppliers` WHERE `supplierid`=?",[$supplierid]);
        $supplierpreviousbalance=$supplierbalnce[0]->previousbalance;
        $updatedsupplierbalance=$supplierpreviousbalance+$totalbill;
        // updating previous_balance of supplier 
        DB::table("suppliers")->where("supplierid",'=',$supplierid)->update(['previousbalance'=>$updatedsupplierbalance]);
        // selecting balance from general ledger 
        $SupplierBalance=DB::select("SELECT `balance` FROM `supplier_legders` WHERE `supplierid`=$supplierid ORDER BY  `supplier_legder_id`  DESC LIMIT 1");
        if($SupplierBalance)
        {
        $S_Balance=$SupplierBalance[0]->balance;
    
        $UpdatedBalance=$S_Balance+0-$totalbill;
           $supplier_legder_id=DB::table("supplier_legders")->insertGetId(['supplierid'=>$supplierid,'po_number'=>$po_number,'purchase_order_id'=>$purchase_order_id,'debit'=>'0',
            'credit'=>$totalbill,'balance'=>$UpdatedBalance,'payment_date'=>$purchase_order_date,'payment_type'=>$payment_type,'discription'=>$discription]);
        }
        else
        {
            $balance=0+0-$totalbill;
            $supplier_legder_id=DB::table("supplier_legders")->insertGetId(['supplierid'=>$supplierid,'po_number'=>$po_number,'purchase_order_id'=>$purchase_order_id,'debit'=>'0',
            'credit'=>$totalbill,'balance'=>$balance,'payment_date'=>$purchase_order_date,'payment_type'=>$payment_type,'discription'=>$discription]);
        }
        // insertion in supplier ledger table
        
        // $supplierleggerdata=array([
        //     'supplierid'=>$supplierid,
        //     'previous_balance'=>$supplierpreviousbalance,
        //     'totalbill'=>$totalbill,
        //     'payment'=>$current_payment,
        //     'remainig'=>$remaining,
        //     'ponumber'=>$billnumber,
        //     'payment_date'=>$purchase_order_date,
        //     'payment_type'=>$payment_type,
        //     'discription'=>$discription
        //     ]);
        //     DB::table("supplier_legders")->insert($supplierleggerdata);
            // inserting data into general ledger table 
            // selecting balance from general ledger table
            $generalledgerbalance=DB::select("SELECT `balance` FROM `generalledgers` order by `ledgerid` DESC LIMIT 1");  
            $lastgenerallederbalance=$generalledgerbalance[0]->balance;
            $updatedbalanceledger=$lastgenerallederbalance-$current_payment;
            $general_ledger_array=array([
                'purchase_order_id'=>$purchase_order_id,
                'billnumber'=>$billnumber,
                'actiondate'=>$purchase_order_date,
                'debit'=>$current_payment,
                'credit'=>'0',
                'balance'=>$updatedbalanceledger
            ]);
            DB::table("generalledgers")->insert($general_ledger_array);
            // inserting data

            $child_po_data=DB::select("SELECT * FROM `purchase_order_children` WHERE `purchase_order_id`=?",[$id]);
            foreach($child_po_data as $row):
               $inventoryarray=array([
                'purchase_order_id'=>$purchase_order_id,
                'supplierid'=>$supplierid,
                'categoryid'=>$row->categoryid,
                'itemid' =>$row->itemid,
                'unitprice'=>  $row->unit_price,
                'quantity'=>  $row->quantity,
                'totalprice'=>  $row->total,
                'saleprice'=>  $row->sale_price,
                'batchnumber'=>  $row->batchnumber,
                'manufactureddate'=>  $row->manufactureddate,
                'expirydate'=>  $row->expirydate,
                'billnumber'=>$billnumber,
                'warehouseid'=>1,
                'purchasedate'=>$purchase_order_date
                ]);
                // insertion in inventories table
               DB::table("inventories")->insert($inventoryarray);
            //    inventory transaction array
            $inventorytransactionarray=array([
                'purchase_order_id'=>$purchase_order_id,
                'supplierid'=>$supplierid,
                'categoryid'=>$row->categoryid,
                'itemid' =>$row->itemid,
                'unitprice'=>  $row->unit_price,
                'stockinquantity'=>  $row->quantity,
                'totalprice'=>  $row->total,
                'saleprice'=>  $row->sale_price,
                'billnumber'=>$billnumber,
                'warehouseid'=>1,
                'sotckindate'=>$purchase_order_date,
                'batchnumber'=>$row->batchnumber,
                ]);
            DB::table("stocktransactions")->insert($inventorytransactionarray);
            endforeach;
                return back();
       
    }

    } 
    public function PayBillView()
    {
        $Suppliers=DB::select("SELECT `supplierid`, `name` FROM `suppliers`");
        return view('purchaseorder.PayBillPo',compact("Suppliers"));
    }

    public function GetUnpaidPo(Request $request)
    {
        $Supplierid=$request->get('Supplierid');
        $SupplierPoDetails=DB::select("SELECT `purchase_order_id`, `po_number`,`purchase_order_date`, `totalbill`,`current_payment`,`remaining` FROM `purchase_orders` 
        WHERE `postatus`='recieved' and `remaining`>0 and `supplierid`=$Supplierid");
        return view('ajax.UnpaidSupplierPo',compact("SupplierPoDetails"));
    }
    public function GetPoDetailStatus(Request $request)
    {
        $purchase_order_id=$request->purchase_order_id;
        $Po_Details=DB::select("SELECT `purchase_order_id`, `supplierid`, `remaining` FROM `purchase_orders` WHERE `purchase_order_id`=$purchase_order_id");
        return json_encode(['purchase_order_id'=>$Po_Details[0]->purchase_order_id,'supplierid'=>$Po_Details[0]->supplierid,'remaining'=>$Po_Details[0]->remaining,]);
    }
    public function PayBillPo(Request $request)
    {
       
        $purchase_order_id=$request->purchase_order_id;
        $supplierid=$request->supplierid;
        $remaining=$request->remaining;
        $payment=$request->payment;
        $current_remainig=$request->current_remainig;
        $payment_date=$request->payment_date;
        $payment_type=$request->payment_type;
        $discription=$request->discription;
        // updating purchase order parent   
        // previous details
       $PO_Payments=DB::select("SELECT `current_payment`, `remaining` FROM `purchase_orders` WHERE `purchase_order_id`=$purchase_order_id");
       $already_paid= $PO_Payments[0]->current_payment;
       $already_remaining= $PO_Payments[0]->remaining;
    //    current updations
          $updated_currentpayment= $already_paid+$payment;
          $updated_remaining=$already_remaining-$payment;
       DB::update("UPDATE `purchase_orders` SET `current_payment`=$updated_currentpayment,`remaining`=$updated_remaining WHERE `purchase_order_id`=$purchase_order_id");
    //    updating supplier ledger table
    $SupplierBalance=DB::select("SELECT `balance` FROM `supplier_legders` WHERE `supplierid`=$supplierid ORDER BY  `supplier_legder_id`  DESC LIMIT 1");
    if($SupplierBalance)
    {
    $S_Balance=$SupplierBalance[0]->balance;

        $UpdatedBalance=$S_Balance+$payment-0;
         $supplier_legder_id=DB::table("supplier_legders")->insertGetId(['supplierid'=>$supplierid,'purchase_order_id'=>$purchase_order_id,'debit'=>$payment,
        'credit'=>'0','balance'=>$UpdatedBalance,'payment_date'=>$payment_date,'payment_type'=>$payment_type,'discription'=>$discription]);
        $vocher_no='VB-Pay-'.$supplier_legder_id;
        DB::table("supplier_legders")->where('supplier_legder_id',$supplier_legder_id)->update(['vocher_no'=>$vocher_no]);
    }
    else
    {
        $balance=0+0-$payment;
        $supplier_legder_id=DB::table("supplier_legders")->insertGetId(['supplierid'=>$supplierid,'purchase_order_id'=>$purchase_order_id,'debit'=>$payment,
        'credit'=>'0','balance'=>$balance,'payment_date'=>$payment_date,'payment_type'=>$payment_type,'discription'=>$discription]);
        $vocher_no='VB-Pay-'.$supplier_legder_id;
        DB::table("supplier_legders")->where('supplier_legder_id',$supplier_legder_id)->update(['vocher_no'=>$vocher_no]);
    }
       return back();
    }

    public function SupplierBalanceDetail()
    {
        $Suppliers=DB::select("SELECT `supplierid`, `name` FROM `suppliers` ");
        return view('Supplier.SupplierBalanceDetail',compact("Suppliers"));
    }

    public function GetBalacneDetailSupplier(Request $request)
    {
      $supplierid=$request->supplierid;
      $from=$request->from;
      $to=$request->to;
    //   supplier name
      $SupplierResult=DB::select("SELECT  `name`  FROM `suppliers` WHERE `supplierid`=$supplierid");
      $SupplierName=$SupplierResult[0]->name;
    //   details
      $SupplieBalnceDetails=DB::select("SELECT `vocher_no`, `debit`, `credit`, `balance`, `po_number`, `payment_date`, `payment_type`, 
      `discription` FROM `supplier_legders` WHERE `supplierid`='$supplierid' and `payment_date` BETWEEN '$from' and '$to'");
     
      return view('ajax.SupplierBalanceTable',compact("SupplieBalnceDetails"));
    }
}
