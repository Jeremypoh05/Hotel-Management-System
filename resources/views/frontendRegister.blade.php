@extends('frontendlayout')
@section('title','Register')
@section('content')
<!-- Custom styles -->

<div class="particles-body">
    <div id="particles-js"></div>
    <div class="animate__animated animate__backInDown">
        <div class="register-container">
            <div class="Form">
                <div class="registerForm">
                <span class="login-regis-title signup-title">Registration Form</span>
                @if(Session::has('success'))
                <div class="error-success-data">
                    <div class="error-success success" id="LogInMsg">
                    <p>{{session('success')}}</p>
                    </div>
                </div>
                @endif

                <form method="POST" name="RegisterForm" onsubmit="return checkRegisterStuff()" action="{{url('admin/customer')}}">
                @csrf
                    <div class="field">
                        <div class="input-field">
                            <input type="text" placeholder="Enter your name" name="full_name" autofocus>
                            <i class="uil uil-user"></i>
                        </div>
                        
                        <div class="error"id="RegisMsg1"></div>
                        </div>

                    <div class="field">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" autofocus>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    
                    <div class="error"id="RegisMsg2"></div>
                    </div>

                    <div class="field">
                    <div class="input-field">
                        <input type="password" class="RegisPassword" id="RegisPassword" placeholder="Enter your password" name="password" 
                         pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"required>
                        <i class="uil uil-lock icon pw"></i>
                        <i class="uil uil-eye-slash showHidePw PwRegis"></i>
                    </div>
                    <div class="indicator">
                        <div class="icon-text">
                          <i class="fas fa-exclamation-circle error_icon"></i>
                          <h6 class="text"></h6>
                        </div>
                      </div>
                    <div class="error"id="RegisMsg3"></div>
                    </div>

                    <div class="field">
                        <div class="input-field">
                            <input type="text" placeholder="Enter your phone number" name="mobile" autofocus>
                            <i class="uil uil-phone-alt"></i>
                        </div>
                        
                        <div class="error"id="RegisMsg4"></div>
                    </div>
                    
                    <div class="field">
                        <div class="input-field">
                            <input type="text" placeholder="Enter your address" name="address" autofocus>
                            <i class="uil uil-map-marker-question"></i>
                        </div>
                        
                        <div class="error"id="RegisMsg5"></div>
                    </div>

                    <div class="input-field login-regis-button">
                        <input type="hidden" name="ref" value="front">
                        <input type="submit" value="Register Now">
                    </div>
                </form>

                <div class="login-register">
                    <span class="text">If you have an account,
                        <a href="{{url('customer/login')}}" class="text register-link ">Sign In Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection