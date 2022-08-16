<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>

<body>
 <!-- SweetAlert CDN for Pop Up Box --> 
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('success'))
  <script>
    Swal.fire({
        title: 'Success!',
        text: 'Your testimonial will be checked by the admin and it will be post to the about page.',
        icon: 'success',
        confirmButtonText:'<i class="fa fa-thumbs-up"></i> Great! Go back to Home Page',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        showCloseButton: true
     }).then((result) => {
        if (result.isConfirmed) {
        window.location.href = "http://localhost:8000/home";
        }
  });
  </script>
  @endif


</body>
</html>