<?php

session_start();

$stat = $_SESSION['status'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Contact us</title>
    <link href="../pack/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <style>
        body {
            padding: 8%;
        }

        .icon {
            padding: 5px;
            border-radius: 5px;
        }

        .link {
            text-decoration: none;
            color: gray;
        }

        .dialog {
            border: solid 1px #d3d3d3;
            padding: 5%;
        }

        .mbtn:hover {
            color: white;
        }
    </style>
</head>
<body>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">Job Nic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../jobs"><i class="fa fa-list"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./about.php"><i class="fa fa-info"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contact.php"><i class="fa fa-phone"></i> Contact Us</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <?php
                    if ($stat == true) {
                        ?>
                        <a class="nav-link active" href="../user"><i class="fa fa-dashboard"></i> Go To Panel</a> <a class="nav-link active" href="../account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        <?php
                    }
                    else {
                        ?>
                        <a class="nav-link active" href="../account/index.php"><i class="fa fa-plus"></i> Sign Up</a> <a class="nav-link active" href="../account/index.php"><i class="fa fa-sign-in"></i> Sign In</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="dialog">
                    <h3>Contact Us</h3>
                    <hr>
                    <p><b>Call us</b></p>
                    <p><i class="fa fa-home text-white bg-warning icon"></i> <b>Office</b> +98 213 6156 859</p>
                    <p><i class="fa fa-phone text-white bg-success icon"></i> <b>Phone</b> +98 901 4784 362</p>
                    <br>
                    <p><b>Job Nic in social media</b></p>
                    <p>
                        <a target="_blank" class="link" href="https://t.me/Job_Nic">
                            <i class="icon fa fa-telegram text-white bg-primary"></i>
                        </a>
                        <a target="_blank" class="link" href="https://github.com/Neotrinost">
                            <i class="icon fa fa-github text-white bg-dark"></i>
                        </a>
                    </p>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script src="../pack/bootstrap.min.js"></script>
</body>
</html>