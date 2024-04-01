<?php
include 'csrf_token.php';
include 'database-data.sql'; // Your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validate_csrf_token($_POST['csrf_token'])) {
        // Process the login form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Fetch user from the database and verify password (pseudo code)
         $user = fetch_user_by_email($email);
         if (password_verify($password, $user['password'])) {
        Success: Handle successful login
         } else {
             Failure: Handle incorrect credentials
         }
        
        echo "Login successful!";
    } else {
        echo "CSRF token validation failed.";
    }
} else {
    header("Location: login.html");
}
?>