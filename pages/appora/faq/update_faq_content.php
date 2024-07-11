<?php
session_start();
require '../../../element/db_connection.php';

$id = $_GET['id'];
$answer = $_POST['answer'];
$question = $_POST['question'];


$update = "UPDATE faqs SET answer = '$answer', question = '$question' WHERE id = $id ";
mysqli_query($db_connection, $update);

$_SESSION['update_faq'] = 'Update faqs content successfully';
header('location:faq.php');
?>