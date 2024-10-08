
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
5. Sprint - 3
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


# Appendix

Include the content (in text, not as images) of the SQL files and all source code of your PHP files (with the file name). 



