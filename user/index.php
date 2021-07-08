<?php
session_start();

include('core.php');
include("../pack/config.php");

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

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

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - User Panel</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            padding: 8%;
        }
        .dialog {
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
        .inp {
            border: solid 1px #d3d3d3;
        }
        .inp:hover {
            border: solid 1px #d3d3d3;
        }
        .text-night {
            color: midnightblue;
        }

        .border-night {
            border: solid 1px midnightblue;
        }
        .btn-night {
            background: midnightblue;
            color: white;
        }
        .btn-night:hover {
            color: white;
        }

        .text-purple {
            color: purple;
        }
        .border-purple {
            border: solid 1px purple;
        }
        .btn-purple {
            background: purple;
            color: white;
        }
        .btn-purple:hover {
            color: white;
        }

        .text-fuchsia {
            color: fuchsia;
        }
        .border-fuchsia {
            border: solid 1px fuchsia;
        }
        .btn-fuchsia {
            background: fuchsia;
            color: white;
        }
        .btn-fuchsia:hover {
            color: white;
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
                        <a class="nav-link active" aria-current="page" href="../jobs"><i class="fa fa-list"></i>
                            Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="us"><i class="fa fa-bank"></i> We</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a class="nav-link active" href="../account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <?php
        if (count($errors) > 0) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><strong>Oh GOD! Watch error!</strong></p>
                <?php
                foreach ($errors as $error) {
                    echo "<p>" . $error . "</p>";
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        ?>
        <br>
        <!-- Include Review Here -->
        <br>
        <br>
        <!-- Include Profile Here -->
        <br>
        <br>
        <!-- Include Jobs Here -->
        <br>
        <br>
        <!-- Include Ticket Here -->
        <br>
        <br>
        <!-- Include Setting Here -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
