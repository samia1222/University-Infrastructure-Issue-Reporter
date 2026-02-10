<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}

// Display the admin panel content
echo "Welcome to the Admin Panel, Admin ID: " . $_SESSION['user_id'];
?>
