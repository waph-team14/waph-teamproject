<?php
// ini_set( 'display_errors', '1');
// ini_set( 'display_startup_errors', '1');
// error_reporting (E_ALL); 
require "session_auth.php";
header('Content-Type: application/json');

$postId = sanitize_input($_POST["postId"]);
$postTitle = sanitize_input($_POST["title"]);
$postContent = sanitize_input($_POST["content"]);

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

if (updatePost($postId, $postTitle, $postContent)) {
  $isSuccess = true;
  $errorMessage = "";
}

send_response($isSuccess, $errorMessage);

function send_response($isSuccess, $errorMessage)
{
  echo json_encode([
    "success" => $isSuccess,
    "errorMessage" => $errorMessage
  ]);
}

function updatePost($postId, $postTitle, $postContent)
{
  global $errorMessage;
  $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
  if ($mysqli->connect_errno) {
    printf("Database connection failed: %s\n", $mysqli->connect_errno);
    return false;
  }

  $prepared_sql = "UPDATE waph_team.posts set title=?, content=? where postId=?";
  $stmt = $mysqli->prepare($prepared_sql);
  $stmt->bind_param("ssd", $postTitle, $postContent, $postId);

  if ($stmt->execute()) {
    if ($stmt->affected_rows == 1) {
      return true;
    } else {
      $errorMessage = "Neither title nor content is modified.";
    }
  }
  return false;
}
