<?php
  $name = htmlspecialchars($_POST['userName']);
  $email = htmlspecialchars($_POST['userEmail']);
  $phone = htmlspecialchars($_POST['userNumber']);
  $message = htmlspecialchars($_POST['userMessage']);
  $userQuery = htmlspecialchars($_POST['userQuery']);


  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "Tradersforyou1@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage Type: $userQuery\nMessage Info:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>
