<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['title'];
$number = $_POST['number'];
$unit = $_POST['unit'];

$insert = "INSERT INTO video_views (title, number, unit) VALUES ('$title', '$number', '$unit')";
mysqli_query($db_connection, $insert);

$_SESSION['criteria_added'] = "Criteria added successfully";
header('location: videos.php');
?>