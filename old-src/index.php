<?php
// ini_set( 'display_errors', '1');
// ini_set( 'display_startup_errors', '1');
// error_reporting (E_ALL); 
session_start();

$username = sanitize_input($_POST["username"]);
$password = sanitize_input($_POST["password"]);

function sanitize_input($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

if (isset($_POST["username"]) and isset($_POST["password"])) {
	if (checklogin_mysql($username, $password)) {
		$_SESSION["authenticated"] = TRUE;
		$_SESSION["username"] = $username;
		$_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
	} else {
		session_destroy();
		echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
		die();
	}
}

require "session_auth.php";

function checklogin_mysql($username, $password)
{
	$mysqli = new mysqli('localhost', 'gopaluna', 'phani@123', 'waph');
	if ($mysqli->connect_errno) {
		printf("Database connection failed: %s\n", $mysqli->connect_errno);
		exit();
	}

	$prepared_sql = "SELECT name, email FROM users WHERE username = ? AND password = md5(?);";
	$stmt = $mysqli->prepare($prepared_sql);
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows == 1) {
		$name = null;
		$email = null;
		$stmt->bind_result($name, $email);
		$stmt->fetch();

		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;

		return TRUE;
	}
	return FALSE;
}
?>

<div class="container">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<style>
		.header {
			width: 100%;
			align-items: center;
			justify-content: center;
		}
	</style>

	<div class="header">
		<h1>Home Page</h1>
	</div>

	<h2> Welcome <?php echo htmlentities($_SESSION['username']); ?> !</h2>
	<p> Full Name: <?php echo htmlentities($_SESSION['name']); ?></p>
	<p> Email: <?php echo htmlentities($_SESSION['email']); ?></p>
	<a href="editprofileform.php">Edit Profile</a> |
	<a href="changepasswordform.php">Change Password</a> | <a href="logout.php">Logout</a>
</div>