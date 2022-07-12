<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Service::all();
        return view('service.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
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
            'title'=>'required',
            'description'=>'required',
            'photo'=>'required',
        ]);

        $input = $request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $reImage = $image->getClientOriginalName();
            $dest=public_path('storage/service');
            $image->move($dest,$reImage);

            $input['photo'] = $reImage;
        }else{
            $reImage=$request->prev_photo;
        }
        
        $data=new Service;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->photo=$reImage;
        $data->save();

        return redirect('admin/service/create')->with('success','Data has been added.');
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
        $data=Service::find($id);
        return view('service.edit',['data'=>$data]);
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
            'title'=>'required',
            'description'=>'required',
        ]);

        $input = $request->all();
        if($request->hasFile('photo')){
            $image=$request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $reImage = $image->getClientOriginalName();
            $dest=public_path('storage/service');
            $image->move($dest,$reImage);

            $input['photo'] = $reImage;
        }else{
            $reImage=$request->prev_photo;
        }
        
        $data=Service::find($id);
        $data->title=$request->title;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->photo=$reImage;
        $data->save();

        return redirect('admin/service/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id',$id)->delete();
        return redirect('admin/service')->with('success','Data has been deleted.');
    }
}
