<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class reportsController extends Controller
{
    public function getCustomersRemaining()
    {
        $customerresults=DB::select('SELECT customers.name,sum(invoicemasters.remaining) as customerdues FROM invoicemasters
        inner JOIN customers on invoicemasters.customerid=customers.customerid
        where invoicemasters.remaining !=0 
        group by invoicemasters.customerid');
        return view('reports.AllCustomersRemaining',['customerresults'=>$customerresults]);
    }
    // indiviual customer report view
    public function getCustomerLedger()
    {
        $customers=DB::SELECT("SELECT `customerid`, `name` FROM `customers`");
        return view('reports.indiviualcustomerledger',['customers'=>$customers]);
    }
    // indiviual customer ledger ajax
    public function GetIndiviualCustomerDetail(Request $request)
    {
        $customerid=$request->get('customerid');
        $Customername=$request->get('Customername');
        $from=$request->get('from');
            $to=$request->get('to');
        //   query
        $customerledger=DB::Select("SELECT   invoicenumber, installmentdate,totalbill, previousbalance, installmentamount, currentremainig, chequenumber FROM installments WHERE customerid=$customerid and installmentdate BETWEEN '$from' and '$to' ");
        return view('ajax.IndivualCustomerAjaxTable',['customerledger'=>$customerledger,'Customername'=>$Customername]);
    }
}
