@extends('frontendlayout')
@section('title','Booking')
@section('content')
<script src="/js/custom/main.js" defer></script>

<section class="landing-page-bg">
    <div class="content flex-center">
      <h1>Booking</h1>
      <div class = "line">
           <div></div>
           <div></div>
           <div></div>
       </div>
      <p>Select Us To Get Your Trip Happiness</p>
    </div>
</section>

<section class="booking-page">
        <div class="booking-container">
            <div class="booking-left-info">
               <div class="booking-content">
                    <h2>Make your reservation</h2>
				    <p>Comfort and Pleasure are our promises to you</p>
               </div>
            </div>

            <div class="booking-right-form">
                <form action="{{url('admin/booking')}}" enctype="multipart/form-data" method="post" class="booking-form">
                @csrf	    
                    <div class="booking-form-content">
                        <h1>Your Information</h1>
                        <div class="booking-input">
                            <div class="booking-form-field">
                                <p>Check-In Date:</p>
                                <input type="date" name="checkin_date" class="checkin-date" id="checkin_date">
                            </div>
                        
                            <div class="booking-form-field">
                                <p>Check-Out Date:</p>
                                <input type="date" name="checkout_date" id="checkout_date">
                            </div>
        
                            <div class="booking-form-field">
                                <p>Adults:</p>
                                <td><input name="total_adults" type="text" class="form-control" /></td>
                            </div>
                            <div class="booking-form-field">
                                <p>Children:</p>
                                
                                <td><input name="total_children" type="text" class="form-control" /></td>
                            </div>
                        </div>
                        <div class=" select-room">
                            <p>Available Rooms:</p>
                            <select class="room-list" name="room_id"></select>
                        </div>
                        
                        <p class="show-room-price-amount">Total Price:&nbsp;<span class="show-room-price"></span></p> 
                        @if(Session::has('data'))
                    	<input type="hidden" name="customer_id" value="{{session('data')[0]->id}}" />
                        @endif 
                        <input type="hidden" name="roomprice" class="room-price" value="" />
                        <input type="hidden" name="ref" value="front">
                        <input type="submit" class="booking-btn"/>
                    </div>
                </form>
            </div>
        </div>
    </section>

     <!--==================== QUESTIONS ====================-->
     <section class="questions">
       <div class="heading flex-center">
          <h1>Popular</h1>
          <h2>Questions</h2>
      </div>
  
                <div class="questions__container">
                    <div class="questions__group">
                        <div class="questions__item">
                            <div class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                What time is check-in and check-out at Traders Hotel?
                                </h3>
                            </div>

                            <div class="questions__content">
                                <p class="questions__description">
                                Check-in is from 02:30 PM, and check-out is until 12:00 PM. You may request early check-in or late check-out during booking, subject to availability. Guests checking in or out before or after the designated periods may be charged an additional fee. 
                                The hotel offers luggage storage to guests for before check-in and after check-out. The front desk is always open, day or night.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <div class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    How do I get to Traders Hotel, Kuala Lumpur?
                                </h3>
                            </div>

                            <div class="questions__content">
                                <p class="questions__description">
                                For those who wish to drive their own cars, Traders Hotel, Kuala Lumpur has a car park available for guests. Parking is free for guests. 
                                Parking options include a full-service valet for total ease. If you're looking for an easy way to get around Kuala Lumpur with private transportation, the hotel can arrange car rental for you.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <div class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    What are my dining options at Shangri-La Kuala Lumpur?
                                </h3>
                            </div>

                            <div class="questions__content">
                                <p class="questions__description">
                                Traders Hotel Kuala Lumpur features 4 on-site restaurants for your dining convenience. Meals served include breakfast, dinner and lunch. You can pick and choose from a wide array of cuisines including international, western and asian. Dishes are served in a la carte and buffet during opening hours. 
                                Light meal like desserts and salad are served using only quality ingredients. To meet any special dietary requirements, vegetarian and halal diets are prepared with the utmost care and attention.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="questions__group">
                        <div class="questions__item">
                            <div class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Is breakfast offered at Vogue Hotel Bodrum?
                                </h3>
                            </div>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Start your mornings right, with the continental and buffet breakfast options offered at Vogue Hotel Bodrum.
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <div class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    Can business events be hosted at Traders Hotel Kuala Lumpur?
                                </h3>
                            </div>

                            <div class="questions__content">
                                <p class="questions__description">
                                On-site venues and convenient event services make Shangri-La Kuala Lumpur an ideal choice for hosting events such as corporate events, conferences and meetings. 
                                All available venues come in different styles and sizes and can accommodate up to 1800 people. An extensive range of facilities and services including projector or LED display, free Wi-Fi and audio-visual equipment is available to help your business meeting or event a successful on
                                </p>
                            </div>
                        </div>

                        <div class="questions__item">
                            <div class="questions__header">
                                <i class="ri-add-line questions__icon"></i>
                                <h3 class="questions__item-title">
                                    What is the smoking policy at Traders Hotel, Kuala Lumpur?
                                </h3>
                            </div>

                            <div class="questions__content">
                                <p class="questions__description">
                                    Traders Hotel, Kuala Lumpur does permit smoking in some areas and is not 100% smoke-free.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
               
