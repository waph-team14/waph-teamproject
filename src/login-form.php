<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>WAPH-Login page</title>
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
    <div class="valign-wrapper">
      <div class="form-container">
        <h3>Login</h3>
        <form action="index.php" method="POST" class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input name="username" id="username" type="text" class="validate" required>
              <label for="username">Username</label>
              <span class="helper-text" data-error="Invalid username" data-success=""></span>
            </div>

            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate" required pattern=".{6,}">
              <label for="password">Password</label>
              <span class="helper-text" data-error="Invalid password" data-success="">Minimum 6 characters</span>
            </div>

            <div class="col s12">
              <button class="btn waves-effect waves-light" name="action" type="submit">Login
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </form>
        <p>New User? <a href="registration-form.php">Register</a></p>
      </div>
    </div>
  </div>
</body>

</html>