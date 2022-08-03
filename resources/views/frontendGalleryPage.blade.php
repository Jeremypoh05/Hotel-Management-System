@extends('frontendlayout')
@section('title','Traders')
@section('content') 
 
<!---------------- Gallery Section (Landing Page) ---------------->
<section class="gallery-page-bg">
    <div class="gallery-bg-content flex-center">
       <h1>Gallery</h1>
       <div class = "line">
           <div></div>
           <div></div>
           <div></div>
       </div>
       <p>We captured our sweet moment in our gallery</p>
    </div>
</section>

 <!--Lightbox Gallery-->
 <div class="lightBox-container">
        <div class="lightBox-gallery">
        @foreach($gallery as $g) 
            <a href="{{ asset('storage/gallery') }}/{{$g->image}}" data-lightbox= "models" data-title="{{$g->title}}">
                <img src="{{ asset('storage/gallery')}}/{{$g->image}}">
            </a>   
          @endforeach
        </div>
</div>

@endsection('content')