@extends('layout')
@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Staff
        <a href="{{url('admin/staff')}}" class="float-right btn btn-success btn-sm">View All</a>
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
        <form enctype="multipart/form-data" method="post" action="{{url('admin/staff')}}">
            @csrf
            <table class="table table-bordered">
            <tr>
                <th>Full Name</th>
                <td><input name="full_name" type="text" class="form-control" /></td>
            </tr>

            <tr>
                <th>Select Department</th>
                <td>
                    <select name="department_id" class="form-control">
                        <option value="0">---- Select ----</option>
                        @foreach($departs as $dp) <!--The departs is the function from create(staff controller)-->
                        <option value="{{$dp->id}}">{{$dp->title}}</option> 
                        <!--Make sure the rt_id match with 
                        the request function "store" in roomController-->
                        @endforeach
                    </select>
                </td>
            </tr>
        
            <tr>
               <th>Photo</th>
               <td><input name="photo" type="file" /></td>
            </tr>
            <tr>
                <th>Bio</th>
                <td><textarea class="form-control" name="bio"></textarea></td>
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