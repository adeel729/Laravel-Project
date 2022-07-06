<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cateogary;
use Illuminate\Support\Facades\DB;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
//storing data in array
        $cateogaries=DB::table('cateogaries')->get();
        $unit=DB::table('units')->get();
        return view('products.products',['cateogaries'=>$cateogaries, 'unit'=>$unit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cateogary=new cateogary();
        $cateogary->categoryname=$request->categoryname;
        $issuccess=$cateogary->save();
        if($issuccess)
        {
     return redirect('category/create')->with("CateogaryAdded","New Category Aded");
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
}
