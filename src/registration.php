<?php
session_start();

// Generating CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Assuming you have a function to handle database connection
include 'database-data.sql';

// Registration logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF Token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password for security
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $passwordHash]);

    echo 'Registered successfully!';
    // Redirect to login page or home page
}
?>