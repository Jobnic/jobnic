<?php

include("../pack/config.php");

$id = $_SESSION['id'];

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$errors = array();

if (isset($_POST["newmessage"])) {
    $fullname = mysqli_real_escape_string($connection, $_POST["fullname"]);
    $mail = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $message = mysqli_real_escape_string($connection, $_POST["message"]);

    if (empty($fullname)) {
        array_push($errors, "Full name is required");
    }
    if (empty($mail)) {
        array_push($errors, "E-Mail is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($message)) {
        array_push($errors, "Message is required");
    }

    $messageid = rand(11111, 99999);

    $dt = date("M d, Y H:i:s");

    if (count($errors) == 0) {
        $insert = "INSERT INTO messages (msgid, fullname, email, phone, message, datetime) VALUES ('$messageid', '$fullname', '$mail', '$phone', '$message', '$dt')";
        if (mysqli_query($connection, $insert)) {
            ?>
            <script>
                window.alert("Mwssage sent\nTNX");
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}