//--------------------- Check Current Page  ---------------------------- //
document.querySelectorAll('.menu-link').forEach(link => {
  if(link.href === window.location.href){
    link.setAttribute('aria-current', 'page')
  }
})

//-------------------------- Home Page ------------------------------ //
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobliemmenu);

function mobliemmenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
}

window.addEventListener("scroll", function() {
  var header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0)
})


// SHOW SCROLL UP  
function scrollUp(){
  const scrollUp = document.getElementById('scroll-up');
  // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scroll-top class
  if(this.scrollY >= 350) scrollUp.classList.add('show-scroll'); else scrollUp.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollUp)

//Swiper slider for landing page
var homeSwiper = new Swiper(".homepage-bg-slider-thumbs", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 0,
    allowTouchMove: false,
    grabCursor: true,

});
var swiper2 = new Swiper(".homepage-bg-slider", {
    loop: true,
    spaceBetween: 0,
    navigation: {
      nextEl: ".landing-page-next",
      prevEl: ".landing-page-prev",
    },

    thumbs: {
        swiper: homeSwiper,
    },
});


/*==================== VIDEO ====================*/
const videoFile = document.getElementById('video-file'),
      videoButton = document.getElementById('video-button'),
      videoIcon = document.getElementById('video-icon')

function playPause(){ 
    if (videoFile.paused){
        // Play video
        videoFile.play()
        // We change the icon
        videoIcon.classList.add('ri-pause-line')
        videoIcon.classList.remove('ri-play-line')
    }
    else {
        // Pause video
        videoFile.pause(); 
        // We change the icon
        videoIcon.classList.remove('ri-pause-line')
        videoIcon.classList.add('ri-play-line')

    }
}
videoButton.addEventListener('click', playPause)

function finalVideo(){
    // Video ends, icon change
    videoIcon.classList.remove('ri-pause-line')
    videoIcon.classList.add('ri-play-line')
}
// ended, when the video ends
videoFile.addEventListener('ended', finalVideo)


//------------ Subscribe Mail -------------//
const subscribeForm = document.querySelector(".subscribe-form"),
statusTxt = subscribeForm.querySelector(".error-msg span");

subscribeForm.onsubmit = (e)=>{
    e.preventDefault();
    statusTxt.style.color = "#0D6EFD";
    statusTxt.style.display = "block";
    statusTxt.innerText = "Wait for a moment...";
    subscribeForm.classList.add("disabled");
  
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "subscribe.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState == 4 && xhr.status == 200){
        let response = xhr.response;
        if(response.indexOf("Email field is required!") != -1 || response.indexOf("Enter a valid email address!") != -1 || response.indexOf("Sorry, failed to subscribe!") != -1){
          statusTxt.style.color = "red";
        }else{
          subscribeForm.reset();
          setTimeout(()=>{
            statusTxt.style.display = "none";
          }, 3000);
        }
        statusTxt.innerText = response;
        subscribeForm.classList.remove("disabled");
      }
    }
    let formData = new FormData(subscribeForm);
    xhr.send(formData);
  }

  /* Testimonial Char Count */
  function charCount(){
    var element = document.getElementById("testi_form").value.length;
    document.getElementById("testi-count").innerHTML=element+"/300 (Max Character 300).";
    }


//Lightbox Gallery
lightbox.option({
  disableScrolling: true,
  maxWidth: 700,
  maxHeight: 500
})

//Room Section 
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



//--------------- SCROLL REVEAL ANIMATION ----------------*/
const sr = ScrollReveal({
  origin: 'top',
  distance: '60px',
  duration: 1500,
  delay: 200,
  easing   : 'ease-in-out',
})

sr.reveal('.heading, .video-title, .video-description',{  delay: 200})
sr.reveal('.left, .right, .video__content, .places',{origin: 'left', delay: 300})
sr.reveal('.room-container', {scale: 0.7, duration: 1000, delay: 800} )
sr.reveal('.wrapper, .footer', {delay: 800,  duration: 1000, origin: 'bottom'})


const sr2 = ScrollReveal({
  origin: 'top',
  distance: '100px',
  duration: 1500,
  delay: 200,
  easing: 'ease-out',
  reset: true
})
sr2.reveal('.content, .heading',{delay: 200})
sr2.reveal('.booking-container', {delay: 200, origin: 'left'})
sr2.reveal('.questions__item',{interval: 100})




