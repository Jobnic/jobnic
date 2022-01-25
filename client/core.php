<?php

session_start();

require '../resources/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../resources/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../resources/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../resources/config/config.php");

$get_table_status_query = "SELECT * FROM people";
$get_table_status_result = mysqli_query($connection, $get_table_status_query);

if (mysqli_num_rows($get_table_status_result) == 0) {
    $table_status = true;
}
else {
    $table_status = false;
}

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
        array_push($errors, "ایمیل الزامیست.");
    }
    if (empty($password)) {
        array_push($errors, "رمز الزامیست");
    }

    if (count($errors) == 0) {
        $check = "SELECT * FROM people WHERE email = '$mail' AND password = '$password'";
        $check_result = mysqli_query($connection, $check);

        if (mysqli_num_rows($check_result) == 1) {
            $row = mysqli_fetch_assoc($check_result);
            if ($row['2fa'] == 0) {
                $login = new PHPMailer;

                $login->IsSMTP();
                $login->SMTPAuth = true;
                $login->Host = "smtp.zoho.com";
                $login->Port = 587;
                $login->Username = $mailaddr;
                $login->Password = $mailpass;
                $login->SMTPSecure = 'tsl';
                $login->Subject = 'A new client login was seen';

                $login->setFrom($mailaddr, 'Jobnic');
                $login->addAddress($mail);
                $login->isHTML(true);

                $name = $row['firstname'];
                $ip = $_SERVER['SERVER_NAME'];

                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                $bodyContent .= '<h3>We found a person who logged into your client.</h3>';
                $bodyContent .= '<p>If you are not you, change your password now.</p>';
                $bodyContent .= '<p>IP : ' . $ip . '</p>';
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
                    window.alert("خوش آمدید");
                    window.location.replace("../user");
                </script>
                <?php
            } else {
                $tfa = new PHPMailer;

                $tfa->IsSMTP();
                $tfa->SMTPAuth = true;
                $tfa->Host = "smtp.zoho.com";
                $tfa->Port = 587;
                $tfa->Username = $mailaddr;
                $tfa->Password = $mailpass;
                $tfa->SMTPSecure = 'tsl';
                $tfa->Subject = '2FA security code';

                $tfa->setFrom($mailaddr, 'Jobnic');
                $tfa->addAddress($mail);
                $tfa->isHTML(true);

                $name = $row['firstname'];
                $user_id = $row["id"];

                $tfacode = rand(10000, 99999);

                $update_tfa = "UPDATE people SET 2facode = '$tfacode' WHERE id = '$user_id'";
                mysqli_query($connection, $update_tfa);

                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                $bodyContent .= '<h3>Your 2FA code is:</h3>';
                $bodyContent .= '<p>' . $tfacode . '</p>';
                $bodyContent .= '<b></b>';
                $bodyContent .= '<br>';
                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                $tfa->Body = $bodyContent;

                $_SESSION['2fa_code'] = $tfacode;
                $_SESSION['2fa_user'] = $mail;
                $_SESSION['id'] = $user_id;

                if (!$tfa->send()) {
                    array_push($errors, 'Message could not be sent. Mailer Error: ' . $tfa->ErrorInfo);
                } else {
                    $_SESSION['is_auth'] = true;
                }
            }
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
                                    $link = "$host/client/index.php?token=$token";
    
                                    $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                                    $bodyContent .= '<h3>Welcome to Jobnic.</h3>';
                                    $bodyContent .= '<h5>You need to activate your client to have permeation for using Jobnic.</h5>';
                                    $bodyContent .= '<h5><a href=' . $link . '>Activate my client</a></h5>';
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
                                        window.alert("حساب شما ساخته شد.\nاز طریق ایمیل حساب خود را فعال نمایید.");
                                        window.location.replace("../user");
                                    </script>
                                    <?php
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
                    $link = "$host/client/index.php?token=$token";

                    $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                    $bodyContent .= '<h3>Welcome to Jobnic.</h3>';
                    $bodyContent .= '<h5>You need to activate your client to have permeation for using Jobnic.</h5>';
                    $bodyContent .= '<h5><a href=' . $link . '>Activate my client</a></h5>';
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
                        window.alert("حساب شما ساخته شد.\nاز طریق ایمیل حساب خود را فعال نمایید.");
                        window.location.replace("../user");
                    </script>
                    <?php
                }
            } else {
                array_push($errors, mysqli_error($connection));
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
                        window.alert("رمز شما ارسال شد.");
                        window.location.replace(".");
                    </script>
                    <?php
                }
            }
        } else {
            array_push($errors, "این کاربر یافت نشد. رمز و ایمیل را بررسی کنید");
        }
    }
}

if (isset($_POST['onetime'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);

    if (empty($mail)) {
        array_push($errors, "ایمیل را وارد کنید.");
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
                        window.alert("رمز ارسال شد.");
                        window.location.replace(".");
                    </script>
                    <?php
                }
            }
        } else {
            array_push($errors, "این کاربر یافت نشد. رمز و ایمیل را بررسی کنید");
        }
    }
}

