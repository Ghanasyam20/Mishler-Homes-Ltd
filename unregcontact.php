<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'Message Sent Already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'Message Sent Successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/ucontact.css">

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


<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>Get In Touch</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Enter Your Name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="Enter Your Email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="Enter Your Number" class="box">
         <textarea name="message" placeholder="Enter Your Message" required maxlength="5000" cols="30" rows="10" class="box"></textarea>
         <div style="margin-top: 2rem; text-align:center;">
         <input type="submit" value="Send Message" name="send" class="btn">
         </div>
        </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading1">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>How to Access Properties?</span><i class="fas fa-angle-down"></i></h3>
         <p>Once successfully logged into your account, one can find the option from the dashboard.</p>
      </div>

      <div class="box active">
         <h3><span>When will I get the Access to Listings?</span><i class="fas fa-angle-down"></i></h3>
         <p>The Users are selectively accepted by the Admin.</p>
      </div>

      <div class="box">
         <h3><span>Where can I Pay the Rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>Online platforms for payment of rent will be added shortly</p>
      </div>

      <div class="box">
         <h3><span>How to Contact with the Admin?</span><i class="fas fa-angle-down"></i></h3>
         <p>Can be contacted from the "Contact Us" page.</p>
      </div>

      <div class="box">
         <h3><span>Why I am not able to Login?</span><i class="fas fa-angle-down"></i></h3>
         <p>Try Logging in once more. If Error persists, Contact the admin.</p>
      </div>

      <div class="box">
         <h3><span>Further Questions . . . </span><i class="fas fa-angle-down"></i></h3>
         <p>Get in Touch with Us.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->

<!--footer section starts-->

<section class="footer">
    <div class="box-container">
        <div class="box">
        <h3>Quick Links</h3>
        <a href="index.php"><i class="fas fa-angle-right"> </i>HOME</a>
        <a href="about.php"><i class="fas fa-angle-right"> </i>ABOUT</a>
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
        <a href="#"><i class="fas fa-map"> </i>Kollam, Kerala, India </a>
        
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/bg.js"></script>

<!-- custom js file link  -->
  <script>
  // Trigger the FAQ accordion functionality
  document.querySelectorAll('.faq .box-container .box h3').forEach(headings =>{
    headings.onclick = () =>{
      headings.parentElement.classList.toggle('active');
    }
  });
</script>


<?php include 'components/message.php'; ?>

</body>
</html>