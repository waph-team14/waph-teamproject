<?php
require "session_auth.php";

$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Change Password</title>
</head>

<body>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <style>
    /* Center the form on the page */
    .valign-wrapper {
      width: 100%;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      width: 50%;
      max-width: 400px;
    }
  </style>

  <div class="container">
    <nav>
			<div class="nav-wrapper blue">
				<a href="index.php" class="brand-logo p2">Mini Facebook</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="index.php">Home</a></li>
				</ul>
			</div>
		</nav>
    <div class="valign-wrapper">
      <div class="form-container">
        <h3>Change Password</h3>
        <form action="changepassword.php" onsubmit="return validateForm()" method="POST" class="col s12">
          <div class="row">
            <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate" required pattern=".{6,}">
              <label for="password">New Password</label>
              <span class="helper-text" data-error="Invalid password" data-success="">Minimum 6 characters</span>
            </div>
            <div class="input-field col s12">
              <input name="confirmPassword" id="confirmPassword" type="password" class="validate" required>
              <label for="password">Confirm New Password</label>
            </div>
            <div class="col s12">
              <button class="btn waves-effect waves-light" name="action" type="submit">Change Password
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
      let password = document.getElementById('password').value;
      let confirmPassword = document.getElementById('confirmPassword').value;

      if (password !== confirmPassword) {
        M.toast({
          html: `Passwords doesn't match`
        });
        return false;
      }

      return true;
    }
  </script>
</body>

</html>