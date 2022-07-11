@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bookings
        <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr><p style="font-weight: 800; font-size: 20px;">Customer Info</p>
               <th>FullName</th>
                <td>{{$data->customer->full_name}}</td>
             </tr>
             <tr>
                <th>Email</th>
                <td>{{$data->customer->email}}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{$data->customer->mobile}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$data->customer->address}}</td>
            </tr>
            </table>  

            <table class="table table-bordered">
            <tr><p style="font-weight: 800; font-size: 20px;">Booking Info</p>
            <tr>
                <th>Room Type</th>
                <td>{{$data->room->roomtype->type}}</td>
            </tr>
            <tr>   
                <th>Room Name</th>
                <td>{{$data->room->title}}</td>
             </tr>
            <tr>
                <th>Check In Date</th>
                <td>{{$data->checkin_date}}</td>
            </tr>
            <tr>
                <th>Check Out Date</th>
                <td>{{$data->checkout_date}}</td>
            </tr>
            <tr>
                <th>Total Aduilts</th>
                <td>{{$data->total_adults}}</td>
            </tr>
            <tr>
                <th>Total Children</th>
                <td>{{$data->total_children}}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$data->room->price}}</td>
            </tr>
            <tr>
                <th>Reference</th>
                <td>{{$data->ref}}</td>
            </tr>
            </table>  
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection