<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $user = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
    $type = isset($_SESSION['type']) ? $_SESSION['type'] : 'Guest';
} else {
    header('Location: login.html');
    exit;
}
include 'dbconnection.php';
if($type == 'student')
{
$sql1 = "SELECT STUDENTID AS studentid FROM STUDENT WHERE USERNAME = '$user'";
$result = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result) > 0)
{
    $options = [
        'cost' => 12,
    ];
    $passhash = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    $row = mysqli_fetch_assoc($result);
    $studentid = $row['studentid'];
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $passhash);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $phn = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $enrollmentdate = mysqli_real_escape_string($conn, $_POST['enrollmentdate']);
    $expectedgraduationdate = mysqli_real_escape_string($conn, $_POST['expectedgraduationdate']);
    $gpa = mysqli_real_escape_string($conn, $_POST['gpa']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);


    $sql = "UPDATE STUDENT
            SET FIRSTNAME = '$fname', 
                LASTNAME = '$lname', 
                DOB = '$dob', 
                GENDER = '$gender', 
                USERNAME = '$uname',  
                PROGRAM = '$program', 
                PHONENUMBER = '$phn', 
                EMAILID = '$email', 
                ENROLLMENTDATE = '$enrollmentdate', 
                EXPECTEDGRADUATIONDATE = '$expectedgraduationdate', 
                GPA = '$gpa', 
                STATUS = '$status', 
                ADDRESS = '$address' 
            WHERE STUDENTID = $studentid";

    if (mysqli_query($conn, $sql)) {
        echo "Your profile updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
// Close the connection
mysqli_close($conn);
}

if ($type == 'alumni')
{
//echo "Hi $user I am in";
$sql1 = "SELECT ALUMNIID AS alumniid FROM ALUMNI WHERE USERNAME = '$user'";
$result = mysqli_query($conn, $sql1);
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    $alumniid = $row['alumniid'];
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $phn = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $degreeearned = mysqli_real_escape_string($conn, $_POST['degreeearned']);
    $graduationdate = mysqli_real_escape_string($conn, $_POST['graduationdate']);
    $employementstatus = mysqli_real_escape_string($conn, $_POST['employmentstatus']);
    $employer = mysqli_real_escape_string($conn, $_POST['employer']);
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $linkedinprofile = mysqli_real_escape_string($conn, $_POST['linkedinprofile']);
    $mentorshipavailability = mysqli_real_escape_string($conn, $_POST['mentorshipavailability']);
    $prefrdmentorshiparea = mysqli_real_escape_string($conn, $_POST['prefrdmentorshiparea']);
    $prefrdcontactmethod = mysqli_real_escape_string($conn, $_POST['prefrdcontactmethod']);


    $sql2 = "UPDATE ALUMNI
            SET FIRSTNAME = '$fname', 
                LASTNAME = '$lname', 
                DOB = '$dob', 
                GENDER = '$gender', 
                USERNAME = '$uname',  
                PHONENUMBER = '$phn', 
                EMAILID = '$email', 
                ADDRESS = '$address',
                DEGREEEARNED = '$degreeearned', 
                GRADUATIONDATE = '$graduationdate', 
                EMPLOYMENTSTATUS = '$employementstatus', 
                EMPLOYER = '$employer',
                INDUSTRY = '$industry',
                JOBTITLE = '$jobtitle',
                LINKEDINPROFILE = '$linkedinprofile',
                MENTORSHITPAVAILABILITY = '$mentorshipavailability',
                PRFRDMENTORSHIPAREA = '$prefrdmentorshiparea',
                PREFRDCONTACTMETHOD = '$prefrdcontactmethod'
            WHERE ALUMNIID = $alumniid";

    if (mysqli_query($conn, $sql2)) {
        echo "Your profile updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
// Close the connection
mysqli_close($conn);
}
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

        }
    </style>

    <a href="home.php" class="signup-link">Home</a>
    <a href="signout.php" class="signout-link">Sign out</a>
</head>
</html>';
?>