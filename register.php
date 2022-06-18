<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hicoms</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            HICOMS
        </div>
    </header>
    
    <div class="form">
        <h3>Registration</h3>
        <form action="views/RegisterView.php" method="post">

            
            <p style="font-size: small; color: rgb(55, 194, 55);">Note: Please register before leaving this page</p><br>
            <?php

            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (!isset($_SESSION['verification_code'])) {
                header('location: index.php?verify=invalid');
                exit();
            }            
            elseif (strpos($url, 'register=invalidPhoneNumber') == true) {
                echo "<p class='error'>Your phone number is invalid</p>";
            }
            elseif (strpos($url, 'register=emailTaken') == true) {
                echo "<p class='error'>The email address has been taken</p>";
            }
            else {

            }
            
            ?>
            <label for="name">Full Name</label><br>
            <input type="text" name="name"><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email"><br><br>
            <label for="phone_number">Phone Number</label><br>
            <input type="text" name="phone_number"><br><br>
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">Male</label><br><br>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">Female</label><br><br>
            <label for="institution">Institution</label><br>
            <select name="institution" id="">
                <option value="University Of Lagos, Akoka">University Of Lagos, Akoka</option>
                <option value="Lagos State University">Lagos State University, Epe Campus</option>
                <option value="Lagos State College of Medicine, Ikeja">Lagos State College of Medicine, Ikeja</option>
                <option value="College of Medicine University of Lagos, Idiaraba">College of Medicine University of Lagos, Idiaraba</option>
                <option value="Yaba College of Technology, Yaba">Yaba College of Technology, Yaba</option>
                <option value="Federal College of Education (Technical), Akoka">Federal College of Education (Technical), Akoka</option>
                <option value="Adeniran Ogunsanya College of Education, Ijanikin">Adeniran Ogunsanya College of Education, Ijanikin</option>
                <option value="Lagos State Polytechnic, Isolo">Lagos State Polytechnic, Isolo</option>
                <option value="Lagos State Polytechnic, Ikorodu">Lagos State Polytechnic, Ikorodu</option>
                <option value="Lagos State Polytechnic, Surulere">Lagos State Polytechnic, Surulere</option>
                <option value="Federal College of Fisheries and Marine Technology, Victoria Island">Federal College of Fisheries and Marine Technology, Victoria Island</option>
                <option value="Lagos State College of Health Technology, Yaba">Lagos State College of Health Technology, Yaba</option>
                <option value="St. Augustine College of Education, Akoka">St. Augustine College of Education, Akoka</option>
                <option value="Michael Otedola College of Primary Education, Epe">Michael Otedola College of Primary Education, Epe</option>
                <option value="Nigeria Institute of Journalism, Ogba">Nigeria Institute of Journalism, Ogba</option>
                <option value="Nigeria Law School, VI">Nigeria Law School, VI</option>
                <option value="Federal College of Orthopaedic Technology, Yaba">Federal College of Orthopaedic Technology, Yaba</option>
                <option value="Nigeria Army College of Nursing, Yaba">Nigeria Army College of Nursing, Yaba</option>
                <option value="Federal School of Occupational Therapy, Oshodi">Federal School of Occupational Therapy, Oshodi</option>
                <option value="Lagos City Polytechnic, Ikeja">Lagos City Polytechnic, Ikeja</option>
                <option value="Grace Polytechnic">Grace Polytechnic</option>
                <option value="Lagos State University, Ojo Campus">Lagos State University, Ojo Campus</option>
                <option value="Others">Others</option>
            </select><br><br>
            <label for="course">Course</label><br>
            <input type="text" name="course"><br><br>
            <label for="level">Level</label><br>
            <input type="text" name="level"><br><br>
            <input class="submit" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>