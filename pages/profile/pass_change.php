<?php
session_start();
require '../../element/db_connection.php';

$old_pass = $_POST['old_password'];
$new_pass = $_POST['new_password'];
$con_pass = $_POST['con_password'];
$id = $_GET['id'];

$hash_password = password_hash($new_pass, PASSWORD_DEFAULT);

$select = "SELECT * FROM users WHERE id = $id";
$select_result = mysqli_query($db_connection, $select);
$select_assoc = mysqli_fetch_assoc($select_result);

if (empty($old_pass)) {
    $_SESSION['old_pass_null'] = 'Enter your current password';
    header('location:profile.php');
}
else{
    if (password_verify($old_pass, $select_assoc['password'])) {
        if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $new_pass)) {
            if ($new_pass == $con_pass) {
                $update = "UPDATE users SET password='$hash_password'";
                mysqli_query($db_connection, $update);
                $_SESSION['pass_changed'] = 'Password change successfully';
                header('location:profile.php');
            }
            else{
                $_SESSION['con_pass_not_match'] = 'Password and confirm password not match!'; 
                header('location:profile.php');
            }
        }
        else{
            $_SESSION['pass_error'] = 'The password does not meet the requirements!';
            header('location:profile.php');
        }
    }
    else{
        $_SESSION['old_pass_error'] = 'Old password is incorrect!';
        header('location:profile.php');
    }
}





?>