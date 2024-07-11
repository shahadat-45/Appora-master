<?php session_start();
require '../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `users` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['user_deleted'] = 'User deleted successfully';
header('location:../../dashboard.php')
?>