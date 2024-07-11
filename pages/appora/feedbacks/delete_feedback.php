<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `feedbacks` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['feedbacks_deleted'] = 'Feedback deleted successfully';
header('location:feedbacks.php')
?>