<?php
require 'session_auth.php';

$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;
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
      <a href="index.php" class="brand-logo">Mini Facebook</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="editprofileform.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <br>

  <div class="container">
    <div class="row">
      <section class="col s4 p-6">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Add a new post.</span>
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
          </div>
        </div>

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
                  location.reload();
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

      <section class="col s8 gray">
        <input type="hidden" id="nocsrftoken" value="<?php echo $rand; ?>" />
        <div id="posts-wrapper">

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
                    <div class="card-action">
                      <a class="btn waves-effect waves-light post-edit" data-id="${post.postID}">
                        Edit<i class="material-icons right">edit</i>
                      </a>
                      <a class="btn waves-effect waves-light post-submit" data-id="${post.postID}">
                        Submit<i class="material-icons right">send</i>
                      </a>
                      <a class="btn waves-effect waves-light post-delete red" data-id="${post.postID}">
                        Delete<i class="material-icons right">delete</i>
                      </a>
                    </div>
                    <div class="card-content">
                      <span class="card-title"> Post by ${post.details.postedUser}</span>
                      <input class="post-title" type='text' value='${post.details.title}'>
                      <textarea class="materialize-textarea post-content">${post.details.content}</textarea>
                      ${post.comments.map(createCommentSection).join('')}
                    </div>
                  </div>
                </div>
              </div>
            `;
            return postCard;
          }

          $(window).on('load', () => {
            $.ajax({
              url: 'list-user-posts.php',
              type: 'GET',
              success: (response) => {
                const results = JSON.parse(response);
                if (results.success) {
                  results.data.forEach(result => {
                    const post = JSON.parse(result.post);
                    const postCard = createAPostCard(post);
                    $('#posts-wrapper').append(postCard);

                    $('.post-submit').hide()
                    $('.post-title').prop('disabled', true);
                    $('.post-content').prop('disabled', true);
                  });
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

          $(document).on('click', '.post-edit', function(event) {
            event.preventDefault();
            $(this).closest('.card').find('.post-title').prop('disabled', false);
            $(this).closest('.card').find('.post-content').prop('disabled', false);
            $(this).closest('.card').find('.post-submit').show();
            $(this).closest('.card').find('.post-delete').hide();
            $(this).hide();
          })

          $(document).on('click', '.post-submit', function(event) {
            event.preventDefault();


            const nocsrftoken = $('#nocsrftoken').val();
            const postId = $(this).data('id');
            let titleElement = $(this).closest('.card').find('.post-title')
            let contentElement = $(this).closest('.card').find('.post-content')

            const payload = `nocsrftoken=${nocsrftoken}&postId=${postId}&title=${titleElement.val()}&content=${contentElement.val()}`

            $.ajax({
              url: 'update-post.php',
              type: 'POST',
              data: payload,
              success: (response) => {
                console.log('inside click event', $(this).data('id'))
                if (response.success) {
                  M.toast({
                    html: 'Successfully updated the post',
                    classes: 'green'
                  })
                } else {
                  M.toast({
                    html: response.errorMessage,
                    classes: 'red'
                  })
                }
                titleElement.prop('disabled', true);
                contentElement.prop('disabled', true);
                $(this).closest('.card').find('.post-edit').show();
                $(this).closest('.card').find('.post-delete').show();
                $(this).hide();
              },
              failure: (_, status, error) => {
                M.toast({
                  html: "Some error occurred",
                  classes: 'red'
                })
              }
            })

          })

          $(document).on('click', '.post-delete', function(event) {
            const nocsrftoken = $('#nocsrftoken').val();
            const postId = $(this).data('id');

            const payload = `nocsrftoken=${nocsrftoken}&postId=${postId}`

            $.ajax({
              url: 'delete-post.php',
              type: 'POST',
              data: payload,
              success: (response) => {
                console.log('inside click event', $(this).data('id'))
                if (response.success) {
                  M.toast({
                    html: 'Successfully deleted the post',
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
      </section>
    </div>
  </div>
  </div>
</body>