<?php
    session_start();
    require '../../../element/db_connection.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM feedbacks WHERE id=$id";
    $after_assoc = mysqli_query($db_connection, $select);
    $after_fetch_assoc = mysqli_fetch_assoc($after_assoc);

    $stars = $after_fetch_assoc['status'] + 1 ;


    if($after_fetch_assoc['status'] == 5){        
        header('location:feedbacks.php');
    }
    else{
        $update = "UPDATE feedbacks SET status = '$stars' WHERE id = $id ";
        mysqli_query($db_connection, $update);
    }

    header('location:feedbacks.php');
?>