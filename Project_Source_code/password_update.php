<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dbconnection.php';

$username = $_POST['uname'];
$usertype = $_POST['utype'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

$options = [
    'cost' => 12,
];
$passhash = password_hash($password, PASSWORD_BCRYPT, $options);

if ($password == $password1) {
        if ($usertype == 'Student') {
            $sql3 = "UPDATE STUDENT 
            SET PASSWORD_HASH = '$passhash'
            WHERE USERNAME = '$username'";
        } 
        
        elseif ($usertype == 'Alumni') {
            $sql3 = "UPDATE ALUMNI 
            SET PASSWORD_HASH = '$passhash'
            WHERE USERNAME = '$username'";
        }

        if (mysqli_query($conn, $sql3)) {
            echo "Your password has been updated successfully";
            echo '<!DOCTYPE html>
            <br><br>
             <a href="login.html">Go back to Login Page</a>
            </html>';
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Password and re-entered password don't match, please enter the password correctly.";
    }
    mysqli_close($conn);

?>