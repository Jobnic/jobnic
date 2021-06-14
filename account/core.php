<?php

session_start();

$server = '127.0.0.1';
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

if (isset($_POST['login'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $check = "SELECT * FROM people WHERE email = '$mail' AND password = '$password'";
    $check_result = mysqli_query($connection, $check);

    if (mysqli_num_rows($check_result) == 1) {
        $row = mysqli_fetch_assoc($check_result);

        $_SESSION['status'] = true;
        $_SESSION['id'] = $row['id'];

        ?>
            <script>
                window.location.replace("../user");
            </script>
        <?php
    }
}

if (isset($_POST['create'])) {

}