<?php
session_start();
include("../pack/config.php");

$stat = $_SESSION['status'];

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);
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
        body {
            padding: 8%;
        }
        .cat {
            padding: 2%;
        }

        .link {
            text-decoration: none;
            color: gray;
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
                        <a class="nav-link active" aria-current="page" href="../us/about.php"><i class="fa fa-info"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../us/contact.php"><i class="fa fa-phone"></i> Contact Us</a>
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
        <div class="row">
            <?php
                $get_jobs = "SELECT * FROM jobs WHERE status = 'true' ORDER BY row DESC";
                $result_jobs = mysqli_query($connection, $get_jobs);
                if (mysqli_num_rows($result_jobs) > 0) {
                    while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                        if ($job_row["type"] == "android") {
                            ?>
                            <div class="col-md-3">
                                <div class="card-body border border-primary">
                                    <p class="text-primary">
                                        <b>
                                            <a class="link text-primary" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                                <?php echo $job_row['title']; ?>
                                            </a>
                                        </b>
                                        <span style="float: right;" class="btn btn-outline-primary btn-sm"><?php echo $job_row['type']; ?></span>
                                    </p>
                                    <hr class="border border-primary">
                                    <?php
                                    $skills = explode(" ", $job_row['skills']);

                                    foreach ($skills as $skill) {
                                        echo "<span class='btn btn-outline-primary btn-sm'>$skill</span>&nbsp;";
                                    }
                                    ?>
                                </div>
                                <br>
                            </div>
                            <?php
                        }
                        if ($job_row["type"] == "backend") {
                            ?>
                            <div class="col-md-3">
                                <div class="card-body border border-info">
                                    <p class="text-info">
                                        <b>
                                            <a class="link text-info" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                                <?php echo $job_row['title']; ?>
                                            </a>
                                        </b>
                                        <span style="float: right;" class="btn btn-outline-info btn-sm"><?php echo $job_row['type']; ?></span>
                                    </p>
                                    <hr class="border border-info">
                                    <?php
                                    $skills = explode(" ", $job_row['skills']);

                                    foreach ($skills as $skill) {
                                        echo "<span class='btn btn-outline-info btn-sm'>$skill</span>&nbsp;";
                                    }
                                    ?>
                                </div>
                                <br>
                            </div>
                            <?php
                        }
                        if ($job_row["type"] == "backend") {
                            ?>
                            <div class="col-md-3">
                                <div class="card-body border border-info">
                                    <p class="text-info">
                                        <b>
                                            <a class="link text-info" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                                <?php echo $job_row['title']; ?>
                                            </a>
                                        </b>
                                        <span style="float: right;" class="btn btn-outline-info btn-sm"><?php echo $job_row['type']; ?></span>
                                    </p>
                                    <hr class="border border-info">
                                    <?php
                                    $skills = explode(" ", $job_row['skills']);

                                    foreach ($skills as $skill) {
                                        echo "<span class='btn btn-outline-info btn-sm'>$skill</span>&nbsp;";
                                    }
                                    ?>
                                </div>
                                <br>
                            </div>
                            <?php
                        }
                        if ($job_row["type"] == "programming") {
                            ?>
                            <div class="col-md-3">
                                <div class="card-body border border-success">
                                    <p class="text-success">
                                        <b>
                                            <a class="link text-success" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                                <?php echo $job_row['title']; ?>
                                            </a>
                                        </b>
                                        <span style="float: right;" class="btn btn-outline-success btn-sm"><?php echo $job_row['type']; ?></span>
                                    </p>
                                    <hr class="border border-success">
                                    <?php
                                    $skills = explode(" ", $job_row['skills']);

                                    foreach ($skills as $skill) {
                                        echo "<span class='btn btn-outline-success btn-sm'>$skill</span>&nbsp;";
                                    }
                                    ?>
                                </div>
                                <br>
                            </div>
                            <?php
                        }
                        if ($job_row["type"] == "design") {
                            ?>
                            <div class="col-md-3">
                                <div class="card-body border border-danger">
                                    <p class="text-danger">
                                        <b>
                                            <a class="link text-danger" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                                <?php echo $job_row['title']; ?>
                                            </a>
                                        </b>
                                        <span style="float: right;" class="btn btn-outline-danger btn-sm"><?php echo $job_row['type']; ?></span>
                                    </p>
                                    <hr class="border border-danger">
                                    <?php
                                    $skills = explode(" ", $job_row['skills']);

                                    foreach ($skills as $skill) {
                                        echo "<span class='btn btn-outline-danger btn-sm'>$skill</span>&nbsp;";
                                    }
                                    ?>
                                </div>
                                <br>
                            </div>
                            <?php
                        }
                    }
                }
                else {
                   echo "<h3 class='text-secondary'>No jobs yet</h3>";
            }
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
