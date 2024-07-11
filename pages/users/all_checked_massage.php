<?php session_start();
require '../../element/db_connection.php';

$checked = $_POST['foo'];

if ($_POST['btn'] == 1) {
    foreach ($checked as $key => $check) {
    $update = "UPDATE massages SET status = '1' WHERE id = $check ";
    mysqli_query($db_connection, $update);
    }
    header('location:massage.php');
}

else if ($_POST['btn'] == 2) {
    foreach ($checked as $key => $check) {
        $delete = "DELETE FROM massages WHERE id = $check";
        mysqli_query($db_connection, $delete);
    }
    header('location:massage.php');
}
else{
    header('location:massage.php');
}
?>