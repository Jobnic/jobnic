<?php

session_start();

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

include("../pack/config/config.php");

$id = $_SESSION['id'];

$select_user = "SELECT * FROM people WHERE id = '$id'";
$result_user = mysqli_query($connection, $select_user);
$row_user = mysqli_fetch_assoc($result_user);

$name = $row_user['firstname'] . $row_user['lastname'];
$user_email = $row_user['email'];
$user_name = $row_user['name'];

if ($row_user['active'] != true) {
    ?>
    <script>
        window.location.replace("../account/activate.php");
    </script>
    <?php
}

$errors = array();

date_default_timezone_set('Iran');

if ($_GET['send']) {
    $dt = date("M d, Y H:i:s");

    if (isset($_GET['job'])) {
        $jobid = $_GET['job'];
        $add_apply = "INSERT INTO applies (`dt`, `job`, `userid`) VALUES ('$dt', '$jobid', '$id')";
        if (mysqli_query($connection, $add_apply)) {
            $first_apply = new PHPMailer;

            $first_apply->IsSMTP();
            $first_apply->SMTPAuth = true;
            $first_apply->Host = "smtp.zoho.com";
            $first_apply->Port = 587;
            $first_apply->Username = $mailaddr;
            $first_apply->Password = $mailpass;
            $first_apply->SMTPSecure = 'tsl';
            $first_apply->Subject = 'New apply for a job';

            $first_apply->setFrom($mailaddr, 'Jobnic');
            $first_apply->addAddress($user_email);
            $first_apply->isHTML(true);

            $name = $row_user['firstname'];

            $link = "http://jobnic.net/jobnic/jobs/job.php?jobid=$jobid";

            $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
            $bodyContent .= '<h3>Your apply sent successfully for <a href=' . $link . '>this job</a>.</h3>';
            $bodyContent .= '<h3>Please wait until employer see the apply</h3>';
            $bodyContent .= '<br>';
            $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

            $first_apply->Body = $bodyContent;

            if (!$first_apply->send()) {
                array_push($errors, 'Message could not be sent. Mailer Error: ' . $first_apply->ErrorInfo);
            } else {
                ?>
                <script>
                    window.alert("Applied successfully");
                    window.location.replace(".");
                </script>
                <?php
            }
        }
    }
}