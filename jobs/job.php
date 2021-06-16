<?php

session_start();
include("../pack/config.php");

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.alert("For review this job you should login first");
        window.location.replace("../jobs");
    </script>
    <?php
}

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$id = $_SESSION['id'];

//$profile = "SELECT * FROM people WHERE id = '$id'";
//$result = mysqli_query($connection, $profile);
//$row = mysqli_fetch_assoc($result);

$jobid = $_GET['jobid'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Job Review</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 8%;
        }

        .dialog {
            border: solid 1px #d3d3d3;
            padding: 5%;
        }

        .icon {
            padding: 5px;
            border-radius: 5px;
        }

        .link {
            text-decoration: none;
            color: gray;
        }

        .mbtn {
            border: solid 1px #d3d3d3;
        }

        .mbtn:hover {
            border: solid 1px #d3d3d3;
        }

        .inp {
            border: solid 1px #d3d3d3;
        }

        .inp:hover {
            border: solid 1px #d3d3d3;
        }
    </style>
</head>
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
                    <a class="nav-link active" href="../user"><i class="fa fa-dashboard"></i> Go To Panel</a> <a class="nav-link active" href="../account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <?php
            if (isset($jobid)) {
                ?>
                <div class="col-md-8">
                    <div class="dialog">
                        <?php
                        $select_job = "SELECT * FROM jobs WHERE jobid = '$jobid'";
                        $result_job = mysqli_query($connection, $select_job);
                        if (mysqli_num_rows($result_job) != 1) {
                            ?>
                            <script>
                                window.alert("Job didnt found.");
                                window.location.replace("../jobs");
                            </script>
                            <?php
                        }
                        $row_job = mysqli_fetch_assoc($result_job);
                        ?>
                        <span style="float: right;" class="btn btn-outline-danger btn-sm"><?php echo $row_job['type']; ?></span>
                        <h3><?php echo $row_job['title']; ?></h3>
                        <hr>
                        <p><b><?php echo $row_job['describe']; ?></b></p>
                        <?php
                        $skills = explode(" ", $row_job['skills']);

                        foreach ($skills as $skill) {
                            echo "<p class='btn btn-outline-secondary btn-sm'>$skill</p>&nbsp;";
                        }
                        ?>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="dialog">
                        <?php
                        $user = $row_job['user'];
                        $select_user = "SELECT * FROM people WHERE id = '$user'";
                        $result_user = mysqli_query($connection, $select_user);
                        $row_user = mysqli_fetch_assoc($result_user);
                        ?>
                        <h3><i class="fa fa-info text-secondary"></i> Contact</h3>
                        <hr>
                        <p><b><?php echo $row_user['firstname'] . '&nbsp;' . $row_user['lastname']; ?></b></p>
                        <p><?php echo $row_user['bio']; ?></p>
                        <hr>
                        <p>
                            <p><i class="icon fa fa-phone text-white bg-success"></i> <?php echo $row_user['phone']; ?></p>
                            <p><i class="icon fa fa-envelope text-white bg-primary"></i> <?php echo $row_user['email']; ?></p>
                        </p>
                        <hr>
                        <p><a href="../user/user.php?userid=<?php echo $row_user['id']; ?>" class="link text-dark">View full profile</a></p>
                    </div>
                </div>
                <?php

            } else {
                ?>
                <script>
                    window.location.replace("../jobs");
                </script>
                <?php
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
