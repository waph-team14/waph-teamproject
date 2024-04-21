<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Generating CSRF Token
//if (empty($_SESSION['csrf_token'])) {
  //  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
//}

// Assuming you have a function to handle database connection
//include 'database-data.sql';
// Database connection
$servername = "localhost";
$username = "waphteam14"; // Your MySQL username
$password = "1234"; // Your MySQL password
$dbname = "waph_team"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Registration logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF Token
   // if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
     //   die('CSRF token validation failed');
    //}
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Hash the password for security
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the database
    $stmt = $pdo->prepare("INSERT INTO users (email,name, password,phone) VALUES (?,?,? ?)");
    $stmt->execute([,$email,$name, $passwordHash,$phone]);

    echo 'Registered successfully!';
    // Redirect to login page or home page
}
?>