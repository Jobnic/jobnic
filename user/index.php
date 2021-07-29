<?php
session_start();

include('core.php');
include("../pack/config/config.php");

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
    <title>Job Nic - User Panel</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="../pack/css/main.css" type="text/css" rel="stylesheet">
    <link href="../pack/css/dark.css" type="text/css" rel="stylesheet">
    <link href="../pack/css/light.css" type="text/css" rel="stylesheet">
    <style>
        .toggle {
            background: none;
            border: none;
        }
    </style>
</head>
<body class="dark" id="all">
<div>
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
                        <a class="nav-link active" aria-current="page" href="../us"><i class="fa fa-bank"></i> We</a>
                    </li>
                    <li class="nav-item">
                        <button onclick="toggle()" value="dark" class="toggle nav-link active" id="mode">Toggle to <i class="fa fa-sun"></i> mode</button>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a class="nav-link active" href="?tab=review"><i class="fa fa-id-card"></i> Review</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link active" href="?tab=jobs"><i class="fa fa-list"></i> Jobs</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link active" href="?tab=tickets"><i class="fa fa-envelope"></i> Tickets</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link active" href="?tab=profile"><i class="fa fa-user"></i> Profile</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link active" href="?tab=setting"><i class="fa fa-cogs"></i> Settings</a>
                </div>
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
                <p><strong>Jobnic says that,</strong></p>
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
        <?php
        if (isset($_GET['tab'])) {
            $tab = $_GET['tab'];

            if ($tab == "tickets") {
                include("pages/ticket.php");
            }
            elseif ($tab == "jobs") {
                include("pages/jobs.php");
            }
            elseif ($tab == "profile") {
                include("pages/profile.php");
            }
            elseif ($tab == "review") {
                include("pages/review.php");
            }
            elseif ($tab == "setting") {
                include("pages/setting.php");
            }
            else {
                ?>
                <script>
                    window.location.replace(".");
                </script>
                <?php
            }
        }
        else {
            include("pages/review.php");
        }
        ?>
    </div>
</div>
<script>
    function toggle() {
        var btn = document.getElementById("mode");
        if (btn.value === "dark") {
            document.getElementById("all").classList.remove('dark');
            document.getElementById("all").classList.add('light');
            btn.value = "light";
            btn.innerHTML = 'Toggle to <i class="fa fa-moon"></i> mode';
        } else {
            document.getElementById("all").classList.remove('light');
            document.getElementById("all").classList.add('dark');
            btn.value = "dark";
            btn.innerHTML = 'Toggle to <i class="fa fa-sun"></i> mode';
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
