@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Gallery 
        <a href="{{url('admin/gallery')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
        <form enctype="multipart/form-data" method="post" action="{{url('admin/gallery/'.$data->id)}}">
            @csrf
            @method('put')
            <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <td><input value="{{$data->title}}" name="title" type="text" class="form-control" /></td>
            </tr>
            <tr>
            <tr>
                <th>Photo.</th>
                <td><input name="image" type="file"/>
                <input type="hidden" name="prev_photo" value="{{$data->image}}" />
                <img width="100" src=" {{ asset('storage/gallery') }}/{{$data->image}}" />
                </td>
            </tr>
            <tr>
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



@endsection