<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]); //return the index file from customer folder in public, 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile'=>'required',
            'address'=>'required',
        ]);

        $input = $request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $reImage = $image->getClientOriginalName();
            $dest=public_path('/images');
            $image->move($dest,$reImage);
            
            $input['photo'] = $reImage;
        }else{
            $reImage='na';
        }

        //$imgPath=$request->file('photo')->store('public/imgs');

        $data=new Customer;
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);//sha1 or md5 encrypt method (default php function)
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$reImage;
        $data->save();

        $ref=$request->ref; //ref is the input type hidden name from the register.blade.php
        if($ref=='front'){
            return redirect('customer/register')->with('success','Congratulations! Account register sucessfully, please log in now');;
        }
        
        return redirect('admin/customer/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Customer::find($id);
        return view('customer.edit',['data'=>$data]);
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
        $request->validate([
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
        ]);

        $input = $request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $reImage = $image->getClientOriginalName();
            $dest=public_path('/images');
            $image->move($dest,$reImage);

            $input['photo'] = $reImage;
        }else{
            $reImage='na';
        }

        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password=sha1($request->password);//sha1 or md5 encrypt method (default php function)
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$reImage;
        $data->save();
      
        return redirect('admin/customer/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('id',$id)->delete();
        return redirect('admin/customer')->with('success','Data has been deleted.');
    }

    //Customer Login
    public function login(){
        return view('frontendLogin');
    }

     //Check Login
     public function customer_login(Request $request){
        $email=$request->LogInEmail;
        $pwd=sha1($request->LogInPassword);
        $detail=Customer::where(['email'=>$email,'password'=>$pwd])->count();
        if($detail>0){
            $detail=Customer::where(['email'=>$email,'password'=>$pwd])->get();
            session(['customerlogin'=>true,'data'=>$detail]);
            return redirect('home');
        }else{
            return redirect('customer/login')->with('error','Invalid email/password!');
        }
    }

      //Customer Register
      public function register(){
        return view('frontendRegister');
    }

    //Customer Register
    public function logout(){
        session()->forget(['customerlogin','data']);
        return redirect('customer/login');
}
    
}
