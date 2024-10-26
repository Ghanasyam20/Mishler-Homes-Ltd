<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   if(strlen($number) != 10) {
      $warning_msg[] = 'Invalid mobile number. Please enter a 10-digit number.';
   }
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);   

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);
   
   $profile_pic = $_FILES['profile_pic']['name'];
   $profile_pic = filter_var($profile_pic, FILTER_SANITIZE_STRING);
   $profile_pic_ext = pathinfo($profile_pic, PATHINFO_EXTENSION);
   $rename_profile_pic = create_unique_id().'.'.$profile_pic_ext;
   $profile_pic_tmp_name = $_FILES['profile_pic']['tmp_name'];
   $profile_pic_size = $_FILES['profile_pic']['size'];
   $profile_pic_folder = 'profile_uploads/'.$rename_profile_pic;

   if($select_users->rowCount() > 0){
      $warning_msg[] = 'Email Already Taken!';
   }else{
      if($pass != $c_pass){
         $warning_msg[] = 'Password Not Matched!';
      }else{

         if($profile_pic_size > 10000000){
            $warning_msg[] = 'Size Too Large!';
         }

         // Check if there are any error messages
         if(empty($warning_msg)) {
            $insert_profile = $conn->prepare("INSERT INTO `users`(id, name, number, email, password, profile_picture, status) VALUES(?,?,?,?,?,?,'pending')"); 
            $insert_profile->execute([$id, $name, $number, $email, $c_pass, $rename_profile_pic]);
            move_uploaded_file($profile_pic_tmp_name, $profile_pic_folder);
            if($insert_profile){
               $success_msg[] = 'Registration successful! Please wait for admin approval.';
            }else{
               $error_msg[] = 'Something Went Wrong!';
            }
         }
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
         <title>Register</title>
      
         <!-- font awesome cdn link  -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      
         <!-- custom css file link  -->
         <link rel="stylesheet" href="css/reg.css">
      
      </head>
      <body>
         
      <?php include 'components/login_header.php'; ?>
      
      <!-- register section starts  -->
      
      <section class="form-container">
      
         <form action="" method="POST" enctype="multipart/form-data">
            <h3>Create An Account!</h3>
            <input type="tel" name="name" required maxlength="50" placeholder="Enter Your Name" class="box">
            <input type="email" name="email" required maxlength="50" placeholder="Enter Your Email" class="box">
            <input type="text" name="number" inputmode="numeric" placeholder="Enter Your Number" class="box">
            <input type="password" name="pass" required maxlength="20" placeholder="Enter Your Password" class="box">
            <input type="password" name="c_pass" required maxlength="20" placeholder="Confirm Your Password" class="box">
            <p>Choose a Profile Picture <span>*</span></p>
            <div class="preview-container">
               <img id="profile-pic-preview" src="" alt="" class="preview-image" style="display: none;">
            </div>
            <label class="file-upload-btn">
               Browse
               <input type="file" name="profile_pic" class="input" accept="image/*" required id="profile-pic-input">
            </label>

            <p>Already have an Account? <a href="login.php">Login</a></p>
            <input type="submit" value="register now" name="submit" class="btn">
         </form>
      
      </section>
      
      <!-- register section ends -->
      
      <script>

      const profilePicInput = document.getElementById('profile-pic-input');
      const profilePicPreview = document.getElementById('profile-pic-preview');

      profilePicInput.addEventListener('change', function() {
      const file = profilePicInput.files[0];
      const reader = new FileReader();
      reader.onload = function() {
         const imageDataUrl = reader.result;
         profilePicPreview.src = imageDataUrl;
         profilePicPreview.style.display = 'block'; // show the img element when an image is selected
      };
      reader.readAsDataURL(file);
      });
</script>
      
      
      
      
      
      
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      
      
      
      <!-- custom js file link  -->
      <script src="js/script.js"></script>
      
      <?php include 'components/message.php'; ?>
      
      </body>
      </html>
