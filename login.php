<?php

include 'components/connect.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   // Check for users
   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email =? AND password =?");
   $select_user->execute([$email, $pass]);

   if($select_user->rowCount() > 0){
      $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
      if($fetch_user['status'] == 'active'){
         setcookie('user_id', $fetch_user['id'], time() + 3600);
         header('location:quote.php');
      }else{
         $error_msg[] = 'Your account is pending approval. Please wait for admin approval.';
      }
   } else {
      // Check for admins
      $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE email =? AND password =?");
      $select_admin->execute([$email, $pass]);

      if($select_admin->rowCount() > 0){
         $fetch_admin = $select_admin->fetch(PDO::FETCH_ASSOC);
         if($fetch_admin['status'] == 'active'){
            setcookie('admin_id', $fetch_admin['id'], time() + 3600);
            header('location:adminq.php'); 
         }else{
            $error_msg[] = 'Your admin account is pending approval. Please wait for approval.';
         }
      } else {
         $error_msg[] = 'Invalid email or password.';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
<?php include 'components/login_header.php'; ?>

<!-- login section starts  -->

<section class="form-container">

   <form action="" method="post">
      <h3>Welcome Back!</h3>
      <input type="email" name="email" required maxlength="50" placeholder="Enter Your Email" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="Enter Your Password" class="box">
      <p>Don't Have An Account? <a href="register.php">Register Now</a></p>
      <input type="submit" value="login now" name="submit" class="btn">
   </form>



</section>

<!-- login section ends -->

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
        <a href="#"><i class="fas fa-phone"> </i>+91 90745 40219</a>
        <a href="#"><i class="fas fa-phone"> </i>+91 97781 42219</a>
        <a href="#"><i class="fas fa-envelope"> </i>Mishlerpvtltd@gmail.com</a>
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

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>