<?php

session_start();
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the username from the session
    $user = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
} else {
    // If not logged in, redirect to the login page
    header('Location: login.html');
    exit;
}

echo "<h1>Welcome $user !</h1>";
include 'dbconnection.php';
$sql = "SELECT * FROM ALUMNI WHERE USERNAME =  '$user' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['FIRSTNAME'];
        $lname = $row['LASTNAME'];
        $dob = $row['DOB'];
        $gender = $row['GENDER'];
        $uname = $row['USERNAME'];
        $phn = $row['PHONENUMBER'];
        $email = $row['EMAILID'];
        $degreeearned = $row['DEGREEEARNED'];
        $graduationdate = $row['GRADUATIONDATE'];
        $employmentstatus = $row['EMPLOYMENTSTATUS'];
        $employer = $row['EMPLOYER'];
        $address = $row['ADDRESS'];
        $industry = $row['INDUSTRY'];
        $jobtitle = $row['JOBTITLE'];
        $linkedinprofile = $row['LINKEDINPROFILE'];
        $mentorshipavailability = $row['MENTORSHITPAVAILABILITY'];
        $prefrdmentorshiparea = $row['PRFRDMENTORSHIPAREA'];
        $prefrdcontactmethod = $row['PREFRDCONTACTMETHOD'];
        }
} else {
    echo "<div style='text-align: center;'><p>No details found, please come back later.</p></div>";
}

mysqli_close($conn);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1{
            text-align: center;
            color: #333;
        }

        h3{
            text-align: center;
            color: #333;
        }

        a {
            display: block;
            text-align: center;
            padding: 10px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .signup-link {
            position: absolute;
            top: 10px;
            right: 100px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .signout-link {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .form {
            text-align: center;
            justify-content: center;
            display: flex;
        }
    </style>

    <a href="home.php" class="signup-link">Home</a>
    <a href="signout.php" class="signout-link">Sign out</a>
</head>
<body>
    <h3>Please update profile and click on Save.</h3>
    <div class="form">
    <form action="save.php" method="post">
        First Name:
        <input type="text" name="firstname" value="' . $fname . '">
        <br><br>
        Last Name:
        <input type="text" name="lastname" value="' . $lname . '">
        <br><br>
        Date of Birth:
        <input type="date" name="dob" value="' . $dob . '">
        <br><br>
        Gender:
        <select name="gender" value="' . $gender . '">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <br><br>
        UserName:
        <input type="text" name="username" value="' . $uname . '">
        <br><br>
        Phone Number:
        <input type="text" name="phonenumber" value="' . $phn . '">
        <br><br>
        Email ID:
        <input type="text" name="emailid" value="' . $email . '">
        <br><br>
        Address:
        <input type="text" name="address" value="' . $address . '">
        <br><br>
        Degree Earned:
        <input type="text" name="degreeearned" value="' . $degreeearned . '">
        <br><br>
        Graduation Date:
        <input type="date" name="graduationdate" value="' . $graduationdate . '">
        <br><br>
        Employment Status:
        <input type="text" name="employmentstatus" value="' . $employmentstatus . '">
        <br><br>
        Employer:
        <input type="text" name="employer" value="' . $employer . '">
        <br><br>
        Industry:
        <input type="text" name="industry" value="' . $industry . '">
        <br><br>
        Job Title:
        <input type="text" name="jobtitle" value="' . $jobtitle . '">
        <br><br>
        Linkedin Profile Link:
        <input type="text" name="linkedinprofile" value="' . $linkedinprofile . '">
        <br><br>
        Mentorship Availability:
        <select name="mentorshipavailability" value="' . $mentorshipavailability . '">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <br><br>
        Preferred Mentorship Area:
        <input type="text" name="prefrdmentorshiparea" value="' . $prefrdmentorshiparea . '">
        <br><br>
        Preferred Conatact Method:
        <select name="prefrdcontactmethod" value="' . $prefrdcontactmethod . '">
            <option value="Email">Email</option>
            <option value="Phone">Phone</option>
        </select>
        <br><br>
        <input type="submit" value="Save">
    </form>
    </div>
</body>
</html>';
?>
