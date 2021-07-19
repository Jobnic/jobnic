<?php

session_start();

$stat = $_SESSION['status'];
if ($stat != true) {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

include("../pack/config.php");

$id = $_SESSION['id'];

$select_user = "SELECT * FROM people WHERE id = '$id'";
$result_user = mysqli_query($connection, $select_user);
$row_user = mysqli_fetch_assoc($result_user);

$name = $row_user['firstname'];
$email = $row_user['email'];

if (isset($_GET['send'])) {
    $token = $row_user['token'];

    $send = new PHPMailer;

    $send->IsSMTP();
    $send->SMTPAuth = true;
    $send->Host = "smtp.zoho.com";
    $send->Port = 587;
    $send->Username = $mailaddr;
    $send->Password = $mailpass;
    $send->SMTPSecure = 'tsl';
    $send->Subject = "Active token";

    $send->setFrom($mailaddr, 'Jobnic');
    $send->addAddress($email);
    $send->isHTML(true);

    $link = "http://127.0.0.1/jobnic/account/activate.php?token=$token";

    $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
    $bodyContent .= '<h3>You requested for activation email.</h3>';
    $bodyContent .= '<h5>You can click on the link below and activate your account soon.</h5>';
    $bodyContent .= '<h5><a href=' . $link . '>Activate my account</a></h5>';
    $bodyContent .= '<br>';
    $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

    $send->Body = $bodyContent;

    if (!$send->send()) {
        array_push($errors, 'Message could not be sent. Mailer Error: ' . $send->ErrorInfo);
    } else {
        ?>
        <script>
            window.alert("Email sent.");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_GET['token'])) {
    $activation_code = $_GET['token'];

    $activation_sql = "SELECT * FROM people WHERE token = '$token'";
    $activation_result = mysqli_query($connection, $activation_sql);

    if (mysqli_num_rows($activation_result) == 1) {
        $activation_mail = new PHPMailer;

        $activation_mail->IsSMTP();
        $activation_mail->SMTPAuth = true;
        $activation_mail->Host = "smtp.zoho.com";
        $activation_mail->Port = 587;
        $activation_mail->Username = $mailaddr;
        $activation_mail->Password = $mailpass;
        $activation_mail->SMTPSecure = 'tsl';
        $activation_mail->Subject = "Active token";

        $activation_mail->setFrom($mailaddr, 'Jobnic');
        $activation_mail->addAddress($email);
        $activation_mail->isHTML(true);

        $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
        $bodyContent .= '<h3>Your account activated successfully.</h3>';
        $bodyContent .= '<br>';
        $bodyContent .= '<h4>Enjoy.</h4>';
        $bodyContent .= '<br>';
        $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

        $activation_mail->Body = $bodyContent;

        if (!$activation_mail->send()) {
            array_push($errors, 'Message could not be sent. Mailer Error: ' . $activation_mail->ErrorInfo);
        } else {
            ?>
            <script>
                window.alert("Your account activated successfully.");
                window.location.replace("../user");
            </script>
            <?php
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Activation</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="../pack/main.css" type="text/css" rel="stylesheet">
    <style>
        .main {
            color: red;
            border: solid 1px red;
            border-radius: 5px;
            padding: 5%;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="main">
                    <h1><i class="fa fa-times"></i></h1>
                    <br>
                    <h4>Hi dear <?php echo $name; ?></h4>
                    <br>
                    <p>
                        Your account is not activated.
                        <br>
                        Check your Email and active it via link.
                    </p>
                    <br>
                    <p>If want the Email again, click on the link below.</p>
                    <p><a href="activate.php?send=true">Send Email again</a></p>
                    <br>
                    <small>Email sent to <?php echo $email; ?></small>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
