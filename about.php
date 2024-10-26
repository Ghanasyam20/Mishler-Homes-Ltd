<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/oldabout.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>
      <div class="content">
         <h3>Why Choose Us?<br><br></h3>
         <p>As someone with 30 years of experience in the real estate industry, Mishler Homes Ltd. offers unparalleled expertise and a proven track record of navigating diverse market conditions.<br><br> Our commitment to client satisfaction and exceptional service is reflected in our comprehensive range of services, supported by deep local market knowledge and a strong industry network. </p>
         <br>
         <a href="contact.php" class="inline-btn">Contact Us</a>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="heading">3 Simple Steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Search Property</h3>
         <p></p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Contact Agents</h3>
         <p></p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>Enjoy Property</h3>
         <p></p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="reviews">

   <h1 class="heading"><br>Client's Reviews<br><br></h1>
        <div class="slider">
            <div class="item">
            <img src="images/pic-1.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>

                </div>
                <p>Mishler Homes Ltd. has built a reputation for excellence over decades👌</p>
                <h3>Alan Oakley</h3>
                <span>Traveller</span>
                
            </div>   
            

            <div class="item">
            <img src="images/pic-2.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>As a longtime client of Mishler Homes Ltd., I can attest to their enduring presence in the market. 🫂</p>
                <h3>Erika Heller</h3>
                <span>Model</span>
            </div>   
            

            <div class="item">
            <img src="images/pic-3.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Superior Homes and Exceptional Service😘</p>
                <h3>John Healy</h3>
                <span>SEO</span>
            </div>                

            <div class="item">
            <img src="images/pic-4.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Built a legacy of trust and craftsmanship that sets them apart from newer competitors<br>🤞🤩 </p>
                <h3>Rhonda Newcomb</h3>
                <span>Lawyer</span>
            </div>  
            

            <div class="item">
            <img src="images/pic-5.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>A person could not ask for a more professional experience😌</p>
                <h3>Anit Deshai</h3>
                <span>Teacher</span>
            </div>    
            

            <div class="item">
            <img src="images/pic-6.png" alt="">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Mishler Homes Ltd. has been a trusted name in our community for decades, known for their quality craftsmanship and reliability.🤠</p>
                <h3>Nicki Irish</h3>
                <span>Doctor</span>
            </div>    
            

        </div>
        <button id="next">></button>
        <button id="prev"><</button>
    

</section>
<!-- review section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/rev.js"></script>

</body>
</html>