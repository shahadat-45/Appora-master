<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['feedback_h2'];
$description = $_POST['description'];

$update = "UPDATE feedback_header SET title='$title', description='$description' WHERE id = 1";
mysqli_query($db_connection, $update);

$_SESSION['update_feedback_head'] = 'Update feedbacks header successfully';
header('location:feedbacks.php')

?>