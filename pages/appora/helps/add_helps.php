<?php session_start();
require '../../../element/db_connection.php';

$content = $_POST['content'];

if ($content) {
    $insert = "INSERT INTO helps (description) VALUES ('$content')";
    mysqli_query($db_connection, $insert);
    $_SESSION['helps_added'] = 'Helps added successfully';
    header('location:helps.php');
}
else {
    header('location:helps.php');
}


?>