<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dbconnection.php';
$fname = $_GET['firstname'];
$lname = $_GET['lastname'];
$dob = $_GET['dob'];
$gender = $_GET['gender'];
$uname = $_GET['username'];
$pass = $_GET['password'];
$program = $_GET['program'];
$phn = $_GET['phonenumber'];
$email = $_GET['emailid'];
$enrollmentdate = $_GET['enrollmentdate'];
$expectedgraduationdate = $_GET['expectedgraduationdate'];
$gpa = $_GET['gpa'];
$status = $_GET['status'];
$address = $_GET['address'];

$securityquestion1 = $_GET['securityquestion1'];
$answer1 = $_GET['answer1'];
$securityquestion2 = $_GET['securityquestion2'];
$answer2 = $_GET['answer2'];

if($securityquestion1 != $securityquestion2){
$sql1 = "SELECT MAX(STUDENTID) AS id FROM STUDENT";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result);
$newid = $row['id'] != null ? $row['id'] + 1 : 1;

// Check for duplicate username
$sqlCheckUsername = "SELECT COUNT(*) AS count FROM STUDENT WHERE USERNAME = ?";
$stmtUsername = $conn->prepare($sqlCheckUsername);
$stmtUsername->bind_param("s", $uname);
$stmtUsername->execute();
$stmtUsername->bind_result($usernameCount);
$stmtUsername->fetch();
$stmtUsername->close();

if ($usernameCount > 0) {
    echo "Username '$uname' is already taken. Please choose a different username.";
    echo '<!DOCTYPE html>
    <br><br>
    <a href="studentsignup.html">Back</a>
    </html>';
    exit(); // Stop further execution
}

// Check for duplicate email
$sqlCheckEmail = "SELECT COUNT(*) AS count FROM STUDENT WHERE EMAILID = ?";
$stmtEmail = $conn->prepare($sqlCheckEmail);
$stmtEmail->bind_param("s", $email);
$stmtEmail->execute();
$stmtEmail->bind_result($emailCount);
$stmtEmail->fetch();
$stmtEmail->close();

if ($emailCount > 0) {
    echo "Email '$email' is already registered. Please use a different email address.";
    echo '<!DOCTYPE html>
    <br><br>
    <a href="studentsignup.html">Back</a>
    </html>';
    exit(); // Stop further execution
}

// Check for duplicate phone number
$sqlCheckPhone = "SELECT COUNT(*) AS count FROM STUDENT WHERE PHONENUMBER = ?";
$stmtPhone = $conn->prepare($sqlCheckPhone);
$stmtPhone->bind_param("s", $phn);
$stmtPhone->execute();
$stmtPhone->bind_result($phoneCount);
$stmtPhone->fetch();
$stmtPhone->close();

if ($phoneCount > 0) {
    echo "Phone number '$phn' is already registered. Please use a different phone number.";
    echo '<!DOCTYPE html>
    <br><br>
    <a href="studentsignup.html">Back</a>
    </html>';
    exit(); // Stop further execution
}

$options = [
    'cost' => 12,
];
$passhash = password_hash($pass, PASSWORD_BCRYPT, $options);


$sqlInsertData = $conn->prepare("INSERT INTO STUDENT (STUDENTID, FIRSTNAME, LASTNAME, DOB, USERNAME, PASSWORD_HASH, PROGRAM, PHONENUMBER, EMAILID, ADDRESS, ENROLLMENTDATE, EXPECTEDGRADUATIONDATE, GENDER, GPA, STATUS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sqlInsertData->bind_param("sssssssssssssss", $newid, $fname, $lname, $dob, $uname, $passhash, $program, $phn, $email, $address, $enrollmentdate, $expectedgraduationdate, $gender, $gpa, $status);

$sql2 = "SELECT MAX(SECURITYID) AS id FROM SECURITYQUESTIONS";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);
$newid1 = $row['id'] != null ? $row['id'] + 1 : 1;

$sqlInsertData2 = $conn->prepare("INSERT INTO SECURITYQUESTIONS (SECURITYID, QUESTION1, ANSWER1, QUESTION2, ANSWER2, STUDENTUSERNAME) VALUES (?, ?, ?, ?, ?, ?)");
$sqlInsertData2->bind_param("ssssss", $newid1, $securityquestion1, $answer1, $securityquestion2, $answer2, $uname );

if ($sqlInsertData->execute() && $sqlInsertData2->execute()) 
{
  #echo "Student data inserted successfully.\n";
  $sql3 = "SELECT USERNAME AS uname from STUDENT where USERNAME = '$uname' ";
  if (mysqli_query($conn, $sql3)){
  $result1 = mysqli_query($conn, $sql3);
  $row1 = mysqli_fetch_assoc($result1);
  $username = $row1['uname'];
  echo "<br><br>";
  echo "Thank you for your registeration. \n Your USER NAME is " .$username;
  echo '<!DOCTYPE html>
  <br><br>
  <a href="login.html">Go back to Login Page</a>
  </html>';
} 
else 
{
  echo "ERROR: Could not able to execute $sqlInsertData. " . $sqlInsertData->error . "\n";
  echo "<br><br>";
  echo "Please enter correct/complete details.";
  echo '<!DOCTYPE html>
  <br><br>
  <a href="login.html">Go back to Login Page</a>
  </html>';
}
}

$sqlInsertData2->close();
$sqlInsertData->close();
mysqli_close($conn);
}
else{
    echo "Both security questions can't be same. Please choose two different security questions.";
    echo '<!DOCTYPE html>
    <br><br>
    <a href="studentsignup.html">Back</a>
    </html>';
}
?>
