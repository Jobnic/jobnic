<?php

session_start();

include("../pack/config.php");

$server = $ip;
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
    $fname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm = mysqli_real_escape_string($connection, $_POST['confirm']);

    $id = rand(111111, 999999);

    if ($password == $confirm) {
        $create = "INSERT INTO people (`id`, `firstname`, `lastname`, `phone`, `email`, `password`) VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$password')";
        if (mysqli_query($connection, $create)) {
            ?>
                <script>
                    window.alert("Created.");
                </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
            </script>
            <?php
        }
    }

}