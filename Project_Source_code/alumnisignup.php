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
$phn = $_GET['phonenumber'];
$email = $_GET['emailid'];
$degreeearned = $_GET['degreeearned'];
$graduationdate = $_GET['graduationdate'];
$employmentstatus = $_GET['employmentstatus'];
$employer = $_GET['employer'];
$address = $_GET['address'];
$industry = $_GET['industry'];
$jobtitle = $_GET['jobtitle'];
$linkedinprofile = $_GET['linkedinprofile'];
$mentorshipavailability = $_GET['mentorshipavailability'];
$prefrdmentorshiparea = $_GET['prefrdmentorshiparea'];
$prefrdcontactmethod = $_GET['prefrdcontactmethod'];

$securityquestion1 = $_GET['securityquestion1'];
$answer1 = $_GET['answer1'];
$securityquestion2 = $_GET['securityquestion2'];
$answer2 = $_GET['answer2'];

if($securityquestion1 != $securityquestion2){
$sql1 = "SELECT MAX(ALUMNIID) AS id FROM ALUMNI";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $newid = $row['id'] != null ? $row['id'] + 1 : 1;

// Check for duplicate username
$sqlCheckUsername = "SELECT COUNT(*) AS count FROM ALUMNI WHERE USERNAME = ?";
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
    <a href="alumnisignup.html">Back</a>
    </html>';
    exit(); // Stop further execution
}

// Check for duplicate email
$sqlCheckEmail = "SELECT COUNT(*) AS count FROM ALUMNI WHERE EMAILID = ?";
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
    <a href="alumnisignup.html">Back</a>
    </html>';
    exit(); // Stop further execution
}

// Check for duplicate phone number
$sqlCheckPhone = "SELECT COUNT(*) AS count FROM ALUMNI WHERE PHONENUMBER = ?";
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
    <a href="alumnisignup.html">Back</a>
    </html>';
    exit(); // Stop further execution
}
$options = [
    'cost' => 12,
];
$passhash = password_hash($pass, PASSWORD_BCRYPT, $options);

$sqlInsertData = $conn->prepare("INSERT INTO ALUMNI (ALUMNIID, FIRSTNAME, LASTNAME, DOB, USERNAME, PASSWORD_HASH, DEGREEEARNED, PHONENUMBER, EMAILID, ADDRESS, JOBTITLE, INDUSTRY, GRADUATIONDATE, GENDER, EMPLOYER, EMPLOYMENTSTATUS, LINKEDINPROFILE, MENTORSHITPAVAILABILITY, PRFRDMENTORSHIPAREA, PREFRDCONTACTMETHOD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sqlInsertData->bind_param("ssssssssssssssssssss", $newid, $fname, $lname, $dob, $uname, $passhash, $degreeearned, $phn, $email, $address, $jobtitle, $industry, $graduationdate, $gender, $employer, $employmentstatus, $linkedinprofile, $mentorshipavailability, $prefrdmentorshiparea, $prefrdcontactmethod);

$sql2 = "SELECT MAX(SECURITYID) AS id FROM SECURITYQUESTIONS";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result);
$newid1 = $row['id'] != null ? $row['id'] + 1 : 1;

$sqlInsertData2 = $conn->prepare("INSERT INTO SECURITYQUESTIONS (SECURITYID, QUESTION1, ANSWER1, QUESTION2, ANSWER2, ALUMNIUSERNAME) VALUES (?, ?, ?, ?, ?, ?)");
$sqlInsertData2->bind_param("ssssss", $newid1, $securityquestion1, $answer1, $securityquestion2, $answer2, $uname );

if ($sqlInsertData->execute() && $sqlInsertData2->execute()) 
{
  #echo "Alumni data inserted successfully.\n";
  echo "<br><br>";
  $sql3 = "SELECT USERNAME AS uname from ALUMNI where USERNAME = '$uname' ";
        $result1 = mysqli_query($conn, $sql3);
        $row1 = mysqli_fetch_assoc($result1);
        $username = $row1['uname'];
        echo "<br><br>";
        echo "Thank you for your registeration. \n Your USER NAME is " .$username;
        echo "<br><br>";
  echo '<!DOCTYPE html>
  <br><br>
  <a href="login.html">Go back to Login Page</a>
  </html>';
} 
else 
{
  echo "ERROR: Could not able to execute $sqlInsertData. " . $sqlInsertData->error . "\n";
  echo "Please enter correct/complete details.";
  echo "<br><br>";
  echo "Thank you for your registeration. \n Your USER NAME is " .$username;
  echo '<!DOCTYPE html>
  <br><br>
  <a href="login.html">Go back to Login Page</a>
  </html>';
}

$sqlInsertData2->close();
$sqlInsertData->close();
mysqli_close($conn);
}
else{
    echo "Both security questions can't be same. Please choose two different security questions.";
    echo '<!DOCTYPE html>
    <br><br>
    <a href="alumnisignup.html">Back</a>
    </html>';
}
?>
