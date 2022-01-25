<?php

session_start();

include("../config/config.php");

if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM people")) == 0) {
    $table_status = true;
}
else {
    $table_status = false;
}

$emails = mysqli_fetch_assoc(mysqli_query($connection, "SELECT email FROM people"));
$phones = mysqli_fetch_assoc(mysqli_query($connection, "SELECT phone FROM people"));

$errors = array();

if (isset($_POST['login'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($mail)) {
        array_push($errors, "ایمیل الزامیست.");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }

    if (count($errors) == 0) {
        $check = "SELECT * FROM people WHERE email = '$mail' AND password = '$password'";
        $check_result = mysqli_query($connection, $check);
        if (mysqli_num_rows($check_result) == 1) {
            $_SESSION['status'] = true;
            $_SESSION['user'] = mysqli_fetch_assoc($check_result);
        } else {
            array_push($errors, "ایمیل و رمز درست نمیباشد");
        }
    }
}

if (isset($_POST['create'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm = mysqli_real_escape_string($connection, $_POST['confirm']);

    if (empty($fname)) {
        array_push($errors, "نام الزامیست");
    }
    if (empty($lname)) {
        array_push($errors, "نام خانوادگی الزامیست");
    }
    if (empty($phone)) {
        array_push($errors, "تلفن الزامیست");
    }
    if (empty($email)) {
        array_push($errors, "ایمیل الزامیست");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }
    if (empty($confirm)) {
        array_push($errors, "تایید رمز الزامیست");
    }

    if ($password == $confirm) {
        if (!$table_status) {
            foreach ($emails as $mail) {
                if ($mail != $email) {
                    foreach ($phones as $phne) {
                        if ($phne != $phone) {
                            if (count($errors) == 0) {
                                $id = rand(111111, 999999);
                                $token = md5(uniqid(rand(111111111, 999999999), true));
                                $join = date("M d, Y H:i:s");
                                if (mysqli_query($connection, "INSERT INTO people (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `join`, `status`, `token`, `theme`) VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$password', '$join', 'payed', '$token', 'light')")) {
                                    $_SESSION['status'] = true;
                                    $_SESSION['user'] = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM people WHERE id = '$id'"));
                                    header('location:' . $path . '/user');
                                }
                            } else {
                                array_push($errors, mysqli_error($connection));
                            }
                        } else {
                            array_push($errors, "تلفن وجود دارد.");
                        }
                    }
                } else {
                    array_push($errors, "ایمیل وجود دارد.");
                }
            }
        }
        else {
            if (count($errors) == 0) {
                $id = rand(111111, 999999);
                $token = md5(uniqid(rand(111111111, 999999999), true));
                $join = date("M d, Y H:i:s");
                if (mysqli_query($connection, "INSERT INTO people (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `join`, `status`, `token`, `theme`) VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$password', '$join', 'payed', '$token', 'light')")) {
                    $_SESSION['status'] = true;
                    $_SESSION['user'] = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM people WHERE id = '$id'"));
                    header('location:' . $path . '/user');
                }
            } else {
                array_push($errors, mysqli_error($connection));
            }
        }
    }
}