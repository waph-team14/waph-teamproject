<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>WAPH-Registration page</title>
  </script>
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
        <h3>Register</h3>
        <form action="addnewuser.php" onsubmit="return validateForm()" method="POST" class="col s12">
          <div class="row">
            <div class="input-field col s12">
              <input name="username" id="username" type="text" class="validate" required>
              <label for="username">Username</label>
              <span class="helper-text" data-error="Invalid username" data-success=""></span>
            </div>
            <div class="input-field col s12">
              <input name="name" id="name" type="text" class="validate" required>
              <label for="name">Name</label>
            </div>
            <div class="input-field col s12">
              <input name="email" id="email" type="email" class="validate" required>
              <label for="email">Email</label>
              <span class="helper-text" data-error="Invalid email" data-success=""></span>
            </div>
            <div class="input-field col s12">
              <input name="phone" id="phone" type="tel" class="validate" required>
              <label for="phone">Phone Number</label>
              <span class="helper-text" data-error="Invalid phone number" data-success=""></span>
            </div>
            <div class="input-field col s12">
              <input name="password" id="password" type="password" class="validate" required pattern=".{6,}">
              <label for="password">Password</label>
              <span class="helper-text" data-error="Invalid password" data-success="">Minimum 6 characters</span>
            </div>
            <div class="input-field col s12">
              <input name="confirmPassword" id="confirmPassword" type="password" class="validate" required>
              <label for="password">Confirm Password</label>
            </div>
            <div class="col s12">
              <button class="btn waves-effect waves-light" name="action" type="submit">Register
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
      let email = document.getElementById('email').value;
      let password = document.getElementById('password').value;
      let confirmPassword = document.getElementById('confirmPassword').value;

      if (password !== confirmPassword) {
        M.toast({
          html: `Passwords doesn't match`
        });
        return false;
      }

      if (!email.includes('@') || password.length < 6) {
        M.toast({
          html: 'Please fill the form correctly!'
        });
        return false;
      }
      return true;
    }
  </script>
</body>

</html>