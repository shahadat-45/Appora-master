<?php
session_start();
require '../../element/db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$found_email = "SELECT COUNT(*) as total FROM users WHERE email = '$email' ";
$select_res = mysqli_query($db_connection, $found_email);
$after_assoc_email = mysqli_fetch_assoc($select_res);

if ($after_assoc_email['total'] == 1) {
    if ($password) {
    $select = "SELECT * FROM users WHERE email = '$email'";
    $select_email = mysqli_query($db_connection, $select);
    $after_email_result = mysqli_fetch_assoc($select_email);
    $_SESSION['loged_id'] = $after_email_result['id'];

    if (password_verify($password, $after_email_result['password'])) {
        $_SESSION['login_success'] = '';
        $_SESSION['admin_page'] = '';
        $_SESSION['profile_email'] = $after_email_result['email'];
        header('location:../../dashboard.php');
    }
    else{
       $_SESSION['pass_not_match'] = "Password Not Match" ;
       header('location:login.php');
    }
    }
    else{
        $_SESSION['password_error'] = "Please enter your password";
        header('location:login.php');
    }    
}
else{
    if (empty($email)) {
        $_SESSION['email_null'] = "Please enter your email";
        header('location:login.php');
    }
    else{
        $_SESSION['email_not_exist'] = "Email does not exist";
        header('location:login.php');
    }
}



?>