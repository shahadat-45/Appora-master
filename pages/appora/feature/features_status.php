<?php
    session_start();
    require '../../../element/db_connection.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM features WHERE id=$id";
    $after_assoc = mysqli_query($db_connection, $select);
    $after_fetch_assoc = mysqli_fetch_assoc($after_assoc);


    if($after_fetch_assoc['status']==0){
        $update = "UPDATE features SET status = '1' WHERE id = $id ";
        mysqli_query($db_connection, $update);
    }
    else{
        $update = "UPDATE features SET status = '0' WHERE id = $id ";
        mysqli_query($db_connection, $update);
    }

    header('location:features.php');
?>