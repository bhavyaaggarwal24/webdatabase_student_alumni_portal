<?php
include 'dbconnection.php';
session_start();
$_SESSION["uname"] =  $_POST['username'];
$uname = $_POST['username'];
$_SESSION["enteredpass"] = $_POST['password'];
$_SESSION["type"] = $_POST['usertype'];
$type = $_POST['usertype'];

if ($type == 'alumni')
{
$sql1 = "SELECT PASSWORD_HASH AS passwordhash FROM ALUMNI WHERE USERNAME = '$uname'";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
$passhash = $row['passwordhash'];
}
else if($type == 'student')
{
    $sql1 = "SELECT PASSWORD_HASH AS passwordhash FROM STUDENT WHERE USERNAME = '$uname'";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $passhash = $row['passwordhash'];
}

if (mysqli_query($conn, $sql1))
{
if (password_verify($_SESSION["enteredpass"] , $passhash)) {
    $_SESSION['loggedin'] = true;
    $_SESSION['uname'] = $uname;
    #echo "Welcome";
    if($type == 'student')
    {
    header('Location: student_posting_page.php');
    }
    else if($type == 'alumni')
    {
        header('Location: alumni_posting_page.php');
    }
    exit;
} else {
    echo " UserName or Password is incorrect! <br> Please enter valid UserName and Password.";
    echo '<!DOCTYPE html>
    <br><br>
    <a href="login.html">Go back to Login Page</a>
    </html>';
}
    }
else { 
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    echo "<br><br>";
}
mysqli_close($conn);

?>