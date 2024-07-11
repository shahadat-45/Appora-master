<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];

$screenshots = "SELECT * FROM screenshots WHERE id = $id ";
$screenshots_result = mysqli_query($db_connection, $screenshots);
$screenshots_assoc = mysqli_fetch_assoc($screenshots_result);


$delete = "DELETE FROM screenshots WHERE id = $id";
mysqli_query($db_connection, $delete);

$current_img = "../../../images/banner/" . $screenshots_assoc['photo'];
unlink($current_img);

$_SESSION['image_deleted'] = 'Screenshots deleted successfully';
header('location:screenshots.php')
?>