<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RoomTypes;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use PDF;
use Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::all();
        return view('booking.index',['data'=>$bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Customer::all();
        return view('booking.create',['data'=>$customers]);
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
            'customer_id'=>'required',
            'room_id'=>'required',
            'checkin_date'=>'required',
            'checkout_date'=>'required',
            'total_adults'=>'required',
        ]);

        if($request->ref=='front'){
            $sessionData=[
                'customer_id'=>$request->customer_id,
                'room_id'=>$request->room_id,
                'checkin_date'=>$request->checkin_date,
                'checkout_date'=>$request->checkout_date,
                'total_adults'=>$request->total_adults,
                'total_children'=>$request->total_children,
                'roomprice'=>($request->roomprice) * ($request->stayduration),
                'ref'=>$request->ref
            ];
            session($sessionData);
            \Stripe\Stripe::setApiKey('sk_test_51LJvPoDPi41w2DPReBnGhYDyvh4NRhc61JeBvfjbiC72HJVT2yKFd09lyhWYSUhe4tD5gVhF2yEWhVKGEzRLPLnq00HKA7LWLx');
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                  'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                      'name' => 'Room-Booking',
                    ],
                    'unit_amount' => (($request->roomprice) * ($request->stayduration) * 100),
                  ],
                  'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/booking/success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/booking/fail',
            ]);
            return redirect($session->url);
        }else{
            $data=new Booking;
            $data->customer_id=$request->customer_id;
            $data->room_id=$request->room_id;
            $data->checkin_date=$request->checkin_date;
            $data->checkout_date=$request->checkout_date;
            $data->total_adults=$request->total_adults;
            $data->total_children=$request->total_children;
            $data->roomprice=($request->roomprice) * ($request->stayduration2);
            if($request->ref=='front'){
                $data->ref='customer';
            }else{
                $data->ref='admin';
            }
            $data->save();

            return redirect('admin/booking/create')->with('success','Data has been added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Booking::find($id);
        return view('booking.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::where('id',$id)->delete();
        return redirect('admin/booking')->with('success','Booking has been deleted.');
    }

    //Check Available Rooms
    function available_rooms(Request $request,$checkin_date){
        $arooms=DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
       
        $data=[];
        foreach($arooms as $room){
            $roomTypes=RoomTypes::find($room->room_type_id);
            $data[]=['room'=>$room,'roomtype'=>$roomTypes];
        }

        return response()->json(['data'=>$data]);
    }

    //change status
    public function changeStatus($id){
        $getStatus = Booking::select('status')->where('id',$id)->first();
        if($getStatus->status==1){
            $status = 0;
        }else{
            $status = 1;
        }
        Booking::where('id',$id)->update(['status'=>$status]);
        return redirect()->back();
    }

    public function frontend_booking()
    {
        $customers=Customer::all();
        return view('frontendBooking');
    }

    function booking_payment_success(Request $request){

        \Stripe\Stripe::setApiKey('sk_test_51LJvPoDPi41w2DPReBnGhYDyvh4NRhc61JeBvfjbiC72HJVT2yKFd09lyhWYSUhe4tD5gVhF2yEWhVKGEzRLPLnq00HKA7LWLx');
        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
        $customer = \Stripe\Customer::retrieve($session->customer);
        if($session->payment_status=='paid'){
            $data=new Booking;
            $data->customer_id=session('customer_id');
            $data->room_id=session('room_id');
            $data->checkin_date=session('checkin_date');
            $data->checkout_date=session('checkout_date');
            $data->total_adults=session('total_adults');
            $data->total_children=session('total_children');
            $data->roomprice=session('roomprice');
            if(session('ref')=='front'){
                $data->ref='customer';
            }else{
                $data->ref='admin';
            }
            $data->save();

           return view('booking.success');
            /*$booking = Booking::get();*/
            /*$booking = Booking::where('id',"=", $id)->first();
            return view('booking.success', compact('booking'));*/
        }
    }

    function booking_payment_fail(Request $request){
        return view('booking.failure');
    }

    public function pdfReport(Request $request)
    {
        $customerid=$request->session()->get('customer_id');
        $booking=DB::table('bookings')
        ->leftjoin('customers','customers.id','=','bookings.customer_id')
        ->leftjoin('rooms','rooms.id','=','bookings.room_id')
        ->leftjoin('room_types', 'room_types.id', '=', 'rooms.room_type_id')
        ->select('bookings.*','rooms.title as roomTitle','bookings.roomprice as roomPrice',
                  'room_types.type as roomType', 'customers.id as cusID')
        ->where('bookings.customer_id','=',$customerid)
        ->orderby('id', 'DESC')
        ->take(1)
        ->get();
  
        $pdf = PDF::loadView('myPDF', compact('booking'));
        
        return $pdf->download('BookingHistory.pdf');
    }

}
