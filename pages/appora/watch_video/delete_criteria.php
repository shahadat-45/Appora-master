<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `video_views` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['criteria_deleted'] = 'Video views criteria successfully';
header('location:videos.php')
?>