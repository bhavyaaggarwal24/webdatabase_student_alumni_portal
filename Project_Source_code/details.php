<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the username from the session
    $username = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
    $usertype = isset($_SESSION['type']) ? $_SESSION['type'] : 'Guest';
} else {
    // If not logged in, redirect to the login page
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alumni Details</title>
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

        main {
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #f5f5f5;
            text-align: left;
        }

        th {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: Right;
        }

        th {
            background-color: #f2f2f2;
        }
        .alumni-details {
            text-align: center;
        }

        .back {
                text-decoration: none;
                color: #fff;
                background-color: #0f0f0f;
                padding: 10px 15px;
                border-radius: 5px;
            }
    </style>
</head>
<body>

<header>
        <nav>
            <ul>
            <?php 
                if($usertype == 'alumni')
                {
                    echo '<li><a href="alumni_posting_page.php">Home</a></li>';
                    echo '<li><a href="alumnidirectory.php">Alumni Directory</a></li>';
                    echo '<li><a href="posts.php">Post</a></li>';
                    echo '<li><a href="alumniprofile.php">Profile</a></li>';
                    echo '<li><a href="signout.php">Sign Out</a></li>';
                }
                if($usertype == 'student')
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
<a href="alumnidirectory.php" class="back">Back</a>

<?php
include 'dbconnection.php';

$email = $_GET['email'] ?? '';

$sql = "SELECT * FROM ALUMNI WHERE EMAILID = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<div class='alumni-details'>";
    echo "<h1>" . $row["FIRSTNAME"] . " " . $row["LASTNAME"] ."</h1>";
    echo "<table align='center'>";
    echo "<tr><td><b>Name</b></td><td> " . $row["FIRSTNAME"] . " " . $row["LASTNAME"] ."</td></tr>";
    echo "<tr><td><b>Degree Earned</b></td><td> " . $row["DEGREEEARNED"] . "</td></tr>";
    echo "<tr><td><b>Graduation Date</b></td><td> " . $row["GRADUATIONDATE"]. "</td></tr>";
    echo "<tr><td><b>Employment Status</b></td><td> " . $row["EMPLOYMENTSTATUS"] . "</td></tr>";
    echo "<tr><td><b>Employer</b></td><td> " . $row["EMPLOYER"] . "</td></tr>";
    echo "<tr><td><b>Industry</b></td><td> " . $row["INDUSTRY"] . "</td></tr>";
    echo "<tr><td><b>Job title</b></td><td> " . $row["JOBTITLE"] . "</td></tr>";
    echo "<tr><td><b>LinkedIn profile</b></td><td> " . $row["LINKEDINPROFILE"] . "</td></tr>";
    echo "<tr><td><b>Mentorship Availability</b></td><td> " . $row["MENTORSHITPAVAILABILITY"] . "</td></tr>";
    echo "<tr><td><b>Prefered Membership Area</b></td><td> " . $row["PRFRDMENTORSHIPAREA"] . "</td></tr>";
    echo "<tr><td><b>Phone Number</b></td><td> " . $row["PHONENUMBER"] . "</td></tr>";
    echo "<tr><td><b>Email ID</b></td><td> " . $row["EMAILID"] . "</td></tr>";
    echo "<tr><td><b>Preferred method of contact</b></td><td> " . $row["PREFRDCONTACTMETHOD"] . "</td></tr>";
    echo "</table>";
    echo "</div>";
} else {
    echo "Alumni not found";
}

$conn->close();
?>
</main>
</html>
