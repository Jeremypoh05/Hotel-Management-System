<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Traders - Login</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(-45deg, #c44e2a, #419bbc, #7C78B8, #0b2cc1);
        width: 100%;
        height: 100vh;	
        overflow: hidden;
        animation: change 6s ease-in-out infinite;
        background-size: 400% 400%;
    }   

    .container {
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    min-height: 100vh;
    }

.screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 360px;	
	box-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	height: 520px;
	width: 520px;
	background: #FFF;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.screen__background__shape2 {
	height: 220px;
	width: 220px;
	background: #6C63AC;	
	top: -172px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape3 {
	height: 540px;
	width: 190px;
	background: linear-gradient(270deg, #5D54A4, #6A679E);
	top: -24px;
	right: 0;	
	border-radius: 32px;
}

.screen__background__shape4 {
	height: 400px;
	width: 200px;
	background: #7E7BB9;	
	top: 420px;
	right: 50px;	
	border-radius: 60px;
}

.admin-login-title{
    padding: 75px 0 0 25px;
    position: relative;
}
.login {
	width: 320px;
	padding:35px 30px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

.login__icon {
	position: absolute;
	top: 30px;
	color: #7875B5;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: #fff;
	font-size: 14px;
	margin-top: 30px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
}

.rmbcheckbox{
  display: flex;
}

.custom-checkbox{
    width: 13px;
    height: 13px;
}

.rmbcheckbox label{
    color:#4863A0; 
    font-size: 12px;
    margin: -2px 0 0 5px;
    font-weight: 600;
}

.forgot-password{
    margin-top:8px;
}
.forgot-password a{
    color:#4863A0; 
    font-size: 12px;
    font-weight: 600;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #7875B5;
}

.error-msg1{
    position:absolute;
    top:210px;
    left: 40px;
}

.error-msg2{
    position:absolute;
    top:210px;
    left: 80px;
}

@keyframes change{
    0%{
        background-position: 0 50%;
    }
    50%{
        background-position: 100% 50%;
    }
    100%{
        background-position: 0 50%;
    }
}

    </style>
</head>

<body>
    <div class="container">
	<div class="screen">   
		<div class="screen__content">
            <div class="admin-login-title">
                <h1>Admin <br>Log In</h1>
            </div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                <p class="text-danger error-msg1">Please Fill In Username and Password</p>
                @endforeach
            @endif

            @if(Session::has('msg'))
                <p class="text-danger error-msg2">{{session('msg')}}</p>
            @endif
			<form class="login" method="post" action="{{url('admin/login')}}">
            @csrf
                <div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" @if(Cookie::has('adminuser')) value="{{Cookie::get('adminuser')}}" @endif id="username" name="username" class="login__input" placeholder="Username">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" @if(Cookie::has('adminpwd')) value="{{Cookie::get('adminpwd')}}" @endif name="password" class="login__input" placeholder="Password">
				</div>
                <div class="rmbcheckbox">
                <input type="checkbox" @if(Cookie::has('adminuser')) checked @endif name="rememberme" class="custom-checkbox" id="customCheck">
                   <label class="RmbMeLabel" for="customCheck">Remember Me</label>
                </div>
            
                <div class="forgot-password">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>

				<button class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>		
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>



    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>