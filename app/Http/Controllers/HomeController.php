<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\Gallery;
use App\Models\Booking;
use App\Models\Testimonial;
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
        $testimonials=Testimonial::all();

        $room=Room::all();
        $booking=Booking::all();
        return view('home',['room'=>$room,'booking'=>$booking,'testimonials'=>$testimonials]);
       // return view('home')->with('gallery',$gallery);
    }

       public function roomDetail(Request $request,$slug,$roomid){
    	$roomDetail=Room::find($roomid);
        return view('viewRoom',['roomDetail'=>$roomDetail]);
    }

      // Save Testimonial
      function save_testimonial(Request $request){
        
        $request->validate([
            'testi_content'=>'required',
        ]);

        $customerId=session('data')[0]->id;
        $data=new Testimonial;
        $data->customer_id=$customerId;
        $data->testi_content=$request->testi_content;
        $data->save();

        return redirect()->route('testimonialSuccess')->with('success','Testimonial added successfully!');
    }

     // Show Testimonial Status
     function show_testimonial_status(){
        return view('testimonialSuccess');
    }

    public function roomPage(){
        $room=Room::orderBy('id')->paginate(5);
        return view('frontendRoomPage',['room'=>$room]);
    }

    public function contactPage()
    {
        return view('frontendContactPage');
       // return view('home')->with('gallery',$gallery);
    }

    public function galleryPage()
    {
        $gallery=Gallery::all();
        
        return view('frontendGalleryPage',['gallery'=>$gallery]);
       // return view('home')->with('gallery',$gallery);
    }

    public function aboutPage()
    {
        $testimonials=Testimonial::all();
        return view('frontendAboutPage',['testimonials'=>$testimonials]);
       // return view('home')->with('gallery',$gallery);
    }
}
