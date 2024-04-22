<?php
// ini_set( 'display_errors', '1');
// ini_set( 'display_startup_errors', '1');
// error_reporting (E_ALL); 
session_start();

$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;

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
		echo "<script>alert('Invalid username/password or Account is Disabled');window.location='login-form.php';</script>";
		die();
	}
}

require "session_auth.php";

function checklogin_mysql($username, $password)
{
	$mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
	if ($mysqli->connect_errno) {
		printf("Database connection failed: %s\n", $mysqli->connect_errno);
		exit();
	}

	$prepared_sql = "SELECT userId, name, email, additionalEmail, phone, isSuperuser FROM users WHERE username = ? AND password = md5(?) AND isDisabled = false;";
	$stmt = $mysqli->prepare($prepared_sql);
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows == 1) {
		$userId = null;
		$name = null;
		$email = null;
		$additionalEmail = null;
		$phone = null;
		$isSuperuser = null;
		$stmt->bind_result($userId, $name, $email, $additionalEmail, $phone, $isSuperuser);
		$stmt->fetch();

		$_SESSION["userId"] = $userId;
		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["additionalEmail"] = $additionalEmail;
		$_SESSION["phone"] = $phone;
		$_SESSION["isSuperuser"] = $isSuperuser;

		return TRUE;
	}
	return FALSE;
}
?>

<body>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<nav>
		<div class="nav-wrapper blue">
			<a href="index.php" class="brand-logo p2">Mini Facebook</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<?php
				if ($_SESSION['isSuperuser'] && $_SESSION['isSuperuser'] == true) {
					echo "<li><a href='admin-panel.php'>Admin Panel</a></li>";
				}
				?>
				<li><a href="posts-page.php">Posts</a></li>
				<li><a href="editprofileform.php">Profile</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<section class="col s8 offset-s4">
				<input type="hidden" id="nocsrftoken" value="<?php echo $rand; ?>" />
				<div id="posts-wrapper">

				</div>
			</section>
		</div>
	</div>

	<script>
		function createCommentSection(comment) {
			if (!comment.comment) return ``;
			return `
				<div>
					<hr>
					<p><strong> Comment by ${comment.commenterName} </strong></p>
					<p>${comment.comment}</p>
				</div>
			`
		}

		function createAPostCard(post) {
			const postCard = `
			<div class="row">
				<div class="col s12 m6">
				<div class="card darken-1">
						<div class="card-content">
							<span class="card-title"> Post by ${post.details.postedUser}</span>
							<p class="post-title" type='text'><strong>${post.details.title}</strong></p>
							<p class="materialize-p post-content" style="height: auto">${post.details.content}</p>
							${post.comments.map(createCommentSection).join('')}
						</div>
						<div class="card-action">
							<div class="input-field col s12">
								<input name="post-comment" type="text" class="validate post-comment">
								<label class="active" for="post-comment">Comment</label>
							</div>
							<a class="btn waves-effect waves-light post-add-comment" data-id="${post.postID}">
								Add Comment<i class="material-icons right">comment</i>
							</a>
						</div>
					</div>
				</div>
			</div>
		`;
			return postCard;
		}

		$(window).on('load', () => {
			$.ajax({
				url: 'list-all-posts.php',
				type: 'GET',
				success: (response) => {
					const results = JSON.parse(response);
					if (results.success) {
						results.data.forEach(result => {
							const post = JSON.parse(result.post);
							console.log(post);
							const postCard = createAPostCard(post);
							$('#posts-wrapper').append(postCard);
						})
					}
				}
			})
		})

		$(document).on('click', '.post-add-comment', function(event) {

			const nocsrftoken = $('#nocsrftoken').val();
			const postId = $(this).data("id");
			const comment = $(this).closest('.card-action').find('.post-comment').val()

			$.ajax({
				url: 'add-comment.php',
				type: 'POST',
				data: `nocsrftoken=${nocsrftoken}&postId=${postId}&comment=${comment}`,
				success: (response) => {
					if (response.success) {
						M.toast({
							html: 'Successfully added a comment',
							classes: 'green'
						});
						location.reload();
					} else {
						M.toast({
							html: response.errorMessage,
							classes: 'red'
						})
					}
				},
				failure: (_, status, error) => {
					M.toast({
						html: "Some error occurred",
						classes: 'red'
					})
				}
			})
		})
	</script>
</body>