<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom CSS -->
    <link href="editstyle.css" rel="stylesheet">
</head>

<body>

<div class="bg-blue">
    <div class="container main-container">
        <h2 class="form-title"><i class="fas fa-user-edit icon"></i>Edit Profile</h2>
        <form id="editProfileForm">
            <div class="form-group">
                <label for="name"><i class="fas fa-user icon"></i>Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope icon"></i>Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone"><i class="fas fa-phone icon"></i>Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <button type="button" class="btn custom-btn" onclick="updateProfile()"><i class="fas fa-pencil-alt icon"></i>Update Profile</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fetch the current user's profile information when the page is fully loaded
    fetch('viewprofile.php', { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Populate the form fields with the fetched data
                document.getElementById('name').value = data.user.name || '';
                document.getElementById('email').value = data.user.email || '';
                document.getElementById('phone').value = data.user.phone || '';
            } else {
                alert('Failed to load profile data.');
            }
        })
        .catch(error => {
            alert('Error: ' + error);
        });
});

function updateProfile() {
    var formData = new FormData(document.getElementById('editProfileForm'));
    fetch('editback.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Profile updated successfully!');
            // Reload the page to fetch updated data
            window.location.reload();
        } else {
            alert('Profile update failed: ' + (data.error || 'Unknown error'));
        }
    })
    .catch(error => {
        alert('Error: ' + error);
    });
}
</script>
</body>
</html>
