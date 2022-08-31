@extends('layout')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <!-- Begin Page Content -->
 <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Booking
        <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
    @if($errors->any())
        @foreach($errors->all() as $error)
          <p class="text-danger">{{$error}}</p>
        @endforeach
    @endif

        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
        <form enctype="multipart/form-data" method="post" action="{{url('admin/booking')}}">
            @csrf
            <table class="table table-bordered">
            <tr>
                <th>Select Customer <span class="text-danger">*</span></th>
                <td>
                   <select class="form-control" name="customer_id">
                        <option>--- Select Customer ---</option>
                        @foreach($data as $customer)
                            <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>CheckIn Date <span class="text-danger">*</span></th>
                <td><input name="checkin_date" type="date" id="checkin_date" class="form-control checkin-date" /></td>
            </tr>
            <tr>
                <th>CheckOut Date <span class="text-danger">*</span></th>
                <td><input name="checkout_date" type="date" id="checkout_date" class="form-control" /></td>
            </tr>
            <tr>
                <th>Avaiable Rooms <span class="text-danger">*</span></th>
                <td>
                    <select class="form-control room-list" name="room_id"></select>
                   
                  </td>
            </tr>
            <tr>
                <th>Total Adults <span class="text-danger">*</span></th>
                <td><input name="total_adults" type="text" class="form-control" /></td>
            </tr>
            <tr>
                <th>Total Children</th>
                <td><input name="total_children" type="text" class="form-control" /></td>
             </tr>                         
            <tr>
                <tr>
                <th> Price:</th>
                <td><p> <span class="show-room-price"></span></p></td>
                </tr>
                <td colspan="2">
                <input type="hidden" name="roomprice" class="room-price" value="" />
                <input type="hidden" name="stayduration2" value=""/>
                <script>
                      $(document).ready(function(){
                        $('#bookingpay2').click(function(){
                            const date1 = document.getElementById("checkin_date").valueAsDate;
                            const date2 = document.getElementById("checkout_date").valueAsDate;
                            const diffTime = Math.abs(date2 - date1);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            document.querySelector('input[name="stayduration2"]').value = diffDays;
                        });
                    });
                </script>
                <input type="submit" id="bookingpay2" class="btn btn-primary"/>
                </td> 
            </tr>
            </table>  
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@section('scripts')
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
                    var _html='<option selected="true" disabled="disabled">--- Select A Room Type ---</option>';
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
            const date1 = document.getElementById("checkin_date").valueAsDate;
            const date2 = document.getElementById("checkout_date").valueAsDate;
            const diffTime = Math.abs(date2 - date1);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".room-price").val(_selectedPrice);
            $(".show-room-price").text((_selectedPrice * diffDays));
        });
       
    });
</script>
@endsection

@endsection