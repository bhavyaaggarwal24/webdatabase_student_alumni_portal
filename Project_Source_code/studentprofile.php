<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

//echo "<h1>Welcome $user !</h1>";
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

        h1{
            text-align: center;
            color: #333;
        }

        h3{
            text-align: center;
            color: #333;
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
                <li><a href="student_posting_page.php">Home</a></li>
                <li><a href="alumnidirectory.php">Alumni Directory</a></li>
                <li><a href="posts.php">Post</a></li>
                <li><a href="studentprofile.php">Profile</a></li>
                <li><a href="signout.php">Sign Out</a></li>
            </ul>
        </nav>
    </header>
    <script src="studentprofile.js"></script>
    <main>
        <h1>Welcome <?php echo $fname," " ,$lname ?></h1>
        <h3>Please update profile and click on Save.</h3>
        <div class="form">
            <form name="studentprofileform" action="save.php" onsubmit="return validateForm()">
                <b>First Name:</b>
                <input type="text" name="firstname" value="<?php echo $fname ?>">
                <br><br>
                <b>Last Name:</b>
                <input type="text" name="lastname" value="<?php echo $lname ?>">
                <br><br>
                <b>Date of Birth:</b>
                <input type="date" name="dob" value="<?php echo $dob ?>">
                <br><br>
                <b>Gender:</b>
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
                <b>UserName:</b>
                <input type="text" name="username" value="<?php echo $uname ?>">
                <br><br>
                <b>Phone Number:</b>
                <input type="text" name="phonenumber" value="<?php echo $phn ?>">
                <br><br>
                <b>Email ID:</b>
                <input type="text" name="emailid" value="<?php echo $email ?>">
                <br><br>
                <b>Address:</b>
                <input type="text" name="address" value="<?php echo $address ?>">
                <br><br>
                <b>Program:</b>
                <input type="text" name="program" value="<?php echo $program ?>">
                <br><br>
                <b>Enrollment Date:</b>
                <input type="date" name="enrollmentdate" value="<?php echo $enrollmentdate ?>">
                <br><br>
                <b>Expected Graduation Date:</b>
                <input type="date" name="expectedgraduationdate" value="<?php echo $expectedgraduationdate ?>">
                <br><br>
                <b>GPA:</b>
                <input type="text" name="gpa" value="<?php echo $gpa ?>">
                <br><br>
                <b>Status:</b>
                <select name="status">
                <?php
                    if ($status  == "Active"){
                        echo "<option value=$status>Active</option>";
                        echo "<option value='Onleave'>Onleave</option>";
                    } elseif ($status == "Onleave") {
                        echo "<option value=$status>Onleave</option>";
                        echo "<option value=Active>Active</option>";
                    }
                ?>
                </select>
                <br><br>
                <input type="submit" name="submit" value="Save">
            </form>
        </div>
    </main>
</body>
</html>
