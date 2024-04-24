### sprint-2 
# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

# Project Topic/Title - Mini Facebook

# Team members
1. Phani Gopaluni, gopaluna@mail.uc.edu
    * ![Phani's Headshot](headshots/phani_headshot.jpeg)
2. Koppula Rohith, koppulrh@mail.uc.edu
   * ![rohith's Headshot](headshots/head.png)
3. Sravan Kumar Bhavana, bhavansr@mail.uc.edu
   * ![Sravan Headshot](headshots/my.jpg)
4. Jaswanth Bollepalli, bollepjh@mail.uc.edu
   * ![Jaswanth's Headshot](headshots/jashheadshot.jpeg)

# Project Management Information
[Source code repository (private access)](https://github.com/waph-team14/waph-teamproject)
[Project homepage (public)](https://github.com/waph-team14/waph-team14.github.io)

## Revision History
|Date       |Version    |Description    |
|-----------|-----------|---------------|
|24/03/2024 |0.1        |Sprint 0       |
|-----------|-----------|---------------|
|31/03/2024 |0.2        |Sprint 1       |
|-----------|-----------|---------------|
|21/04/2024 |0.3        |Sprint 2       |
|-----------|-----------|---------------|
|23/04/2024 |0.4        |Sprint 3       |

# Overview
* In this team project, we are going to develop a mini facebook application with minimal features such as posting real time chat.
* To implement this project, the tech stack used is
   * Backend - PHP
   * Frontend - HTML, CSS (Bootstrap), JavaScript
   * Database - Relational, MySQL
   * Web Server - Apache2

# System Analysis
## High-level Requirements
The system will have two roles.
1. Normal User.
   * Registration
   * Login
   * Change Password
   * Edit Profile
   * Add a post
   * Edit or Delete their own posts
   * View the posts in home page.
   * View and add comments for each post.
   * Real time chat.
2. Super User 
   * Login (No Registration)
   * Disable a registered user
   * Enable a registered user

# System Design
## Use Case Realization
* The following diagrams explains the use cases for the normal user and also provide the details of tech stack.
![project-architecture](sprint-1/project-architecture.png)
## Database 
* The following diagrams explains the entities and their relationships. Also shows the database schema that we are going to crate.
![entity-relationship-diagram](sprint-1/entity-relationship-diagram.png)
## User Interface
![wireframe-1](wireframes/w1.jpeg)

![wireframe-2](wireframes/w2.jpeg)

![wireframe-3](wireframes/w3.jpeg)

![wireframe-4](wireframes/w4.jpeg)

![wireframe-5](wireframes/w5.jpeg)

![wireframe-6](wireframes/w6.jpeg)

![wireframe-7](wireframes/w7.jpeg)

![wireframe-8](wireframes/w8.jpeg)

## Minifacebook Working flow and feature exploration

Functinalities of the minifacebook

Registration: Anybody can sign-up for the account.

![Registration](images/register.png)

![Registration](images/register2.png)

![Registration](images/register3.png)

![Registration](images/register4.png)

Login: Invalid attempt and successful login methods.

![Login](images/login_required.png)

![Login](images/login.png)

Home page: Successfull user login directs to the homepage of the minifacebook.

![Home](images/homepage.png)

A user can adding a post, delete it and can comment their own/other's post.

![Adding post](images/adding_post.png)

![post](images/adding_post_1.png)

![Home](images/home_2.png)

![Delete a post](images/delete_post.png)

![posts page/ home page](images/posts_page.png)

Edit profile: A way to update their profile information.

![edit profile](images/edit_profile.png)

![updated profile](images/updated_edit.png)

Change paswword: Changing password as per their need.

![change password](images/passwordChanged.png)

Superuser(Admin): A super user is an authority for the minifacebook.

![Super user](images/super1.png)

A Superuser can disable and enable a registered user account.

![super user](images/super2.png)

![super user](images/super3.png)

A disabled user cannot login successfully.

![disabiling user](images/disabled_user.png)

![invalid attempt](images/invalid_user.png)

![Logout](images/logout.png)


# Implementation
## Sprint 0
* Created private key and certificate for our local web server and a database for the project.
* Copied the code from lab3 and lab4 to setup sample login forms and home page.

## Sprint 1
* Run the following commands to setup the database. For the second command, use the password 1234.
```bash
sudo mysql -u root < database/database-account.sql
sudo mysql -u waphteam14 -p < database/database-data.sql
```
## Sprint 2
### Sprint 2
0. Update the README.md structures
   * database designing and implementation
  ## code for database implementation (creating posts code)
  in this code we created a table to store posts data 

   * Planned Sprint 2
   * Divided the tasks among ourselves
   * 
### 2 logged in users can add a new post

### 3. logged in users can add a new comment on any post

### 4. logged in user can edit like update and delete their own posts in the mini facebook app

### 5. logged in user cannot edit others posts
   
### 6.   Created and designed Database queries


# Security analysis

# Demo (screenshots)
## Sprint - 0
![gopaluna-sprint-0](sprint-0/gopaluna-sprint-0.png)
![koppulrh-sprint-0](sprint-0/koppulrh-sprint-0.png)
![sravan-sprint-0](sprint-0/sravan_certificate.png)
![jaswanth-sprint-0](sprint-0/certificate.png)

# Software Process Management
* Our team is following Agile Scrum Methodology.
* We are having weekly sprints. Sprint starts on Monday and Ends on Sunday.
* On Monday morning, we are having sprint planning to discuss the tasks that are to be done in the current sprint.
* We are having daily stand ups for 15 minutes to discuss progress everyday. Standup meeting notes is
   * What is done?
   * What is pending?
   * Any blockers?
* Since all of us are actively participating in development process, we are not having sprint retrospective meetings.

## Scrum process
### Roadmap
1. Setup and configure the server as per requirements.
2. Setup initial login flow copied from labs 3 & 4 and adds ample index.html for sprint 0 check up.
3. Sprint - 1
   * Finish the architecture diagram. - Phani
   * Finish the database schema design. - Phani
   * Create the SQL files for DDL statements and to insert some seed data. - Phani
   * Create Wireframes - Rohith
   * Code for the application (both frontend (using bootstrap for the frontend) and backend)
      * Finalize Registration Page - Sravan
      * Finalize Login Page - Sravan
      * Change password page. - Sravan
         * Should be inside profile page
         * Should have CSRF protection.
      * Edit profile page. - Rohith
         * Should be inside profile page.
      * Home page with list of posts. - Jaswanth
         * Should include a navbar with links to profile page, chat page, logout.
         * Just list the posts. We will work on comments in the next sprint.
4. Sprint - 2
   ***Note** for this Sprint the team as gown throught the **pair programming**, the team has gathered together
and implemented our ideas together and completed the sprint.
   * made several changes to the database.-phani
   * rewrote the login page -sravan
   * implemented changes to change password page -sravan
   * implemented changes to edit profile page -rohith
   * implemented and changes to the homme page -jaswanth
   * created posts page - phani
      * functions like add post delete post and update post were implemented.
      * comments on posts is implemeted.
5. Sprint - 3 ***
 *Created a superuser - Phani,Sravan.*
 *Created the functionality and disabiling and enabiling functions - Rohith, Jaswanth.*
  Video demonstration and README edit - Sravan, Rohith.
6. Video Demo & Report Submission.

### Sprint 0
Duration: 18/03/2024-24/03/2024
#### Completed Tasks: 
1. Finished setting up ssl certificates and creating the local domain for waph-team14.minifacebook.com
2. Created a sample index.html file in the root directory of this new domain.
#### Contributions: 
1. Member 1, 5 commits, 4 hours, contributed in generating database and reprository and ssl key's and certificate and sample html file.
2. Phani Gopaluni, 3 commits, 4 hours, contributed in generating sample.html file and editing README.md
<<<<<<< HEAD
3. Sravan Kumar, 2 commits, 1 hour, contributed in verfying the tasks.
4. Jaswanth Bollepalli, 5 commits, 3 hours, contributed in editing README.md file and performing specific task
=======
3. Member 3, x commits, y hours, contributed in xxx
4. Jaswanth Bollepalli, 5 commits, 3 hours, contributed in editing README.md file performing specific task
>>>>>>> origin/main

### Sprint 1
Duration: 25/03/2024-31/03/2024
#### Completed Tasks: 
0. Update the README.md structures
   * Created Roadmap
   * Planned Sprint 1
   * Divided the tasks among ourselves
1. Created an architecture diagram realizing all the use cases.
2. Created an Entity Relation Ship Diagram that explains the Database Schema.
3. Crated Database DDL Statements

#### Contributions: 
1. Rohith Koppula, 5 commits, 4 hours, contributed in generating editProfile, view profile pages and wireframes for project layout and edited the README.md.
2. Phani Gopaluni, 8 commits, 4 hours, contributed in generating database-data.sql and generated architecture and ER diagrams and editing README.md
<<<<<<< HEAD
3. Sravan Kumar, 4 commits, 4 hours, contributed in creating login form, registration form and as well as forget password form with csrf validations and little styling to the forms.
4. Jaswanth Bollepalli, 6 commits, 4 hours, contributed in editing README.md file and tested the current database and gathered information for navigation bar included in our project .including navigatiom.html file including file links to logout.html,chat.html,profile.html
>>>>>>> origin/main

### Sprint 2
Duration: 16/04/2024-21/22/2024
#### Completed Tasks: 
0. Update the README.md structures
   * Created Roadmap
   * Planned Sprint 2
   * Did pair programming with the whole team
1. update Database and with new entities.
2. introduced new pages and updated previous pages  

#### Contributions: 
1. Rohith Koppula, 4 commits, 8 hours, contributed in generating editProfile, view profile pages and edited the README.md.
2. Phani Gopaluni, 10 commits, 8 hours, contributed in implementing new data in database-data.sql and created posts page along with several action for the post page involvements 
<<<<<<< HEAD
3. Sravan Kumar, 4 commits, 8 hours, implemented several changes on login page, registration page and as well as change password.
4. Jaswanth Bollepalli, 3 commits, 8 hours,implemented changes on css and tested the application during the development phase and contributed in creating the posts page with phani
>>>>>>> origin/main

### Sprint 3
Duration: 23/04/2024
#### Completed tasks:
1. Created a superuser can disable/enable an account.
   *  Did pair programming with whole team.
2. Verifiation of Superuser.

#### Contributions:
1. Sravan Kumar, 2 commit, 3 hours, contributed in working on superuser disable/enable of registered users and a bit css modifications and README modifying.
2. Phani, 1 hour, contributed on superuser disable/enable of registered users.
<<Lead
3. Rohith 3 commits, 3 hours Verfying the superuser logging and as well as verfied disabled account login and created video presentaton for the submission.
4. Jaswanth, Verfying the superuser logging and as well as verfied disabled account login and created video presentaton for the submission.
>>>>>>> origin/main



***note:*** We finished the sprint by cooperating as a team, putting our ideas into practice through frequent feedback and project reconsiderations. This project phase has given us a lot of experience because we have discussed our ideas and executed them with a greater understanding.


# Appendix

Include the content (in text, not as images) of the SQL files and all source code of your PHP files (with the file name). 

**database-account.sql**
      create database waph_team;
      CREATE USER 'waphteam14'@'localhost' IDENTIFIED BY '1234';
      GRANT ALL ON waph_team.* TO 'waphteam14'@'localhost';

**database-data.sql**
      USE waph_team;
      
      DROP TABLE IF EXISTS `users`;
      DROP TABLE IF EXISTS `posts`;
      DROP TABLE IF EXISTS `comments`;
      DROP TABLE IF EXISTS `chat`;
      
      CREATE TABLE users (
      userId INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(255) UNIQUE NOT NULL,
      email VARCHAR(255) UNIQUE NOT NULL,
      additionalEmail VARCHAR(255),
      password VARCHAR(255) NOT NULL,
      name VARCHAR(255),
      phone VARCHAR(20),
      isDisabled BOOLEAN NOT NULL DEFAULT FALSE,
      isSuperuser BOOLEAN NOT NULL DEFAULT FALSE
      );
      
      CREATE TABLE posts (
      postID INT AUTO_INCREMENT PRIMARY KEY,
      userID INT NOT NULL,
      title VARCHAR(100) NOT NULL,
      content TEXT NOT NULL,
      timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
      
      FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
      );
      
      CREATE TABLE comments (
      commentID INT AUTO_INCREMENT PRIMARY KEY,
      postID INT NOT NULL,
      userID INT NOT NULL,
      comment TEXT NOT NULL,
      timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
      FOREIGN KEY (postID) REFERENCES posts(postID) ON DELETE CASCADE,
      FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE
      );
      
      CREATE TABLE chat (
      chatID INT AUTO_INCREMENT PRIMARY KEY,
      fromUserID INT NOT NULL,
      toUserID INT NOT NULL,
      message TEXT NOT NULL,
      timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
      FOREIGN KEY (fromUserID) REFERENCES users(userID) ON DELETE CASCADE,
      FOREIGN KEY (toUserID) REFERENCES users(userID) ON DELETE CASCADE
      );
   
   
**add-comment.php**

      <?php
      // ini_set( 'display_errors', '1');
      // ini_set( 'display_startup_errors', '1');
      // error_reporting (E_ALL); 
      require "session_auth.php";
      header('Content-Type: application/json');
      
      $userId = sanitize_input($_SESSION["userId"]);
      $postId = sanitize_input($_POST["postId"]);
      $comment = sanitize_input($_POST["comment"]);
      
      $isSuccess = false;
      $errorMessage = 'Some Unknown Error Occurred';
      
      function sanitize_input($input)
      {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
      }
      
      $token = $_POST["nocsrftoken"];
      if (!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
      $errorMessage = "CSRF Attack is detected";
      send_response($isSuccess, $errorMessage);
      die();
      }
      
      if (addNewComment($userId, $postId, $comment)) {
      $isSuccess = true;
      $errorMessage = "";
      }
      
      send_response($isSuccess, $errorMessage);
      
      function send_response($isSuccess, $errorMessage)
      {
      echo json_encode([
      "success" => $isSuccess,
      "errroMessage" => $errorMessage
      ]);
      }
      
      function addNewComment($userId, $postId, $comment)
      {
      $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
      if ($mysqli->connect_errno) {
      printf("Database connection failed: %s\n", $mysqli->connect_errno);
      return false;
      }
      
      $prepared_sql = "INSERT INTO waph_team.comments (postID, userID, comment) VALUES(?, ?, ?)";
      $stmt = $mysqli->prepare($prepared_sql);
      $stmt->bind_param("dds", $postId, $userId, $comment);
      
      if ($stmt->execute()) {
      if ($stmt->affected_rows == 1) {
      return true;
      }
      }
      return false;
      }
   

**addnewuser.php**

      <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      $username = sanitize_input($_POST["username"]);
      $password = sanitize_input($_POST["password"]);
      $name = sanitize_input($_POST["name"]);
      $email = sanitize_input($_POST["email"]);
      $phone = sanitize_input($_POST["phone"]);
      
      if (validate_form($username, $password, $name, $email, $phone)) {
      $code = addnewuser($username, $password, $name, $email, $phone);
      if ($code == 1) {
      echo "Registration succeed!";
      } else if ($code == -3) {
      echo "Registration failed";
      } else if ($code == -2) {
      echo "Username already exists";
      } else {
      echo "Some unknown error occured";
      }
      }
      
      function validate_form($username, $password, $name, $email, $phone)
      {
      if (!(isset($username) and isset($password) and isset($name) and isset($email))) {
      echo "all the fields are not set properly";
      return false;
      }
      if ((empty($username) or empty($password) or empty($name) or empty($email))) {
      echo "some fields are empty";
      return false;
      }
      if (!preg_match("/^[\w.-]+@[\w-]+(.[\w-]+)*$/", $email)) {
      echo "email regex didn't matched";
      return false;
      };
      if (!preg_match("/.{6,}/", $password)) {
      echo "password regex didn't matched";
      return false;
      }
      if (!preg_match("/[0-9]{10}/", $phone)) {
      echo "phone number regex didn't matched";
      return false;
      }
      return true;
      }
      
      function sanitize_input($input)
      {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
      }
      
      function addnewuser(
      $username,
      $password,
      $name,
      $email,
      $phone
      ) {
      $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
      
      if ($mysqli->connect_errno) {
      printf("Database connection failed: %s\n", $mysqli->connect_errno);
      return -1;
      }
      
      $username_check_sql = "SELECT * FROM users WHERE username = ?";
      $username_check_stmt = $mysqli->prepare($username_check_sql);
      $username_check_stmt->bind_param("s", $username);
      
      $username_check_stmt->execute();
      $result = $username_check_stmt->get_result();
      if ($result->num_rows > 0)
      return -2;
      
      $prepared_sql = "INSERT INTO users (username, password, name, email, phone, isDisabled, isSuperuser)
      VALUES (?, md5(?), ?, ?, ?, false, false)";
      $stmt = $mysqli->prepare($prepared_sql);
      $stmt->bind_param("sssss", $username, $password, $name, $email, $phone);
      
      if ($stmt->execute()) {
      return 1;
      }
      return -3;
      }
      ?><p><a href="login-form.php">Login</a></p>

**add-post.php**

      <?php
      // ini_set( 'display_errors', '1');
      // ini_set( 'display_startup_errors', '1');
      // error_reporting (E_ALL); 
      require "session_auth.php";
      header('Content-Type: application/json');
      
      $userId = sanitize_input($_SESSION["userId"]);
      $postTitle = sanitize_input($_POST["post-title"]);
      $postContent = sanitize_input($_POST["post-content"]);
      
      $isSuccess = false;
      $errorMessage = 'Some Unknown Error Occurred';
      
      function sanitize_input($input)
      {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
      }
      
      $token = $_POST["nocsrftoken"];
      if (!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
      $errorMessage = "CSRF Attack is detected";
      send_response($isSuccess, $errorMessage);
      die();
      }
      
      if (addNewPost($userId, $postTitle, $postContent)) {
      $isSuccess = true;
      $errorMessage = "";
      }
      
      send_response($isSuccess, $errorMessage);
      
      function send_response($isSuccess, $errorMessage)
      {
      echo json_encode([
      "success" => $isSuccess,
      "errroMessage" => $errorMessage
      ]);
      }
      
      function addNewPost($userId, $postTitle, $postContent)
      {
      $mysqli = new mysqli('localhost', 'waphteam14', '1234', 'waph_team');
      if ($mysqli->connect_errno) {
      printf("Database connection failed: %s\n", $mysqli->connect_errno);
      return false;
      }
      
      $prepared_sql = "INSERT INTO waph_team.posts (userID, title, content) VALUES(?, ?, ?);";
      $stmt = $mysqli->prepare($prepared_sql);
      $stmt->bind_param("dss", $userId, $postTitle, $postContent);
      
      if ($stmt->execute()) {
      if ($stmt->affected_rows == 1) {
      return true;
      }
      }
      return false;
      }



      **admin-panel.php**
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
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
      <a class="btn waves-effect waves-light secondary-content red user-enable" 
      data-id="${user.userID}">Enable <i class="material-icons right">person</i>
      </a>
      </li>
      ` : `
      <a class="btn waves-effect waves-light secondary-content red user-disable" 
      data-id="${user.userID}">Disable <i class="material-icons right">person_off</i>
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



   










