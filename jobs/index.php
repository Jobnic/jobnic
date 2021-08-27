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
        window.alert("For review jobs you should login first");
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Jobs</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.neotrinost.ir/jobnic/css/main.css" type="text/css" rel="stylesheet">
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
    <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" type="text/css" rel="stylesheet">
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
                <a href="index.php" class="btn btn-sm see-all">See All</a>
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
                <a href="index.php?type=costume" class="btn btn-sm others">Others</a>
            </p>
        </div>
        <br>
        <div class="row">
            <?php
                if (mysqli_num_rows($result_jobs) > 0) {
                    while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                        ?>
                        <div class="col-md-3">
                            <div class="dialog">
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
                                    <span style="float: right;" class="btn btn-outline-primary btn-sm"><?php echo $job_row['type']; ?></span>
                                </p>
                                <hr>
                                <small>
                                    Open the job in new tab for more information.
                                </small>
                                <br>
                                <br>
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
