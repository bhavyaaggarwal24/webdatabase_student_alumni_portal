<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include 'dbconnection.php';
$uname = $_POST['username'];
$utype = $_POST['usertype'];

$securityquestion1 = $_POST['securityquestion1'];
$answer1 = $_POST['answer1'];
$securityquestion2 = $_POST['securityquestion2'];
$answer2 = $_POST['answer2'];

if($securityquestion1 != $securityquestion2){

        if($utype == "Student")
        {
            $sql1 = "SELECT * FROM SECURITYQUESTIONS where STUDENTUSERNAME = '$uname'";
            $result = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($result);
            $stuanswer1 = $row['ANSWER1'];
            $stuanswer2 = $row['ANSWER2'];

            if ($stuanswer1 == $answer1 && $stuanswer2 == $answer2)
            {
                ?>
                <style>
                    .center-wrapper {
                        display: grid;
                        place-items: center;
                        height: 100vh; /* Set height to 100% of viewport height */
                                }
                        main {
                            padding: 20px;
                            background-color: #ffffff00;
                            margin: 20px auto;
                            width: 50%;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }

                        section {
                            margin-bottom: 20px;
                        }
                </style>
                <main>
                <section>
                <div class="center-wrapper">
                    <form method="post" action="password_update.php">
                    Please enter your new password:
                    <input type="password" id="password" name="password" required>
                    <br><br>
                    Re-enter your new password:
                    <input type="password" id="password1" name="password1" required>
                    <br><br>
                    <input type='hidden' name='uname' value="<?php echo $uname; ?>">
                    <input type='hidden' name='utype' value="<?php echo $utype; ?>">
                    <input type="submit" value="Submit">
                    </form>
                </div>
                </section>
                </main>
                <?php
            }                     
            else
            {
                echo "Your answers are incorrect, please enter correct answers. Make sure to choose correct usertype.";
            }
        
    }
    
    if($utype == "Alumni")
    {
        $sql2 = "SELECT * FROM SECURITYQUESTIONS where ALUMNIUSERNAME = '$uname'";
        $result = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result);
        $aluanswer1 = $row['ANSWER1'];
        $aluanswer2 = $row['ANSWER2'];

        if ($aluanswer1 == $answer1 && $aluanswer2 == $answer2)
        {
            ?>
            <style>
                .center-wrapper {
                    display: grid;
                    place-items: center;
                    height: 100vh; /* Set height to 100% of viewport height */
                }
                main {
                    padding: 20px;
                    background-color: #ffffff00;
                    margin: 20px auto;
                    width: 50%;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                section {
                    margin-bottom: 20px;
                }
            </style>
            <main>
            <section>
            <div class="center-wrapper">
                <form method="post" action="password_update.php">
                Please enter your new password:
                <input type="password" id="password" name="password" required>
                <br><br>
                Re-enter your new password:
                <input type="password" id="password1" name="password1" required>
                <br><br>
                <input type='hidden' name='uname' value="<?php echo $uname; ?>">
                <input type='hidden' name='utype' value="<?php echo $utype; ?>">
                <input type="submit" value="Submit">
                </form>
                </div>
            </section>
            </main>
            <?php
        }
        else
        {
            echo "Your answers are incorrect, please enter correct answers. Make sure to choose correct usertype.";
        }
        
    }
}
else{
    echo "Both security questions can't be same. Please choose two different security questions.";
}
?>