<?php
session_start(); // Start the session
session_destroy(); // Destroy the session to log out the user
header("Location: index.php"); // Redirect to the main site (index.php)
exit();
?>