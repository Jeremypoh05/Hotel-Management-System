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
        $request->validate([
            'title'=>'required',
        ]);

        $data=new Room;
        $data->room_type_id=$request->rt_id;  //select the room_type_id from database and request rt_id, match with the create.blade.php (select and option part)
        $data->title=$request->title; //this "title" must match with the create.blade.php title name
        $data->save();

        foreach($request->file('roomimgs') as $img){ //the "imgs" is the input file name from the create.blade.php (roomtypes)
            $imgPath=$img->store('public/imgges');
            $imgData=new RoomImage;
            $imgData->room_id=$data->id; 
            //room_type_id is the column from the roomtypeimage's table, and $data is the
            //the new RoomTypes, id is the RoomType's id.
            $imgData->img_src=$imgPath;
            $imgData->img_alt=$request->title;
            $imgData->save();
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
        $data->save();
      
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
}
