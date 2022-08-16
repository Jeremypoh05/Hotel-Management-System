<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Staff::all();
        return view('staff.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departs=Department::all();
        return view('staff.create',['departs'=>$departs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Staff;

        $input = $request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $reImage = $image->getClientOriginalName();
            $dest=public_path('storage/staff');
            $image->move($dest,$reImage);

            $input['photo'] = $reImage;
        }else{
             $reImage=$request->prev_photo;
        }

        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        $data->photo=$reImage;
        $data->bio=$request->bio;
        $data->save();

        return redirect('admin/staff/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Staff::find($id);
        return view('staff.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $departs=Department::all();
        $data=Staff::find($id);
        return view('staff.edit',['data'=>$data,'departs'=>$departs]);
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
        $data=Staff::find($id);

        $input = $request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $reImage = $image->getClientOriginalName();
            $dest=public_path('storage/staff');
            $image->move($dest,$reImage);

            $input['photo'] = $reImage;
        }else{
            $reImage=$request->prev_photo;
        }
        
        $data->full_name=$request->full_name;
        $data->department_id=$request->department_id;
        $data->photo=$reImage;
        $data->bio=$request->bio;
        $data->save();

        return redirect('admin/staff/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Staff::where('id',$id)->delete();
       return redirect('admin/staff')->with('success','Data has been deleted.');
    }
}
