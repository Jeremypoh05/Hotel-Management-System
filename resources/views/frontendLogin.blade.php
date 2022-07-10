@extends('frontendlayout')
@section('title','Log In')
@section('content')
<!-- Custom styles -->

<div class="particles-body">
    <div id="particles-js"></div>
    <div class="animate__animated animate__backInDown">
        <div class="login-container">
            <div class="Form">
                <div class="loginForm">
                <span class="login-regis-title signin-title">Login Form</span>

                @if(Session::has('error'))
                <div class="error-success-data">
                    <div class="error-success error" id="LogInMsg">
                        <p>{{session('error')}}</p>
                    </div>
                </div>
                @endif

                <form method="POST" name="LogInForm" onsubmit="return checkLogInStuff()" action="{{url('customer/login')}}">
                @csrf    
                    <div class="field">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="LogInEmail" autofocus>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    
                    <div class="error error1"id="LogInMsg1"></div>
                    </div>

                    <div class="field">
                    <div class="input-field">
                        <input type="password" class="LogInPassword" placeholder="Enter your password" name="LogInPassword" autofocus>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="error error2"id="LogInMsg2"></div>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field login-regis-button">
                        <input type="submit" value="Login Now">
                    </div>
                </form>

                <div class="login-register">
                    <span class="text">Not a member?
                        <a href="{{url('customer/register')}}" class="text login-link ">Signup now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection('content')
