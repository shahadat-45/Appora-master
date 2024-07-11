<?php
session_start();
require '../../../element/db_connection.php';

$description = $_POST['description'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$linkedin = $_POST['linkedin'];
$pinterest = $_POST['pinterest'];
$photo = $_FILES['photo'];


$footer = "SELECT * FROM footer_content WHERE id = 1 ";
$footer_result = mysqli_query($db_connection, $footer);
$footer_result_assoc = mysqli_fetch_assoc($footer_result);

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);


if ($photo['name'] == null) {

    $update = "UPDATE `footer_content` SET `description`='$description',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`pinterest`='$pinterest' WHERE id = 1 ";
    mysqli_query($db_connection, $update);

    $_SESSION['footer_updated'] = "Footer information updated successfully";
    header('location:footer.php');
}
else{
    if ($photo['size'] < 1000000) {

    $current_img = "../../../images/logo/" . $footer_result_assoc['photo'];
    unlink($current_img);

    $new_image = 'footer' . random_int(1000, 9000). '.' . $extension;
    $new_address = "../../../images/logo/" . $new_image;
    move_uploaded_file($photo['tmp_name'], $new_address);

    $update = "UPDATE `footer_content` SET description='$description', `facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`pinterest`='$pinterest', photo = '$new_image' WHERE id = 1 ";
    mysqli_query($db_connection, $update);

    $_SESSION['footer_updated'] = "Footer information updated successfully";
    header('location:footer.php');
}
else{
    $_SESSION['img_size_err'] = "Footer logo must less then 1 MB";
    header('location:footer.php');
}
}  