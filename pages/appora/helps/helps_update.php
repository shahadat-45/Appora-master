<?php
session_start();
require '../../../element/db_connection.php';

$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['photo'];
$link = $_POST['link'];

$photo = "SELECT * FROM helps_header WHERE id = 1 ";
$photo_result = mysqli_query($db_connection, $photo);
$photo_assoc = mysqli_fetch_assoc($photo_result);

$after_explode = explode('.', $image['name']);
$extension = end($after_explode);

if ($image['name'] == null) {

    $update = "UPDATE helps_header SET title = '$title', description = '$description', link = '$link' WHERE id = 1 ";
    mysqli_query($db_connection, $update);
    $_SESSION['update_content'] = 'Update helps content successfully';
    header('location:helps.php');    
}
else{
    if ($image['size'] < 1000000) {

        $current_img = "../../../images/" . $photo_assoc['photo'];
        unlink($current_img);
    
        $new_image = 'helps' . random_int(1000, 100000). '.' . $extension;
        $new_address = "../../../images/" . $new_image;
        move_uploaded_file($image['tmp_name'], $new_address);
    
        $update = "UPDATE helps_header SET photo = '$new_image', title = '$title', description = '$description', link = '$link' WHERE id = 1 ";
        mysqli_query($db_connection, $update);
    
        $_SESSION['photo_updated'] = "Update photo successfully";
        header('location:helps.php');
    }
    else{
        $_SESSION['size_error'] = 'Photo must be less then 1 MB';
        header('location:helps.php');
    }
}



?>