<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['title'];
$description = $_POST['description'];

$update = "UPDATE ss_content SET title='$title', description='$description' WHERE id = 1";
mysqli_query($db_connection, $update);

$_SESSION['content_updated'] = "Update content successfully";

header('location:screenshots.php');
?>