<script src="/js/scrollreveal.min.js"></script>
<!--Jquery CDN-->
<script src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">

     //Disable previous date
     var today = new Date();
     var dd = String(today.getDate()).padStart(2, '0');
     var mm = String(today.getMonth() + 1).padStart(2, '0');
     var yyyy = today.getFullYear();

     today = yyyy + '-' + mm + '-' + dd;

     $('#checkin_date').attr('min',today);

     var tomorrow = new Date();
     var tmrdd = String(tomorrow.getDate()+1).padStart(2, '0');
     var tmrmm = String(tomorrow.getMonth() + 1).padStart(2, '0');
     var tmryyyy = tomorrow.getFullYear();
     tomorrow = yyyy + '-' + mm + '-' + tmrdd; 
     $('#checkout_date').attr('min',tomorrow);


    //function of showing available rooms
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkindate=$(this).val();
            // Ajax
            $.ajax({
                url:"{{url('admin/booking')}}/available-rooms/"+_checkindate,
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>--- Loading ---</option>');
                },
                success:function(res){
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option data-price="'+row.room.price+'" value="'+row.room.id+'">'+row.roomtype.type+'-'+row.room.title+'</option>';
                    });
                    $(".room-list").html(_html);

                    var _selectedPrice=$(".room-list").find('option:selected').attr('data-price');
                    $(".room-price").val(_selectedPrice);
                    $(".show-room-price").text(_selectedPrice);
                }
            });
        });

        $(document).on("change",".room-list",function(){
            var _selectedPrice=$(this).find('option:selected').attr('data-price');
            $(".room-price").val(_selectedPrice);
            $(".show-room-price").text(_selectedPrice);
        });

    });

  /*=============== QUESTIONS ACCORDION ===============*/
  const accordionItems = document.querySelectorAll('.questions__item')

accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.questions__header')

    accordionHeader.addEventListener('click', () =>{
        const openItem = document.querySelector('.accordion-open')

        toggleItem(item)

        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
    })
})

const toggleItem = (item) =>{
    const accordionContent = item.querySelector('.questions__content')

    if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
    }else{
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
    }
}

    //--------------- SCROLL REVEAL ANIMATION ----------------*/
    const sr = ScrollReveal({
      origin: 'top',
      distance: '100px',
      duration: 1500,
      delay: 200,
      easing: 'ease-out',
      reset: true
    })
    sr.reveal('.content, .heading',{delay: 200})
    sr.reveal('.booking-container', {delay: 200, origin: 'left'})
    sr.reveal('.questions__item',{interval: 100})
</script> 
@endsection('content')