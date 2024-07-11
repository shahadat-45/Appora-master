<?php session_start();
require '../../../element/db_connection.php';

$answer = $_POST['answer'];
$question = $_POST['question'];

if ($answer) {
    $insert = "INSERT INTO faqs (answer, question) VALUES ('$answer', '$question')";
    mysqli_query($db_connection, $insert);
    $_SESSION['faq_added'] = 'FAQ added successfully';
    header('location:faq.php');
}
else {
    header('location:faq.php');
}


?>