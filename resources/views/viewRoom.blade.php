@extends('frontendlayout')
@section('title','Traders')
@section('content')

<link rel="stylesheet" href="/css/style.css">

<!-----------------------------  Room Section -------------------------->
<body>
<div class="section room-section">
        <div class="room-slider-container">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
            class="swiper main-room-swiper">
            <div class="swiper-wrapper">
            @foreach($roomDetail->roomimgs as $img)
            <div class="swiper-slide room-slide">     
                <img class="hide" src="{{asset('storage/room/'.$img->img_src)}}"  />        
              </div>
              @endforeach
            </div>
      
            <div class="swiper-button-next room-next-btn"></div>
            <div class="swiper-button-prev room-prev-btn"></div>
            
            </div>
      
            <div thumbsSlider="" class="swiper thumbnail-room-swiper">
                <div class="swiper-wrapper">
                @foreach($roomDetail->roomimgs as $img)
                 <div class="swiper-slide room-slide">
                    <img src="{{asset('storage/room/'.$img->img_src)}}"  />
                </div>
                @endforeach
                </div>

            </div>
        </div>
    <h1>SBDNASND</h1>
</div>

    <!----------------x------------- End of Room Section ------------x-------------->
<!--Swiper JS library-->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    var thumbnailRoom = new Swiper(".thumbnail-room-swiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var mainRoom = new Swiper(".main-room-swiper", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".room-next-btn",
        prevEl: ".room-prev-btn",
      },
      thumbs: {
        swiper: thumbnailRoom,
      },
    });
  </script>
</body>
</html>