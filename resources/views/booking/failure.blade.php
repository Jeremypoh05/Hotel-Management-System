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
           <img src="/images/wrong.png">
                <h2>Sorry!</h2>
                <p>Your booking was unsuccessful. Please try again.</p> 
            <div class="btn-go-back booking-error">
                <a href="{{url('booking')}}">Book Again
                <i class="fas fa-arrow-circle-right"></i></a>
            </div>
       </div>
    </div>
<!-- /.container-fluid -->
</body>
</html>
