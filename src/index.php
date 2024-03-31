<?php
	session_start();    
	if (checklogin_mysql($_POST["username"], $_POST["password"])) {
?>
	<h2> Welcome <?php echo htmlentities( $_POST['username']); ?> !</h2>
<?php		
	}else{
		echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
		die();
	}
	function checklogin_mysql($username, $password) {
		$mysqli = new mysqli('localhost', 'koppulrh', 'Pa$$w0rd', 'waph');
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_errno);
			exit();
		}

		$sql = "SELECT * FROM users WHERE username=? AND password = md5(?)";
		$stmt = $mysqli->prepare($sql);
		$stmt ->bind_param("ss", $username, $password) ;
		$stmt-> execute();
		$result = $stmt->get_result();
		if($result->num_rows ==1)
			return TRUE;
		return FALSE; 

	}

?>