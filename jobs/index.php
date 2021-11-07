<?php
session_start();

include("../pack/config/config.php");

$stat = $_SESSION['status'];

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

$theme = $row['theme'];

if ($stat != true) {
    ?>
    <script>
        window.alert("برای نمایش آگهی ها ابتدا به حساب خود وارد شوید");
        window.location.replace("../");
    </script>
    <?php
}

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
    <link rel="shortcut icon" type="image/jpg" href="<?php echo $path; ?>/pack/etc/logo.jpg"/>
    <meta property="og:image" content="<?php echo $path; ?>/pack/etc/logo.jpg">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جاب نیک - آگهی ها</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/main.css" type="text/css" rel="stylesheet"> -->
    <link href="../pack/cos/main.css" type="text/css" rel="stylesheet">
    <?php
    if ($theme == "auto") {
        ?>
        <link href="https://cdn.neotrinost.ir/jobnic/css/auto.css" type="text/css" rel="stylesheet">
        <?php
    }
    else {
        ?>
        <link href="https://cdn.neotrinost.ir/jobnic/css/dark.css" type="text/css" rel="stylesheet">
        <link href="https://cdn.neotrinost.ir/jobnic/css/light.css" type="text/css" rel="stylesheet">
        <?php
    }
    ?>
    <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" type="text/css" rel="stylesheet"> -->
    <link href="../pack/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <style>
        .see-all {
            border: solid 1px fuchsia;
            color: fuchsia;
        }
        .see-all:hover {
            border: solid 1px fuchsia;
            color: white;
            background: fuchsia;
        }
        @media (prefers-color-scheme: dark) {
            .others {
                color: white;
                text-decoration: none;
                border: solid 1px white;
            }
            .others:hover {
                color: black;
                background: white;
                border: solid 1px white;
                text-decoration: none;
            }
        }
        @media (prefers-color-scheme: light) {
            .others {
                color: black;
                text-decoration: none;
                border: solid 1px black;
            }
            .others:hover {
                color: white;
                background: black;
                border: solid 1px black;
                text-decoration: none;
            }
        }
        @media (prefers-color-scheme: dark) {
            .jobtitle {
                color: aqua;
                text-decoration: none;
            }
        }
        @media (prefers-color-scheme: light) {
            .jobtitle {
                color: green;
                text-decoration: none;
            }
        }
    </style>
</head>
<body class="<?php echo $theme; ?>">
<div class="">
    <?php include("../pack/panels/header.php"); ?>
    <br>
    <div class="container-fluid index">
        <div class="row">
            <?php
                if (mysqli_num_rows($result_jobs) > 0) {
                    while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                        ?>
                        <div class="col-md-3">
                            <div class="jobdialog jnborder">
                                <p>
                                    <b>
                                        <a class="jobtitle" href="job.php?jobid=<?php echo $job_row['jobid']; ?>">
                                            <?php
                                            if ($job_row['nes'] == 'true') {
                                                echo '<i class="fa fa-asterisk text-danger"></i>';
                                            }
                                            echo '&nbsp;';
                                            echo $job_row['title'];
                                            ?>
                                        </a>
                                    </b>
                                    <span style="float: left;" class="btn btn-outline-primary btn-sm"><?php echo $job_row['type']; ?></span>
                                </p>
                                <hr>
                                <small>
                                    <?php echo $job_row['describe']; ?>
                                </small>
                                <br>
                                <br>
                                <div class="skills">
                                    <?php
                                    $skills = explode(" ", $job_row['skills']);

                                    foreach ($skills as $skill) {
                                        echo "<span class='btn jnout btn-sm'>$skill</span>&nbsp;";
                                    }
                                    ?>
                                </div>
                            </div>
                            <br>
                        </div>
                        <?php
                    }
                }
                else {
                   echo "<h3 class='text-secondary'>آگهی یافت نشد.</h3>";
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
