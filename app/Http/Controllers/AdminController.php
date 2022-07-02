<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Cookie; //help to save the data locally from the system 

class AdminController extends Controller
{
     // Login
     function login(){
        return view('login');
    }
    // Check Login
    function check_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
        if($admin>0){
            $adminData=Admin::where(['username'=>$request->username,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);

            if($request->has('rememberme')){ //the "remember me is the name of the label in login.blade.php"
                Cookie::queue('adminuser',$request->username,60); //set the cookies one hour
                Cookie::queue('adminpwd',$request->password,60); //to remove cookies set the -(minus) to the value
            }
                return redirect('admin');  
        }else{
            return redirect('admin/login')->with('msg','Invalid username/Password!');
        }
    }
    // Logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
}
