<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=DB::select("SELECT `customerid`, `name`, `address`,`ntn`,`city`, `contactperson` , `prevoius_balance` FROM `customers` ");
        return view('Customer.customerlist',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer.customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //storing data in array
       $data=array([
        'name'=>$request->name,
        'address'=>$request->address,
        'province'=>$request->province,
        'city'=>$request->city,
        'contactperson'=>$request->contactperson,
        'email'=>$request->email,
        'contactpersonemail'=>$request->contactpersonemail,
        'ntn'=>$request->ntn,
        'stn'=>$request->stn,
        'landlinecustomer'=>$request->landlinecustomer,
        'prevoius_balance'=>$request->prevoius_balance
    ]);
//inserting data        

    $result=DB::table('customers')->insert($data);
//redirecting to a view
if($result)
{
    return redirect('customer')->with("CustomerAdded","New Customer Aded");
    
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
        $customers=DB::select("SELECT `customerid`, `name`, `address`, `province`, `city`, `contactperson`, `contactpersonemail`, `ntn`, `stn`,`landlinecustomer`, `prevoius_balance` FROM `customers` where customerid=?",[$id]);
        return view('Customer.customerupdate',['customers'=>$customers]);
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
        $customerUpdate=array(
            'name'=>$request->name,
            'address'=>$request->address,
            'province'=>$request->province,
            'city'=>$request->city,
            'contactperson'=>$request->contactperson,
            'contactpersonemail'=>$request->contactpersonemail,
            'ntn'=>$request->ntn,
            'stn'=>$request->stn,
            'landlinecustomer'=>$request->landlinecustomer,
            'prevoius_balance'=>$request->prevoius_balance
        );
        $res=DB::table("customers")
    ->where(['customerid'=>$id])
    ->limit(1)
    ->update($customerUpdate);
    if($res)
    {
        return redirect('/customer');
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
