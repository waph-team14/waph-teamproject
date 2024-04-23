<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        margin-top: 50px;
    }
    .logout-message {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        display: none;
    }
    .logout-message.slide-in {
        display: block;
        animation: slide-in 1s ease-in-out;
    }
    @keyframes slide-in {
        0% { transform: translateY(-100%); }
        100% { transform: translateY(0); }
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="logout-message slide-in">
                <p>You are logged out!</p>
                <a href="login-form.php" class="btn btn-primary">Login again</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Show the logout message with sliding animation
    $(document).ready(function(){
        $(".logout-message").addClass("slide-in");
    });
</script>
</body>
</html>
