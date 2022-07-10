<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="/image/png" sizes="32x32" href="/images/logo.png">
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Swiper.js styles -->
    <link rel="stylesheet" href="/css/swiper-bundle.min.css"/>
    <!-- Unicons for social media -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- ===== Animation ====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- ===== Fontawesome CDN ====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <!-- Light Box Library CSS -->
    <link rel="stylesheet" href="/css/lightbox.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/css/loginRegister.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- ---------------------------  Header(Navigation) --------------------------------------------- -->
    <header class="header" id="header">
      
        <nav class="navbar container">
            <a href="./index.html">
                <h2 class="logo">Traders</h2>
            </a>

            <div class="menu" id="menu">
                <ul class="list">
                    <li class="list-item">
                        <a href="#"class="list-link current">Home</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Rooms</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Gallery</a>
                    </li>
                    <li class="list-item">
                      <a href="#" class="list-link"></i>Contact</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link"></i>About</a>
                    </li>
                    @if(Session::has('customerlogin'))
                    <li class="list-item">
                        <a href="{{url('customer/logout')}}" class="list-link">Logout</a>
                    </li>
                    @else
                    <li class="list-item">
                        <a href="{{url('customer/login')}}" class="list-link">Sign in</a>
                    </li>
                    <li class="list-item">
                        <a href="{{url('customer/register')}}" class="list-link">Sign up</a>
                    </li>
                    @endif
                    
                </ul>
            </div>

            <div class="list list-right">
                <button class="btn place-items-center" id="theme-toggle-btn">
                    <i class="ri-sun-line sun-icon"></i>
                    <i class="ri-moon-line moon-icon"></i>
                </button>

                <button class="btn place-items-center" id="search-icon">
                    <i class="ri-search-line"></i>
                </button>

                <button class="btn place-items-center screen-lg-hidden menu-toggle-icon" id="menu-toggle-icon">
                    <i class="ri-menu-3-line open-menu-icon"></i>
                    <i class="ri-close-line close-menu-icon"></i>
                </button>


                @if(Session::has('customerlogin'))
                <a href="{{url('booking')}}" class="btn sign-up-btn fancy-border screen-sm-hidden">
                    <span>Booking</span>
                </a>
                @else
                <a href="{{url('customer/login')}}" class="btn sign-up-btn fancy-border screen-sm-hidden">
                    <span>Booking</span>
                </a>
                @endif
            </div>

        </nav>

    </header>

      <!-- Search -->
      <div class="search-form-container container" id="search-form-container">

      <div class="form-container-inner">

          <form action="" class="form">
              <input class="form-input" type="text" placeholder="What are you looking for?">
              <button class="btn form-btn" type="submit">
                  <i class="ri-search-line"></i>
              </button>
          </form>
          <span class="form-note">Or press ESC to close.</span>

      </div>
      <button class="btn form-close-btn place-items-center" id="form-close-btn">
          <i class="ri-close-line"></i>
      </button>
      </div>
    <!-- ------------x---------------  Header(Navigation) --------------------------x------------------- -->
      
   	<!--Content -->
	@yield('content')

    <!-- --------------------------- Footer ---------------------------------------- -->
    
    
    <!-- --------------x------------- Footer ------------------x---------------------- -->
<!--Swiper JS library-->
<script src="/js/swiper-bundle.min.js"></script>

<!--LightBox JS library-->
<script src="/js/lightbox-plus-jquery.min.js"></script>

<!-- Custom script -->
<script src="/js/custom/main.js"></script>

    <script src="/js/custom/loginRegister.js"></script>
    <script src="/js/particlesJS/particles.js"></script>
    <script src="/js/particlesJS/app.js"></script>

    </body>
</html>