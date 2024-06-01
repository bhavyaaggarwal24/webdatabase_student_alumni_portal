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
$sql = "SELECT * FROM STUDENT WHERE USERNAME =  '$user' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['FIRSTNAME'];
        $lname = $row['LASTNAME'];
        $dob = $row['DOB'];
        $gender = $row['GENDER'];
        $uname = $row['USERNAME'];
        $pass = $row['PASSWORD_HASH'];
        $program = $row['PROGRAM'];
        $phn = $row['PHONENUMBER'];
        $email = $row['EMAILID'];
        $enrollmentdate = $row['ENROLLMENTDATE'];
        $expectedgraduationdate = $row['EXPECTEDGRADUATIONDATE'];
        $gpa = $row['GPA'];
        $status = $row['STATUS'];
        $address = $row['ADDRESS'];
        }
} else {
    echo "<div style='text-align: center;'><p>No open positions found, please come back later.</p></div>";
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
        <b>First Name:</b>
        <input type="text" name="firstname" value="' . $fname . '">
        <br><br>
        <b>Last Name:</b>
        <input type="text" name="lastname" value="' . $lname . '">
        <br><br>
        <b>Date of Birth:</b>
        <input type="date" name="dob" value="' . $dob . '">
        <br><br>
        <b>Gender:</b>
        <select name="gender" value="' . $gender . '">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <br><br>
        <b>UserName:</b>
        <input type="text" name="username" value="' . $uname . '">
        <br><br>
        <b>Phone Number:</b>
        <input type="text" name="phonenumber" value="' . $phn . '">
        <br><br>
        <b>Email ID:</b>
        <input type="text" name="emailid" value="' . $email . '">
        <br><br>
        <b>Address:</b>
        <input type="text" name="address" value="' . $address . '">
        <br><br>
        <b>Program:</b>
        <input type="text" name="program" value="' . $program . '">
        <br><br>
        <b>Enrollment Date:</b>
        <input type="date" name="enrollmentdate" value="' . $enrollmentdate . '">
        <br><br>
        <b>Expected Graduation Date:</b>
        <input type="date" name="expectedgraduationdate" value="' . $expectedgraduationdate . '">
        <br><br>
        <b>GPA:</b>
        <input type="text" name="gpa" value="' . $gpa . '">
        <br><br>
        <b>Status:</b>
        <select name="status" value="' . $status . '">
            <option value="Active">Active</option>
            <option value="On leave">On leave</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Save">
    </form>
    </div>
</body>
</html>';
?>
