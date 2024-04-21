<?php

require "session_auth.php";

$isSuccess = false;
$errorMessage = 'Some Unknown Error Occurred';
$posts = [];

$userId = $_SESSION["userId"];

if (listUserPosts($userId)) {
  $isSuccess = true;
  $errorMessage = "";
}

send_response($isSuccess, $errorMessage, $posts);

function send_response($isSuccess, $errorMessage, $posts)
{
  echo json_encode([
    "success" => $isSuccess,
    "errroMessage" => $errorMessage,
    "data" => $posts
  ]);
}

function listUserPosts($userId)
{
  global $posts;
  $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
  if ($mysqli->connect_errno) {
    printf("Database connection failed: %s\n", $mysqli->connect_errno);
    return false;
  }

  $prepared_sql = "
    WITH post_details AS (
      SELECT
        p.postID,
        p.timestamp AS postedTime,
        JSON_OBJECT (
          'title', p.title, 'content', p.content, 'postedUser', u.name
        ) AS post,
        JSON_OBJECT (
          'commentId', c.commentID,
          'comment', c.comment,
          'commenterName', uc.name
        ) AS commentDetail
      FROM posts p
      JOIN users u ON p.userID = u.userID
      LEFT JOIN comments c ON p.postID = c.postID
      LEFT JOIN users uc on c.userID = uc.userID
      WHERE p.userID = ?
      ORDER BY p.timestamp DESC
    )

    SELECT JSON_OBJECT(
      'postID', pd.postID,
      'details', pd.post,
      'comments', JSON_ARRAYAGG(pd.commentDetail)
    ) AS post
    FROM post_details pd
    GROUP BY pd.postID
    ORDER BY pd.postedTime DESC
  ";
  $stmt = $mysqli->prepare($prepared_sql);
  $stmt->bind_param("s", $userId);
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $posts[] = $row;
    }
    return true;
  }
  return false;
}
