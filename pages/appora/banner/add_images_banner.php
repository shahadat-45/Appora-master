<?php session_start();
require '../../../element/db_connection.php';

$image = $_FILES['image'];


$after_explode = explode('.', $image['name']);
$extension = end($after_explode);

if ($image['size'] < 1000000) {

    $new_image = 'banner' . random_int(1000, 10000). '.' . $extension;
    $new_address = "../../../images/banner/" . $new_image;
    move_uploaded_file($image['tmp_name'], $new_address);

    $insert = "INSERT INTO banner_img (photo) VALUES ('$new_image')";
    mysqli_query($db_connection, $insert);

    $_SESSION['banner_updated'] = "Add banner image successfully";
    header('location:banner.php');
}
else{
    $_SESSION['img_size_err'] = "Image must less then 1 MB";
    header('location:banner.php');
}






?>