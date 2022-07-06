<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TechnicalOfferController extends Controller
{
    public function geTechnicalOffersList(Request $req){
        $Financial_offer = DB::table('financial_offers')
        ->join('customers', 'financial_offers.customer_id','=','customers.customerid') 
        ->select('financial_offers.*','customers.name')
        ->orderBy('financial_offers.id','DESC')
        ->get();

        return view('TechnicalOffer.technicalOffersList',['Financial_offer'=>$Financial_offer]);
    }

    public function technicalOfferPdf(Request $req){
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

        $pdf=PDF::loadView('TechnicalOffer.technicalOfferPdf',compact("Financial_offer"),compact("Financial_offer_child"));
        return $pdf->stream('TechnicalOffer-'.$Financial_offer[0]->id.'-'.$Financial_offer[0]->date.'.pdf');
        
    }
}
