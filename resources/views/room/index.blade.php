@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rooms
        <a href="{{url('admin/rooms/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
        </h6>
    </div>
    <div class="card-body">
    @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Room Type</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Room Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot> 
                    <tr>
                        <th>#</th>
                        <th>Room Type</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Room Images</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @if($data)
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td> <!--The id match from the database column-->
                        <td>{{$d->roomtype->type}} <!--the "roomtype" is the function from the model -room which shows the relationship between room and roomtype(Room belongs to RoomType)-->
                        <td>{{$d->title}}</td> <!--The title match from the database column-->
                        <th>{{$d->price}}</th>
                        <td>{{count($d->roomimgs)}}</td> <!--The "roomimgs is the function from model(room)"-->
                        <td>
                            <a href="/admin/rooms/{{ $d->id }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{url('admin/rooms/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Do you sure want to delete this data?')" href="{{url('admin/rooms/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>   
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@section('scripts') <!--Call the jqeury plugin first from layout.blade.php-->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/chart/datatables.js"></script>

@endsection

@endsection