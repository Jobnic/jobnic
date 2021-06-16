<?php
include("../pack/config.php");

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$userid = $_GET['userid'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - User Review</title>
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
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <?php
            if (isset($userid)) {
                $profile = "SELECT * FROM people WHERE id = '$userid'";
                $result = mysqli_query($connection, $profile);
                if (mysqli_num_rows($result) != 1) {
                    ?>
                    <script>
                        window.alert("User didnt found.");
                        window.location.replace("../../");
                    </script>
                <?php
                }
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="col-md-4">
                    <div class="dialog">
                        <h3><i class="fa fa-info text-secondary"></i> About</h3>
                        <hr>
                        <p><b><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></b></p>
                        <p><?php echo $row['bio']; ?></p>
                        <hr>
                        <p>
                            <p><i class="icon fa fa-phone text-white bg-success"></i> <?php echo $row['phone']; ?></p>
                            <p><i class="icon fa fa-envelope text-white bg-primary"></i> <?php echo $row['email']; ?></p>
                        </p>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="dialog">
                        <h3><i class="fa fa-list text-secondary"></i> Skills</h3>
                        <hr>
                        <p>
                            <?php
                            $colors = array("primary", 'danger', 'warning', 'info', 'success', 'dark', 'secondary');

                            $dbskills = $row['skills'];
                            $all = explode(" ", $dbskills);

                            foreach ($all

                            as $skill) {
                            $each = explode("-", $skill);

                            $color = rand(0, 6);

                            ?>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-primary text-white progress-bar-animated"
                                 role="progressbar" aria-valuenow="<?php echo $each[1]; ?>" aria-valuemin="0"
                                 aria-valuemax="100" style="width: <?php echo $each[1]; ?>%;">
                            </div>
                        </div>
                        <span class="text-primary"
                              style="font-size: 10px;"><?php echo $each[0] . " " . $each[1]; ?> %</span>
                        <hr>
                        <?php
                        }
                        ?>
                        </p>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="dialog">
                        <h3><i class="fa fa-cloud text-secondary"></i> Social Media</h3>
                        <hr>
                        <p>
                        <?php
                        if (isset($row['linkedin'])) {
                        ?>
                        <p>
                            <a target="_blank" class="link"
                               href="https://linkedin.com/in/<?php echo $row['linkedin']; ?>">
                                <i class="icon fa fa-linkedin text-white bg-primary"></i> <span
                                        class="text-primary">Linkedin</span>
                            </a>
                        </p>
                        <?php
                        }
                        if (isset($row['github'])) {
                            ?>
                            <p>
                                <a target="_blank" class="link"
                                   href="https://linkedin.com/in/<?php echo $row['github']; ?>">
                                    <i class="icon fa fa-github text-white bg-dark"></i> <span
                                            class="text-dark">Github</span>
                                </a>
                            </p>
                            <?php
                        }
                        if (isset($row['telegram'])) {
                            ?>
                            <p>
                                <a target="_blank" class="link"
                                   href="https://linkedin.com/in/<?php echo $row['telegram']; ?>">
                                    <i class="icon fa fa-telegram text-white bg-primary"></i> <span
                                            class="text-primary">Telegram</span>
                                </a>
                            </p>
                            <?php
                        }
                        if (isset($row['instagram'])) {
                            ?>
                            <p>
                                <a target="_blank" class="link"
                                   href="https://linkedin.com/in/<?php echo $row['instagram']; ?>">
                                    <i class="icon fa fa-instagram text-white bg-danger"></i> <span class="text-danger">Instagram</span>
                                </a>
                            </p>
                            <?php
                        }
                        if (isset($row['twitter'])) {
                            ?>
                            <p>
                                <a target="_blank" class="link"
                                   href="https://linkedin.com/in/<?php echo $row['twitter']; ?>">
                                    <i class="icon fa fa-twitter text-white bg-info"></i> <span class="text-info">Twitter</span>
                                </a>
                            </p>
                            <?php
                        }
                        ?>
                        </p>
                    </div>
                    <br>
                </div>
            <?php
            } else {
            ?>
                <script>
                    window.location.replace("../../");
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
