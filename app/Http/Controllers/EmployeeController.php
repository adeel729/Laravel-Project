<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=DB::select("SELECT  `employeeid`,`name`,`salary`,`cnic`, `mobilenumber`  FROM `employees`");
        return view('Employee.employeeslist',['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.employee');
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
        'departmentid'=>$request->departmentid,
        'name'=>$request->name,
        'fathername'=>$request->fathername,
        'dateofbirth'=>$request->dateofbirth,
        'salary'=>$request->salary,
        'gender'=>$request->gender,
        'address'=>$request->address,
        'email'=>$request->email,
        'cnic'=>$request->cnic,
        'mobilenumber'=>$request->mobilenumber,
        'status'=>$request->status
    ]);
//inserting data        

    $result=DB::table('employees')->insert($data);
//redirecting to a view
if($result)
{
    return redirect('employee/create')->with("EmployeeAdded","New Employee Aded");
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
        $employeedata=DB::select("SELECT `employeeid`, `departmentid`, `name`, `fathername`, `dateofbirth`, `salary`, `gender`, `address`, `email`, `cnic`, `mobilenumber`, `status` FROM `employees` WHERE `employeeid`=?",[$id]);
        return view('Employee.employeeupdate',['employeedata'=>$employeedata]);
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
       
             //storing data in array
    $data=array(
        'departmentid'=>$request->departmentid,
        'name'=>$request->name,
        'fathername'=>$request->fathername,
        'dateofbirth'=>$request->dateofbirth,
        'salary'=>$request->salary,
        'gender'=>$request->gender,
        'address'=>$request->address,
        'email'=>$request->email,
        'cnic'=>$request->cnic,
        'mobilenumber'=>$request->mobilenumber,
        'status'=>$request->status
    );
    // updating existing data
    $res=DB::table("employees")
    ->where(['employeeid'=>$id])
    ->limit(1)
    ->update($data);
    if($res)
    {
        return redirect("/employee")->with("EmployeeUpdated","Employee updated Successfully");
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
