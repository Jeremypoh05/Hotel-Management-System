@extends('layout')
@section('content')


<style>
    .amenities{
      display:grid;
      /*grid-template-columns: repeat(auto-fill,minmax(150px,1fr));*/ 
      grid-template-columns: repeat(4,minmax(150px,1fr));
      align-items:center;
      font-size:14px;
    }
</style>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Room 
        <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
    @if($errors->any())
        <ul>
          @foreach($errors->all() as $error)
            <li class="text-danger">{{$error}}</li>
          @endforeach
        </ul>
    @endif
    
        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
        <div class="table-responsive">
        <form enctype="multipart/form-data" method="post" action="{{url('admin/rooms')}}">
            @csrf
            <table class="table table-bordered">
            <tr>
                <th>Select Room Type</th>
                <td>
                    <select name="rt_id" class="form-control">
                        <option value="0">---- Select ----</option>
                        @foreach($roomtypes as $rt)
                        <option value="{{$rt->id}}">{{$rt->type}}</option> 
                        <!--Make sure the rt_id match with 
                        the request of function "store" in roomController-->
                        @endforeach
                    </select>
                </td>
            </tr>
            
            <tr>
                <th>Title</th>
                <td><input name="title" type="text" class="form-control" /></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><textarea name="description" class="form-control"></textarea></td>
            </tr>
            <tr>
                <th>Bed</th>
                <td><input name="bed" type="text" class="form-control" /></td>
            </tr>
            <tr>
                <th>Bedrooms</th>
                <td><input name="bedroom" type="number" class="form-control" /></td>
            </tr>
            <tr>
                <th>Amenities</th>
                   <td class="amenities">
                       <input type="checkbox" name="amenities[]" value="AirConditioning">Air conditioning
                       <input type="checkbox" name="amenities[]" value="WardrobeCloset">Wardrobe or closet
                       <input type="checkbox" name="amenities[]" value="Minibar">Minibar
                       <input type="checkbox" name="amenities[]" value="Balcony">Balcony
                       <input type="checkbox" name="amenities[]" value="HairDryer">Hair Dryer
                       <input type="checkbox" name="amenities[]" value="Sofa">Sofa
                       <input type="checkbox" name="amenities[]" value="ClothesRack">Clothes rack
                       <input type="checkbox" name="amenities[]" value="Desk">Desk
                    </td>
            </tr>
            <tr>
                <th>Price</th>
                <td><input name="price"class="form-control" /></td>
            </tr>
            <tr>
                <th>Gallery</th>
                <td><input type="file" multiple name="roomimgs[]" /></td>
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