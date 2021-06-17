<?php
include("../pack/config.php");

include("./core.php");

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$get_activated = "SELECT * FROM people WHERE status = 'payed'";
$result_activated = mysqli_query($connection, $get_activated);

$get_deactivated = "SELECT * FROM people WHERE status = 'not'";
$result_deactivated = mysqli_query($connection, $get_deactivated);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Support</title>
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
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <p><b>Users (deactivated)</b></p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Activate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($deactivated = mysqli_fetch_assoc($result_deactivated)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $deactivated['id']; ?></th>
                                    <td><?php echo $deactivated['firstname'] . " " . $deactivated['lastname']; ?></td>
                                    <td><?php echo $deactivated['phone']; ?></td>
                                    <td><a class="btn btn-sm btn-success">Activate</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <p><b>Users (activated)</b></p>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-bordered table-sm">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Deactivate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($activated = mysqli_fetch_assoc($result_activated)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $activated['id']; ?></th>
                                    <td><?php echo $activated['firstname'] . " " . $activated['lastname']; ?></td>
                                    <td><?php echo $activated['phone']; ?></td>
                                    <td><a class="btn btn-sm btn-danger">Deactivate</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
