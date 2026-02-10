<?php
// Database connection settings
// IMPORTANT: Copy this file to db_connection.php and update with your actual credentials
// DO NOT commit db_connection.php to version control

$servername = "localhost";
$username = "root";              // Replace with your MySQL username
$password = "";                  // Replace with your MySQL password
$dbname = "AIU_issue_reporter"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
