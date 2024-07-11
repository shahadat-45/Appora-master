<?php
require '../../../element/db_connection.php';

$item = $_POST['item'];

$insert = "INSERT INTO headers (item) VALUES ('$item')";
mysqli_query($db_connection, $insert);

header('location:header.php');

?>