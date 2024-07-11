<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `features` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['features_deleted'] = 'Features deleted successfully';
header('location:features.php')
?>