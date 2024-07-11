<?php 
session_start();
require '../../element/db_connection.php';

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cnfm_password = $_POST['cnfm_password'];
$brake = false;

if ($brake == false) {
    header('location:register.php');
}
//Name fild validation
if (empty($name)) {
    $brake;
    $_SESSION['name_error'] = 'Please enter your name!';
}else{
    $_SESSION['good_name'] = $name;
}
//Email fild validation
if (empty($email)) {
    $brake;
    $_SESSION['email_null'] = 'Please enter your email!';
}else{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['good_email'] = $email;
    }
    else{
        $brake;
        $_SESSION['email_error'] = 'Please enter a valid email !';
    }
}
//Password fild validation
if (empty($password)) {
    $brake;
    $_SESSION['pass_null'] = 'Please enter your password !';
}else {
    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
        //Confirm Password fild validation
        if ($cnfm_password == $password) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO  users (name, email, password) VALUES ('$name','$email','$hash_password')";
            mysqli_query($db_connection, $insert);
            $_SESSION['success'] = '';
            header("location:login.php");
        }else{
           $brake;
            $_SESSION['pass_not_match'] = 'Password and confirm password not match !'; 
        }        
    }
    else{
        $brake;
        $_SESSION['pass_error'] = 'The password does not meet the requirements!';
    }
}



?>