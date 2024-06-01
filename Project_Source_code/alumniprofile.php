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

// echo "<h1>Welcome $user !</h1>";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Profile</title>
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        main {
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        h1{
            text-align: center;
            color: #333;
        }

        h3{
            text-align: center;
            color: #333;
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


</head>
<body>
    <header>
    <nav>
        <ul>
            <li><a href="alumni_posting_page.php">Home</a></li>
            <li><a href="alumnidirectory.php">Alumni Directory</a></li>
            <li><a href="posts.php">Post</a></li>
            <li><a href="alumniprofile.php">Profile</a></li>
            <li><a href="signout.php">Sign Out</a></li>
        </ul>
    </nav>
    </header>
    <script src="alumniprofile.js"></script>
    <main>
    <h1>Welcome <?php echo $fname, " ", $lname ?></h1>
    <h3>Please update profile and click on Save.</h3>
    <div class="form">
    <form name="alumniprofileform" action="save.php" onsubmit="return alumnivalidateForm()">
        First Name:
        <input type="text" name="firstname" value="<?php echo $fname ?>">
        <br><br>
        Last Name:
        <input type="text" name="lastname" value="<?php echo $lname ?>">
        <br><br>
        Date of Birth:
        <input type="date" name="dob" value="<?php echo $dob ?>">
        <br><br>
        Gender:
        <select name="gender">
        <?php
            if ($gender  == "Male"){
                echo "<option value=$gender>Male</option>";
                echo "<option value=Female>Female</option>";
            } elseif ($gender == "Female") {
                echo "<option value=$gender>Female</option>";
                echo "<option value=Male>Male</option>";
            }
        ?>
        </select>
        <br><br>
        UserName:
        <input type="text" name="username" value="<?php echo $uname ?>">
        <br><br>
        Phone Number:
        <input type="text" name="phonenumber" value="<?php echo $phn ?>">
        <br><br>
        Email ID:
        <input type="text" name="emailid" value="<?php echo $email ?>">
        <br><br>
        Address:
        <input type="text" name="address" value="<?php echo $address ?>">
        <br><br>
        Degree Earned:
        <input type="text" name="degreeearned" value="<?php echo $degreeearned ?>">
        <br><br>
        Graduation Date:
        <input type="date" name="graduationdate" value="<?php echo $graduationdate ?>">
        <br><br>
        Employment Status:
        <input type="text" name="employmentstatus" value="<?php echo $employmentstatus ?>">
        <br><br>
        Employer:
        <input type="text" name="employer" value="<?php echo $employer ?>">
        <br><br>
        Industry:
        <input type="text" name="industry" value="<?php echo $industry ?>">
        <br><br>
        Job Title:
        <input type="text" name="jobtitle" value="<?php echo $jobtitle ?>">
        <br><br>
        Linkedin Profile Link:
        <input type="text" name="linkedinprofile" value="<?php echo $linkedinprofile ?>">
        <br><br>
        Mentorship Availability:
        <select name="mentorshipavailability">
        <?php
            if ($mentorshipavailability  == "Yes"){
                echo "<option value=$mentorshipavailability>Yes</option>";
                echo "<option value=No>No</option>";
            } elseif ($mentorshipavailability == "No") {
                echo "<option value=$mentorshipavailability>No</option>";
                echo "<option value=Yes>Yes</option>";
            }
        ?>
        </select>
        <br><br>
        Preferred Mentorship Area:
        <input type="text" name="prefrdmentorshiparea" value="<?php echo $prefrdmentorshiparea ?>">
        <br><br>
        Preferred Conatact Method:
        <select name="prefrdcontactmethod" value="<?php echo $prefrdcontactmethod ?>">
        <?php
            if ($prefrdcontactmethod  == "Email"){
                echo "<option value=$prefrdcontactmethod>Email</option>";
                echo "<option value=Phone>Phone</option>";
            } elseif ($prefrdcontactmethod == "Phone") {
                echo "<option value=$prefrdcontactmethod>Phone</option>";
                echo "<option value=Email>Email</option>";
            }
        ?>
        </select>
        <br><br>
        <input type="submit" value="Save">
    </form>
    </div>
    </main>
</body>
</html>