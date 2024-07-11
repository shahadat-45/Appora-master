<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `headers` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['item_deleted'] = 'User deleted successfully';
header('location:header.php')
?>