if (isset($_POST['tfasubmit'])) {
    $tfa_code = mysqli_real_escape_string($connection, $_POST['tfa']);

    if (empty($tfa_code)) {
        array_push($errors, "رمز الزامیست");
    }

    if (count($errors) == 0) {
        $get_person = "SELECT * FROM people WHERE 2facode = '$tfa_code'";
        $result_person = mysqli_query($connection, $get_person);
        $person = mysqli_fetch_assoc($result_person);

        $come = new PHPMailer;

        $come->IsSMTP();
        $come->SMTPAuth = true;
        $come->Host = "smtp.zoho.com";
        $come->Port = 587;
        $come->Username = $mailaddr;
        $come->Password = $mailpass;
        $come->SMTPSecure = 'tsl';
        $come->Subject = 'A new client login was seen';

        $come->setFrom($mailaddr, 'Jobnic');
        $come->addAddress($person['email']);
        $come->isHTML(true);

        $name = $person['firstname'];

        $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
        $bodyContent .= '<h3>We found a person who logged into your client.</h3>';
        $bodyContent .= '<p>If you are not you, change your password now.</p>';
        $bodyContent .= '<b></b>';
        $bodyContent .= '<br>';
        $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

        $come->Body = $bodyContent;

        if (!$come->send()) {
            array_push($errors, 'Message could not be sent. Mailer Error: ' . $come->ErrorInfo);
        } else {
            $_SESSION['status'] = true;
            $_SESSION['id'] = $person['id'];

            ?>
            <script>
                window.alert("خوش آمدید.");
                window.location.replace("../user");
            </script>
            <?php
        }
    }
    else {

    }
}

if (isset($_GET['token'])) {
    $activation_code = $_GET['token'];

    $activation_sql = "SELECT * FROM people WHERE token = '$activation_code'";
    $activation_result = mysqli_query($connection, $activation_sql);

    if (mysqli_num_rows($activation_result) == 1) {
        $activation_sql = "UPDATE people SET active = 'true' WHERE token = '$activation_code'";
        if (mysqli_query($connection, $activation_sql)) {
            $activation_mail = new PHPMailer;

            $activation_mail->IsSMTP();
            $activation_mail->SMTPAuth = true;
            $activation_mail->Host = "smtp.zoho.com";
            $activation_mail->Port = 587;
            $activation_mail->Username = $mailaddr;
            $activation_mail->Password = $mailpass;
            $activation_mail->SMTPSecure = 'tsl';
            $activation_mail->Subject = "Account activated";

            $activation_mail->setFrom($mailaddr, 'Jobnic');
            $activation_mail->addAddress($email);
            $activation_mail->isHTML(true);

            $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
            $bodyContent .= '<h3>Your client activated successfully.</h3>';
            $bodyContent .= '<br>';
            $bodyContent .= '<h5>Enjoy.</h5>';
            $bodyContent .= '<br>';
            $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

            $activation_mail->Body = $bodyContent;

            if (!$activation_mail->send()) {
                array_push($errors, 'Message could not be sent. Mailer Error: ' . $activation_mail->ErrorInfo);
            } else {
                ?>
                <script>
                    window.alert("حساب شما فعال شد.");
                    window.location.replace("../user");
                </script>
                <?php
            }
        }
        else {
            ?>
            <script>
                window.alert("متاسفانه مشکلی پیش آمده است. بعدا تلاش کنید.");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

if (isset($_GET['send'])) {

    $id = $_SESSION['id'];

    $select_user = "SELECT * FROM people WHERE id = '$id'";
    $result_user = mysqli_query($connection, $select_user);
    $row_user = mysqli_fetch_assoc($result_user);

    $name = $row_user['firstname'];
    $email = $row_user['email'];

    $token = $row_user['token'];

    $send = new PHPMailer;

    $send->IsSMTP();
    $send->SMTPAuth = true;
    $send->Host = "smtp.zoho.com";
    $send->Port = 587;
    $send->Username = $mailaddr;
    $send->Password = $mailpass;
    $send->SMTPSecure = 'tsl';
    $send->Subject = "Active token";

    $send->setFrom($mailaddr, 'Jobnic');
    $send->addAddress($email);
    $send->isHTML(true);

    $link = "$host/client/index.php?token=$token";

    $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
    $bodyContent .= '<h3>You requested for activation email.</h3>';
    $bodyContent .= '<h5>You can click on the link below and activate your client soon.</h5>';
    $bodyContent .= '<h5><a href=' . $link . '>Activate my client</a></h5>';
    $bodyContent .= '<br>';
    $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

    $send->Body = $bodyContent;

    if (!$send->send()) {
        array_push($errors, 'Message could not be sent. Mailer Error: ' . $send->ErrorInfo);
    } else {
        ?>
        <script>
            window.alert("ایمیل ارسال شد.");
            window.location.replace(".");
        </script>
        <?php
    }
}