<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\item;
use PDF;
// use Barryvdh\DomPDF\Facades;
class quotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations=DB::select("SELECT * FROM `quotationmasters`");
        return view('Quotation.Quotationlist',compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $customer=DB::Select("SELECT `customerid`, `name` FROM `customers`");
        $cateogary=DB::Select("SELECT `categoryid`, `categoryname` FROM `cateogaries` ");
        return view('Quotation.quotation',['customer'=>$customer,'cateogary'=>$cateogary]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masterdata=array(
            'customerid'=>$request->customerid,
            'quotationdate'=>$request->quotationdate,
            'totalwithouttax'=>$request->totalwithouttax,
            'discount'=>$request->discount,
            'afterdiscount'=>$request->afterdiscount,
            'taxamount'=>$request->taxamount,
            'totalaftertax'=>$request->totalaftertax,
            'nettotal'=>$request->nettotal,
            'pricevalidity'=>$request->pricevalidity,
            'paymentterm'=>$request->paymentterm,
            'deliver'=>$request->deliver,
        );
        // inserting data in master table and getting last id
        $lastinsertedid=DB::table('quotationmasters')->insertGetId($masterdata);
        // creating quotation number
        $quotationnumber="Quot-#".$lastinsertedid;
        // updating quotation number column in master table in only one row
        DB::table('quotationmasters')->where('qmasterid',$lastinsertedid)->limit(1)->update(array('quotationnumber'=>$quotationnumber));
        // calculating total number of rows
        $totalrows=count($request->categoryid);
        // use for loop to insert data
        for($t=0;$t<$totalrows;$t++)
        {
            $childata=array(
                            'qmasterid'=>$lastinsertedid,
                            'categoryid'=>$request->categoryid[$t],
                            'itemid'=>$request->itemid[$t],
                            'unitprice'=>$request->unitprice[$t],
                            'quantity'=>$request->quantity[$t],
                            'totalprice'=>$request->totalprice[$t],
                            'tax'=>$request->tax[$t],
                            'aftertax'=>$request->aftertax[$t]
                             );
            $childata=DB::table('quotationchildren')->insert($childata);
        }
        if($childata)
        {
            return redirect('/quotation')->with("QuotationCReated","Quotation Created Successfully");
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
      
        $Qmasterid=$id;
        // query for master table
    //    $MasterData=DB::select("SELECT m.quotationnumber as quotationnumber,m.quotationdate,m.totalwithouttax,m.discount,m.afterdiscount,m.taxamount,m.totalaftertax,m.nettotal,c.name,c.address,c.contactperson
    //     FROM quotationmasters m  
    //     inner join customers c on m.customerid=c.customerid 
    //     where m.qmasterid=?",[$Qmasterid]);
   

    // USing query builder getting data of master table
    $MasterData=DB::table('quotationmasters')
                ->join('customers','quotationmasters.customerid','=','customers.customerid')
                ->where('quotationmasters.qmasterid',$Qmasterid)
                ->get(['quotationmasters.quotationnumber','quotationmasters.quotationdate','quotationmasters.totalwithouttax','quotationmasters.discount','quotationmasters.afterdiscount',
                'quotationmasters.taxamount','quotationmasters.totalaftertax','quotationmasters.nettotal','quotationmasters.pricevalidity','quotationmasters.paymentterm','quotationmasters.deliver','customers.name','customers.address','customers.contactperson'
                ]);
                
                // 
                // getting data for child using query builder
    $childata=DB::table("quotationmasters")
    ->join("quotationchildren",'quotationmasters.qmasterid','=','quotationchildren.qmasterid')
    ->join("items",'quotationchildren.itemid','=','items.itemid')
    ->join("units",'items.unitid','=','units.unitid')
    // ->join("inventories",'inventories.itemid','=','quotationchildren.itemid')
    ->where('quotationmasters.qmasterid',$Qmasterid)
    ->get(['items.itemname','items.make','items.catalognumber','items.discription','quotationchildren.unitprice','quotationchildren.quantity','quotationchildren.tax','quotationchildren.totalprice','quotationchildren.aftertax','units.unitname']);  
    $pdf=PDF::loadView('Quotation.QuotationView',compact("MasterData"),compact("childata"));
    return $pdf->stream('Quotation-'.$MasterData[0]->quotationnumber.'-'.$MasterData[0]->quotationdate.'.pdf');
    
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
    // get items details
    public function get_item_detail(Request $request)
    {
       
        $itemid=$request->get('item_id');
        $categoryid=$request->get('cat_id');

        $subUnits = item::
        select('subUnit')
        ->where('itemid',$itemid)
        ->first();
        $subUnit = $subUnits['subUnit'];
      
        // total quantity of item
        $totalquantity = DB::select('SELECT sum(quantity) as total from inventories where categoryid=? and itemid=?', [$categoryid,$itemid]);
        
        foreach($totalquantity as $qty):
           
            if(($qty->total)<1)
            {
                $itemquantity='0';
            }
            elseif(($qty->total)>=1)
            {
                $itemquantity=$qty->total;
            }
            else
            {
                $itemquantity='0';
            }
        endforeach;
        // item price
        $saleprice=DB::select('SELECT saleprice FROM `inventories` WHERE   categoryid=? and itemid=? ORDER by (inventoryid)DESC LIMIT 1', [$categoryid,$itemid]);
        foreach($saleprice as $price):
            if(($price->saleprice)<1)
            {
                $itemprice='0';
            }
            elseif(($price->saleprice)>1)
            {
                $itemprice=$price->saleprice;
            }
            else
            {
                $itemprice='0';
            }
        endforeach;
        return json_encode(array('itemquantity'=>$itemquantity,'itemprice'=>$itemprice,'subUnit'=>$subUnit));
    }
    // get items on cat
    function getitemsoncat(Request $request)
    {
        $categoryid=$request->get('categoryid');
        $warehouseid=$request->get('warehouseid');
            
            $items=DB::select("select itemname,itemid
            from items i
            where categoryid=?",[$categoryid]);
            return view('ajax.selectquotaipnitems',['items'=>$items]);
    }
    // function to view quotation
    // public function viewquotation(Request $request)
    // {
    //     $quotationmasterid=$request->qmasterid;
    //     echo $quotationmasterid;
    // }
}
