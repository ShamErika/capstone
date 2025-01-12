<?php
$host = 'localhost';
$db = 'dengue_cases'; // Replace with your database name
$user = 'root'; // Default XAMPP username
$pass = ''; // Default XAMPP password (empty)

// Create a MySQL connection
$conn = new mysqli($host, $user, $pass, $db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
