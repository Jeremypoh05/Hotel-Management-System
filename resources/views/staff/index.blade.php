@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Staff
        <a href="{{url('admin/staff/create')}}" class="float-right btn btn-success btn-sm">Add New</a>
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
                        <th>Full Name</th>
                        <th>Photo</th>
                        <th>Department</th>
                        <th>bio</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @if($data)
                    @foreach($data as $d)
                    <tr>
                        <td>{{$d->id}}</td> <!--The id match from the database column-->
                        <td>{{$d->full_name}}</td>
                        <td><img width="150" height="150" src="{{asset('storage/staff/'.$d->photo)}}"></td>
                        <td>{{$d->department->title}}</td> <!--the "department" is the function from the model -staff which shows the relationship between staff and department-->
                        <td>{{$d->bio}}</td>
                        <td>
                            <a href="{{url('admin/staff/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Do you sure want to delete this data?')" href="{{url('admin/staff/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/chart/datatables.js"></script>

@endsection

@endsection