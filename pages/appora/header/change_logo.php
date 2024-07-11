<?php 
session_start();
require '../../../element/db_connection.php';

$image = $_FILES['logo'];

$logo = "SELECT * FROM header_logo WHERE id = 1 ";
$logo_result = mysqli_query($db_connection, $logo);
$logo_assoc = mysqli_fetch_assoc($logo_result);

$after_explode = explode('.', $image['name']);
$extension = end($after_explode);

if ($image['size'] < 1000000) {

    $current_img = "../../../images/logo/" . $logo_assoc['photo'];
    unlink($current_img);

    $new_image = 'logo' . random_int(1000, 10000). '.' . $extension;
    $new_address = "../../../images/logo/" . $new_image;
    move_uploaded_file($image['tmp_name'], $new_address);

    $update = "UPDATE header_logo SET photo = '$new_image' WHERE id = 1 ";
    mysqli_query($db_connection, $update);

    $_SESSION['logo_updated'] = "Update logo successfully";
    header('location:header.php');
}
else{    
    header('location:header.php');
}

?>