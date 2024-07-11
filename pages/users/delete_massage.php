<?php session_start();
require '../../element/db_connection.php';

$id = $_GET['id'];

$massage = "SELECT * FROM massages WHERE id = $id ";
$massage_result = mysqli_query($db_connection, $massage);
$massage_assoc = mysqli_fetch_assoc($massage_result);


$delete = "DELETE FROM massages WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['massage_deleted'] = 'Massage deleted successfully';
header('location: massage.php')
?>