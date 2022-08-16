@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Show Rooms
        <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th>Room Type</th>
                <td>{{$data->roomtype->type}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$data->title}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$data->description}}</td>
            </tr>
            <tr>
                <th>Bed</th>
                <td>{{$data->bed}}</td>
            </tr>
            <tr>
                <th>Bedroom</th>
                <td>{{$data->bedroom}}</td>
            </tr>
            <tr>
                <th>Amenities</th>
                <td class="amenities" style="width:600px">
                    @php
                        $amenities = json_decode($data->amenities)
                    @endphp
                    @foreach($amenities as $a)
                    <ul style="display:inline-block">
                        <li>{{$a}}</li>
                    </ul>        
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{$data->price}}</td>
            </tr>
            <tr>
                <th>Gallery Images</th>
                <td>
                    <table class="table table-bordered mt-3">
                        <tr>
                            @foreach($data->roomimgs as $img)
                            <td class="imgcol{{$img->id}}">
                                <img width="150" height="100" src="{{asset('storage/room/'.$img->img_src)}}" />
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </td>
            </tr>
            </table>  
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection