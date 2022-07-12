<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\Gallery;
use App\Models\Service;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $room=Room::all();
        $gallery=Gallery::all();
        $services=Service::all();
        return view('home',['room'=>$room,'gallery'=>$gallery,'services'=>$services]);
       // return view('home')->with('gallery',$gallery);
    }

       public function roomDetail(Request $request,$slug,$roomid){
    	$roomDetail=Room::find($roomid);
    	return view('viewRoom',['roomDetail'=>$roomDetail]);
    }
}
