<?php
$server = "localhost";
$username = ""; # enter your user name
$password = ""; # enter your password
$database = "";# enter your db name



// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
	
}

?>