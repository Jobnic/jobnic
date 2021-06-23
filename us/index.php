<?php
session_start();
include("../pack/config.php");

$stat = $_SESSION['status'];

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $get_jobs = "SELECT * FROM jobs WHERE status = 'true' AND type = '$type' ORDER BY row DESC";
}
else {
    $get_jobs = "SELECT * FROM jobs WHERE status = 'true' ORDER BY row DESC";
}

$result_jobs = mysqli_query($connection, $get_jobs);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Jobs</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            padding: 8%;
        }
        .card {
            padding: 2%;
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
                        <a class="nav-link active" aria-current="page" href="."><i class="fa fa-list"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#about"><i class="fa fa-info"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#contact"><i class="fa fa-phone"></i> Contact Us</a>
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
    <br>
    <div class="container">
        <br>
        <div class="row" id="about">
            <div class="col-md-12">
                <div class="card border border-dark">
                    <h3>About Us</h3>
                    <hr class="border border-dark">
                    <p>
                        We are <b>Job Nic</b> team, working under <b>Neotrinost Limited Liability Company</b> founded by <b>Amirhossein Mohammadi</b> and <b>Annahita Mirhosseini</b>.
                        <br>
                        <b>Job Nic</b> Founded in 12 Jun 2021 by <b>Amirhossein Mohammadi</b> with all entire <b>PHP</b> but company is working on new version of <b>Job Nic</b> with <b>Laravel</b>.
                        <br>
                        Ok, <b>Job Nic</b> is a place for find small or big jobs. Here you have a special ID that means your CV. You can add your skills and other things.
                        <br>

                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="row" id="contact">
            <div class="col-md-12">
                <div class="card border border-dark">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
