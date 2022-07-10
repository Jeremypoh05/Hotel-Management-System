 // ----------------------- Login Page-------------------//     
     
     pwShowHideLogin = document.querySelectorAll(".showHidePw"),
     pwFieldsLogin = document.querySelectorAll(".LogInPassword"),

    //   js code to show/hide password and change icon
    pwShowHideLogin.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
          pwFieldsLogin.forEach( pwFieldsLogin =>{
                if( pwFieldsLogin.type ==="password"){
                  pwFieldsLogin.type = "text";

                    pwShowHideLogin.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwFieldsLogin.type = "password";

                    pwShowHideLogin.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })
      // js code to validate log in form data
      function checkLogInStuff() {
        var LogInEmail = document.LogInForm.LogInEmail;
        var LogInPassword = document.LogInForm.LogInPassword;
        var LogInMsg1 = document.getElementById('LogInMsg1');
        var LogInMsg2 = document.getElementById('LogInMsg2');

        
        if (LogInEmail.value == "") {
          LogInMsg1.innerHTML = "Please enter your email";
          LogInEmail.focus();
          return false;
        } else {
          LogInMsg1.innerHTML = "";
        }

        
         if (LogInPassword.value == "") {
          LogInMsg2.style.display = 'block';
          LogInMsg2.innerHTML = "Please enter your password! ";
          LogInPassword.focus();
          return false;
        } else {
          LogInMsg2.innerHTML = "";
        }
      
         var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(LogInEmail.value)) {
          LogInMsg1.innerHTML = "Please enter a valid email. E.g: Jeremy@gmail.com";
          LogInEmail.focus();
          return false;
        } else {
          LogInMsg1.innerHTML = "";
        }
      }

       // ----------------------- ENDING Login Page-------------------//     

          // ----------------------- Register Page-------------------//
     
     pwShowHideRegis = document.querySelectorAll(".PwRegis"),
     pwFieldsRegis = document.querySelectorAll(".RegisPassword"),

   //   js code to show/hide password and change icon for PASSWORD field
   pwShowHideRegis.forEach(eyeIcon =>{
    eyeIcon.addEventListener("click", ()=>{
      pwFieldsRegis.forEach( pwFieldsRegis =>{
            if( pwFieldsRegis.type ==="password"){
                pwFieldsRegis.type = "text";

                pwShowHideRegis.forEach(icon =>{
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            }else{
                pwFieldsRegis.type = "password";

                pwShowHideRegis.forEach(icon =>{
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                })
            }
        }) 
    })
})

     // =============== js code to validate register form data ================
     function checkRegisterStuff() {
       var RegisName = document.RegisterForm.full_name;
       var RegisEmail = document.RegisterForm.email;
       var RegisPassword = document.RegisterForm.password;
       var RegisPhoneNo = document.RegisterForm.mobile;
       var RegisAddress = document.RegisterForm.address;
       var RegisMsg1 = document.getElementById('RegisMsg1');
       var RegisMsg2 = document.getElementById('RegisMsg2');
       var RegisMsg3 = document.getElementById('RegisMsg3');
       var RegisMsg4 = document.getElementById('RegisMsg4');
       var RegisMsg5 = document.getElementById('RegisMsg5');

       if (RegisName.value == "") {
         RegisMsg1.innerHTML = "Please enter your name!";
         RegisName.focus();
         return false;
       } else {
         RegisMsg1.innerHTML = "";
       }
       
       if (RegisEmail.value == "") {
         RegisMsg2.innerHTML = "Please enter your email!";
         RegisEmail.focus();
         return false;
       } else {
         RegisMsg2.innerHTML = "";
       }

        if (RegisPassword.value == "") {
         RegisMsg3.style.display = 'block';
         RegisMsg3.innerHTML = "Please enter your password";
         RegisPassword.focus();
         return false;
       } else {
         RegisMsg3.innerHTML = "";
       }

       if (RegisPhoneNo.value == "") {
        RegisMsg4.innerHTML = "Please enter your phone number!";
        RegisPhoneNo.focus();
        return false;
      } else {
        RegisMsg4.innerHTML = "";
      }

      if (RegisAddress.value == "") {
        RegisMsg5.innerHTML = "Please enter your address!";
        RegisAddress.focus();
        return false;
      } else {
        RegisMsg5.innerHTML = "";
      }
     
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
       if (!re.test(RegisEmail.value)) {
         RegisMsg2.innerHTML = "Please enter a valid email! E.g: Jeremy@gmal.com";
         RegisEmail.focus();
         return false;
       } else {
         RegisMsg2.innerHTML = "";
       }
     }
     
     // ============= js code to show password strength (with regex) ====================
                  
                // ============= Validation Part ====================
     const RegisPassword  = document.querySelector(".RegisPassword");
     indicator = document.querySelector(".indicator"),
     iconText = document.querySelector(".icon-text"),
     text = document.querySelector(".text");

              // ============= End Validation Part ====================

    let alphabet = /[a-zA-Z]/, //letter a to z and A to Z
    numbers = /[0-9]/, //numbers 0 to 9
    scharacters = /[!,@,#,$,%,^,&,*,?,_,(,),-,+,=,~]/; //special characters

    RegisPassword.addEventListener("keyup", ()=>{
    indicator.classList.add("active");

    let val = RegisPassword.value;
      if(val.match(alphabet) || val.match(numbers) || val.match(scharacters)){
        text.textContent = "Password is weak!";
        text.style.color = "#FF6333";
        iconText.style.color = "#FF6333";
      }

    if(val.match(alphabet) && val.match(numbers) && val.length >= 6){
        text.textContent = "Password is medium!";
        text.style.color = "#cc8500";
        iconText.style.color = "#cc8500";
      }

    if(val.match(alphabet) && val.match(numbers) && val.match(scharacters) && val.length >= 8){
        text.textContent = "Password is strong!";
        text.style.color = "#22C32A";
        iconText.style.color = "#22C32A";
      }

    if(val == ""){
        indicator.classList.remove("active");
        iconText.style.color = "#A6A6A6";
    }
});
       // -----------------------ENDING Register Page-------------------//