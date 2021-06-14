<?php
    session_start();

    $stat = $_SESSION['status'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 8%;
        }
        .dialog {
            text-align: center;
            border: solid 1px black;
            text-align: center;
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
                            <a class="nav-link active" href="user">Go To Panel</a>
                            <?php
                        }
                        else {
                            ?>
                            <a class="nav-link active" href="account/index.php">Sign Up</a> <a class="nav-link active" href="account/index.php">Sign In</a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
            <div class="col-md-11">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
            <div class="col-md-10">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
            <div class="col-md-9">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
            <div class="col-md-8">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
            <div class="col-md-7">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="dialog">
                    <h1>Hi</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dialog">
                    <h1>Hi</h1>
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