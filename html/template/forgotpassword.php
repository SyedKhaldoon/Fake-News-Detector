<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fake news detector";



// database conection
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $token)
{

    require('G:/xamp/htdocs/Practice Websiites/PHPMailer/PHPMailer.php');
    require('G:/xamp/htdocs/Practice Websiites/PHPMailer/SMTP.php');
    require('G:/xamp/htdocs/Practice Websiites/PHPMailer/Exception.php');
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'alisadia229@gmail.com';                     //SMTP username
        $mail->Password   = 'mjqvalxxppyvypna';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('alisadia229@gmail.com', 'Fake News Detector');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'RESET PASSWORD';
        $mail->Body    = "We got a request to reset your password!<br>
        Click The link below:<br>
        <a href='http://localhost/practice Websiites/PHP/updatepassword.php?email=$email&token=$token'>Reset Password</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
if (isset($_POST["submit"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $quer = "SELECT *from registration where  email='$email' ";
    $res = mysqli_query($conn, $quer);
    $count = mysqli_num_rows($res);

    if ($count) {
        $row = mysqli_fetch_array($res);
        $username = $row['email'];
        $token = $row['token'];
        
        if (mysqli_query($conn, $quer) && sendMail($_POST['email'], $token)) {
            $_SESSION["message"] = "Password Reset link send at " . $email . " . ";
        } else {
            $_SESSION["message"] = "Inavalid Email entered ";
        }
    } else {
        $_SESSION["message"] = "Inavalid Email ";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake News Detector</title>
    <link rel="icon" href="../Images/fake.png">
    <link rel="stylesheet" href="../CSS/forgot.css">
    <script src="../JS/signup.js"> </script>


</head>

<body>
    <div class="container">
        <div class="row">

            <form action="../PHP/forgotpassword.php" method="POST" autocomplete="on">

                <label class="text-center">Forgot Password</label>
                <?php
                if (isset($_SESSION['message'])) {

                    echo $_SESSION["message"];
                    session_unset();
                }
                ?>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="submit" value="Continue">
                </div>
                <p> Have an account?<a href="../PHP/sigup.php" style="color: red;">Login</a></p>
            </form>

        </div>
    </div>

</body>

</html>