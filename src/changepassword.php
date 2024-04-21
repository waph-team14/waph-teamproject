<?php
require "session_auth.php";
?>

<body>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<div class="container">
		<nav>
			<div class="nav-wrapper blue">
				<a href="index.php" class="brand-logo p2">Mini Facebook</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.php">Home</a></li>
					<li><a href="editprofileform.php">Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>

		<?php
		$username = $_SESSION['username']; // $_REQUEST["username"];
		$password = sanitize_input($_REQUEST["password"]);

		function sanitize_input($input)
		{
			$input = trim($input);
			$input = stripslashes($input);
			$input = htmlspecialchars($input);
			return $input;
		}

		$token = $_POST["nocsrftoken"];
		if (!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
			echo "CSRF Attack is detected";
			die();
		}

		if (isset($username) and isset($password)) {
			if (changepassword($username, $password)) {
				echo "Password has been changed!";
			} else {
				echo "Change password failed";
			}
		} else {
			echo "No username/password provided";
		}

		function changepassword($username, $password)
		{
			$mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
			if ($mysqli->connect_errno) {
				printf("Database connection failed: %s\n", $mysqli->connect_errno);
				return false;
			}

			$prepared_sql = "UPDATE users SET password=md5(?) WHERE username=?";
			$stmt = $mysqli->prepare($prepared_sql);
			$stmt->bind_param("ss", $password, $username);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
		?>
	</div>
</body>