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

$id = $_GET['id'];

$team = "SELECT * FROM teams WHERE id = $id ";
$team_result = mysqli_query($db_connection, $team);
$team_result_assoc = mysqli_fetch_assoc($team_result);

$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);

if (empty($name)) {
    $_SESSION['name_null'] = 'Name is require';
    header('location:update_page.php');
}
else if (empty($designation)) {
    $_SESSION['designation_null'] = 'Designation is require';
    header('location:update_page.php');
}

else{
    if ($photo['name'] == null) {

         $update = "UPDATE `teams` SET `name`='$name',`designation`='$designation',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`behance`='$behance' WHERE id = $id ";
        mysqli_query($db_connection, $update);

        $_SESSION['member_updated'] = "Member information updated successfully";
        header('location:teams.php');   
    }
    else{
        if ($photo['size'] < 1000000) {

        $current_img = "../../../images/team/" . $team_result_assoc['photo'];
        unlink($current_img);

        $new_image = 'team' . random_int(1000, 9000). '.' . $extension;
        $new_address = "../../../images/team/" . $new_image;
        move_uploaded_file($photo['tmp_name'], $new_address);

        $update = "UPDATE `teams` SET `name`='$name', `photo` = '$new_image', designation`='$designation',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`behance`='$behance' WHERE id = $id ";
        mysqli_query($db_connection, $update);

        $_SESSION['member_updated'] = "Member information updated successfully";
        header('location:teams.php');
    }
    else{
        $_SESSION['img_size_err'] = "Image must less then 1 MB";
        header('location:teams.php');
    }
    }
}