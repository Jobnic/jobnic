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

if (isset($_GET['set'])) {
    $msg = $_GET['set'];
    $update = "UPDATE messages SET stat = 'done' WHERE msgid = '$msg'";
    mysqli_query($connection, $update);
}
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
                <?php
                $get = "SELECT * FROM people";
                $result = mysqli_query($connection, $get);
                ?>
                <div class="dialog border border-success">
                    <p class="text-success"><b>Users</b></p>
                    <hr class="border border-success">
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-bordered border-success table-sm">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Mail</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>

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
            <div class="col-md-7">
                <?php
                $get = "SELECT * FROM messages ORDER BY row DESC ";
                $result = mysqli_query($connection, $get);
                ?>
                <div class="dialog border border-success">
                    <p class="text-success"><b>Messages</b></p>
                    <hr class="border border-success">
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-bordered border-success table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Message ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <a class="text-decoration-none text-primary" href="index.php?id=<?php echo $row['msgid']; ?>">
                                            <?php echo $row['msgid']; ?>
                                        </a>
                                    </th>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['datetime']; ?></td>
                                    <td>
                                        <?php
                                        if (isset($row['stat'])) {
                                            echo "<span class='text-success'>Done</span>";
                                        }
                                        else {
                                            echo "<span class='text-danger'>Open</span>";
                                        }
                                        ?>
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
            <div class="col-md-5">
                <div class="dialog border border-success">
                    <p class="text-success"><b>Message</b></p>
                    <hr class="border border-success">
                    <?php
                    if (isset($_GET['id'])) {
                        $msgid = $_GET['id'];
                        $select = "SELECT * FROM messages WHERE msgid = '$msgid'";
                        $message = mysqli_query($connection, $select);
                        $mrow = mysqli_fetch_assoc($message);
                        ?>
                        <div>
                            <p><?php echo $mrow['fullname']; ?></p>
                            <p><?php echo $mrow['datetime']; ?></p>
                            <p><?php echo $mrow['email']; ?></p>
                            <p><?php echo $mrow['phone']; ?></p>
                            <p><b><?php echo $mrow['message']; ?></b></p>
                            <a href="index.php?set=<?php echo $msgid; ?>" class="btn btn-sm btn-success">Answered</a>
                        </div>
                        <?php
                    }
                    ?>
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
