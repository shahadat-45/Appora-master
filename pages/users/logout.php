<?php session_start();
    unset($_SESSION['admin_page']);
    header('location:/template/pages/users/login.php')
?>