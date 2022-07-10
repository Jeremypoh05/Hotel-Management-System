@extends('frontendlayout')
@section('title','Traders')
@section('content')
    <!--Landing Page-->
    <section class="home">
        <div class="media-icons">
          <a href="#"><i class="uil uil-facebook-f"></i></a>
          <a href="#"><i class="uil uil-instagram"></i></a>
          <a href="#"><i class="uil uil-twitter"></i></a>
        </div>

    <div class="swiper homepage-bg-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide landing-page-swiper-slide">
            <img src="images/home1.jpg" alt="">
            <div class="text-content">
              <h2 class="title">Autumn <span>Season</span></h2>
              <p>Autumn, also known as fall in North American English, is one of the four temperate
              seasons. Outside the tropics, autumn marks the transition from summer to winter,
              in September or March. Autumn is the season when the duration of daylight becomes
              noticeably shorter and the temperature cools considerably.</p>
              <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
            </div>
          </div>
          <div class="swiper-slide landing-page-swiper-slide dark-layer">
            <img src="images/home2.jpg" alt="">
            <div class="text-content">
              <h2 class="title">Winter <span>Season</span></h2>
              <p>Winter is the coldest season of the year in polar and temperate zones. It occurs
              between autumn and spring.The tilt of Earth's axis causes seasons; winter occurs
              when a hemisphere is oriented away from the Sun. Different cultures define different
              dates as the start of winter, and some use a definition based on weather.</p>
              <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
            </div>
          </div>
          <div class="swiper-slide landing-page-swiper-slide dark-layer">
            <img src="images/home3.jpg" alt="">
            <div class="text-content">
              <h2 class="title">Summer <span>Season</span></h2>
              <p>Summer is the hottest of the four temperate seasons, occurring after spring and
              before autumn. At or aroundthe summer solstice, the earliest sunrise and latest
              sunset occurs, daylight hours are longest and dark hours are shortest, with day
              length decreasing as the season progresses after the solstice.</p>
              <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
            </div>
          </div>
          <div class="swiper-slide landing-page-swiper-slide">
            <img src="images/home4.jpg" alt="">
            <div class="text-content">
              <h2 class="title">Spring <span>Season</span></h2>
              <p>Spring, also known as springtime, is one of the four temperate seasons, succeeding
              winter and preceding summer. There are various technical definitions of spring, but
              local usage of the term varies according to local climate, cultures and customs. When
              it is spring in the Northern Hemisphere, it is autumn in the Southern Hemisphere and
              vice versa.</p>
              <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="homepage-bg-slider-thumbs">
      <div class="swiper-wrapper thumbs-container">
        <img src="images/home1.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
        <img src="images/home2.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
        <img src="images/home3.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
        <img src="images/home4.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
      </div>
    </div>
  </section>

    <div class="lightBox-container">
        <div class="lightBox-gallery">
        @foreach($gallery as $g) 
            <a href="{{ asset('storage/gallery') }}/{{$g->image}}" data-lightbox= "models" data-title="{{$g->title}}">
                <img src="{{ asset('storage/gallery')}}/{{$g->image}}">
            </a>   
          @endforeach
        </div>
    </div>

    <!--This id will be use at the main js-->
    <div id="travel"></div>

<!--React Gallery Slider-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.1/umd/react.production.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.1/umd/react-dom.production.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/classnames/2.2.6/index.min.js"></script>

@endsection('content')
