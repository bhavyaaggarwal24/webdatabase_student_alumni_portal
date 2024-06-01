<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the username from the session
    $username = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
} else {
    // If not logged in, redirect to the login page
    header('Location: login.html');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
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
            right: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .profile {
            position: absolute;
            top: 10px;
            right: 103px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Welcome <?php echo $username; ?> !</h1>;
    <!-- <a href="form.html">Click here to submit an open position</a>
    <a href="close.html">Click here to open/close a position</a> -->
    <a href="alumniprofile.php" class="profile">Profile</a> 
    <a href="signout.php" class="signup-link">Sign Out</a>
</body>

</html>