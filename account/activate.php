<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

include("../pack/config.php");
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
                    <h4>Your account is not activated.</h4>
                    <h4>Check your Email and active it via link.</h4>
                    <br>
                    <p>If want the Email again, click on the link below.</p>
                    <p><a href="#">Send Email again</a></p>
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
