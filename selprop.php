<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <link rel="stylesheet" href="css/selprop.css"/>
</head>
<body>
    
<!--header section starts-->

<section class="header">

    <a href="index.php" class="logo">Mishler Homes Ltd.</a>

    <nav class="navbar">
        <a href="index.php">HOME</a>
        <a href="newabout.php">ABOUT</a>
        <a href="login.php">LOGIN</a>
        <a href="register.php">REGISTER</a>
    </nav>

</section>

<div class="heading" style="background: url(images/headtry.jpg) no-repeat;">
    <h1>Latest Listings</h1>
</div>



<section class="listings">


   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            if(!empty($fetch_property['image_02'])){
               $image_coutn_02 = 1;
            }else{
               $image_coutn_02 = 0;
            }
            if(!empty($fetch_property['image_03'])){
               $image_coutn_03 = 1;
            }else{
               $image_coutn_03 = 0;
            }
            if(!empty($fetch_property['image_04'])){
               $image_coutn_04 = 1;
            }else{
               $image_coutn_04 = 0;
            }
            if(!empty($fetch_property['image_05'])){
               $image_coutn_05 = 1;
            }else{
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <div class="box">
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
               <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            </div>
            <div style="margin-top: 2rem; text-align:center;">
               <a href="login.php" class="btn">View Property</a>
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">No Properties Added Yet! <a href="login.php" style="margin-top:1.5rem;" class="btn">Add New</a></p>';
      }
      ?>
      
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="login.php" class="btn">View All</a>
   </div>

</section>

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
        <a href="index.php"><i class="fas fa-angle-right"> </i>HOME</a>
        <a href="newabout.php"><i class="fas fa-angle-right"> </i>ABOUT</a>
        <a href="login.php"><i class="fas fa-angle-right"> </i>LOGIN</a>
        <a href="register.php"><i class="fas fa-angle-right"> </i>REGISTER</a>

        </div>

        <div class="box">
        <h3>Extra Links</h3>
        <a href="about.php"><i class="fas fa-angle-right"> </i>Ask Questions</a>
        <a href="about.php"><i class="fas fa-angle-right"> </i>About Us</a>
        <a href="about.php"><i class="fas fa-angle-right"> </i>Privacy Policy</a>
        <a href="about.php"><i class="fas fa-angle-right"> </i>Terms of Use</a>
        
        </div>

        <div class="box">
        <h3>Contact Info</h3>
        <a href="#"><i class="fas fa-phone"> </i>+91 90370 14877</a>
        <a href="#"><i class="fas fa-phone"> </i>+91 90745 40219</a>
        <a href="#"><i class="fas fa-phone"> </i>+91 97781 42219</a>
        <a href="#"><i class="fas fa-envelope"> </i>mishlerpvtltd@gmail.com</a>
        <a href="#"><i class="fas fa-map"> </i>Kollam,Kerala,India</a>
        
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



<?php include 'components/message.php'; ?>
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