<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAuthenticationController extends Controller
{
    // login form
    public function login()
    {
        return view('auth.login');
    }
    
    // regidter user
    public function register()
    {
        // $roles=DB::select("SELECT `roleid`, `rolename` FROM `tblroles`");
        return view('auth.register');
    }
// Insering User To DB
public function storeuser(Request $request)
{
    $request->validate([
    'username'=>'required',
    'useremail'=>'required|email|unique:tbluser',
    'userpassword'=>'required|min:5|max:50',
    ]);
    // Data Array
    $UserDetail=array(
        'username'=>$request->username,
        'useremail'=>$request->useremail,
        'userpassword'=>Hash::make($request->userpassword),
    );
    $IsUserCreated=DB::table('tbluser')->insert($UserDetail);
    if($IsUserCreated)
    {
        return back()->with("UserAdded","User Added Successfully");
    }
    else
    {
        return back()->with("UserAdditionFailed","User Addition Failed");

    }
}

// logging User
public function userlogin(Request $request)
{
    $request->validate([
        'useremail'=>'required|email',
        'userpassword'=>'required|min:5|max:50'
        ]);
        // User Logged Details
        $LoggedEmail=$request->useremail;
        $LoggedPassword=$request->userpassword;
        // Database Details Against Login email
        $IsUserExists=DB::select("SELECT * FROM `tbluser` WHERE `useremail`='$LoggedEmail'");
      if($IsUserExists)
        {
            $UserDetails=$IsUserExists;
            $UserDbPassowrd=$UserDetails[0]->userpassword;
            if(Hash::check($LoggedPassword,$UserDbPassowrd))
            {
                // Storing Sessions Details
                $request->session()->put('userid',$UserDetails[0]->userid);
                $request->session()->put('username',$UserDetails[0]->username);
              return redirect('/dashboard');
            }
            else
            {
            return back()->with("IncorrectPassowrd","Incorrect Passowrd");
            }
        }
        else
        {
            return back()->with("UserNotExist","User Not Exists With Email  ".'  '.$LoggedEmail);
        }
}
// logout
public function logoutuser()
{
   
   if(session()->has('userid'))
    {
        session()->pull('userid');
        session()->pull('username');
        return redirect('/');
    }
    else
    {
        echo "Some Issue";
    }
}

}
