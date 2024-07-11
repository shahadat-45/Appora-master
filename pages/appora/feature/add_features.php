<?php session_start();
require '../../../element/db_connection.php';

$icon = $_POST['icon'];
$title = $_POST['title'];
$description = $_POST['description'];

$insert = "INSERT INTO features (icon, title, description) VALUES ('$icon', '$title', '$description')";
mysqli_query($db_connection, $insert);

$_SESSION['feature_added'] = "Features added successfully";
header('location: features.php');
?>