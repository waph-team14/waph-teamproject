<?php
// ini_set( 'display_errors', '1');
// ini_set( 'display_startup_errors', '1');
// error_reporting (E_ALL); 
require "session_auth.php";
header('Content-Type: application/json');

$userId = sanitize_input($_SESSION["userId"]);
$postId = sanitize_input($_POST["postId"]);
$comment = sanitize_input($_POST["comment"]);

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

if (addNewComment($userId, $postId, $comment)) {
  $isSuccess = true;
  $errorMessage = "";
}

send_response($isSuccess, $errorMessage);

function send_response($isSuccess, $errorMessage)
{
  echo json_encode([
    "success" => $isSuccess,
    "errroMessage" => $errorMessage
  ]);
}

function addNewComment($userId, $postId, $comment)
{
  $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
  if ($mysqli->connect_errno) {
    printf("Database connection failed: %s\n", $mysqli->connect_errno);
    return false;
  }

  $prepared_sql = "INSERT INTO waph_team.comments (postID, userID, comment) VALUES(?, ?, ?)";
  $stmt = $mysqli->prepare($prepared_sql);
  $stmt->bind_param("dds", $postId, $userId, $comment);

  if ($stmt->execute()) {
    if ($stmt->affected_rows == 1) {
      return true;
    }
  }
  return false;
}
