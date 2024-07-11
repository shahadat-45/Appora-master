<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];

$banner_img = "SELECT * FROM banner_img WHERE id = $id ";
$banner_img_result = mysqli_query($db_connection, $banner_img);
$banner_img_assoc = mysqli_fetch_assoc($banner_img_result);


$delete = "DELETE FROM banner_img WHERE id = $id";
mysqli_query($db_connection, $delete);

$current_img = "../../../images/banner/" . $banner_img_assoc['photo'];
unlink($current_img);

$_SESSION['image_deleted'] = 'Image deleted successfully';
header('location:banner.php')
?>