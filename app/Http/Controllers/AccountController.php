<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
class AccountController extends Controller
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
    public function create()
    {
       
        return view('signup.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
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
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // user login
    public function loginuseraccount(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user=DB::table("accounts")->where('email',$request->email)->first();
        if($user)
        {
                if(Hash::check($request->password,$user->password))
                {
                $request->session()->put('userid',$user->userid);
                $request->session()->put('username',$user->username);
                return redirect()->to('/');
                }
                else
                {
                    return back()->with("wrongpassword",'Wrong Password');
                }
        }
        else
        {
            return back()->with("wrongemail",'Wrong Credentials');
        }
    }
    // create create user account function 
    public function createuseraccount(Request $request)
    {
    
            $request->validate([
            'username'=>'required',
            'email'=>'required|email|unique:accounts',
            'password'=>'required|min:5|max:20',
            ]);
         
            // insertion in accounts table  is
         
            $useraccountarray=array([
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
            DB::table("accounts")->insert($useraccountarray);   
            return back();
    }
    // Logout User
    public function Logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
