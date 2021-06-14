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
                    <a class="nav-link active" href="../account">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="dialog">
                    <h3>Profile</h3>
                    <hr>
                    <p><b><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></b></p>
                    <p>
                        <i class="icon fa fa-phone text-white bg-success" data-bs-toggle="tooltip"
                           data-bs-placement="top" title="<?php echo $row['phone']; ?>"></i>
                        <i class="icon fa fa-envelope text-white bg-primary" data-bs-toggle="tooltip"
                           data-bs-placement="top" title="<?php echo $row['email']; ?>"></i>
                    </p>
                    <p>
                        <?php
                        if ($row['linkedin'] != 'n') {
                            ?>
                            <a target="_blank" class="link"
                               href="https://linkedin.com/in/<?php echo $row['linkedin']; ?>"><i
                                        class="icon fa fa-linkedin text-white bg-primary"></i></a>
                            <?php
                        }
                        if ($row['github'] != 'n') {
                            ?>
                            <a target="_blank" class="link" href="https://github.com/<?php echo $row['github']; ?>"><i
                                        class="icon fa fa-github text-white bg-dark"></i></a>
                            <?php
                        }
                        if ($row['telegram'] != 'n') {
                            ?>
                            <a target="_blank" class="link" href="https://t.me/<?php echo $row['telegram']; ?>"><i
                                        class="icon fa fa-telegram text-white bg-primary"></i></a>
                            <?php
                        }
                        if ($row['instagram'] != 'n') {
                            ?>
                            <a target="_blank" class="link"
                               href="https://instagram.com/<?php echo $row['instagram']; ?>"><i
                                        class="icon fa fa-instagram text-white bg-danger"></i></a>
                            <?php
                        }
                        if ($row['twitter'] != 'n') {
                            ?>
                            <a target="_blank" class="link" href="https://twitter.com/<?php echo $row['twitter']; ?>"><i
                                        class="icon fa fa-twitter text-white bg-info"></i></a>
                            <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="dialog">
                    <h3>Update Your profile</h3>
                    <hr>
                    <form class="">
                        <div class="group">
                            <i class="fa fa-linkedin text-primary"></i>
                            &nbsp;
                            <input placeholder="Linkedin" class="form-control-sm inp border-primary">
                            &nbsp;
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-twitter text-info"></i>
                            &nbsp;
                            <input placeholder="Twitter" class="form-control-sm inp border-info">
                            &nbsp;
                            <button class="btn btn-info text-white btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-github text-dark"></i>
                            &nbsp;
                            <input placeholder="GitHub" class="form-control-sm inp border-dark">
                            &nbsp;
                            <button class="btn btn-dark btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-telegram text-primary"></i>
                            &nbsp;
                            <input placeholder="Telegram" class="form-control-sm inp border-primary">
                            &nbsp;
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-instagram text-danger"></i>
                            &nbsp;
                            <input placeholder="Instagram" class="form-control-sm inp border-danger">
                            &nbsp;
                            <button class="btn btn-danger btn-sm">Update</button>
                        </div>
                    </form>
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
