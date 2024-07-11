<?php session_start();
require '../../../element/db_connection.php';


$name = $_POST['name'];
$description = $_POST['description'];
$image = $_FILES['photo'];
$break = false;

$after_explode = explode('.', $image['name']);
$extension = end($after_explode);

if (empty($name)) {
    $_SESSION['name_emt'] = '';
    $break = true;
}
else if (empty($description)) {
    $_SESSION['description_emt'] = '';
    $break = true;
}
else{
    if ($image['size'] < 1000000) {

    $new_image = 'feedback' . random_int(1000, 10000). '.' . $extension;
    $new_address = "../../../images/feedback/" . $new_image;
    move_uploaded_file($image['tmp_name'], $new_address);

    $insert = "INSERT INTO feedbacks (name, description, photo) VALUES ('$name', '$description', '$new_image')";
    mysqli_query($db_connection, $insert);

    $_SESSION['feedback_added'] = "Add feedback successfully";
    header('location:feedbacks.php');
    }
    else{
        $_SESSION['img_size_err'] = "Image must less then 1 MB";
        header('location:feedbacks.php');
    }
}
if ($break == true) {
    header('location:feedbacks.php');
}







?>