<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class StaffDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Department::all();
        return view('department.index',['data'=>$data]); //return the index file from roomtypes folder in public, 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Department;
        $data->title=$request->title; //this "title" must match with the create.blade.php title name
        $data->detail=$request->detail;//this "detail" must match with the create.blade.php textarea detail name
        $data->save();

        return redirect('admin/department/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Department::find($id);
        return view('department.edit',['data'=>$data]);
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
        $data= Department::find($id);
        $data->title=$request->title; 
        $data->detail=$request->detail;
        $data->save();
      
        return redirect('admin/department/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id',$id)->delete();
        return redirect('admin/department')->with('success','Data has been deleted.');
    }
}
