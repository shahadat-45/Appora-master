<?php
session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$content = $_POST['content'];

$update = "UPDATE helps SET description = '$content' WHERE id = $id ";
mysqli_query($db_connection, $update);

$_SESSION['update_content'] = 'Update helps content successfully';
header('location:helps.php');
?>