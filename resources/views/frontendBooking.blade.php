@extends('frontendlayout')
@section('title','Booking')
@section('content')

<section class="landing-page-bg">
    <div class="content flex-center">
      <h1>Booking</h1>
      <div class = "line">
           <div></div>
           <div></div>
           <div></div>
       </div>
      <p>Select Us To Get Your Trip Happiness</p>
    </div>
</section>

<section class="booking-page">
        <div class="booking-container">
            <div class="booking-left-info">
               <div class="booking-content">
                    <h2>Make your reservation</h2>
				    <p>Comfort and Pleasure are our promises to you</p>
               </div>
            </div>

            <div class="booking-right-form">
                <form action="{{url('admin/booking')}}" enctype="multipart/form-data" method="post" class="booking-form">
                @csrf	    
                    <div class="booking-form-content">
                        <h1>Your Information</h1>
                        <div class="booking-input">
                            <div class="booking-form-field">
                                <p>Check-In Date:</p>
                                <input type="date" name="checkin_date" class="checkin-date" id="checkin_date">
                            </div>
                        
                            <div class="booking-form-field">
                                <p>Check-Out Date:</p>
                                <input type="date" name="checkout_date" id="checkout_date">
                            </div>
        
                            <div class="booking-form-field">
                                <p>Adults:</p>
                                <td><input name="total_adults" type="text" class="form-control" /></td>
                            </div>
                            <div class="booking-form-field">
                                <p>Children:</p>
                                
                                <td><input name="total_children" type="text" class="form-control" /></td>
                            </div>
                        </div>
                        <div class=" select-room">
                            <p>Available Rooms:</p>
                            <select class="room-list" name="room_id"></select>
                        </div>
                        
                        <p class="show-room-price-amount">Total Price:&nbsp;<span class="show-room-price"></span></p> 
                        @if(Session::has('data'))
                    	<input type="hidden" name="customer_id" value="{{session('data')[0]->id}}" />
                        @endif 
                        <input type="hidden" name="roomprice" class="room-price" value="" />
                        <input type="hidden" name="ref" value="front">
                        <input type="submit" class="booking-btn"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
               
<!--Jquery CDN-->
<script src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

     //Disable previous date
     var today = new Date();
     var dd = String(today.getDate()).padStart(2, '0');
     var mm = String(today.getMonth() + 1).padStart(2, '0');
     var yyyy = today.getFullYear();

     today = yyyy + '-' + mm + '-' + dd;

     $('#checkin_date').attr('min',today);

     var tomorrow = new Date();
     var tmrdd = String(tomorrow.getDate()+1).padStart(2, '0');
     var tmrmm = String(tomorrow.getMonth() + 1).padStart(2, '0');
     var tmryyyy = tomorrow.getFullYear();
     tomorrow = yyyy + '-' + mm + '-' + tmrdd; 
     $('#checkout_date').attr('min',tomorrow);



    //function of showing available rooms
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            // Ajax
            $.ajax({
                url:"{{url('admin/booking')}}/available-rooms/"+_checkindate,
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success:function(res){
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option data-price="'+row.room.price+'" value="'+row.room.id+'">'+row.roomtype.type+'-'+row.room.title+'</option>';
                    });
                    $(".room-list").html(_html);

                    var _selectedPrice=$(".room-list").find('option:selected').attr('data-price');
                    $(".room-price").val(_selectedPrice);
                    $(".show-room-price").text(_selectedPrice);
                }
            });
        });

        $(document).on("change",".room-list",function(){
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".room-price").val(_selectedPrice);
            $(".show-room-price").text(_selectedPrice);
        });

    });
    </script> 
@endsection('content')