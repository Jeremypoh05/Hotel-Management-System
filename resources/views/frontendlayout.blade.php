<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="/image/png" sizes="25x25" href="/images/logo2.png">
    <!-- REMIXICONS -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Swiper.js styles -->
    <link rel="stylesheet" href="/css/swiper-bundle.min.css"/>
    <!-- Unicons for login register -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--  Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- ===== Fontawesome CDN ====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <!-- Light Box Library CSS -->
    <link rel="stylesheet" href="/css/lightbox.css">
    <!-- Custom styles -->
    <!-- Carousel CSS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <!-- Carousel JS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

    <link rel="stylesheet" href="/css/loginRegister.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- ---------------------------  Header(Navigation) --------------------------------------------- -->
    <section class="head">
    <div class="container flex">
      <div class="scoial">
        <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
        <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
      </div>
      <div class="logo">
        <h1 class="brand-title">TRADERS</h1>
      </div>
      <div class="head-address">
        <i class="fas fa-map-marker-alt"></i>
        <span>Kuala Lumpur City Centre, 50088 KL.</span>
      </div>
    </div>
  </section>

  <hr class="container">
  <header class="header">
    <div class="container">
      <nav class="navbar flex">
        <div class="sticky_logo">
          <a href="{{url('home')}}"><img src="/images/logo.png" alt=""></a>
        </div>

        <div class="menu-items">
        <ul class="nav-menu">
          <li> <a class="menu-link" href="{{url('home')}}">Home</a> </li>
          <li> <a class="menu-link" href="{{route('roomPage')}}">Room</a> </li>
          <li> <a class="menu-link" href="{{route('galleryPage')}}">gallery</a> </li>
          <li> <a class="menu-link" href="{{route('aboutPage')}}">about</a> </li>
          <li> <a class="menu-link" href="{{route('contactPage')}}">contact</a> </li>
          @if(Session::has('customerlogin'))
          <li> <a class="menu-link" href="{{url('customer/logout')}}">Logout</a> </li>
          @else
          <li> <a class="menu-link" href="{{url('customer/login')}}">Sign In</a> </li>
          @endif
          <div class="home-booking-btn">
               @if(Session::has('customerlogin'))
               <a class="menu-link" href="{{url('booking')}}">
                   Booking
               </a>
               @else
               <a class="menu-link" href="{{url('customer/login')}}">
                   Booking
               </a>
               @endif
           </div>
        </ul>

        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>

        <div class="head_contact">
          <i class="fas fa-phone-volume"></i>
          <span>+6011 7787888</span>
        </div>
      </nav>
    </div>
  </header>
    
    <!-- ------------x---------------  Header(Navigation) --------------------------x------------------- -->
      
   	<!--Content -->
	@yield('content')

    <!-- --------------------------- Footer ---------------------------------------- -->
    <footer class="footer">
      <div class="footer-container">
          <div class="footer-wrapper">
            <div class="footer-content">
              <div class="footer-about">
                <h1>About Us</h1>
                <p>Traders Hotel Kuala Lumpur by Shangri-La is located in the heart of Kuala Lumpur City Centre (KLCC) and offers the panoramic view of the Petronas Twin Towers, KLCC Park and the city's skyline. 
                   We offers direct access to such known Kuala Lumpur attractions as Suria KLCC, the Petronas Twin Towers and top business, shopping and entertainment venues.</p>
                   <p class="footer-read-more"><a href="{{route('aboutPage')}}">Read More<i class="fa-solid fa-arrow-right"></i></a></p>  
              </div>
            </div>
            <div class="footer-content">
              <div class="footer-links">
                <h1>Links</h1>
                  <ul>
                      <li><a href="{{url('home')}}">Home</a></li>
                      @if(Session::has('customerlogin'))
                      <li><a href="{{url('booking')}}">Booking</a></li>
                      @else
                      <li><a href="{{url('customer/login')}}">Booking</a></li>
                      @endif
                      <li><a href="{{route('roomPage')}}">Room</a></li>
                      <li><a href="{{route('galleryPage')}}">Gallery</a> </li>
                      <li><a href="{{route('aboutPage')}}">About Us</a></li>
                      <li><a href="{{route('contactPage')}}">Contact</a></li>
                  </ul>
              </div>
            </div>
            <div class="footer-content">
              <div class="footer-contact">
                <h1>Contact Us</h1>
                 <div class="footer-contact-content">
                    <i class="fa-solid fa-location-arrow"></i>
                    <p>Kuala Lumpur City Centre, 50088 KL.</p>
                 </div>
                 <div class="footer-contact-content">
                    <i class="fa-solid fa-envelope"></i>                
                    <p>Tradersforyou1@gmail.com</p>
                 </div>
                 <div class="footer-contact-content">
                    <i class="fa-solid fa-phone"></i> 
                    <p>+6011 7787888</p>
                 </div>
              </div>
              <div class="footer-social">
                <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/home"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>

          <hr class="footer-hr-line">
          <p class="copy-right">© Traders Hotel 2022. All Right Reserved.</h1>
        </div>
    </footer>

    <!-- --------------x------------- Footer ------------------x---------------------- -->
   
    <!----------- SCROLL UP ---------->
   <a href="#" class="scrollup" id="scroll-up">
      <i class="fa-solid fa-angles-up"></i>
  </a>
    
<!--Swiper JS library-->
<script src="/js/swiper-bundle.min.js"></script>

<!--LightBox JS library-->
<script src="/js/lightbox-plus-jquery.min.js"></script>

<!--Scroll Reveal-->
<script src="/js/scrollreveal.min.js"></script>

<!-- Custom script -->
<script src="/js/custom/main.js"></script>
<script src="/js/custom/loginRegister.js"></script>
<script src="/js/particlesJS/particles.js"></script>
<script src="/js/particlesJS/app.js"></script>

</body>
</html>