<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'dbconnection.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Retrieve the username from the session
    $username = isset($_SESSION['uname']) ? $_SESSION['uname'] : 'Guest';
    $usertype = isset($_SESSION['type']) ? $_SESSION['type'] : 'Guest';
} else {
    // If not logged in, redirect to the login page
    header('Location: login.html');
    exit;
}
$content = $_POST['replycontent'] ?? '';
$post_id = $_POST['post_id'] ?? '';

echo $content;
echo $post_id;

if($usertype == 'alumni')
{
$sql = "SELECT * FROM ALUMNI WHERE USERNAME =  '$username' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$authorid = $row['ALUMNIID'];
}

if($usertype == 'student')
{
$sql = "SELECT * FROM STUDENT WHERE USERNAME =  '$username' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$authorid = $row['STUDENTID'];
}

if (mysqli_num_rows($result) > 0){
    $sql1 = "INSERT INTO REPLIES (POST_ID, AUTHOR_ID, CONTENT, AUTHOR_TYPE) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("ssss", $post_id, $authorid, $content, $usertype);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Post created successfully";
    } else {
        echo "Error creating post";
    }
    $stmt->close();
} else {
    echo "Unauthorized access";
}
?>