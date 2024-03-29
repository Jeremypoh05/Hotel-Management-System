@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Booking
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
        <form enctype="multipart/form-data" method="post" action="{{url('admin/booking/'.$data->id)}}">
            @method('put')
            @csrf
            <table class="table table-bordered">
            <tr>
                <th>Select Customer <span class="text-danger">*</span></th>
                <td>
                   <select class="form-control" name="customer_id">
                       @foreach($customers as $c) <!--The "customers is the variable from function create(bookingcontroller)"-->
                       <option @if($data->customer_id==$c->id) selected @endif value="{{$c->id}}">{{$c->full_name}}</option>
                       <!-- the "customer_id" is the relationship that mentioned in booking model-->
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
                <input type="submit" class="btn btn-primary" />
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
@endsection

@endsection