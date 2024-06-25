<?php

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit'])){
    $name = $_POST["name"];
    $email = $_POST['email'];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dashotz14@gmail.com';
        $mail->Password   = 'nonmubnhmkrdmrnv';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients

        $mail->setFrom($email, $name);
          $mail->addAddress('dashotz14@gmail.com', 'Escapology');     // Add a recipient
          $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);                     // Set email format to HTML
        $mail->Subject = 'Concerns/Inquiries';
        $mail->Body    =  $message;


        $mail->send();

     } catch (Exception $e) {

     }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0" charset="utf-8">
    <title>Escapologyglam</title>
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/249726be58.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class="sub-header">
       <?php include("inc/nav_home.php"); ?>
    <h1>Contact Us</h1>
    </section>
<!--content---->
  <section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3863.6254742220553!2d120.97633056378798!3d14.44873465226033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cdf95ca690a5%3A0x63e8c63e39649142!2s2%20Alabang%E2%80%93Zapote%20Rd%2C%20Las%20Pi%C3%B1as%2C%201742%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1672757096856!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

<section class="contact-us">
  <div class="row">
    <div class="contact-col">
      <div>
      <i class="fa fa-home"></i>
  <span>
  <h5>2 Alabang–Zapote Rd, Las Piñas</h5>
  <p>1747 Metro Manila, Philippines</p>
  </span>
      </div>
      <div>
      <i class="fa fa-phone"></i>
  <span>
  <h5>+639774652512</h5>
  <p>Monday to Saturday, 10am to 6pm</p>
  </span>
      </div>
      <div>
      <i class="fa fa-envelope"></i>
  <span>
  <h5>excapologyglam@gmail.com
</h5>
  <p>Email us your concerns!</p>
  </span>
      </div>
    </div>
    <div class="contact-col">
      <form action="contact.php" method="post">
      <label for="username">Name:</label>
<input name="name"  id = "name" type="text" placeholder="Enter your name " >

<label for="email">Email:</label>
 <input name="email"  id = "email" type="email" placeholder="Enter your Email Address " >

<label for="message">Message:</label>
<textarea name="message"  id = "message"rows="8" placeholder="Message" ></textarea>
      <button id = "btn" name = "submit" type="Submit" class="hero-btn brown-btn" onclick="alert('Concerns Sent!')" value="Send">Send</button>

    </form>
    </div>
  </div>
</section>
<!---services pic--->


<!--footer---->
<section class="footer">
   <h4>About Us</h4>
   <p>We came up to this concept “itchy feet” that is because us Filipino had a thinking that whenever our feet feel itchy we want to go somewhere. <br>NOT, because we have skin allergy or something. Especially, that we are experiencing pandemic we were locked up to our houses for almost a year without any other activities like going <br> to school, mall, go to gym and go to different places to travel and explore.

A lot of people right now are excited to go somewhere to travel, <br>explore and relax again. We saw a lot of post in social media that people are going back to their track, they are going to beach, they do hiking again, they go out of town. <br> That's why we made a new service that will help a lot of people who are excited to go somewhere to relax, travel, <br> explore or go around wherever they please without worrying about where they'll spend their night.</p>
  <div class="icons">
    <i class="fa fa-facebook"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-instagram"></i>
  </div>

  </section>



  </body>
</html>
