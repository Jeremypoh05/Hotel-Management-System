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

<section class="section gallary" id="gallary">
    <div class="owl-carousel owl-theme carousel-item">
      <div class="item">
        <img src="images/gallery/Exterior/img1.png" class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img2.png" class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img3.png" class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img4.png" class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img5.png" class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img6.png"class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img7.png" class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
      <div class="item">
        <img src="images/gallery/Exterior/img8.png"class="zoom" alt="">
        <div class="overlay">
        </div>
      </div>
    </div>
  </section>

 <!--Lightbox Gallery-->
 <div class="section lightBox-container">
   <div class="lightBox-gallery">
        @foreach($gallery as $g) 
        <div class="gallery-img-wrapper">
         <a href="{{ asset('storage/gallery') }}/{{$g->image}}" data-lightbox= "models" data-title="{{$g->title}}">
             <img class="blur"src="{{ asset('storage/gallery')}}/{{$g->image}}">
             <div class="gallery-img-content fade">
                <h1>{{$g->title}}</h1>
            </div>  
         </a>   
         </div>  
        @endforeach
   </div>
</div>

<div class="section lightBox-container">
<div class="section lightBox-container">


<script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      autoplay: true,
      slideTransition: 'linear',
      autoplayTimeout: 4000,
      autoplaySpeed: 4000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>
@endsection('content')