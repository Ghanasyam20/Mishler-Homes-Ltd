<?php
// Configuration
$upload_dir = 'uploads/';
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$max_size = 1024 * 1024; // 1MB

if (isset($_FILES['profile_picture'])) {
  $file = $_FILES['profile_picture'];

  // Validate the file
  if (!in_array($file['type'], $allowed_types)) {
    $response = ['success' => false, 'message' => 'Invalid file type'];
  } elseif ($file['size'] > $max_size) {
    $response = ['success' => false, 'message' => 'File too large'];
  } else {
    // Generate a unique filename
    $filename = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

    // Upload the file
    $upload_file = $upload_dir . $filename;
    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
      $image_url = '/' . $upload_file;
      $response = ['success' => true, 'image_url' => $image_url];
    } else {
      $response = ['success' => false, 'message' => 'Failed to upload image'];
    }
  }
} else {
  $response = ['success' => false, 'message' => 'No file uploaded'];
}

echo json_encode($response);