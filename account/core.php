<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

include("../pack/config/config.php");

$get_all_mails = "SELECT email FROM people";
$get_mails_result = mysqli_query($connection, $get_all_mails);
$emails = mysqli_fetch_assoc($get_mails_result);

$get_all_phones = "SELECT phone FROM people";
$get_phones_result = mysqli_query($connection, $get_all_phones);
$phones = mysqli_fetch_assoc($get_phones_result);

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

            $login = new PHPMailer;

            $login->IsSMTP();
            $login->SMTPAuth = true;
            $login->Host = "smtp.zoho.com";
            $login->Port = 587;
            $login->Username = $mailaddr;
            $login->Password = $mailpass;
            $login->SMTPSecure = 'tsl';
            $login->Subject = 'A new account login was seen';

            $login->setFrom($mailaddr, 'Jobnic');
            $login->addAddress($mail);
            $login->isHTML(true);

            $name = $row['firstname'];

            $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
            $bodyContent .= '<h3>We found a person who logged into your account.</h3>';
            $bodyContent .= '<p>If you are not you, change your password now.</p>';
            $bodyContent .= '<b></b>';
            $bodyContent .= '<br>';
            $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

            $login->Body = $bodyContent;

            if (!$login->send()) {
                array_push($errors, 'Message could not be sent. Mailer Error: ' . $login->ErrorInfo);
            } else {
                array_push($errors, "Password sent");
            }

            $_SESSION['status'] = true;
            $_SESSION['id'] = $row['id'];

            ?>
            <script>
                window.alert("Welcome.");
                window.location.replace("../user");
            </script>
            <?php
        } else {
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
        foreach ($emails as $mail) {
            if ($mail == $email) {
                foreach ($phones as $phne) {
                    if ($phne == $phone) {
                        if (count($errors) == 0) {
                            $id = rand(111111, 999999);
                            $token = md5(uniqid(rand(111111111, 999999999), true));
                            $join = date("M d, Y H:i:s");

                            $create = "INSERT INTO people (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `join`, `status`, `token`, `theme`) VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$password', '$join', 'payed', '$token', 'light')";
                            if (mysqli_query($connection, $create)) {
                                $created = new PHPMailer;

                                $created->IsSMTP();
                                $created->SMTPAuth = true;
                                $created->Host = "smtp.zoho.com";
                                $created->Port = 587;
                                $created->Username = $mailaddr;
                                $created->Password = $mailpass;
                                $created->SMTPSecure = 'tsl';
                                $created->Subject = "Welcome to Jobnic";

                                $created->setFrom($mailaddr, 'Jobnic');
                                $created->addAddress($email);
                                $created->isHTML(true);

                                $name = $fname;
                                $link = "$host/account/activate.php?token=$token";

                                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                                $bodyContent .= '<h3>Welcome to Jobnic.</h3>';
                                $bodyContent .= '<h5>You need to activate your account to have permeation for using Jobnic.</h5>';
                                $bodyContent .= '<h5><a href=' . $link . '>Activate my account</a></h5>';
                                $bodyContent .= '<br>';
                                $bodyContent .= '<p>If you have any problems you can contact us via email or telegram.</p>';
                                $bodyContent .= '<br>';
                                $bodyContent .= '<p>Email : info@jobnic.net</p>';
                                $bodyContent .= '<p>Telegram : https://t.me/neotrinost_support</p>';
                                $bodyContent .= '<br>';
                                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                                $created->Body = $bodyContent;

                                $created->send();

                                $_SESSION['status'] = true;
                                $_SESSION['id'] = $id;
                                ?>
                                <script>
                                    window.alert("Created.\nActivate your account via link in your email.");
                                    window.location.replace("../user");
                                </script>
                                <?php
                            }
                        }
                        else {
                            array_push($errors, mysqli_error($connection));
                        }
                    }
                    else {
                        array_push($errors, "Phone exists. Try another phone.");
                    }
                }
            }
            else {
                array_push($errors, "Email exists. Try another mail.");
            }
        }
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
                $forgot = new PHPMailer;

                $forgot->IsSMTP();
                $forgot->SMTPAuth = true;
                $forgot->Host = "smtp.zoho.com";
                $forgot->Port = 587;
                $forgot->Username = $mailaddr;
                $forgot->Password = $mailpass;
                $forgot->SMTPSecure = 'tsl';
                $forgot->Subject = 'Forgot password';

                $forgot->setFrom($mailaddr, 'Jobnic');
                $forgot->addAddress($mail);
                $forgot->isHTML(true);

                $name = $checkrow['firstname'];

                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                $bodyContent .= '<h3>As you forgot your password, this is a password that you can login with.</h3>';
                $bodyContent .= '<p>Change your password after login.</p>';
                $bodyContent .= '<h1>' . $newpass . '</h1>';
                $bodyContent .= '<br>';
                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                $forgot->Body = $bodyContent;

                if (!$forgot->send()) {
                    array_push($errors, 'Message could not be sent. Mailer Error: ' . $forgot->ErrorInfo);
                } else {
                    ?>
                    <script>
                        window.alert("Password sent");
                        window.location.replace(".");
                    </script>
                    <?php
                }
            }
        } else {
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
                $onetime = new PHPMailer;

                $onetime->IsSMTP();
                $onetime->SMTPAuth = true;
                $onetime->Host = "smtp.zoho.com";
                $onetime->Port = 587;
                $onetime->Username = $mailaddr;
                $onetime->Password = $mailpass;
                $onetime->SMTPSecure = 'tsl';
                $onetime->Subject = "One time password";

                $onetime->setFrom($mailaddr, 'Jobnic');
                $onetime->addAddress($mail);
                $onetime->isHTML(true);

                $name = $checkrow['firstname'];

                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                $bodyContent .= '<h3>You requested a One-Time password.</h3>';
                $bodyContent .= '<p>Here is your One-Time password. Change your password after login.</p>';
                $bodyContent .= '<h1>' . $ometime . '</h1>';
                $bodyContent .= '<br>';
                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                $onetime->Body = $bodyContent;

                if (!$onetime->send()) {
                    array_push($errors, 'Message could not be sent. Mailer Error: ' . $onetime->ErrorInfo);
                } else {
                    ?>
                    <script>
                        window.alert("Password sent");
                        window.location.replace(".");
                    </script>
                    <?php
                }
            }
        } else {
            array_push($errors, "User didn't found or E-mail is wrong");
        }
    }
}