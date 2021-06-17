<?php
include("../pack/config.php");

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$activated = array();
$deactivated = array();

if (isset($_GET['acuser'])) {
    $user = $_GET['acuser'];

    $get_user = "SELECT * FROM people WHERE id = '$user'";
    if ($result = mysqli_query($connection, $get_user)) {
        if (mysqli_num_rows($result) == 1) {
            array_push($activated, mysqli_fetch_assoc($result));
        }
        else {
            ?>
            <script>
                window.alert("User didnt found.");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

if (isset($_GET['deuser'])) {
    $user = $_GET['deuser'];

    $get_user = "SELECT * FROM people WHERE id = '$user'";
    if ($result = mysqli_query($connection, $get_user)) {
        if (mysqli_num_rows($result) == 1) {
            array_push($activated, mysqli_fetch_assoc($result));
        }
        else {
            ?>
            <script>
                window.alert("User didnt found.");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}