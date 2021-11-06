<?php

session_start();
include("../pack/config/config.php");

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.alert("For review this job you should login first");
        window.location.replace("../jobs");
    </script>
    <?php
}

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

if ($row['status'] == 'not') {
    ?>
    <script>
        window.alert("Sorry, Your account should be active.");
        window.location.replace("../account/pay.php");
    </script>
    <?php
}

$jobid = $_GET['jobid'];

include('core.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/jpg" href="<?php echo $path; ?>/pack/etc/logo.jpg"/>
    <meta property="og:image" content="<?php echo $path; ?>/pack/etc/logo.jpg">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Job Review</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../pack/cos/main.css" type="text/css" rel="stylesheet">
    <link href="../pack/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <style>
        .icon {
            padding: 5px;
            border-radius: 5px;
        }

        .link {
            text-decoration: none;
            color: gray;
        }
    </style>
</head>
</head>
<body>
<div class="">
    <?php include("../pack/panels/header.php"); ?>
    <br>
    <div class="container-fluid" style="padding: 5%;">
        <div class="row">
            <?php
            if (isset($jobid)) {
                ?>
                <div class="col-md-8">
                    <div class="jobdialog jnborder">
                        <?php
                        $select_job = "SELECT * FROM jobs WHERE jobid = '$jobid'";
                        $result_job = mysqli_query($connection, $select_job);
                        if (mysqli_num_rows($result_job) != 1) {
                            ?>
                            <script>
                                window.alert("آگهی پیدا نشد.");
                                window.location.replace("../jobs");
                            </script>
                            <?php
                        }
                        $row_job = mysqli_fetch_assoc($result_job);
                        ?>
                        <span style="float: left;" class="btn btn-outline-danger btn-sm"><?php echo $row_job['type']; ?></span>
                        <span style="float: left; color: white;">-</span>
                        <span style="float: left;" class="btn btn-sm btn-outline-dark"><i
                                    class="fa fa-eye"></i> <?php echo $row_job["views"]; ?></span>
                        <h3 class="text-success"><?php echo $row_job['title']; ?></h3>
                        <hr class="border border-success">
                        <p><b><?php echo $row_job['describe']; ?></b></p>
                        <p><?php echo $row_job['datetime']; ?></p>
                        <small>بودجه <?php echo $row_job['price']; ?></small>
                        <br>
                        <br>
                        <?php
                        $skills = explode(" ", $row_job['skills']);

                        foreach ($skills as $skill) {
                            echo "<p class='btn jnout btn-sm'>$skill</p>&nbsp;";
                        }
                        ?>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="jobdialog jnborder">
                        <?php
                        $view = $row_job['views'] + 1;
                        $update = "UPDATE jobs SET views = '$view' WHERE jobid = '$jobid'";
                        mysqli_query($connection, $update);

                        $user = $row_job['user'];
                        $select_user = "SELECT * FROM people WHERE id = '$user'";
                        $result_user = mysqli_query($connection, $select_user);
                        $row_user = mysqli_fetch_assoc($result_user);

                        if (empty($row_job['closed'])) {
                            ?>
                                <h3 class="text-primary"><i class="fa fa-pencil text-primary"></i> درخواست برای کار</h3>
                                <hr class="border border-primary">
                                <p class="text-primary">با کلیک کردن روی دکمه زیر، میتوانید یک درخواست برای این آگهی ثبت نمایید.</p>
                                <a href="job.php?send=true&job=<?php echo $jobid; ?>" class="btn btn-primary">Send my application</a>
                            <?php
                        }
                        else {
                            ?>
                            <h3 class="text-danger"><i class="fa fa-pencil text-danger"></i> درخواست برای کار</h3>
                            <hr class="border border-danger">
                            <div style="text-align: cenrightter;">
                                <button class="btn btn-danger">این آگهی بسته شده است.</button>
                            </div>
                            <?php
                        }
                        ?>
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
