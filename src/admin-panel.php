<?php
// ini_set( 'display_errors', '1');
// ini_set( 'display_startup_errors', '1');
// error_reporting (E_ALL); 
session_start();
$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;

if ($_SESSION["isSuperuser"] && $_SESSION["isSuperuser"] == true) {
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
          <li><a href="index.php">Home</a></li>
          <li><a href="posts-page.php">Posts</a></li>
          <li><a href="editprofileform.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col s8 offset-s2">
          <input type="hidden" id="nocsrftoken" value="<?php echo $rand; ?>" />
          <ul class="collection" id="users-list">

          </ul>
        </div>
      </div>
    </div>

    <script>
      function createUserListItem(user) {
        const htmlContent = `
          <li class="collection-item avatar">
            <i class="material-icons">person</i>
            <span class="title">${user.name}</span>
            <p>Username: ${user.username}</p>
            <p>Email: ${user.email}</p>
            <p>Phone: ${user.phone}</p>
        `;

        const buttonContent = user.isDisabled ? `
          <a class="btn waves-effect waves-light secondary-content red user-enable" data-id="${user.userID}">Enable <i class="material-icons right">person</i>
          </a>
          </li>
        ` : `
          <a class="btn waves-effect waves-light secondary-content red user-disable" data-id="${user.userID}">Disable <i class="material-icons right">person_off</i>
          </a>
          </li>
        `;
        return htmlContent + buttonContent;
      }

      $(window).on('load', () => {
        $.ajax({
          url: 'get-users-list.php',
          type: 'GET',
          success: (response) => {
            const results = JSON.parse(response);
            if (results.success) {
              results.data.forEach(user => {
                const userListItem = createUserListItem(user);
                $('#users-list').append(userListItem);
              });
            }
          }
        })
      })

      $(document).on('click', '.user-disable', function(event) {
        event.preventDefault();
        const nocsrftoken = $('#nocsrftoken').val();
        const userId = $(this).data('id');
        const payload = `nocsrftoken=${nocsrftoken}&userId=${userId}`

        $.ajax({
          url: 'disable-user.php',
          type: 'POST',
          data: payload,
          success: (response) => {
            if (response.success) {
              M.toast({
                html: 'Successfully disabled the post',
                classes: 'green'
              })
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

      $(document).on('click', '.user-enable', function(event) {
        event.preventDefault();
        const nocsrftoken = $('#nocsrftoken').val();
        const userId = $(this).data('id');
        const payload = `nocsrftoken=${nocsrftoken}&userId=${userId}`

        $.ajax({
          url: 'enable-user.php',
          type: 'POST',
          data: payload,
          success: (response) => {
            if (response.success) {
              M.toast({
                html: 'Successfully enabled the post',
                classes: 'green'
              })
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
<?php
} else {
  echo "<script>alert('you are not a superuser.'); window.location='index.php'</script>";
}
?>