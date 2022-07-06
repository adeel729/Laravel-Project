<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Financial_offer;
use App\Models\Financial_offer_child;
use PDF;

class FinancialOfferController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $customer=DB::Select("SELECT `customerid`, `name` FROM `customers`");
        $cateogary=DB::Select("SELECT `categoryid`, `categoryname` FROM `cateogaries` ");
        return view('FinancialOffer.createFinancialOffer',['customer'=>$customer,'cateogary'=>$cateogary]);
    }

    /**
     * storing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
       $financial_offer = new Financial_offer;
       $financial_offer->customer_id = $req->customerid;
       $financial_offer->date = $req->date;
       $financial_offer->ref_no = $req->ref_no;
       $financial_offer->total_amount = $req->total_bill;
       $financial_offer->header = $req->header;
       if($financial_offer->save()){
           $len = count($req->categoryid);
           for ($i=0; $i < $len; $i++) { 
               $financial_offer_child = new Financial_offer_child;
               $financial_offer_child->categoryid = $req->categoryid[$i];
               $financial_offer_child->parent_id = $financial_offer->id;
               $financial_offer_child->itemid = $req->itemid[$i];
               $financial_offer_child->rate_per_peice = $req->rate_per_peice[$i];
               $financial_offer_child->quantity = $req->quantity[$i];
               $financial_offer_child->totalprice = 0;
               $financial_offer_child->rate_per_pack = $req->rate_per_pack[$i];
               $save = $financial_offer_child->save();
           }
       }
       if($save)
        {
            return redirect('/getFinancialOffersList')->with("QuotationCReated","Financial offer Created Successfully");
        }
    }

    public function getFinancialOffersList(Request $req){
        $Financial_offer = DB::table('financial_offers')
        ->join('customers', 'financial_offers.customer_id','=','customers.customerid') 
        ->select('financial_offers.*','customers.name')
        ->orderBy('financial_offers.id','DESC')
        ->get();

        return view('FinancialOffer.financialOffersList',['Financial_offer'=>$Financial_offer]);
    }

    public function financialOfferPdf(Request $req){
        $Financial_offer = DB::table('financial_offers')
        ->join('customers', 'financial_offers.customer_id','=','customers.customerid') 
        ->select('financial_offers.*','customers.name','customers.address')
        ->where('financial_offers.id',$req->id)
        ->orderBy('financial_offers.id','DESC')->get();
        
        $Financial_offer_child = DB::table('financial_offer_children')
        ->join('items', 'financial_offer_children.itemid','=','items.itemid')
        ->join("units",'items.unitid','=','units.unitid')
        ->select('financial_offer_children.*', 'items.*','units.unitname')
        ->orderBy('financial_offer_children.id','DESC')
        ->where('financial_offer_children.parent_id',$req->id)
        ->get(); 

        $pdf=PDF::loadView('FinancialOffer.financialOfferPdf',compact("Financial_offer"),compact("Financial_offer_child"));
        return $pdf->stream('FinancialOffer-'.$Financial_offer[0]->id.'-'.$Financial_offer[0]->date.'.pdf');
        
    }
}
