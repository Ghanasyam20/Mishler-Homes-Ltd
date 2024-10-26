<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
    exit;
}

$success_msg = [];
$warning_msg = [];

if (isset($_POST['delete'])) {
    $delete_id = $_POST['request_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `requests` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if ($verify_delete->rowCount() > 0) {
        $delete_request = $conn->prepare("DELETE FROM `requests` WHERE id = ?");
        $delete_request->execute([$delete_id]);
        $_SESSION['success_msg'] = 'Enquiry Deleted Successfully!'; 
        header('location:enquiries.php'); 
        exit;
    } else {
        $_SESSION['warning_msg'] = 'Enquiry Deleted Already!'; 
        header('location:enquiries.php'); 
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/estyle.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>

    <section class="reques">
        <h1 class="heading">All Enquiries</h1>

        <div class="box-container">
            <?php
            $select_requests = $conn->prepare("SELECT * FROM `requests` WHERE sender = ?");
            $select_requests->execute([$user_id]);

            if ($select_requests->rowCount() > 0) {
                while ($fetch_request = $select_requests->fetch(PDO::FETCH_ASSOC)) {
                    $select_property = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
                    $select_property->execute([$fetch_request['property_id']]);
                    $fetch_property = $select_property->fetch(PDO::FETCH_ASSOC);

                    $total_images = 0;
                    if (!empty($fetch_property['image_02'])) {
                        $image_coutn_02 = 1;
                    } else {
                        $image_coutn_02 = 0;
                    }
                    if (!empty($fetch_property['image_03'])) {
                        $image_coutn_03 = 1;
                    } else {
                        $image_coutn_03 = 0;
                    }
                    if (!empty($fetch_property['image_04'])) {
                        $image_coutn_04 = 1;
                    } else {
                        $image_coutn_04 = 0;
                    }
                    if (!empty($fetch_property['image_05'])) {
                        $image_coutn_05 = 1;
                    } else {
                        $image_coutn_05 = 0;
                    }

                    $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);
                    ?>
                
                        <form action="" method="POST">
                        <div class="box">
                            <input type="hidden" name="request_id" value="<?= $fetch_request['id']; ?>">
                            <div class="thumb">
                                <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
                                <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
                            </div>
                            
                                <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
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
                                <div class="flex-btn">
                                    <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">View Property</a>
                                    <input type="submit" value="Delete Enquiry" class="btn" onclick="return confirm('Remove this Request?');" name="delete">
                                </div>
                            
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="empty">You Have Sent No Enquiries!</p>';
            }
            ?>
        </div>
    </section>

    <?php if (!empty($success_msg)) { ?>
        <div class="success-msg">
            <?php foreach ($success_msg as $msg) { ?>
                <p><?= $msg; ?></p>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (!empty($warning_msg)) { ?>
        <div class="warning-msg">
            <?php foreach ($warning_msg as $msg) { ?>
                <p><?= $msg; ?></p>
            <?php } ?>
        </div>
    <?php } ?>

</body>
</html>