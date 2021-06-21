<?php
session_start();

if ($_SESSION['support'] != true) {
    ?>
    <script>
        window.location.replace("login.php");
    </script>
    <?php
}

include("../pack/config.php");

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$get = "SELECT * FROM people WHERE";
$result = mysqli_query($connection, $get);

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
            padding: 2%;
        }

        .dialog {
            padding: 5%;
        }
    </style>
</head>
</head>
<body>
<div class="">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="dialog border border-success">
                    <p class="text-success"><b>Users</b></p>
                    <hr class="border border-success">
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-bordered border-success table-sm">
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
                                    <td>
                                        <a href="index.php?deactivate=<?php echo $activated['id']; ?>" class="btn btn-sm btn-danger">
                                            Deactivate
                                        </a>
                                    </td>
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
