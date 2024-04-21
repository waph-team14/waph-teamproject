<?php
require 'session_auth.php';

$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;
?>

<body>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <nav>
    <div class="nav-wrapper blue">
      <a href="index.php" class="ml-20 brand-logo">Mini Facebook</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="editprofileform.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <br>

  <div class="container">
    <div class="row">
      <section class="col s6 offset-s3" style="background-color: #ADD8E6;">
        <h3 class="m-2">Add a new post.</h3>
        <form action="#" id="add-post-form" method="POST" class="p5">
          <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
          <div class="row">
            <div class="input-field col s12">
              <input name="post-title" id="post-title" type="text" class="validate" required>
              <label for="post-title">Title</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="post-content" id="post-content" type="textarea" class="materialize-textarea" required></textarea>
              <label for="post-content">Content</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <button class="btn waves-effect waves-light" id="addPostButton" name="action">
                Post
              </button>
            </div>
          </div>
        </form>

        <script>
          $('#addPostButton').on('click', (event) => {
            event.preventDefault();

            $.ajax({
              url: 'add-post.php',
              type: 'POST',
              data: $("#add-post-form").serialize(),
              success: (response) => {
                const isSuccess = response.success;
                const errorMessage = response.errorMessage;
                if (isSuccess) {
                  M.toast({
                    html: 'Successfully added a new post',
                    classes: 'green'
                  })
                  $('#post-title').val('')
                  $('#post-content').val('')
                } else {
                  M.toast({
                    html: errorMessage,
                    classes: 'red'
                  })
                }
              },
              error: (_, status, error) => {
                M.toast({
                  html: 'Some error occurred.',
                  classes: 'red'
                })
              }
            })
          })
        </script>
      </section>
    </div>
  </div>
  </div>
</body>