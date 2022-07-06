<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use Illuminate\Support\Facades\DB;
class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplierdetails=DB::select("SELECT `supplierid`, `name`, `address`, `country`, `province`, `city`, `email`, `contact`, `companylandline`, `ntn`, `stn`, `previousbalance` FROM `suppliers` ");
        return view('Supplier.supplierlist',['supplierdetails'=>$supplierdetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Supplier.supplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier=new supplier();
        $supplier->name=$request->name;
        $supplier->address=$request->address;
        $supplier->country=$request->country;
        $supplier->province=$request->province;
        $supplier->city=$request->city;
        $supplier->email=$request->email;
        $supplier->contact=$request->contact;
        $supplier->companylandline=$request->companylandline;
        $supplier->ntn=$request->ntn;
        $supplier->stn=$request->stn;
        $supplier->previousbalance=$request->previousbalance;
        if($supplier->save())
        {
            return redirect('supplier/create')->with("SupplierAdded","New Supplier Added");
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
       $suppliersdetails= DB::Select("SELECT `supplierid`, `name`, `address`, `country`, `province`, `city`, `email`, `contact`, `companylandline`, `ntn`, `stn`, `previousbalance` FROM `suppliers` WHERE `supplierid`=?",[$id]);
        return view('Supplier.supplierupdate',['suppliersdetails'=>$suppliersdetails]);
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
      
        $supplierdata=array(
            'name'=>$request->name,
            'address'=>$request->address,
            'country'=>$request->country,
            'province'=>$request->province,
            'city'=>$request->city,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'companylandline'=>$request->companylandline,
            'ntn'=>$request->ntn,
            'stn'=>$request->stn,
            'previousbalance'=>$request->previousbalance
        );
        $res=DB::table("suppliers")
        ->where(['supplierid'=>$id])
        ->limit(1)
        ->update($supplierdata);
        if($res)
        {
            return redirect('/supplier');
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
}
