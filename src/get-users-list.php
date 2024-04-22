<?php

require "session_auth.php";

$isSuccess = false;
$errorMessage = 'Some Unknown Error Occurred';
$users = [];

if (listAllUsers()) {
  $isSuccess = true;
  $errorMessage = "";
}

send_response($isSuccess, $errorMessage, $users);

function send_response($isSuccess, $errorMessage, $users)
{
  echo json_encode([
    "success" => $isSuccess,
    "errroMessage" => $errorMessage,
    "data" => $users
  ]);
}

function listAllUsers()
{
  global $users;
  $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
  if ($mysqli->connect_errno) {
    printf("Database connection failed: %s\n", $mysqli->connect_errno);
    return false;
  }

  $prepared_sql = "
    SELECT userID, username, name, email, phone, isDisabled
    FROM users
    WHERE isSuperuser = FALSE
  ";
  $stmt = $mysqli->prepare($prepared_sql);
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return true;
  }
  return false;
}
