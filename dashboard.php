<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Display the dashboard content
echo "Welcome to the dashboard, User ID: " . $_SESSION['user_id'];
?>
