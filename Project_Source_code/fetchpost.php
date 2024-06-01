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
$sql = "SELECT * FROM POSTS ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);
$posts = array();

if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        // For each post, fetch additional information such as the username of the author
        $post_id = $row['ID'];
        $authorid = $row['AUTHOR_ID'];
        $content = $row['CONTENT'];
        $title = $row['TITLE'];
        $postauthortype = $row['AUTHOR_TYPE'];
        
        if($postauthortype == 'alumni')
        {
            $sql1 = "SELECT * FROM ALUMNI WHERE ALUMNIID = '$authorid'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) 
            {
                $row1 = mysqli_fetch_assoc($result1);
                $aluusername = $row1['USERNAME'];
                $alufirstname = $row1['FIRSTNAME'];
                $alulastname = $row1['LASTNAME'];
            }
            // Fetch replies for the post
            $reply_sql = "SELECT * FROM REPLIES WHERE POST_ID = $post_id ORDER BY REPLY_ID DESC";
            $reply_result = mysqli_query($conn, $reply_sql);
            $replies = array();

            while ($reply_row = mysqli_fetch_assoc($reply_result)) 
            {
                if($reply_row['AUTHOR_TYPE'] == 'alumni')
                {
                    $replyauthorid = $reply_row['AUTHOR_ID'];
                    $sql2 = "SELECT FIRSTNAME, LASTNAME, USERNAME FROM ALUMNI WHERE ALUMNIID = '$replyauthorid'";
                    $result2 = mysqli_query($conn, $sql2);
                    $reply_author_row = mysqli_fetch_assoc($result2);
                    $replies[] = array(
                    'reply_content' => $reply_row['CONTENT'],
                    'reply_fname' => $reply_author_row['FIRSTNAME'],
                    'reply_lname' => $reply_author_row['LASTNAME'],
                    'usertype' => 'Alumni'
                    );
                }
                if($reply_row['AUTHOR_TYPE'] == 'student')
                {
                    $replyauthorid = $reply_row['AUTHOR_ID'];
                    $sql2 = "SELECT FIRSTNAME, LASTNAME, USERNAME FROM STUDENT WHERE STUDENTID = '$replyauthorid'";
                    $result2 = mysqli_query($conn, $sql2);
                    $reply_author_row = mysqli_fetch_assoc($result2);
                    $replies[] = array(
                        'reply_content' => $reply_row['CONTENT'],
                        'reply_fname' => $reply_author_row['FIRSTNAME'],
                        'reply_lname' => $reply_author_row['LASTNAME'],
                        'usertype' => 'Student'
                    );
                }
            }


            $posts[] = array(
            'content' => $content,
            'title' => $title,
            'author_username' => $aluusername,
            'author_firstname' => $alufirstname,
            'author_lastname' => $alulastname,
            'post_usertype' => 'Alumni',
            'id' => $post_id,
            'replies' => $replies
            );
        }
        elseif($postauthortype == 'student')
        {
            $sql1 = "SELECT * FROM STUDENT WHERE STUDENTID = '$authorid'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) 
            {
                $row1 = mysqli_fetch_assoc($result1);
                $stuusername = $row1['USERNAME'];
                $stufirstname = $row1['FIRSTNAME'];
                $stulastname = $row1['LASTNAME'];
            }
            // Fetch replies for the post
            $reply_sql = "SELECT * FROM REPLIES WHERE POST_ID = $post_id ORDER BY REPLY_ID DESC";
            $reply_result = mysqli_query($conn, $reply_sql);
            $replies = array();
            while ($reply_row = mysqli_fetch_assoc($reply_result)) 
            {
                if($reply_row['AUTHOR_TYPE'] == 'alumni')
                {
                    $replyauthorid = $reply_row['AUTHOR_ID'];
                    $sql2 = "SELECT FIRSTNAME, LASTNAME, USERNAME FROM ALUMNI WHERE ALUMNIID = '$replyauthorid'";
                    $result2 = mysqli_query($conn, $sql2);
                    $reply_author_row = mysqli_fetch_assoc($result2);
                    $replies[] = array(
                    'reply_content' => $reply_row['CONTENT'],
                    'reply_fname' => $reply_author_row['FIRSTNAME'],
                    'reply_lname' => $reply_author_row['LASTNAME'],
                    'usertype' => 'Alumni'
                    );
                }
                if($reply_row['AUTHOR_TYPE'] == 'student')
                {
                    $replyauthorid = $reply_row['AUTHOR_ID'];
                    $sql2 = "SELECT FIRSTNAME, LASTNAME, USERNAME FROM STUDENT WHERE STUDENTID = '$replyauthorid'";
                    $result2 = mysqli_query($conn, $sql2);
                    $reply_author_row = mysqli_fetch_assoc($result2);
                    $replies[] = array(
                    'reply_content' => $reply_row['CONTENT'],
                    'reply_fname' => $reply_author_row['FIRSTNAME'],
                    'reply_lname' => $reply_author_row['LASTNAME'],
                    'usertype' => 'Student'
                    );
                }
            }


            $posts[] = array(
                'content' => $content,
                'title' => $title,
                'author_username' => $stuusername,
                'author_firstname' => $stufirstname,
                'author_lastname' => $stulastname,
                'post_usertype' => 'Student',
                'id' => $post_id,
                'replies' => $replies
            );
        
        }
    }
}

// Return posts as JSON
header('Content-Type: application/json');
echo json_encode($posts);
?>