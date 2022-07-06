<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class inventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items=DB::select('SELECT t.inventoryid,i.itemname, i.make, i.catalognumber,c.categoryname,t.quantity FROM items i inner join cateogaries c on i.categoryid=c.categoryid inner join inventories t on i.itemid=t.itemid where t.quantity!=0  ');
        return view('products.items',['items'=>$items]);
    }

    // getting out transaction forms
    public function getstockransaction()
    {
        return view('inventory.stocktransactiondetails');
    }
    // showing stock in form with details
    public function getstockindetail()
    {
        return view('inventory.stockinreport');
    }
    // getting dtock transaction details between dates
    public function getstockdatadetails(Request $request)
    {
        $from=$request->get('from');
        $to=$request->get('to');
       $stockoutdetails=DB::select("select r.name as customername,m.invoicedate,e.categoryname,i.itemname,c.totalprice,
       c.quantity,c.unitprice,c.tax,m.invoicennumber from invoicemasters m inner join invoicechildren c
        on m.imasterid=c.imasterid inner join customers r on m.customerid=r.customerid inner join cateogaries e 
        on c.categoryid=e.categoryid inner join items i on c.itemid=i.itemid where m.invoicedate BETWEEN '$from' and '$to' ");
        return view('inventory.invetorytransaction',['stockoutdetails'=>$stockoutdetails]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier=DB::select("SELECT `supplierid`,`name` FROM `suppliers`");
        $warehouse=DB::select("SELECT `warehouseid`,`warehousename` FROM `warehouses`");
        $categories=DB::select("SELECT `categoryid`, `categoryname` FROM `cateogaries`");
        return view('inventory.addinventory',['suppliers'=>$supplier,'warehouses'=>$warehouse,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $inventoryArray=array(
           'supplierid'=>$request->supplierid,
           'warehouseid'=>$request->warehouseid,
           'categoryid'=>$request->categoryid,
           'itemid'=>$request->itemid,
           'batchnumber'=>$request->batchnumber,
           'unitprice'=>$request->unitprice,
           'quantity'=>$request->quantity,
           'totalprice'=>$request->totalprice,
           'saleprice'=>$request->saleprice,

        //    'serialnumber'=>$request->serialnumber,
           'purchasedate'=>$request->purchasedate,
           'manufactureddate'=>$request->manufactureddate,
           'expirydate'=>$request->expirydate,
       );

       $lastinventoryid=DB::table("inventories")->insertGetId($inventoryArray);

          //array for stock transaction
    $tranasactionarray=array(
        'inventoryid'=>$lastinventoryid,
        'warehouseid'=>$request->warehouseid,
        'categoryid'=>$request->categoryid,
        'itemid'=>$request->itemid,
        'stockinquantity'=>$request->quantity,
        'sotckindate'=>$request->purchasedate,
        'unitprice'=>$request->unitprice,
        'totalprice'=>$request->totalprice,
        'saleprice'=>$request->saleprice,

    );
    // insertion in stock transaiton
    DB::table("stocktransactions")->insert($tranasactionarray);
    // insertion in general ledger accounts
        $getlastbalancequery=DB::select("SELECT  `balance` FROM `generalledgers`  ORDER BY ledgerid DESC LIMIT 1");        
        foreach($getlastbalancequery as $lastrow):
             $lastrowbalance=$lastrow->balance;
        endforeach;
        // now subtracting total amount from balance
        $totalpurchase=$request->totalprice;
        $newbalance=$lastrowbalance-$totalpurchase;
        // ledger data array
        $ledgerDataArray=array(
            'inventoryid'=>$lastinventoryid,
            'debit'=>$totalpurchase,
            'actiondate'=>$request->purchasedate,
            'balance'=>$newbalance
        );
        // inserting into general legder table
        DB::table("generalledgers")->insert($ledgerDataArray);
        
    // redirecting user
       if($lastinventoryid)
       {
        return redirect('inventory/create')->with("InventoryAdded","New Inventory Aded");
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemdetails=DB::select('select s.name as suppliername ,c.categoryname,items.itemname,items.catalognumber,i.unitprice,i.quantity,i.purchasedate,i.expirydate
        from inventories i
        inner join suppliers s on i.supplierid=s.supplierid
        inner join cateogaries c on c.categoryid=i.categoryid 
        inner join items on items.itemid=i.itemid 
        where i.inventoryid=?',[$id]);
        return view('inventory.viewindiviualinventory',['itemdetails'=>$itemdetails]);
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
    // getting values for cateogary
    public function getitems(Request $request )
    {
            $categoryid=$request->get('categoryid');
            
            $items=DB::select("SELECT `itemid`,`itemname` FROM `items` WHERE `categoryid`=?",[$categoryid]);
            return view('ajax.selectitems',['items'=>$items]);
    }
    // get details on button click
    public function getstockindetails(Request $req)
    {
        $from=$req->get('from');
        $to=$req->get('to');
       $stockindata=DB::select("SELECT wa.warehousename,ca.categoryname,it.itemname,st.unitprice,st.stockinquantity,st.totalprice,st.saleprice,st.billnumber,st.batchnumber,st.sotckindate
       FROM stocktransactions st 
       inner join warehouses wa on st.warehouseid=wa.warehouseid
       inner join cateogaries ca on st.categoryid=ca.categoryid
       inner join items it on st.itemid=it.itemid
WHERE st.sotckindate BETWEEN '$from' and '$to' ");

    return view('inventory.inventoryinreport',['stockindata'=>$stockindata]);
    }

}
