<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\cateogary;
use App\Models\unit;
use App\Models\Unit_child;
use Illuminate\Support\Facades\DB;
class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsdetails=DB::select("SELECT `itemid`,`itemname`,`make`, `catalognumber`, `discription` FROM `items` ");
        return view('products.itemlist',['itemsdetails'=>$itemsdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item=new item();
        $item->categoryid=$request->categoryid;
        $item->itemname=$request->itemname;
        $item->minimumlevel=$request->minimumlevel;
        $item->unitid=$request->unitid;
        $item->subUnit=$request->unit_Child;
        $item->make=$request->make;
        $item->catalognumber=$request->catalognumber;
        $item->discription=$request->discription;
        $item->certification=$request->certification;
        if($item->save())
        {
    return redirect('category/create')->with("ItemAdded","New Item Aded");
        }
        // return response()->json($item);
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
        $itemdetails= DB::select("SELECT * FROM `items` WHERE `itemid`=$id");
        $categoryid = $itemdetails[0]->categoryid;
        $unitid = $itemdetails[0]->unitid;
        $categoryname = cateogary::select('categoryname')->where('categoryid',$categoryid)->first();
        $unitname = unit::select('unitname')->where('unitid',$unitid)->first();
        $cateogaries=DB::table('cateogaries')->get();
        $unit=DB::table('units')->get();
        return view('products.itemupdate',['itemdetails'=>$itemdetails,'categoryname'=>$categoryname,'unitname'=>$unitname,'cateogaries'=>$cateogaries,'unit'=>$unit]);
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
        $data=array(
            'itemname'=>$request->itemname,
            'make'=>$request->make,
            'catalognumber'=>$request->catalognumber,
            'minimumlevel'=>$request->minimumlevel,
            'categoryid'=>$request->cat_id,
            'unitid'=>$request->unit_id,
            'discription'=>$request->discription,
            'certification'=>$request->certification
        );
        // updating existing data
        $res=DB::table("items")
        ->where(['itemid'=>$id])
        ->limit(1)
        ->update($data);
        if($res)
        {
            return redirect("/item")->with("itemUpdated","Item Updated updated Successfully");
        }
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


    public function getUnitChildren(Request $req)
    {
        $unitChildren = Unit_child::where('unit_id',$req->unitID)->get();
        return $unitChildren;
    }
}
