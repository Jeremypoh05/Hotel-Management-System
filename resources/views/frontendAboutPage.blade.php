@extends('frontendlayout')
@section('title','Traders')
@section('content')

<!---------------- About Section ---------------->
<section class="about-page-bg">
    <div class="about-bg-content flex-center">
       <h1>About Us</h1>
       <div class = "line">
           <div></div>
           <div></div>
           <div></div>
       </div>
       <p>You'll feel great when you get to know us</p>
    </div>
</section>

<section class="section about-page">
    <div class="about-page-container flex-center">
      <div class="about-page-left">
        <div class="about-img">
          <img src="images/aboutpage2.png" alt="" class="image1">
          <img src="images/aboutpage3.png" alt="" class="image2">
        </div>
      </div>
      <div class="about-page-right">
        <div class="about-page-heading">
          <h5>RAISING COMFOMRT TO THE HIGHEST LEVEL</h5>
          <h2>Welcome to Traders Hotel</h2>
          <p>Traders Hotel Kuala Lumpur by Shangri-La is located in the heart of Kuala Lumpur City Centre (KLCC) and offers the panoramic view of the Petronas Twin Towers, KLCC Park and the city's skyline. </p>
          <p>We offers direct access to such known Kuala Lumpur attractions as Suria KLCC, the Petronas Twin Towers and top business, shopping and entertainment venues. </p>
          <p>Our hotel boasts tastefully appointed guestrooms specially outfitted with suite-specific amenities for comfort and convenience. Gobo Chit Chat, the fine on-site restaurant serves some of the best Western dishes in Kuala Lumpur in an intimate setting. Guests can also enjoy creative cocktails in the lounge.</p>
          <p>The hotel provides free broadband internet access in the business centre for all business needs. A fully equipped gym, saunarium, steam room and spa are also available for all those guests looking for total relaxation. </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section mission-vision">
    <div class="heading flex-center">
      <h1>Our Targets</h1>
      <h2>Mission & Vision</h2>
    </div>
    <div class="mission-vision-container">
      <div class="mission">
          <div class="mission-content">
            <h1>Mission</h1>
            <i class="fa-solid fa-rocket"></i>
            <p>We are poised to blend the hospitality service delivery with quality and customer care. We are destined to give different experience to our regular diners, lodgers and event organizers. We look forward to go a long way to build everlasting relations with our valued clients.</p>
          </div>
      </div>
      <div class="vision">
        <div class="vision-content">
            <h1>Vision</h1>
            <i class="fa-solid fa-eye"></i>
            <p>Our vision is to become a total hospitality service provider with comprehensive commitment to offer an innovative range of stay, dining, event hosting facilities to clients. We are destined to offer cost-competitive hospitality services which conform to the international hotel industry benchmarks and quality standards to exceed expectations of the customers.</p>
          </div>
      </div>
    </div>
  </section>

  <section class="section testimonials">
    <div class="testimonial-container flex-center">
    @foreach($testimonials as $testi)
      <div class="owl-carousel owl-carousel2 owl-theme flex-center">
        <div class="testimonial-item">
          <i class="fa-solid fa-quote-right"></i>
          <p>{{$testi->testi_content}}</p>
          <h3>{{$testi->customer->full_name}}</h3>
        </div> 
        @endforeach                       
      </div>
    </div>
  </section>


  <script>
    $('.owl-carousel2').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1,
        },
        1000: {
          items: 1
        }
      }
    })
  </script>
@endsection