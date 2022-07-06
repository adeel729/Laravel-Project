<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ledgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Ledger Debit
    public function create()
    {
        return view('reports.stockinledger');
    }
    // reurn ledger credit view
    public function createledgercreditview()
    {
        $customers=Db::select("SELECT `customerid`, `name` FROM `customers`");
        return view('reports.ledgercredit',['customers'=>$customers]);
    }
    // search and return credit view




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function selectcreditdetails(Request $req)
    {
        $customerid=$req->get('customerid');
        $from=$req->get('from');
        $to=$req->get('to');
        // selecting ledger Details
       $creditdetails=DB::select("SELECT c.name,i.invoicennumber,g.actiondate as paymentdate,g.debit,g.credit,g.balance
        from generalledgers g 
        inner join invoicemasters i on g.imasterid=i.imasterid
        inner join customers c on g.customerid=c.customerid
        where g.customerid='$customerid' and g.actiondate BETWEEN '$from' and '$to' ");
        // selectin tax paid amount
        // $taxamount=DB::select("SELECT sum(gsttaxamount)  as gsttax,sum(incometaxamount) as incometax,sum(saletaxgovernmentamount) as salestax
        // FROM invoicemasters='$customerid' and `invoicedate` BETWEEN '$from' and '$to' ");
        // select Invoices Details
        $invoicesdetails=DB::select("SELECT `invoicennumber`,`nettotal`,`paid`,`remaining`,`gsttaxamount`,`incometaxamount`,`saletaxgovernmentamount`
        FROM invoicemasters 
        where customerid='$customerid' and `invoicedate` BETWEEN '$from' and '$to' ");

        return view('reports.ledgercreditajaxcustomer',["creditdetails"=>$creditdetails,'invoicesdetails'=>$invoicesdetails]);
    }
    /**
    */
    public function store(Request $request)
    {
      
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
        //
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
    // get credit detailsa general legders
    public function getdebitdetails(Request $request)
    {
        $from=$request->get('from');
        $to=$request->get('to');
        $creditquery=DB::select("SELECT s.itemname, g.actiondate, g.debit, g.credit, g.balance
        FROM generalledgers g 
        inner join inventories i on g.inventoryid=i.inventoryid
        inner join items s on s.itemid=i.itemid
        where g.actiondate between '$from' and '$to' ");
        return view('reports.stocindebitajax',['creditquery'=>$creditquery]);
    }
    // select all entries of credit
    public function creditdatesdetail()
    {
        return view('reports.ledgerdatesbetweencredit');
    }
    // represents all intries of credit
    public function ceditdateshitory(Request $request)
    {
        $from=$request->get('from');
        $to=$request->get('to');
       $legerdetails= DB::select("SELECT c.name,i.invoicennumber,g.actiondate as paymentdate,g.debit,g.credit,g.balance
        from generalledgers g 
        inner join invoicemasters i on g.imasterid=i.imasterid
        inner join customers c on g.customerid=c.customerid
        where  g.actiondate BETWEEN '$from' and '$to' ");
        return view('reports.ajaxgeneralledgerbetweendates',['legerdetails'=>$legerdetails]);
    }
}
