<?php
// ini_set( 'display_errors', '1');
// ini_set( 'display_startup_errors', '1');
// error_reporting (E_ALL); 
require "session_auth.php";
header('Content-Type: application/json');

$username = sanitize_input($_SESSION["username"]);
$name = sanitize_input($_POST['name']);
$phone = sanitize_input($_POST["phone"]);
$email = sanitize_input($_POST["email"]);
$additionalEmail = sanitize_input($_POST["additionalEmail"]);

$isSuccess = false;
$errorMessage = 'Some Unknown Error Occurred';

function sanitize_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

$token = $_POST["nocsrftoken"];
if (!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
    $errorMessage = "CSRF Attack is detected";
    send_response($isSuccess, $errorMessage);
    die();
}

if (editprofile($username, $name, $email, $additionalEmail, $phone)) {
    $isSuccess = true;
    $errorMessage = "";
}

send_response($isSuccess, $errorMessage);

function send_response($isSuccess, $errorMessage) {
    echo json_encode([
        "success"=> $isSuccess,
        "errroMessage"=> $errorMessage
    ]);
}

function editprofile($username, $name, $email, $additionalEmail, $phone)
{
    $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
    if ($mysqli->connect_errno) {
        printf("Database connection failed: %s\n", $mysqli->connect_errno);
        return false;
    }

    $prepared_sql = "UPDATE users SET name=?, email=?, additionalEmail=?, phone=? WHERE username=?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("sssss", $name, $email, $additionalEmail, $phone, $username);

    if ($stmt->execute()) {
        error_log("successully executed the update query with $username");
        error_log($stmt->affected_rows);
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["additionalEmail"] = $additionalEmail;
        $_SESSION["phone"] = $phone;
        $stmt->close(); // Close statement
        $mysqli->close(); // Close connection
        return true;
    }
    return false;
}

?>