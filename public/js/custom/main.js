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

// Grab elements
const selectElement = (selector) => {
    const element = document.querySelector(selector);
    if(element) return element;
    throw new Error(`Something went wrong! Make sure that ${selector} exists/is typed correctly.`);  
};

const formOpenBtn = selectElement('#search-icon');
const formCloseBtn = selectElement('#form-close-btn');
const searchContainer = selectElement('#search-form-container');
// Open/Close search form popup
formOpenBtn.addEventListener('click', () => searchContainer.classList.add('activated'));
formCloseBtn.addEventListener('click', () => searchContainer.classList.remove('activated'));
// -- Close the search form popup on ESC keypress
window.addEventListener('keyup', (event) => {
    if(event.key === 'Escape') searchContainer.classList.remove('activated');
});


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

//------------ Popular Places Slider -------------
class CitiesSlider extends React.Component {
    constructor(props) {
      super(props);
  
      this.IMAGE_PARTS = 4;
  
      this.changeTO = null;
      this.AUTOCHANGE_TIME = 4000;
  
      this.state = { activeSlide: -1, prevSlide: -1, sliderReady: false };
    }
  
    componentWillUnmount() {
      window.clearTimeout(this.changeTO);
    }
  
    componentDidMount() {
      this.runAutochangeTO();
      setTimeout(() => {
        this.setState({ activeSlide: 0, sliderReady: true });
      }, 0);
    }
  
    runAutochangeTO() {
      this.changeTO = setTimeout(() => {
        this.changeSlides(1);
        this.runAutochangeTO();
      }, this.AUTOCHANGE_TIME);
    }
  
    changeSlides(change) {
      window.clearTimeout(this.changeTO);
      const { length } = this.props.slides;
      const prevSlide = this.state.activeSlide;
      let activeSlide = prevSlide + change;
      if (activeSlide < 0) activeSlide = length - 1;
      if (activeSlide >= length) activeSlide = 0;
      this.setState({ activeSlide, prevSlide });
    }
  
    render() {
      const { activeSlide, prevSlide, sliderReady } = this.state;
      return (
        React.createElement("div", { className: classNames('slider', { 's--ready': sliderReady }) },
        React.createElement("p", { className: "slider__top-heading" }, "Travelers"),
        React.createElement("div", { className: "slider__slides" },
        this.props.slides.map((slide, index) =>
        React.createElement("div", {
          className: classNames('slider__slide', { 's--active': activeSlide === index, 's--prev': prevSlide === index }),
          key: slide.city },
  
        React.createElement("div", { className: "slider__slide-content" },
        React.createElement("h3", { className: "slider__slide-subheading" }, slide.country || slide.city),
        React.createElement("h2", { className: "slider__slide-heading" },
        slide.city.split('').map(l => React.createElement("span", null, l))),
  
        React.createElement("p", { className: "slider__slide-readmore" }, "read more")),
  
        React.createElement("div", { className: "slider__slide-parts" },
        [...Array(this.IMAGE_PARTS).fill()].map((x, i) =>
        React.createElement("div", { className: "slider__slide-part", key: i },
        React.createElement("div", { className: "slider__slide-part-inner", style: { backgroundImage: `url(${slide.img})` } }))))))),
  
        React.createElement("div", { className: "slider__control", onClick: () => this.changeSlides(-1) }),
        React.createElement("div", { className: "slider__control slider__control--right", onClick: () => this.changeSlides(1) })));
  
  
    }}
  
  const slides = [
  {
    city: 'Paris',
    country: 'France',
    img: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/paris.jpg' },
  
  {
    city: 'Singapore',
    img: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/singapore.jpg' },
  
  {
    city: 'Prague',
    country: 'Czech Republic',
    img: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/prague.jpg' },
  
  {
    city: 'Amsterdam',
    country: 'Netherlands',
    img: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/amsterdam.jpg' },
  
  {
    city: 'Moscow',
    country: 'Russia',
    img: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/142996/moscow.jpg' },
  
  {
      city: 'Kuala Lumpur',
      country: 'Malaysia',
      img: 'https://www.covidpasscertificate.com/wp-content/uploads/sites/42/2021/09/malaysia-covid-certificate.jpg' }];
  
  ReactDOM.render(React.createElement(CitiesSlider, { slides: slides }), document.querySelector('#travel'));

//-----x----End of Popular Places Slider -----x-----

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
