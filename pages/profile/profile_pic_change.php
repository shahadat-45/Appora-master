<?php 
session_start();
require '../../element/db_connection.php';

$id = $_GET['id'];
$image = $_FILES['profile_image'];

$after_explode = explode('.', $image['name']);
$extension = end($after_explode);

$select = "SELECT * FROM users WHERE id = $id";
$select_result = mysqli_query($db_connection, $select);
$select_assoc = mysqli_fetch_assoc($select_result);

$brake = false;

if ($select_assoc['photo'] == null) {

    if ($image['size'] < 1000000) {
    $new_image = 'face' . random_int(10, 100). '.' . $extension;
    $new_address = "../../images/profile/" . $new_image;
    move_uploaded_file($image['tmp_name'], $new_address);

    $update = "UPDATE users SET photo = '$new_image' WHERE id = $id";
    mysqli_query($db_connection, $update);

    header('location:profile.php');
    }
    else{
        $brake = true;
        header('location:profile.php');
    }

}else {
    if ($image['size'] < 1000000) {
        $current_image = "../../images/profile/" . $select_assoc['photo'];
        unlink($current_image);

        $new_name = 'face' . random_int(10, 100). '.' . $extension;
        $new_location = "../../images/profile/" . $new_name;
        move_uploaded_file($image['tmp_name'], $new_location);

        $update = "UPDATE users SET photo = '$new_name' WHERE id = $id";
        mysqli_query($db_connection, $update);

        header('location:profile.php');
    }
    else{
        $brake = true;
        header('location:profile.php');
    }
}
if ($brake == true) {
    $_SESSION['size_error'] = "Image must less then 1 MB";
}

?>