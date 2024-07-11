<?php
    session_start();
    require '../../element/db_connection.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM users WHERE id=$id";
    $after_assoc = mysqli_query($db_connection, $select);
    $after_fetch_assoc = mysqli_fetch_assoc($after_assoc);


    if($after_fetch_assoc['status']==0){
        $update = "UPDATE users SET status = '1' WHERE id = $id ";
        mysqli_query($db_connection, $update);
    }
    else{
        $update = "UPDATE users SET status = '0' WHERE id = $id ";
        mysqli_query($db_connection, $update);
    }

    header('location:../../dashboard.php');
?>