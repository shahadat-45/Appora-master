<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['title'];
$description = $_POST['description'];
$video_link = $_POST['video_link'];


$update = "UPDATE watch_videos SET title='$title', description='$description', link='$video_link' WHERE id = 1";
mysqli_query($db_connection, $update);

$_SESSION['videos_content_updated'] = "Update video information successfully";

header('location:videos.php');
?>