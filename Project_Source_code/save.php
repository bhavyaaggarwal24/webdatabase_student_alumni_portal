<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
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
    $row = mysqli_fetch_assoc($result);
    $studentid = $row['studentid'];
    $fname = mysqli_real_escape_string($conn, $_GET['firstname']);
    $lname = mysqli_real_escape_string($conn, $_GET['lastname']);
    $dob = mysqli_real_escape_string($conn, $_GET['dob']);
    $gender = mysqli_real_escape_string($conn, $_GET['gender']);
    $uname = mysqli_real_escape_string($conn, $_GET['username']);
    $pass = mysqli_real_escape_string($conn, $passhash);
    $program = mysqli_real_escape_string($conn, $_GET['program']);
    $phn = mysqli_real_escape_string($conn, $_GET['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_GET['emailid']);
    $enrollmentdate = mysqli_real_escape_string($conn, $_GET['enrollmentdate']);
    $expectedgraduationdate = mysqli_real_escape_string($conn, $_GET['expectedgraduationdate']);
    $gpa = mysqli_real_escape_string($conn, $_GET['gpa']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $address = mysqli_real_escape_string($conn, $_GET['address']);


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
        echo "";
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
    $fname = mysqli_real_escape_string($conn, $_GET['firstname']);
    $lname = mysqli_real_escape_string($conn, $_GET['lastname']);
    $dob = mysqli_real_escape_string($conn, $_GET['dob']);
    $gender = mysqli_real_escape_string($conn, $_GET['gender']);
    $uname = mysqli_real_escape_string($conn, $_GET['username']);
    $phn = mysqli_real_escape_string($conn, $_GET['phonenumber']);
    $email = mysqli_real_escape_string($conn, $_GET['emailid']);
    $address = mysqli_real_escape_string($conn, $_GET['address']);
    $degreeearned = mysqli_real_escape_string($conn, $_GET['degreeearned']);
    $graduationdate = mysqli_real_escape_string($conn, $_GET['graduationdate']);
    $employementstatus = mysqli_real_escape_string($conn, $_GET['employmentstatus']);
    $employer = mysqli_real_escape_string($conn, $_GET['employer']);
    $industry = mysqli_real_escape_string($conn, $_GET['industry']);
    $jobtitle = mysqli_real_escape_string($conn, $_GET['jobtitle']);
    $linkedinprofile = mysqli_real_escape_string($conn, $_GET['linkedinprofile']);
    $mentorshipavailability = mysqli_real_escape_string($conn, $_GET['mentorshipavailability']);
    $prefrdmentorshiparea = mysqli_real_escape_string($conn, $_GET['prefrdmentorshiparea']);
    $prefrdcontactmethod = mysqli_real_escape_string($conn, $_GET['prefrdcontactmethod']);


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
        echo "";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
// Close the connection
mysqli_close($conn);
}
?>
<!DOCTYPE html>
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

        }
    </style>
    <body>
    <header>
    <nav>
        <ul>
            <?php
            if($type == 'alumni')
            {
                echo '<li><a href="alumni_posting_page.php">Home</a></li>';
                echo '<li><a href="alumnidirectory.php">Alumni Directory</a></li>';
                echo '<li><a href="posts.php">Post</a></li>';
                echo '<li><a href="alumniprofile.php">Profile</a></li>';
                echo '<li><a href="signout.php">Sign Out</a></li>';
            }
            if($type == 'student')
            {
                echo '<li><a href="student_posting_page.php">Home</a></li>';
                echo '<li><a href="alumnidirectory.php">Alumni Directory</a></li>';
                echo '<li><a href="posts.php">Post</a></li>';
                echo '<li><a href="studentprofile.php">Profile</a></li>';
                echo '<li><a href="signout.php">Sign Out</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
<main>
    <section>
        <p>Profile updated successfully.</p>
    </section>
</main>
    </body>
</head>
</html>
