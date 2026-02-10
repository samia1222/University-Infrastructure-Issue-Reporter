<?php
// Include the database connection
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_number = $_POST['id_number'];
    $role = $_POST['role'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert user data
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, id_number, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $hashed_password, $id_number, $role);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to login page on successful sign-up
        header("Location: login.html");
        exit();
    } else {
        // Error message
        echo "Error: " . $stmt->error;
    }
}
?>
