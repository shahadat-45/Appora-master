<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `helps` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['content_deleted'] = 'helps content delete successfully';
header('location:helps.php')
?>