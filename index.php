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
    <title>Job Nic - Index</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 8%;
        }
        .dialog {
            text-align: center;
            border: solid 1px black;
        }
    </style>
</head>
<body>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href=".">Job Nic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="jobs"><i class="fa fa-list"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="us/about.php"><i class="fa fa-info"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="us/contact.php"><i class="fa fa-phone"></i> Contact Us</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <?php
                        if ($stat == true) {
                            ?>
                            <a class="nav-link active" href="user"><i class="fa fa-dashboard"></i> Go To Panel</a> <a class="nav-link active" href="account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                            <?php
                        }
                        else {
                            ?>
                            <a class="nav-link active" href="account/index.php"><i class="fa fa-plus"></i> Sign Up</a> <a class="nav-link active" href="account/index.php"><i class="fa fa-sign-in"></i> Sign In</a>
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
            
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>