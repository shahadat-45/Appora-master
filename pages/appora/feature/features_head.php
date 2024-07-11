<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['feature_h2'];
$description = $_POST['description'];

$update = "UPDATE features_head SET title='$title', description='$description' WHERE id = 1";
mysqli_query($db_connection, $update);

$_SESSION['update_feature_head'] = 'Update features header successfully';
header('location:features.php')

?>