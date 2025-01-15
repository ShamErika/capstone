<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION = array();

// Delete the session cookie
if (session_id() !== "" || isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to the login page or home page
header("Location: ../index.php"); // Adjust path if needed
exit();
?>

