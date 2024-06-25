<?php   
 include("config.php");
  $fname = $eadd = $pnum = $address = $pdate = $rdate = $van = "";
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      if (empty($_POST["fname"])) {
      }else{
        $fname = $_POST["fname"];
      }
  
      if (empty($_POST["eadd"])) {
      }else{
        $eadd = $_POST["eadd"];
      }

       if (empty($_POST["pnum"])) {
      }else{
        $pnum = $_POST["pnum"];
      }


 

      if (empty($_POST["address"])) {
      }else{
        $address = $_POST["address"];
      }


       if (empty($_POST["pdate"])) {
      }else{
        $pdate = $_POST["pdate"];
      }


       if (empty($_POST["rdate"])) {
      }else{
        $rdate = $_POST["rdate"];
      }

      if (empty($_POST["van"])) {
      }else{
        $van = $_POST["van"];
      }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
      function updateImage(select) {
        var img = document.getElementById("van");
        var selected = select.options[select.selectedIndex].value;
        img.src = selected;
      }
    </script>
    <meta name="viewport" content="with=device-width, initial-scale=1.0" charset="utf-8">
    <title>Escapologyglam</title>
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/249726be58.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <section class="sub-header">
      <nav>
        <a href="index.html"><img src="img/logo.png"></a>
        <div class="nav-links">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>

    <h1>Need A Ride?</h1>
    </section>

  <section class="contact-us">
      <div class="row">
        <div class="contact-col">
          <div>
          <i class="fa fa-home"></i>
      <span>
      <h5>2 Alabang–Zapote Rd, Las Piñas</h5>
      <p>1747 Metro Manila, Philippines
<br>Nam semper massa sit amet tellus bibendum
<br>venenatis. Etiam eget erat neque. Vivamus eu <br>
ipsum erat. Vivamus posuere facilisis ligula. Ut sed<br>
 fermentum orci, eget pulvinar risus. Sed nulla turpis,<br>
  tempus sed luctus in, fringilla et justo. Aliquam <br>
  tortor nulla, lobortis at commodo sit amet, facilisis<br>
  eget ipsum. Nunc purus risus, egestas sed efficitur<br>
   et, sodales et justo. Nunc hendrerit pellentesque <br>
   sagittis. Donec feugiat feugiat mi eu laoreet. Sed nec<br>
    faucibus lorem, a mattis purus. Cras id fermentum<br>
     ligula.
     <br>
     <br>

      </p>
      </span>
          </div>
          <div>
          <i class="fa fa-phone"></i>
      <span>
      <h5>+639156700925

  </h5>
      <p>Monday to Saturday, 10am to 6pm
        <br>
      <br>
      Fusce volutpat semper lacus at lacinia. <br>
      Cras iaculis leo purus, eget porttitor augue <br>
      eleifend at. Sed vulputate sapien id nulla<br>
       egestas luctus. Donec tempor non nisl in molestie. <br>
       Etiam sed bibendum nisi. Pellentesque interdum ut<br>
        erat molestie sodales. Nunc efficitur lacus vitae<br>
         metus viverra, a tincidunt augue pharetra. <br>
         Suspendisse nunc enim, consectetur eget elit a, <br>
         faucibus sollicitudin massa. Class aptent taciti<br>
          sociosqu ad litora torquent per conubia nostra, <br>
          per inceptos himenaeos. Praesent posuere mattis <br>
          purus, at auctor erat sagittis eget. Nam quis <br>
          facilisis est. Nulla at enim a libero dapibus
          <br>suscipit.
          <br>
          <br>
          <br>
</p>
      </span>
          </div>
          <div>
          <i class="fa fa-envelope"></i>
      <span>
      <h5>khrismca@gmail.com
    </h5>
      <p>Email us your concerns!
<br>
<br>
Lorem ipsum dolor sit amet, consectetur <br>
adipiscing elit. Ut sit amet gravida lacus,
<br>eget ultrices ligula. Duis tempor ultrices
<br>dictum. Mauris facilisis, felis sed fringilla
<br>facilisis, ex orci interdum leo, sed posuere
<br>orci mi in arcu. Phasellus at tempus odio, <br>
non tincidunt libero. Ut est mauris, mattis in quam<br>
 eu, bibendum tincidunt risus. Integer venenatis, <br>
 lectus at pulvinar maximus, augue dolor auctor mauris, <br>
 sed pulvinar tortor lorem in turpis. Ut faucibus dui<br>
  finibus velit hendrerit commodo. Praesent non massa<br>
   arcu. Morbi rutrum ex sed metus varius sollicitudin.

      </p>
      </span>
          </div>
        </div>
        <div class="contact-col">
          <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
            <input type="text" placeholder="Enter your name " name="fname">
            <input type="email" placeholder="Enter your Email Address " name="eadd">
            <input type="text" placeholder="Enter your Phone/Telephone Number " name="pnum">


              <span>Your Location</span>
              <input type="text" name="address"placeholder="Put your Address" required >


              <span>Pick-up Date</span>
              <input type="date" name="pdate" required>


              <span>Return Date</span>
              <input type="date" name="rdate" required="">

              <span>Choose a van:&nbsp; &nbsp;</span>


          <select class="select" name="van" onchange="updateImage(this)"> <br>

            <option  value="retro.jpg">Retro Campervan</option>
            <option  value="modern.jpg">Modern Glampervan</option>
            <option  value="vintage.jpg">Vintage Campervan</option>
            <option value="classic.jpg">Classic Glampervan</option>
          </select>

          <br>
          <img id="van" src="retro.jpg">


<br>
<br>
        <div class="btn">

            <input type="submit" class="hero-btn brown-btn" value="Book Now!" id="btn">
           
</div>
          </form>
        </div>
      </div>





</section>

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

<?php 
include("config.php");
if($fname && $eadd && $pnum && $address  && $pdate && $rdate && $van){
    
    $query = mysqli_query($conn, "INSERT INTO tblbook(name,email,phone,address,pickupdate,returndate,van) VALUES('$fname','$eadd','$pnum','$address','$pdate','$rdate','$van')");
    echo "<script language='javascript'>alert('Successfully Book');</script>";
    echo "<script> window.location.href='index.php'</script>";

  }


?>
