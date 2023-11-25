<?php

if($_POST) {
  $to = "Info@Digitalbytz.Com"; // your mail here
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);

  $subject = 'analyze lead';
  $cc = 'Info@Digitalbytz.Com';
  $body = "Name:$name\nEmail:$email";
  
  //mail headers are mandatory for sending email
  $headers = 'From: ' .$email . "\r\n". 
  $cc = 'Cc: ' .$cc . "\r\n". 
  $bcc = 'Bcc: ' .$bcc . "\r\n".
  'Reply-To: ' . $email. "\r\n" . 
  'X-Mailer: PHP/' . phpversion();

  if(@mail($to, $subject, $body)) {
    $output = json_encode(array('success' => true));
    echo "<script>window.location= 'thankyou.php'</script>";
  } else {
    $output = json_encode(array('success' => false));
    die($output);
  }
}

