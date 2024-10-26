<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link rel="stylesheet" href="css/homestyle.css"/>
</head>
<body>
    
<!--header section starts-->

<section class="header">

    <a href="index.php" class="logo">Mishler Homes Ltd.</a>

    <nav class="navbar">
        <a href="home1.php">HOME</a>
        <a href="newabout.php">ABOUT</a>
        <a href="login.php">LOGIN</a>
        <a href="register.php">REGISTER</a>
    </nav>

</section>


<!--header section ends-->


<!--home section starts-->

<section class="home" id="home">
    <div class="content">
        <h3>Your Dream Home Starts Here</h3>
        <a href="login.php" class="btn">UNLOCK</a>
    </div>


    <div class="controls">
        <span class="vid-btn" data-src=Vdos/homevid.mp4></span>
    </div>


    <div class="video-container">
            <video src="Vdos/homevid.mp4" id="video-slider" loop autoplay muted></video>
</div>

</section>



<!-- Video section ends -->

<!-- home about section starts -->

<section class="home-about">

    <div class="image">
        <img src="images/about1.png" alt="">
    </div>

    <div class="content">
        <h3>About Us</h3>
        <p>Established as a leader in the real estate industry, Mishler Homes Ltd has built a reputation synonymous with trust, integrity, and innovation.</p>
    </div><a href="newabout.php" class="btn">Read More</a>
    </div>

</section>

<section class="simp">
    <img src="images/topcities.png">
    <div style="margin-top: 2rem; text-align:center;">
        <a href="selprop.php" class="btn">Explore</a>
    </div>
</section>


<!-- home about section ends -->

<!--whyus section starts-->

<section class="services">
    <h1 class="heading-title">Why Us?</h1>
    <div class="box-container">


        <div class="box">
            <br>
            <i class="fa-solid fa-magnifying-glass"></i>
            <br><h3><br>100% Verified</h3>
        </div>

        <div class="box">
            <br>
            <i class="fa-solid fa-map-location-dot"></i>
            <br><h3><br>Map-Based Search</h3>
        </div>
    
        <div class="box">
            <br>
            <i class="fa-solid fa-street-view"></i>
            <br><h3><br>Real POV</h3>
        </div>
    
    </div>


</section>
<br><br>
<!--whyus section ends -->


<!-- home offer section starts -->

<section class="home-offer">
    <div class="container">
        <div class="content">
            <h3>Limited Memberships Available</h3>
            <p>"We're cracking down on fake interference by becoming exclusive.<br> Act now—don't miss out!"</p>
            <a href="login.php" class="btn">Join Now</a>
        </div>
    </div>
</section>

 <!-- home offer section ends -->
<br>
<!--Client Names -->
<h1 class="heading-title"><br>Our Clients</h1>
<section class="client">
    <div class="container">
        <div class="swiper">
  <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="images/clients/2.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/3.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/4.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/5.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/6.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/7.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/8.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/9.png" alt=""></div>
    <div class="swiper-slide"><img src="images/clients/10.png" alt=""></div>
            </div>
        </div>
    </div>
</section>

<!--footer section starts-->

<section class="footer">
    <div class="box-container">
        <div class="box">
        <h3>Quick Links</h3>
        <a href="home1.php"><i class="fas fa-angle-right"> </i>HOME</a>
        <a href="newabout.php"><i class="fas fa-angle-right"> </i>ABOUT</a>
        <a href="login.php"><i class="fas fa-angle-right"> </i>LOGIN</a>
        <a href="register.php"><i class="fas fa-angle-right"> </i>REGISTER</a>

        </div>

        <div class="box">
        <h3>Extra Links</h3>
        <a href="newabout.php"><i class="fas fa-angle-right"> </i>Ask Questions</a>
        <a href="newabout.php"><i class="fas fa-angle-right"> </i>About Us</a>
        <a href="newabout.php"><i class="fas fa-angle-right"> </i>Privacy Policy</a>
        <a href="newabout.php"><i class="fas fa-angle-right"> </i>Terms of Use</a>
        
        </div>

        <div class="box">
        <h3>Contact Info</h3>
        <a href="#"><i class="fas fa-phone"> </i>+91 90370 14877</a>
        <a href="#"><i class="fas fa-phone"> </i>+91 90745 40219</a>
        <a href="#"><i class="fas fa-phone"> </i>+91 97781 42219</a>
        <a href="#"><i class="fas fa-envelope"> </i>mishlerpvtltd@gmail.com</a>
        <a href="#"><i class="fas fa-map"> </i>Kollam, Kerala, India</a>
        
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i>Instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i>LinkedIn</a>

        </div>

    </div>

    <div class="credit">Created by <span> G.V.N.</span> | All Rights Reserved</div>


</section>

<!--footer section ends-->


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    
const swiper = new Swiper('.swiper', {
    slidesPerView:"auto",
    loop: true,
    centeredSlides: true,
    speed:1500,
    allowTouchMove : false,
    disableOnInteraction: false,
    autoplay:{
        delay:1,
    },

});

</script>


</body>
</html>