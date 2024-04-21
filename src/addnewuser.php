<?php
$username = sanitize_input($_POST["username"]);
$password = sanitize_input($_POST["password"]);
$name = sanitize_input($_POST["name"]);
$email = sanitize_input($_POST["email"]);
$phone = sanitize_input($_POST["phone"]);

if (validate_form($username, $password, $name, $email, $phone)) {
	$code = addnewuser($username, $password, $name, $email, $phone);
	if ($code == 1) {
		echo "Registration succeed!";
	} else if ($code == -3) {
		echo "Registration failed";
	} else if ($code == -2) {
		echo "Username already exists";
	} else {
		echo "Some unknown error occured";
	}
}

function validate_form($username, $password, $name, $email, $phone)
{
	if (!(isset($username) and isset($password) and isset($name) and isset($email))) {
		echo "all the fields are not set properly";
		return false;
	}
	if ((empty($username) or empty($password) or empty($name) or empty($email))) {
		echo "some fields are empty";
		return false;
	}
	if (!preg_match("/^[\w.-]+@[\w-]+(.[\w-]+)*$/", $email)) {
		echo "email regex didn't matched";
		return false;
	};
	if (!preg_match("/.{6,}/", $password)) {
		echo "password regex didn't matched";
		return false;
	}
	if (!preg_match("/[0-9]{10}/", $phone)) {
		echo "phone number regex didn't matched";
		return false;
	}
	return true;
}

function sanitize_input($input)
{
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

function addnewuser(
	$username,
	$password,
	$name,
	$email,
  $phone
) {
	$mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');

	if ($mysqli->connect_errno) {
		printf("Database connection failed: %s\n", $mysqli->connect_errno);
		return -1;
	}

	$username_check_sql = "SELECT * FROM users WHERE username = ?";
	$username_check_stmt = $mysqli->prepare($username_check_sql);
	$username_check_stmt->bind_param("s", $username);

	$username_check_stmt->execute();
	$result = $username_check_stmt->get_result();
	if ($result->num_rows > 0)
		return -2;

	$prepared_sql = "INSERT INTO users (username, password, name, email, phone, isDisabled, isSuperuser) VALUES (?, md5(?), ?, ?, ?, false, false)";
	$stmt = $mysqli->prepare($prepared_sql);
	$stmt->bind_param("sssss", $username, $password, $name, $email, $phone);

	if ($stmt->execute()) {
		return 1;
	}
	return -3;
}
?>

<p><a href="login-form.php">Login</a></p>