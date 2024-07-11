<?php session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$delete = "DELETE FROM `teams` WHERE id = $id";
mysqli_query($db_connection, $delete);

$_SESSION['member_deleted'] = 'Team members deleted successfully';
header('location:teams.php')
?>