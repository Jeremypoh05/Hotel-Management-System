<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomTypes;
use App\Models\RoomTypeImage;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=RoomTypes::all();
        return view('roomtypes.index',['data'=>$data]); //return the index file from roomtypes folder in public, 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtypes.create');
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
            'type'=>'required',
            'price'=>'required',
            'detail'=>'required',
        ]);

        $data=new RoomTypes;
        $data->type=$request->type; //this "type" must match with the create.blade.php type name
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();

        $input = $request->all();
        if($request->hasFile('imgs')){
            foreach($request->file('imgs') as $img){
                $extension = $img->getClientOriginalExtension();
                $reImage = $img->getClientOriginalName();
                $dest=public_path('storage/roomtype');
                $img->move($dest,$reImage);

                $input['imgs'] = $reImage;

                $imgData=new RoomTypeImage;
                $imgData->room_type_id=$data->id;
                $imgData->img_src=$reImage;
                $imgData->img_alt=$request->type;
                $imgData->save();
            }
        }
       
        return redirect('admin/roomtype/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=RoomTypes::find($id);
        return view('roomtypes.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= RoomTypes::find($id);
        return view('roomtypes.edit',['data'=>$data]);
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
        $data= RoomTypes::find($id);
        $data->type=$request->type; 
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->save();

          if($request->hasFile('imgs')){
            foreach($request->file('imgs') as $img){
                $extension = $img->getClientOriginalExtension();
                $reImage = $img->getClientOriginalName();
                $dest=public_path('storage/roomtype');
                $img->move($dest,$reImage);

                $input['imgs'] = $reImage;

                $imgData=new RoomTypeImage;
                $imgData->room_type_id=$data->id;
                $imgData->img_src=$reImage;
                $imgData->img_alt=$request->type;
                $imgData->save();
            }
        }
      
        return redirect('admin/roomtype/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoomTypes::where('id',$id)->delete();
        return redirect('admin/roomtype')->with('success','Data has been deleted.');
    }

    public function destroy_image($img_id)
    {
        $data=RoomTypeImage::where('id',$img_id)->first();
        Storage::delete($data->img_src);

        RoomTypeImage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);
    }
}
