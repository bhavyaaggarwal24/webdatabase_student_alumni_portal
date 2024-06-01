<?php
include 'dbconnection.php';
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$uname = $_POST['username'];
$pass = $_POST['password'];
$phn = $_POST['phonenumber'];
$email = $_POST['emailid'];
$degreeearned = $_POST['degreeearned'];
$graduationdate = $_POST['graduationdate'];
$employmentstatus = $_POST['employmentstatus'];
$employer = $_POST['employer'];
$address = $_POST['address'];
$industry = $_POST['industry'];
$jobtitle = $_POST['jobtitle'];
$linkedinprofile = $_POST['linkedinprofile'];
$mentorshipavailability = $_POST['mentorshipavailability'];
$prefrdmentorshiparea = $_POST['prefrdmentorshiparea'];
$prefrdcontactmethod = $_POST['prefrdcontactmethod'];

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
    exit(); // Stop further execution
}
$options = [
    'cost' => 12,
];
$passhash = password_hash($pass, PASSWORD_BCRYPT, $options);

$sqlInsertData = $conn->prepare("INSERT INTO ALUMNI (ALUMNIID, FIRSTNAME, LASTNAME, DOB, USERNAME, PASSWORD_HASH, DEGREEEARNED, PHONENUMBER, EMAILID, ADDRESS, JOBTITLE, INDUSTRY, GRADUATIONDATE, GENDER, EMPLOYER, EMPLOYMENTSTATUS, LINKEDINPROFILE, MENTORSHITPAVAILABILITY, PRFRDMENTORSHIPAREA, PREFRDCONTACTMETHOD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sqlInsertData->bind_param("ssssssssssssssssssss", $newid, $fname, $lname, $dob, $uname, $passhash, $degreeearned, $phn, $email, $address, $jobtitle, $industry, $graduationdate, $gender, $employer, $employmentstatus, $linkedinprofile, $mentorshipavailability, $prefrdmentorshiparea, $prefrdcontactmethod);

if ($sqlInsertData->execute()) 
{
  echo "Alumni data inserted successfully.\n";
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

$sqlInsertData->close();
mysqli_close($conn);
?>
