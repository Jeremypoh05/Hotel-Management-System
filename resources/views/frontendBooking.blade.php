@extends('frontendlayout')
@section('title','Booking')
@section('content')


<div class="booking-page">
    	<h3 class="mb-3">Room Booking</h3>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
        @endforeach
    @endif

    @if(Session::has('success'))
    <p class="text-success">{{session('success')}}</p>
    @endif
    <div class="booking-container">
		<div class="booking-container-info">           
				<h2 class="heading-info">Time Open</h2>
				<h3 class="heading-days">Monday-Friday</h3>
				<p>7am - 11am (breakfast)</p>
				<p>11am - 10pm (lunch/dinner)</p>

				<h3 class="heading-days">Saturday and sunday</h3>
				<p>9am - 1am (breakfast)</p>
				<p>1am - 10pm (lunch/dinner)</p>
				<hr>

				<h4 class="heading-phone">Call Us: (123) 45-45-456</h4>
		</div>

		<div class="booking-container-form">
				<form action="{{url('admin/booking')}}" enctype="multipart/form-data" method="post" class="booking-form">
				@csrf	
                    <div class="booking-form-field">
						<p>Check-In Date:</p>
						<input type="date" name="checkin_date" class="checkin-date">
					</div>

					<div class="booking-form-field">
						<p>Check-Out Date:</p>
						<input type="date" name="checkout_date">
					</div>

					<div class="booking-form-field">
						<p>Available Rooms:</p>
						<select class="room-list" name="room_id"></select>
					</div>
				
                

					<div class="booking-form-field">
						<p>Children:</p>
                        <td><input name="total_children" type="text" class="form-control" /></td>
					</div>

                    <div class="booking-form-field">
						<p>Adults:</p>
                        <td><input name="total_adults" type="text" class="form-control" /></td>
					</div>

					<div class="booking-form-field">
						<p class="show-room-price">Total Price: RM299</p>
					</div>
                    @if(Session::has('data'))
                    	<input type="hidden" name="customer_id" value="{{session('data')[0]->id}}" />
                    @endif
                    <input type="hidden" name="ref" value="front">
                    <input type="submit" class="booking-btn"/>
				</form>
		</div>
	</div>	
</div>

<script src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
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
                        _html+='<option data-price="'+'RM '+row.room.price+'" value="'+row.room.id+'">'+row.roomtype.type+'-'+row.room.title+'</option>';
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