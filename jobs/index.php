<?php
session_start();

include("../pack/config/config.php");

$stat = $_SESSION['status'];

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

        .card-body:hover {
            background: #f6f6f6;
        }

        .link {
            text-decoration: none;
            color: gray;
        }
        .btn-outline-info:hover {
            color: white;
        }
        .mbtn {
            border: 1px solid purple;
            color: purple;
        }
        .mbtn:hover {
            background: purple;
            border: 1px solid purple;
            color: white;
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
                        <a class="nav-link active" aria-current="page" href="../jobs"><i class="fa fa-list"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../us"><i class="fa fa-bank"></i> We</a>
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
            <p class="x">
                <a href="index.php" class="btn btn-sm btn-outline-light mbtn">See All</a>
                &nbsp;
                <a href="index.php?type=programming" class="btn btn-sm btn-outline-success">Programming</a>
                &nbsp;
                <a href="index.php?type=design" class="btn btn-sm btn-outline-danger">Design</a>
                &nbsp;
                <a href="index.php?type=android" class="btn btn-sm btn-outline-primary">Android</a>
                &nbsp;
                <a href="index.php?type=backend" class="btn btn-sm btn-outline-info">Back-End</a>
                &nbsp;
                <a href="index.php?type=school" class="btn btn-sm btn-outline-secondary">School</a>
                &nbsp;
                <a href="index.php?type=costume" class="btn btn-sm btn-outline-dark">Others</a>
            </p>
        </div>
        <br>
        <div class="row">
            <?php
                if (mysqli_num_rows($result_jobs) > 0) {
                    while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                        ?>
                        <div class="col-md-4">
                            <div class="card-body border border-dark">
                                <p class="text-dark">
                                    <b>
                                        <a class="link text-dark" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                            <?php
                                            if ($job_row['nes'] == 'true') {
                                                echo '<i class="fa fa-asterisk text-danger"></i>';
                                            }
                                            echo '&nbsp;';
                                            echo $job_row['title'];
                                            ?>
                                        </a>
                                    </b>
                                    <span style="float: right;" class="btn btn-outline-dark btn-sm"><?php echo $job_row['type']; ?></span>
                                </p>
                                <hr class="border border-dark">
                                <?php
                                $skills = explode(" ", $job_row['skills']);

                                foreach ($skills as $skill) {
                                    echo "<span class='btn btn-outline-dark btn-sm'>$skill</span>&nbsp;";
                                }
                                ?>
                            </div>
                            <br>
                        </div>
                        <?php
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
