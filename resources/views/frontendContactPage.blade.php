@extends('frontendlayout')
@section('title','Traders')
@section('content')

<!---------------- Contact Section ---------------->
<section class="contact-page-bg">
    <div class="contact-bg-content flex-center">
       <h1>Contact Us</h1>
       <div class = "line">
           <div></div>
           <div></div>
           <div></div>
       </div>
       <p>If you encounter any problems or have any doubt, please don't hesitate to contact us or sent message to us</p>
    </div>
</section>

<section class="section contact-page-info">
    <div class="contact-container container">
        <div class="contact-items">
            <div class="contact-content">
                <div class="contact-content-icon">
                    <i class="fa-solid fa-location-arrow"></i>
                </div>
                <div class="contact-message">
                    <h2>Address</h2>
                    <p>Kuala Lumpur City Centre, 50088 KL.</p>
                </div>
            </div>
        </div>

        <div class="contact-items">
            <div class="contact-content">
                <div class="contact-content-icon">
                    <i class="fa-solid fa-envelope"></i>                
                </div>
                <div class="contact-message">
                    <h2>Email</h2>
                    <p>Tradersforyou1@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="contact-items">
            <div class="contact-content">
                <div class="contact-content-icon">
                    <i class="fa-solid fa-phone"></i>                
                </div>
                <div class="contact-message">
                    <h2>Phone</h2>
                    <p>+6011 7787888</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section contact-form">
  <div class="contact-form-container">
      <div class="contact-form-content">
        <div class="contact-form-left-side">
          <h1>Get In Touch With Us</h1>
        </div>
        <div class="contact-form-right-side">
          <div class="contact-form-text">Send us a message</div>
        <form action="" method="" class = "contactForm">
          <div class="contact-form-input-box">
            <input type="text"name="userName" placeholder="Enter your name">
          </div>
          <div class="contact-form-input-box">
            <input type="text" name="userEmail" placeholder="Enter your email">
          </div>
          <div class="contact-form-input-box">
            <input type="text" name="userNumber" placeholder="Enter your phone number">
          </div>
          <div class="contact-form-input-box">
            <select name="userQuery">
              <option>What's your question related ?</option>
              <option value="query">Query</option> 
              <option value="feedback">Feedback</option> 
              <option value="suggestion">Suggestion</option> 
            </select>
          </div>
         
          <div class="contact-form-input-box message-box">
            <textarea name="userMessage" placeholder="Enter your message"></textarea>
          </div>
          <div class="contact-form-button">
            <input type="submit" value="Send Now" >
            <div class="contact-error-msg">
                <span></span>
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>
</section>

<div class = "section map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.7750964258053!2d101.71270561422716!3d3.153916897703508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37d3a880566d%3A0x777619bf0fbbc576!2sTraders%20Hotel%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1659511115903!5m2!1sen!2smy" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<script>
//------------ Contact Page - send message -------------//
const contactForm = document.querySelector(".contactForm"),
contactStatusTxt = contactForm.querySelector(".contact-error-msg span");

contactForm.onsubmit = (e)=>{
  e.preventDefault();
  contactStatusTxt.style.color = "#0D6EFD";
  contactStatusTxt.style.display = "block";
  contactStatusTxt.innerText = "Sending your message...";
  contactForm.classList.add("disabled");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let contactResponse = xhr.response;
      if(contactResponse.indexOf("Email and message field is required!") != -1 || contactResponse.indexOf("Enter a valid email address!") != -1 || contactResponse.indexOf("Sorry, failed to send your message!") != -1){
        contactStatusTxt.style.color = "red";
      }else{
        contactForm.reset();
        setTimeout(()=>{
          contactStatusTxt.style.display = "none";
        }, 3000);
      }
      contactStatusTxt.innerText = contactResponse;
      contactForm.classList.remove("disabled");
    }
  }
  let contactFormData = new FormData(contactForm);
  xhr.send(contactFormData);
}
</script>

@endsection