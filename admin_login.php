<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "password") {
        $_SESSION['loggedin'] = true;
        header("Location: update_data.php"); 
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>
