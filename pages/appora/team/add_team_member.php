<?php
session_start();
require '../../../element/db_connection.php';

$name = $_POST['name'];
$designation = $_POST['designation'];
$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$linkedin = $_POST['linkedin'];
$behance = $_POST['behance'];
$photo = $_FILES['photo'];

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);

if (empty($name)) {
    $_SESSION['name_null'] = 'Name is require';
    header('location:teams.php');
}
else if (empty($designation)) {
    $_SESSION['designation_null'] = 'Designation is require';
    header('location:teams.php');
}
elseif ($photo['name'] == null) {
    $_SESSION['photo_null'] = 'Photo is require !';
    header('location:teams.php');
}
else{
    if ($photo['size'] < 1000000) {

        $new_image = 'team' . random_int(1000, 9000). '.' . $extension;
        $new_address = "../../../images/team/" . $new_image;
        move_uploaded_file($photo['tmp_name'], $new_address);

        $insert = "INSERT INTO `teams`(name, designation, photo, facebook, twitter, linkedin, behance) VALUES ('$name','$designation','$new_image','$facebook','$twitter','$linkedin','$behance')";
        mysqli_query($db_connection, $insert);

        $_SESSION['teams_added'] = "Add team member successfully";
        header('location:teams.php');
    }
    else{
        $_SESSION['img_size_err'] = "Image must less then 1 MB";
        header('location:teams.php');
    }
}








?>