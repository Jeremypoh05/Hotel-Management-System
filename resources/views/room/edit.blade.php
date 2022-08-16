@extends('layout')
@section('content')

<style>
 .amenities{
   display:grid;
   /*grid-template-columns: repeat(auto-fill,minmax(150px,1fr));*/ 
   grid-template-columns: repeat(4,minmax(50px,1fr));
   align-items:center;
   font-size:16px;
}

</style>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Room 
        <a href="{{url('admin/rooms')}}" class="float-right btn btn-success btn-sm">View All</a>
        </h6>
    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif

        @php
            $amenities = json_decode($data->amenities);
        @endphp

        <div class="table-responsive">
        <form enctype="multipart/form-data" method="post" action="{{url('admin/rooms/'.$data->id)}}">
            @csrf
            @method('put')
            <table class="table table-bordered">
            <tr>
                <th>Select Room Type</th>
                <td>
                    <select name="rt_id" class="form-control">
                        <option value="0">---- Select ----</option>
                        @foreach($roomtypes as $rt)
                        <option @if($data->room_type_id==$rt->id) selected @endif value="{{$rt->id}}">{{$rt->type}}</option>
                        <!--Make sure the rt_id match with 
                        the request of function "store" in roomController-->
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <th>Title</th>
                <td><input value="{{$data->title}}" name="title" type="text" class="form-control" /></td>
            </tr>
            <tr>
            <tr>
                <th>Description</th>
                <td><textarea name="description" class="form-control">{{$data->description}}</textarea></td>
            </tr>
            <tr>
                <th>Bed</th>
                <td><input value="{{$data->bed}}"name="bed" type="text" class="form-control" /></td>
            </tr>
            <tr>
                <th>Bedrooms</th>
                <td><input value="{{$data->bedroom}}" name="bedroom" type="number" class="form-control" /></td>
            </tr>
                <th>Amenities</th>
                   <td class="amenities">
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="AirConditioning"{{ in_array('AirConditioning',$amenities)? 'checked':'' }}>Air conditioning
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="WardrobeCloset"{{ in_array('WardrobeCloset',$amenities)? 'checked':'' }}>Wardrobe or closet
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Minibar" {{ in_array('Minibar',$amenities)? 'checked':'' }}>Minibar
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Balcony"{{ in_array('Balcony',$amenities)? 'checked':'' }}>Balcony
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="HairDryer" {{ in_array('HairDryer',$amenities)? 'checked':'' }}>Hair Dryer
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Sofa" {{ in_array('Sofa',$amenities)? 'checked':'' }}>Sofa
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="ClothesRack" {{ in_array('ClothesRack',$amenities)? 'checked':'' }}>Clothes rack
                       <input type="checkbox" class="amenities_checkbox "name="amenities[]" value="Desk" {{ in_array('Desk',$amenities)? 'checked':'' }}>Desk
                    </td>
            </tr>
            <tr>
                <th>Price</th>
                <td><input value="{{$data->price}}" name="price" type="text" class="form-control" /></td>
            </tr>
            <tr>
                <th>Gallery Images</th>
                <td>
                    <table class="table table-bordered mt-3">
                        <tr>
                            <input type="file" multiple name="roomimgs[]" /> 
                            @foreach($data->roomimgs as $img) <!--The roomimgs is the function from the model(room) which shows their relationship-->
                            <td class="imgcol{{$img->id}}">
                                <img width="150" height="100" src="{{asset('storage/room/'.$img->img_src)}}" />
                                <p class="mt-2">
                                    <button type="button" onclick="return confirm('Are you sure you want to delete this image??')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}"><i class="fa fa-trash"></i></button>
                                </p>
                            </td>
                            @endforeach
                        </tr>
                    </table>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete-image").on('click',function(){
            var _img_id=$(this).attr('data-image-id');
            var _vm=$(this);
            $.ajax({
                url:"{{url('admin/roomimage/delete')}}/"+_img_id,
                dataType:'json',
                beforeSend:function(){
                    _vm.addClass('disabled');
                },
                success:function(res){
                    if(res.bool==true){
                        $(".imgcol"+_img_id).remove();
                    }
                    _vm.removeClass('disabled');
                }
            });
        });
    });
</script>
@endsection

@endsection