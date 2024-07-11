<?php session_start();
require '../../../element/db_connection.php';

$image = $_FILES['image'];


$after_explode = explode('.', $image['name']);
$extension = end($after_explode);

if ($image['size'] < 2000000) {

    $new_image = 'screenshot' . random_int(1000, 10000). '.' . $extension;
    $new_address = "../../../images/screenshots/" . $new_image;
    move_uploaded_file($image['tmp_name'], $new_address);

    $insert = "INSERT INTO screenshots (photo) VALUES ('$new_image')";
    mysqli_query($db_connection, $insert);

    $_SESSION['screenshots_added'] = "Add screenshots successfully";
    header('location:screenshots.php');
}
else{
    $_SESSION['img_size_err'] = "Image must less then 2 MB";
    header('location:screenshots.php');
}






?>