<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];

$title = $_POST['title'];
$number = $_POST['number'];
$unit = $_POST['unit'];

$update = "UPDATE video_views SET title='$title', number='$number', unit='$unit' WHERE id = $id";
mysqli_query($db_connection, $update);

$_SESSION['criteria_updated'] = 'Update criteria successfully';
header('location:videos.php')



?>