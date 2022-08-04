
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <link rel="icon" type="/image/png" sizes="32x32" href="/images/logo.png">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<!-- Begin Page Content -->
    <div class="success-failure-contianer">
       <div class="success-fail-box">
           <img src="/images/success.png">
                <h2>Thank You!</h2>
                <p>Your booking has been successfully submitted. 
                <br>Have a good day!<span><i class="fas fa-smile" id="smile"></i></span> 
                </p> 
           
            <div class="btn-go-back booking-success">
                <a href="{{url('/home')}}">Go Back to Home Page
                <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            @if(Session::has('data'))
            <a href="{{route('pdfReport')}}" class="download-invoice">Download Your Invoice!!!</a> 
            @endif 
            <!--session('data')[0]->id)-->
     
       </div>
    </div>
<!-- /.container-fluid -->
</body>
</html>
