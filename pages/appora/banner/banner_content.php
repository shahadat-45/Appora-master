<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['title'];
$description = $_POST['description'];
$app_store = $_POST['app_store'];
$play_store = $_POST['play_store'];


$update = "UPDATE banner_content SET title='$title', description='$description', link1='$app_store', link2='$play_store' WHERE id = 1";
mysqli_query($db_connection, $update);

$_SESSION['banner_content_updated'] = "Update content successfully";

header('location:banner.php');
?>