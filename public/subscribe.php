<?php
  $email = htmlspecialchars($_POST['userEmail']);

  if(!empty($email)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = $email; //enter that email address where you want to send messages
      $subject = "Thanks for Subscribing us - Traders Hotel";
      $message = "Thanks for subscribing to our newsletter. You'll always receive any updates and promotions from us. And we won't share and sell your information.";
      $sender = "From: Tradersforyou1@gmail.com";
      if(mail($receiver, $subject, $message, $sender)){
         echo "Your have succesfully subscribed to our newsletter!";
      }else{
         echo "Sorry, failed to subscribe!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email field is required!";
  }
?>
