<?php
$lifetime = 15 * 60;
$path = "/";
$domain = "192.167.9.71";
$secure = true;
$httponly = true;
session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
session_start();

if (!isset($_SESSION["authenticated"]) or $_SESSION["authenticated"] != TRUE) {
  session_destroy();
  echo "<script>alert('You have not login. Please login first!')</script>";
  header("Refresh: 0; url=login-form.php");
  die();
}

if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]) {
  session_destroy();
  echo "<script>alert('Session Hijacking is Detected')</script>";
  header("Refresh: 0; url=login-form.php");
  die();
}
