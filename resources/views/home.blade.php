@extends('frontendlayout')
@section('title','Traders')
@section('content')

     <!--==================== Landing Page ====================-->
     <section class="home">
       <div class="swiper homepage-bg-slider">
           <div class="swiper-wrapper">
             <div class="swiper-slide landing-page-swiper-slide">
               <img style="filter: brightness(70%); "src="images/bg4.jpg" alt="">
               <div class="text-content">
                 <h2 class="title">Traders Hotel</h2>
                 <p>A Welcome Retreat in the Heart of the City. Traders, Always Your Choice!</p>
               </div>
             </div>
             <div class="swiper-slide landing-page-swiper-slide dark-layer">
               <img style="filter: brightness(70%);" src="images/bg11.jpg" alt="">
               <div class="text-content">
                 <h2 class="title">Kuala Lumpur</h2>
                 <p> A Modern and Exotic Capital City of Malaysia Waiting For You to Explore.</p>
               </div>
             </div>
             <div class="swiper-slide landing-page-swiper-slide dark-layer">
               <img style="filter: brightness(70%);"src="images/bg7.jpg" alt="">
               <div class="text-content">
                 <h2 class="title">Stunning View</h2>
                 <p>Every room at our hotel offers not just a high level of comfort,but also <br>an amazing city view.</p>
               </div>
             </div>
             <div class="swiper-slide landing-page-swiper-slide">
               <img style="filter: brightness(70%);"src="images/bg5.jpg" alt="">
               <div class="text-content">
                 <h2 class="title">Best Dishes</h2>
                 <p>At our restaurant, we offer a variety of dishes inspired by world <br>cuisines and cooked by real professionals.</p>
               </div>
             </div>
           </div>
         </div>
   
       <div class="prev-next-arrow">
           <div class="swiper-button-next landing-page-next"></div>
           <div class="swiper-button-prev landing-page-prev"></div>
       </div>
   
       <div class="homepage-bg-slider-thumbs">
         <div class="swiper-wrapper thumbs-container">
           <img src="images/bg4.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
           <img src="images/bg11.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
           <img src="images/bg7.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
           <img src="images/bg5.jpg" class="swiper-slide landing-page-swiper-slide" alt="">
         </div>
       </div>
    </section>
   
    <!--==================== About Us ====================-->
    <section class="section home-about">
      <div class="heading flex-center">
          <h1>WELCOME</h1>
          <h2>Traders Hotel</h2>
      </div>
        <div class="about-container flex-center">
          <div class="left"></div>
          <div class="right">
            <div class="content">
              <h1>About<span> Us</span></h1>
              <p>Traders Hotel Kuala Lumpur by Shangri-La is located in the heart of Kuala Lumpur City Centre (KLCC) 
                and offers the panoramic view of the Petronas Twin Towers, KLCC Park and the city's skyline.</p>
              <a href="#" class="btn">Read More</a>
            </div>
          </div>
        </div>
      </section>

     <!--==================== VIDEO ====================-->
     <section class="video">
       <h2 class="video-title">Video Tour</h2>
   
       <div class="video-container container">
           <p class="video-description">Find out more with our video of the most beautiful and 
               pleasant places for you and your family.
           </p>
   
           <div class="video__content">
               <video id="video-file">
                   <source src="video/description.mp4" type="video/mp4">
               </video>
   
               <button class="button button--flex video__button" id="video-button">
                   <i class="ri-play-line video__button-icon" id="video-icon"></i>
               </button>
           </div>
       </div>
      </section>

      <!--==================== ROOMS ====================-->
      <section class="section home-rooms">
      <div class="container">
      <div class="heading flex-center">
          <h1>EXPLORE</h1>
          <h2>Our Rooms</h2>
      </div>
      <div class="room-container swiper">
         <div class="swiper-wrapper"> 
          @foreach($room as $r)   
              <article class="popular-room-card swiper-slide"> 
                 @foreach($r->roomimgs as $index => $img) 
                 <div class="images">
                   @if($index > 0)
                    <img class="zoom" style="display:none;" src="{{asset('storage/room/'.$img->img_src)}}" alt="" >
                    @else
                    <img class="zoom" src="{{asset('storage/room/'.$img->img_src)}}" alt="" >
                    @endif
                  </div>
                  @endforeach
                  <div class="popular-room-data">
                    <div class="popular-room-data-price">
                       <h3 class="popular-room-title">
                       {{$r->roomtype->type}}<span>-<span>{{$r->title}}
                       </h3>
                       <h2 class="popular-room-price">
                          <span>RM&nbsp;</span> {{$r->price}}
                       </h2>
                    </div>
                       <p class="pouplar-room-description">
                       The Malaysian Suite features a luxurious living room, a formal dining space, a separate work
                        area and a breath-taking panoramic view of the city. The furnishings and artwork have been
                       </p>
                       <div class="popular-room-readMore">
                          <a href="{{url('viewRoom/'.Str::slug($r->title).'/'.$r->id)}}">Read More</a>
                          <i class="fas fa-angle-right"></i>
                      </div>
              </article>
            @endforeach    
      
          </div>
         <!-- Add Pagination -->
      
         <!-- Add Navigation 
         <div class="swiper-pagination room-pagination"></div>-->

         <div class="swiper-room-btn">
               <div class="swiper-button-next room-next"> <!--original class by js-->
                   <i class='bx bx-chevron-right' ></i>                        
               </div>
               <div class="swiper-button-prev room-previous">
                   <i class='bx bx-chevron-left'></i>   
              </div>
          </div>
        </div>
      </section>
      
      <!--==================== Popular Places ====================-->
      <section class="section home-popular-places">
      <div class="heading flex-center">
          <h1>Around Traders</h1>
          <h2>Popular Places</h2>
      </div>
        <div class="popular-places-container">
           <div class="places-box">
              <div class="places">
                <div class="popular-img-wrapper">
                  <img class="zoom" src="images/PopularPlaces/img1.jpg" id="img1">
                  <div class="popular-places-content slide-left">
                    <h1>Petronas Twin Towers</h1>
                    <p>KLCC</p>
                  </div>
                </div>
                <div style="height:500px" class="popular-img-wrapper img2">
                  <img class="zoom"src="images/PopularPlaces/img2.png" id="img2">
                  <div class="popular-places-content slide-left">
                    <h1>Pavilion Kuala Lumpur</h1>
                    <p>Upmarket shopping mall in Bukit Bintang</p>
                  </div>
                </div>
                <div class="popular-img-wrapper">
                  <img class="zoom" src="images/PopularPlaces/img3.png" id="img3">
                  <div class="popular-places-content slide-left">
                    <h1>Batu Caves</h1>
                    <p>Gombak</p>
                  </div>                
                </div>
                <div style="height:450px"class="popular-img-wrapper img4">
                  <img class="zoom" src="images/PopularPlaces/img4.png" id="img4">
                  <div class="popular-places-content slide-left">
                       <h1>Aquaria KLCC</h1>
                       <p>Kuala Lumpur Convention Centre</p>
                  </div>                
                </div>
                <div class="popular-img-wrapper">
                <img class="zoom"src="images/PopularPlaces/img5.png" id="img5">
                    <div class="popular-places-content slide-left">
                      <h1>Kuala Lumpur Butterfly Park</h1>
                      <p> Perdana Botanical Garden</p>
                    </div>      
                  </div>      
              </div>
        
              <div class="places">
                  <div class="popular-img-wrapper">
                    <img class="zoom"src="images/PopularPlaces/img6.png" id="img6">
                    <div class="popular-places-content slide-up">
                      <h1>Menara Kuala Lumpur</h1>
                      <p>Jalan P Ramlee</p>
                  </div>                  
                </div>
                  <div class="popular-img-wrapper">
                    <img class="zoom"src="images/PopularPlaces/img7.png" id="img7">
                  <div class="popular-places-content slide-up">
                      <h1>Sunway Lagoon</h1>
                      <p>Petaling Jaya</p>
                  </div>                     
                </div>
                  <div class="popular-img-wrapper img8">
                  <img class="zoom"src="images/PopularPlaces/img8.png" id="img8" style="min-height:450px">
                     <div class="popular-places-content fade">
                       <h1>Perdana Botanical Garden</h1>
                        <p>Heritage Park Kuala Lumpur</p>
                     </div>  
                  </div>
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img9.png" id="img9">
                     <div class="popular-places-content slide-down">
                        <h1>Masjid Sultan Haji Ahmad Shah</h1>
                        <p>International Islamic University of Malaysia</p>
                     </div>  
                  </div>
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img10.png" id="img10">
                     <div class="popular-places-content slide-down">
                       <h1>Thean Hou Temple</h1>
                       <p>Taman Persiaran Desa</p>
                     </div>  
                  </div>
                </div>
              
                <div class="places">
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img11.png" id="img11">
                      <div class="popular-places-content slide-right">
                        <h1>Sultan Abdul Samad Building</h1>
                        <p>Merdeka Square</p>
                      </div>  
                  </div>
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img12.png" id="img12">
                      <div class="popular-places-content slide-right">
                        <h1>The River of Life</h1>
                        <p>Masjid Jamek Sultan Abdul Samad</p>
                      </div>  
                  </div>
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img13.png" id="img13">
                      <div class="popular-places-content slide-right">
                        <h1>Forest Eco Park</h1>
                        <p>Bukit Nanas Forest Reserve</p>
                      </div>  
                  </div>
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img14.png" id="img14">
                      <div class="popular-places-content slide-right">
                        <h1>National Zoo of Malaysia</h1>
                        <p>Gombak District</p>
                      </div>  
                  </div>
                  <div class="popular-img-wrapper">
                  <img class="zoom"src="images/PopularPlaces/img15.png" id="img15">
                      <div class="popular-places-content slide-right">
                        <h1>Muzium Negara</h1>
                        <p>Southern tip of Lake Garden</p>
                      </div>  
                  </div>
                </div>
            </div>
        </section>

        <!--==================== Popular Places ====================-->
        <section class="section home-service">
          <div class="heading flex-center">
            <h1>Services</h1>
            <h2>Amenities</h2>
          </div>
           <div class="wrapper">
             <div class="center-line"></div>
             <div class="row row-1">
               <section>
                 <i class="icon fa-solid fa-wifi"></i>
                 <div class="details">
                   <span class="title">High-Speed Wi-Fi</span>
                 </div>
                 <p>We provide our guests with free high-speed Wi-Fi connection throughout the whole hotel area.</p>
               </section>
             </div>
             <div class="row row-2">
               <section>
                 <i class="icon fa-solid fa-spa"></i>
                 <div class="details">
                   <span class="title">Spa</span>
                 </div>
                 <p>The spa and wellness facilities include a sauna and treatment rooms. All massages, manicures/pedicures and facials are free</p>            
               </section>
             </div>
             <div class="row row-1">
               <section>
                 <i class="icon fa-solid fa-person-swimming"></i>
                 <div class="details">
                   <span class="title">Swimming Pool</span>
                 </div>
                 <p>One of the main attractions at the hotel is our extensive, luxurious 100-metres indoor swimming pool.</p>
               </section>
             </div>
             <div class="row row-2">
               <section>
                 <i class="icon fa-solid fa-gear"></i>
                 <div class="details">
                   <span class="title">Room Service</span>
                 </div>
                 <p>Room Service is 24 hours available. You can order the breakfast menu from 6.30 am until 11.00 am or other delights from the Restaurant Menu until 23.00.</p>
               </section>
             </div>
             <div class="row row-1">
               <section>
                 <i class="icon fa-solid fa-dumbbell"></i>
                 <div class="details">
                   <span class="title">Fully Equipped Fitness Room</span>
                 </div>
                 <p>Provide plenty amount of gym equipped for guests to continue your workout routines while traveling.</p>
               </section>
             </div>
             <div class="row row-2">
               <section>
                 <i class="icon fa-solid fa-square-parking"></i>
                 <div class="details">
                   <span class="title">On Site Free Parking</span>
                 </div>
                 <p>No Worry About Your Transportation! We provide one slot of free parking for our guests. It will be convenient, especially in our city</p>
               </section>
             </div>

             <div class="row row-1">
               <section>
                 <i class="icon fa-solid fa-champagne-glasses"></i>
                 <div class="details">
                   <span class="title">Champagne Bar</span>
                 </div>
                 <p>An abundance of champagne will give your hotel a lavish and glamorous atmosphere. We will roll out a cart of choice champagne to give you some added splendor during your stay.</p>
               </section>
             </div>

             <div class="row row-2">
               <section>
                 <i class="icon fa-solid fa-shirt"></i>
                 <div class="details">
                   <span class="title">Laundry Services</span>
                 </div>
                 <p>Support to refresh your wardrobes mid-trip. Folding services as well, including the delivery of freshly-folded clothes back to your rooms.</p>
               </section>
             </div>
           </div>
        </section>

         <!-- newsletter section -->
         <section class = "section home-newsletter">
         <div class = "newsletter-container">
             <div class = "newsletter-wrapper">
                 <h2>Subscribe to our Newsletter</h2>
                 <p class = "normal-para">Subscribe to receive email updates on new events announcement, speical promotions, gift ideas and more!</p>
                 <form action="" method="" class = "subscribe-form">                         
                    <div class="email-box">
                       <i class="fas fa-envelope"></i>
                       <input class="box" type="text" name="userEmail" value="" placeholder="Enter your email">
                       <input class="sub-btn" name="subscribe" type="submit" value = "Subscribe">
                    </div>

                    <div class="error-msg animated tada">
                      <span></span>
                    </div>
                 </form>
             </div>
         </div>
        </section>
     <!-- end of newsletter section -->
          
   
  
  <div class="lightBox-container">
      <div class="lightBox-gallery">
      @if($room)
      @foreach($room as $r)   
          <h1>Price: {{$r->price}}</h1>
          <a href="{{url('viewRoom/'.Str::slug($r->title).'/'.$r->id)}}">Read More
        </a>   
        @endforeach
        @endif
      </div>
  </div>


  <div class="section testimonial">
    <div class="slide-container swiper"> 
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">

                @foreach($testimonials as $testi)
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="{{ asset('images/') }}/{{$testi->customer->photo}}" alt="" class="card-img">
                            </div>
                        </div>
                       
                        <div class="card-content">
                            <h2 class="name">{{$testi->customer->full_name}}</h2>
                            <p class="description">{{$testi->testi_content}}</p>
                            <button class="button">View More</button>
                        </div>
                      </div>   
                      @endforeach                
                    </div>
                  </div>
            <!-- Add Pagination -->             
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
          </div>
      </div>

    <!--This id will be use at the main js-->
    <div id="travel"></div>

<!--React Gallery Slider-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.1/umd/react.production.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.1/umd/react-dom.production.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/classnames/2.2.6/index.min.js"></script>


<!--Swiper JS library-->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
/*=============== SWIPER ROOM ===============*/
var roomSwiper = new Swiper(".room-container", {
  effect: 'coverflow',
  spaceBetween: 150, 
  centeredSlides: true,
  slidesPerView: 'auto',
  grabCursor: 'true',
  loop: true,
  coverflowEffect: {
      rotate: 0,
      slideShadows: false,
    },
   pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: ".room-next",
      prevEl: ".room-previous",
    },
  });


/*=============== SWIPER TESTIMONIAL ===============*/
var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    spaceBetween: 25,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        },
        950: {
            slidesPerView: 3,
        },
    },
  });
  </script>
@endsection('content')
