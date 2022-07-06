<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class dahboardController extends Controller
{
    public function index()
    {
      $DateBefore7=Carbon::now()->subDays(7);
       $DateBeforeWeek=$DateBefore7->format('Y-m-d');
     
        $PaidInvoicesCash=0;
        $weeklyPaidInvoicesCash=0;
        $CreditInvoicesCash=0;
        $weeklyCreditInvoicesCash=0;
        $todayDate = Carbon::now()->format('Y-m-d');
        $creditpaid=0;
        $creditnettoal=0;
        $creditremaining=0;
        $weeklycreditpaid=0;
        $weeklycreditnettoal=0;
        $weeklycreditremaining=0;
      //Calculating total no of cash invoices 
      $CashInvoicesResult=DB::select("SELECT `imasterid` FROM `invoicemasters` WHERE `invoicedate`='$todayDate' and `status`='close'");
      $NumOfCashInvoices=  Count($CashInvoicesResult);
    //calculating Total Amount Recieved Amount Cash Invoices 
      $CashInvoicesTotalCash=DB::select("SELECT sum(paid) as TotalPaidCashInvoices FROM `invoicemasters` WHERE `invoicedate`='$todayDate' and `status`='close'");
        if(empty($CashInvoicesTotalCash))
        {
            $PaidInvoicesCash=0;
        }
        else
        {
          $PaidInvoicesCash=$CashInvoicesTotalCash[0]->TotalPaidCashInvoices;
        }
    //now calculating No of credit invoices ,Paid Amount ,Remainig NetTotal 
    $CreditInvoicesResult=DB::select("SELECT `imasterid` FROM `invoicemasters` WHERE `invoicedate`='$todayDate' and `status`='open'");
    $NumOfCreditInvoices=  Count($CreditInvoicesResult);
   $CreditInvoicesDetails=DB::Select("SELECT sum(paid) as creditpaid,sum(nettotal) as creditnettoal,sum(remaining) as creditremaining FROM `invoicemasters` WHERE `invoicedate`='$todayDate' and `status`='open'");
   if(empty($CreditInvoicesDetails))
   {
    $creditpaid=0;
    $creditnettoal=0;
    $creditremaining=0;
   }   
   else
   {
    $creditpaid=$CreditInvoicesDetails[0]->creditpaid;
    $creditnettoal=$CreditInvoicesDetails[0]->creditnettoal;
    $creditremaining=$CreditInvoicesDetails[0]->creditremaining;
   }  
  //  Calculating Dashboard Data On basis Of week
     //Calculating total no of cash invoices 
     $WeekCashInvoicesResult=DB::select("SELECT `imasterid` FROM `invoicemasters` WHERE `invoicedate` between '$DateBeforeWeek' and '$todayDate' and `status`='close'");
     $CashInvoicesInWeek=  Count($WeekCashInvoicesResult);
       //calculating Total Amount Recieved Amount Cash Invoices 
       $WeeklyCashOfInvoices=DB::select("SELECT sum(paid) as TotalPaidCashInvoices FROM `invoicemasters` where `invoicedate` between '$DateBeforeWeek' and '$todayDate' and `status`='close'");
       if(empty($WeeklyCashOfInvoices))
       {
           $weeklyPaidInvoicesCash=0;
       }
       else
       {
         $weeklyPaidInvoicesCash=$WeeklyCashOfInvoices[0]->TotalPaidCashInvoices;
       }
        //now calculating No of credit invoices ,Paid Amount ,Remainig NetTotal 
    $WeeklyCreditInvoicesResult=DB::select("SELECT `imasterid` FROM `invoicemasters` WHERE `invoicedate` between '$DateBeforeWeek' and '$todayDate' and `status`='open'");
    $weeklyNumOfCreditInvoices=  Count($WeeklyCreditInvoicesResult);
   $weeklyCreditInvoicesDetails=DB::Select("SELECT sum(paid) as creditpaid,sum(nettotal) as creditnettoal,sum(remaining) as creditremaining FROM `invoicemasters` WHERE `invoicedate` between '$DateBeforeWeek' and '$todayDate' and `status`='open'");
   if(empty($weeklyCreditInvoicesDetails))
   {
    $weeklycreditpaid=0;
    $weeklycreditnettoal=0;
    $weeklycreditremaining=0;
   }   
   else
   {
    $weeklycreditpaid=$weeklyCreditInvoicesDetails[0]->creditpaid;
    $weeklycreditnettoal=$weeklyCreditInvoicesDetails[0]->creditnettoal;
    $weeklycreditremaining=$weeklyCreditInvoicesDetails[0]->creditremaining;
   }  
  //  calculating market outstanding
  $MarketRecievableResult=DB::select("SELECT sum(remaining) as marketremaining FROM invoicemasters ");
  $marketreceiveable=$MarketRecievableResult[0]->marketremaining;
  // calculating market payable 
  $CashPayableResult=DB::select("SELECT  sum(remaining) as cashpayable from purchase_orders where postatus='recieved'");
  $CashPayable=$CashPayableResult[0]->cashpayable;
  return view('welcome',['NumOfCashInvoices'=>$NumOfCashInvoices,'PaidInvoicesCash'=>$PaidInvoicesCash,'NumOfCreditInvoices'=>$NumOfCreditInvoices,'creditpaid'=>$creditpaid,'creditnettoal'=>$creditnettoal,
   'creditremaining'=>$creditremaining,'CashInvoicesInWeek'=>$CashInvoicesInWeek,'weeklyPaidInvoicesCash'=>$weeklyPaidInvoicesCash,'weeklyNumOfCreditInvoices'=>$weeklyNumOfCreditInvoices,'weeklycreditpaid'=>$weeklycreditpaid,'weeklycreditnettoal'=>$weeklycreditnettoal,
   'weeklycreditremaining'=>$weeklycreditremaining,'marketreceiveable'=>$marketreceiveable,'CashPayable'=>$CashPayable]);
    }
}
