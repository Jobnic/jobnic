<?php
session_start();

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

$server = '127.0.0.1';
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <?php
                    if ($stat == true) {
                        ?>
                        <a class="nav-link active" href="../user">Go To Panel</a>
                        <?php
                    }
                    else {
                        ?>
                        <a class="nav-link active" href="../account/index.php">Sign Up</a> <a class="nav-link active" href="../account/index.php">Sign In</a>
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
            <?php
                $get_jobs = "SELECT * FROM jobs";
                $result_jobs = mysqli_query($connection, $get_jobs);
                if (mysqli_num_rows($result_jobs)) {
                    while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                        ?>
                        <div class="col-3">
                            <div class="dialog">
                                <h4><?php echo $job_row['title']; ?></h4>
                                <hr>
                                <p><?php echo $job_row['describe']; ?></p>
                                <?php
                                $skills = explode(" ", $job_row['skills']);

                                foreach ($skills as $skill) {
                                    echo "<p class='btn btn-secondary btn-sm text-white'>$skill</p>&nbsp;";
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
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