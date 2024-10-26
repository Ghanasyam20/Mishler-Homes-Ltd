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
   <link rel="stylesheet" href="css/contact.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

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
         <input type="submit" value="Send Message" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>How to Cancel Booking?</span><i class="fas fa-angle-down"></i></h3>
         <p>Once successfully logged into your account, one can find the option from the dashboard.</p>
      </div>

      <div class="box active">
         <h3><span>When will I get the Possession?</span><i class="fas fa-angle-down"></i></h3>
         <p>Depends on the availability of the plot.</p>
      </div>

      <div class="box">
         <h3><span>Where can I Pay the Rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>Online platforms for payment of rent will be added shortly</p>
      </div>

      <div class="box">
         <h3><span>How to Contact with the Buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>Can be contacted from the listing of that property. Required basic details are provided there.</p>
      </div>

      <div class="box">
         <h3><span>Why my Listing not Showing Up?</span><i class="fas fa-angle-down"></i></h3>
         <p>Try Logging in once more. If Error persists, Get in Touch with Us.</p>
      </div>

      <div class="box">
         <h3><span>How to Promote my Listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>Use most Appropriate keywords that best describe your Structure.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="js/bg.js"></script>
<?php include 'components/footer.php'; ?>

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