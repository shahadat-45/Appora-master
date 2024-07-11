<?php
session_start();
require '../../../element/db_connection.php';

$main_title = $_POST['main_title'];
$main_description = $_POST['main_description'];
$title_2nd = $_POST['2nd_title'];
$description_2nd = $_POST['2nd_description'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$update = "UPDATE contact SET title_h2 = '$main_title', description_h2 = '$main_description', title_h3 = '$title_2nd', description_h3 = '$description_2nd', address = '$address', email = '$email', phone = '$phone' WHERE id = 1 ";
mysqli_query($db_connection, $update);
$_SESSION['update_contant_info'] = 'Contact information update successfully';
header('location:contact_us.php');    
?>