<?php session_start();
require '../../../element/db_connection.php';

$title = $_POST['team_h2'];
$description = $_POST['description'];

$update = "UPDATE team_header SET title='$title', description='$description' WHERE id = 1";
mysqli_query($db_connection, $update);

$_SESSION['update_team_head'] = 'Update teams header successfully';
header('location:teams.php')

?>