<?php
require "session_auth.php";

$rand = bin2hex(openssl_random_pseudo_bytes(16));
$_SESSION["nocsrftoken"] = $rand;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WAPH-Edit Profile page</title>
    </script>
</head>

<body>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
        <div class="valign-wrapper">
            <div class="form-container">
                <h3>Edit Profile</h3>
                <form action="#" id="editProfileForm" method="POST" class="col s12">
                    <div class="row">
                        <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
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
                            <input name="additionalEmail" id="additionalEmail" type="email" class="validate" required>
                            <label for="additionalEmail">Additional Email</label>
                            <span class="helper-text" data-error="Invalid email" data-success=""></span>
                        </div>
                        
                        <div class="input-field col s12">
                            <input name="phone" id="phone" type="tel" class="validate" required>
                            <label for="phone">Phone</label>
                            <span class="helper-text" data-error="Invalid phone number" data-success=""></span>
                        </div>
                        
                        <div class="col s12">
                            <button class="btn waves-effect waves-light" id="editButton" name="action">Edit
                                <i class="material-icons right">edit</i>
                            </button>
                        </div>
                        
                        <div class="col s12">
                            <button class="btn waves-effect waves-light" id="submitButton" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).on('DOMContentLoaded', () => {
            console.log("inside document ready event handler")
            $('#name').val('<?php echo $_SESSION['name'] ?>')
            $('#email').val('<?php echo $_SESSION['email'] ?>')
            $('#additionalEmail').val('<?php echo $_SESSION['additionalEmail'] ?>')
            $('#phone').val('<?php echo $_SESSION['phone'] ?>')

            $('input').prop('disabled', true);
            $('label').addClass('active');
            $("#submitButton").hide();
        });

        $('#editButton').on('click', (event) => {
            event.preventDefault()
            $('input').prop('disabled', false);
            $("#submitButton").show();
            $("#editButton").hide();
        })

        $('#submitButton').on('click', (event) => {
            event.preventDefault();

            $.ajax({
                url: 'edit-profile.php',
                type: 'POST',
                data: $("#editProfileForm").serialize(),
                success: (response) => {
                    console.log(response);
                    const isSuccess = response.success;
                    const errorMessage = response.errorMessage;
                    if (isSuccess) {
                        M.toast({html: 'Successfully Updated Profile Details', classes: 'green'})
                        $('input').prop('disabled', true);
                        $("#submitButton").hide();
                        $("#editButton").show();
                    } else {
                        M.toast({html: errorMessage, classes: 'red'})
                    }
                },
                error: (_, status, error) => {
                    M.toast({html: 'Some error occurred.', classes: 'red'})
                }
            })
        })
    </script>
</body>

</html>