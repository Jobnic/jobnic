<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer;

include("../pack/config.php");

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.zoho.com";
$mail->Port = 587;
$mail->Username = $mailaddr;
$mail->Password = $mailpass;
$mail->SMTPSecure = 'tsl';
$mail->Subject = 'Do not replay';

// Sender info
$mail->setFrom($mailaddr, 'Jobnic');

$errors = array();

if (isset($_POST['login'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($mail)) {
        array_push($errors, "Mail is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $check = "SELECT * FROM people WHERE email = '$mail' AND password = '$password'";
        $check_result = mysqli_query($connection, $check);

        if (mysqli_num_rows($check_result) == 1) {
            $row = mysqli_fetch_assoc($check_result);

            $mail->addAddress($row["email"]);
            $mail->isHTML(true);

            $name = $row["firstname"];

            $bodyContent = '<h1>Hi dear' . $name . ',</h1>';
            $bodyContent .= '<p>We tracked a new device that loged into your account.</p>';
            $bodyContent .= '<p>If not you, login now and change your password.</p>';
            $bodyContent .= '<br>';
            $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

            $mail->Body = $bodyContent;

            $mail->send();

            $_SESSION['status'] = true;
            $_SESSION['id'] = $row['id'];

            ?>
            <script>
                window.location.replace("../user");
            </script>
            <?php
        }
        else {
            array_push($errors, "Mail and password are not match");
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
        array_push($errors, "First name is required");
    }
    if (empty($lname)) {
        array_push($errors, "Last name is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($confirm)) {
        array_push($errors, "Confirm Password is required");
    }

    if ($password == $confirm) {
        if (count($errors) == 0) {
            $id = rand(111111, 999999);
            $join = date("M d, Y H:i:s");

            $create = "INSERT INTO people (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `join`, `status`) VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$password', '$join', 'payed')";
            if (mysqli_query($connection, $create)) {
                $mail->addAddress($email);
                $mail->isHTML(true);

                $name = $row["firstname"];

                $bodyContent = '<h1>Hi dear' . $fname . ',</h1>';
                $bodyContent .= '<p>Welcome to Jobnic.</p>';
                $bodyContent .= '<p>If you have any problems you can contact us via email or telegram.</p>';
                $bodyContent .= '<p>Email : info@jobnic.net</p>';
                $bodyContent .= '<p>Telegram : https://t.me/neotrinost_support</p>';
                $bodyContent .= '<br>';
                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                $mail->Body = $bodyContent;

                $mail->send();

                $_SESSION['status'] = true;
                $_SESSION['id'] = $id;
                ?>
                <script>
                    window.alert("Created.");
                    window.location.replace("../user");
                </script>
                <?php
            }
            else {
                array_push($errors, mysqli_error($connection));
            }
        }
    }
    else {
        array_push($errors, "Password don't match");
    }

}

if (isset($_POST['forgot'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);

    if (empty($mail)) {
        array_push($errors, "Mail is required");
    }

    if (count($errors) == 0) {
        $check = "SELECT * FROM people WHERE email = '$mail'";
        $checkres = mysqli_query($connection, $check);

        if (mysqli_num_rows($checkres) == 1) {
            $checkrow = mysqli_fetch_assoc($checkres);

            $newpass = rand(11111111, 99999999);

            $updatepassword = "UPDATE people SET password = '$newpass' WHERE email = '$mail'";
            if (mysqli_query($connection, $updatepassword)) {
                array_push($errors, "Your new password is " . $newpass);
            }
        }
        else {
            array_push($errors, "User didn't found or E-mail is wrong");
        }
    }
}

if (isset($_POST['onetime'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);

    if (empty($mail)) {
        array_push($errors, "Mail is required");
    }

    if (count($errors) == 0) {
        $check = "SELECT * FROM people WHERE email = '$mail'";
        $checkres = mysqli_query($connection, $check);

        if (mysqli_num_rows($checkres) == 1) {
            $checkrow = mysqli_fetch_assoc($checkres);

            $ometime = rand(11111111, 99999999);

            $updatepassword = "UPDATE people SET password = '$ometime' WHERE email = '$mail'";
            if (mysqli_query($connection, $updatepassword)) {
                array_push($errors, "Your one-time password is " . $ometime);
            }
        }
        else {
            array_push($errors, "User didn't found or E-mail is wrong");
        }
    }
}