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
<html>

<head>
    <title>Alumni Directory</title>
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

        section {
            margin-bottom: 20px;
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
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin-top: 10px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .post {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
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
        <section>
        <?php 
            if($usertype == 'alumni')
           {
            echo '<h2>Alumni Directory - Welcome <?php echo $username ?> to the Alumni Portal</h2>';
            echo '<p>The Alumni Directory is really useful for graduates who want to meet new people or get in touch with old friends. </p>';
           }
           if($usertype == 'student')
           {
            echo '<h2>Alumni Directory - Welcome <?php echo $username ?> to the Student/Alumni Portal</h2>';
            echo '<p>The Alumni Directory is really useful for graduates who want to meet new people or get in touch with old friends. </p>';
           }
           ?>
        </section>
        <section>
            <?php
                include 'dbconnection.php';
                $sql = "SELECT * FROM ALUMNI WHERE 1";
                $result = $conn->query($sql);
                if (!$result)
                {
                    echo "Error: " . $conn->error;
                }
                elseif ($result->num_rows > 0)
                {
                    echo "<table border='1' align='center'><tr><th>Alumni Name</th><th>EMAIL ID</th></tr>";
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td align='center'><a href='details.php?email=" . urlencode($row["EMAILID"]) ."'>" . $row["FIRSTNAME"] ." ". $row["LASTNAME"] ."</td><td align='center'> ". $row["EMAILID"] ."</a></td></tr>";
                    }
                    echo "</table>";
                }
            ?>
        </section>
    </main>
</body>

</html>