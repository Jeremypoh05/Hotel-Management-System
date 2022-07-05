<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomTypes;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Room::all();
        return view('room.index',['data'=>$data]); //return the index file from roomtypes folder in public, 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtypes=RoomTypes::all();
        return view('room.create',['roomtypes'=>$roomtypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=new Room;
        $data->room_type_id=$request->rt_id;  //select the room_type_id from database and request rt_id, match with the create.blade.php (select and option part)
        $data->title=$request->title; //this "title" must match with the create.blade.php title name
        $data->price=$request->room_price;
        $data->save();

        $input = $request->all();
        if($request->hasFile('roomimgs')){
        foreach($request->file('roomimgs') as $img){ //the "imgs" is the input file name from the create.blade.php (roomtypes)
            $extension = $img->getClientOriginalExtension();
            $reImage = $img->getClientOriginalName();
            $dest=public_path('storage/imgs');
            $img->move($dest,$reImage);

            $input['photo'] = $reImage;

            $imgData=new RoomImage;
            $imgData->room_id=$data->id; 
            //room_id is the column from the roomimage's table, and $data is the
            //new Room which shows  $data=new Room;, id is the Room's id.
            $imgData->img_src=$reImage;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }
    }
    
        return redirect('admin/rooms/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Room::find($id);
        return view('room.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtypes=RoomTypes::all();
        $data= Room::find($id);
        return view('room.edit',['data'=>$data,'roomtypes'=>$roomtypes]);
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
        $data= Room::find($id);
        $data->room_type_id=$request->rt_id;
        $data->title=$request->title; 
        $data->price=$request->room_price;
        $data->save();

        $input = $request->all();
        if($request->hasFile('roomimgs')){
        foreach($request->file('roomimgs') as $img){ //the "imgs" is the input file name from the create.blade.php (roomtypes)
            $extension = $img->getClientOriginalExtension();
            $reImage = $img->getClientOriginalName();
            $dest=public_path('storage/imgs');
            $img->move($dest,$reImage);

            $input['photo'] = $reImage;

            $imgData=new RoomImage;
            $imgData->room_id=$data->id; 
            //room_id is the column from the roomimage's table, and $data is the
            //new Room which shows  $data=new Room;, id is the Room's id.
            $imgData->img_src=$reImage;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }
    }
      
        return redirect('admin/rooms/'.$id.'/edit')->with('success','Data has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::where('id',$id)->delete();
        return redirect('admin/rooms')->with('success','Data has been deleted.');
    }

    public function destroy_image($img_id)
    {
        $data=RoomImage::where('id',$img_id)->first();
        Storage::delete($data->img_src);

        RoomImage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);
    }
}
