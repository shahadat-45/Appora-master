<?php
session_start();
require '../../element/db_connection.php';

$name = $_POST['username'];
$address = $_POST['address'];
$bio = $_POST['bio'];
$gender = $_POST['gender'];
$id = $_SESSION['loged_id'];

$update = "UPDATE users SET name='$name', address='$address', bio = '$bio', gender='$gender' WHERE id = $id ";
mysqli_query($db_connection, $update);
$_SESSION['update_success'] = 'Profile information update successfully';
header('location:profile.php');
