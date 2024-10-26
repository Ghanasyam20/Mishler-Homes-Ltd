<?php
include 'components/connect.php';

if (isset($_POST['profile_picture'])) {
    $user_id = $_COOKIE['user_id'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
  
    $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
    $select_user->execute([$user_id]);
    $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
  
    if ($fetch_user) {
      $previous_profile_picture = $fetch_user['profile_picture'];
      $previous_profile_picture_path = 'profile_uploads/'.$previous_profile_picture;
  
      if (file_exists($previous_profile_picture_path)) {
        if (!unlink($previous_profile_picture_path)) {
          echo 'Error deleting previous profile picture: '.error_get_last()['message'];
        } else {
          echo 'Previous profile picture deleted successfully';
        }
      } else {
        echo 'Previous profile picture does not exist';
      }
  
      $update_profile_picture = $conn->prepare("UPDATE `users` SET profile_picture = ? WHERE id = ?");
      $update_profile_picture->execute([$profile_picture, $user_id]);
  
      if ($update_profile_picture) {
        move_uploaded_file($profile_picture_tmp, 'profile_uploads/'.$profile_picture);
        echo 'success';
      } else {
        echo 'error';
      }
    } else {
      echo 'error';
    }
  }
?>