<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Gallery::all();
        return view('gallery.index',['data'=>$data]); //return the index file from gallery folder in public, 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
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
            'image'=>'required',
        ]);

        $input = $request->all();
        if($request->hasFile('image')){
            $img=$request->file('image');
            $extension = $img->getClientOriginalExtension();
            $reImage = $img->getClientOriginalName();
            $dest=public_path('storage/gallery');
            $img->move($dest,$reImage);

            $input['image'] = $reImage;
        }else{
            $reImage=$request->prev_photo;
        }

            $data=new Gallery;
            $data->title=$request->title; //this "title" must match with the create.blade.php gallery_title name
            $data->image=$reImage;
            $data->save();
            
        return redirect('admin/gallery/create')->with('success','Data has been added.');
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
         $data= Gallery::find($id);
        return view('gallery.edit',['data'=>$data]);
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
        $data=Gallery::find($id);

        $input = $request->all();
        if($request->hasFile('image')){
            $img=$request->file('image');
            $extension = $img->getClientOriginalExtension();
            $reImage = $img->getClientOriginalName();
            $dest=public_path('storage/gallery');
            $img->move($dest,$reImage);

            $input['image'] = $reImage;
        }else{
            $reImage=$request->prev_photo;
        }

            $data->title=$request->title; //this "title" must match with the create.blade.php gallery_title name
            $data->image=$reImage;
            $data->save();
        
        return redirect('admin/gallery/'.$id.'/edit')->with('success','Data has been update.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::where('id',$id)->delete();
        return redirect('admin/gallery')->with('success','Data has been deleted.');
    }
}
