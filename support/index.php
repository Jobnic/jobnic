<?php
session_start();

if ($_SESSION['support'] != true) {
    ?>
    <script>
        window.location.replace("login.php");
    </script>
    <?php
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pack/mailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../pack/mailer/vendor/phpmailer/phpmailer/src/SMTP.php';

include("../pack/config/config.php");

$errors = array();

if (isset($_GET['set'])) {
    $msg = $_GET['set'];
    $update = "UPDATE messages SET stat = 'done' WHERE msgid = '$msg'";
    mysqli_query($connection, $update);
}

if (isset($_POST['answering'])) {
    $tik = $_SESSION['tikid'];

    $answer = mysqli_real_escape_string($connection, $_POST['answer']);

    if (empty($answer)) {
        array_push($errors, "Answer is not set");
    }

    if (count($errors) == 0) {
        $dt = date("M d, Y H:i:s");
        $update = "UPDATE ticks SET answer = '$answer', answered = '$dt' WHERE tikid = '$tik'";
        if (mysqli_query($connection, $update)) {
            ?>
            <script>
                window.alert("Answered");
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php echo mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

if (isset($_GET['promote'])) {
    if (isset($_GET['user'])) {
        $promote = $_GET['promote'];
        $user = $_GET['user'];

        if ($promote == "verified") {
            $update = "UPDATE people SET verified = true WHERE id = '$user'";
            if (mysqli_query($connection, $update)) {
                $mail = $_GET['mail'];
                $name = $_GET['name'];

                $verified = new PHPMailer;

                $verified->IsSMTP();
                $verified->SMTPAuth = true;
                $verified->Host = "smtp.zoho.com";
                $verified->Port = 587;
                $verified->Username = $mailaddr;
                $verified->Password = $mailpass;
                $verified->SMTPSecure = 'tsl';
                $verified->Subject = 'Jobnic promotion';

                $verified->setFrom($mailaddr, 'Jobnic');
                $verified->addAddress($mail);
                $verified->isHTML(true);

                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                $bodyContent .= '<h3>We promote your account up.</h3>';
                $bodyContent .= '<p>Now you have <b>award</b> label in your profile.</p>';
                $bodyContent .= '<b></b>';
                $bodyContent .= '<br>';
                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                $verified->Body = $bodyContent;

                if (!$verified->send()) {
                    array_push($errors, 'Message could not be sent. Mailer Error: ' . $verified->ErrorInfo);
                } else {
                    ?>
                    <script>
                        window.alert("User verified.");
                        window.location.replace(".");
                    </script>
                    <?php
                }
            }
            else {
                ?>
                <script>
                    window.alert("<?php echo mysqli_error($connection); ?>");
                    window.location.replace(".");
                </script>
                <?php
            }
        }

        if ($promote == "awesome") {
            $update = "UPDATE people SET awesome = true WHERE id = '$user'";
            if (mysqli_query($connection, $update)) {
                $mail = $_GET['mail'];
                $name = $_GET['name'];

                $awesome = new PHPMailer;

                $awesome->IsSMTP();
                $awesome->SMTPAuth = true;
                $awesome->Host = "smtp.zoho.com";
                $awesome->Port = 587;
                $awesome->Username = $mailaddr;
                $awesome->Password = $mailpass;
                $awesome->SMTPSecure = 'tsl';
                $awesome->Subject = 'Jobnic promotion';

                $awesome->setFrom($mailaddr, 'Jobnic');
                $awesome->addAddress($mail);
                $awesome->isHTML(true);

                $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                $bodyContent .= '<h3>We promote your account up.</h3>';
                $bodyContent .= '<p>Now you have <b>trophy</b> label in your profile.</p>';
                $bodyContent .= '<b></b>';
                $bodyContent .= '<br>';
                $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                $awesome->Body = $bodyContent;

                if (!$awesome->send()) {
                    array_push($errors, 'Message could not be sent. Mailer Error: ' . $awesome->ErrorInfo);
                } else {
                    ?>
                    <script>
                        window.alert("User is now awesome.");
                        window.location.replace(".");
                    </script>
                    <?php
                }
            }
            else {
                ?>
                <script>
                    window.alert("<?php echo mysqli_error($connection); ?>");
                    window.location.replace(".");
                </script>
                <?php
            }
        }
    }
}

if (isset($_GET['promote'])) {
    $mail = $_GET['mail'];
    $name = $_GET['name'];
    $token = $_GET['token'];

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
    $send->addAddress($mail);
    $send->isHTML(true);

    $link = "$host/account/activate.php?token=$token";

    $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
    $bodyContent .= '<h3>You requested for activation email.</h3>';
    $bodyContent .= '<h5>You can click on the link below and activate your account soon.</h5>';
    $bodyContent .= '<h5><a href=' . $link . '>Activate my account</a></h5>';
    $bodyContent .= '<br>';
    $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

    $send->Body = $bodyContent;

    if (!$send->send()) {
        array_push($errors, 'Message could not be sent. Mailer Error: ' . $send->ErrorInfo);
    } else {
        ?>
        <script>
            window.alert("Email sent.");
            window.location.replace(".");
        </script>
        <?php
    }
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
                                <th scope="col">Reports</th>
                                <th scope="col">Verified</th>
                                <th scope="col">Labels</th>
                                <th scope="col">Promote</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $getreports = "SELECT count(*) as total FROM reports WHERE user = '$id'";
                                $resultreports = mysqli_query($connection, $getreports);
                                $rowreport = mysqli_fetch_assoc($resultreports);
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $rowreport['total']; ?></td>
                                    <td>
                                        <?php
                                            if (isset($row['active'])) {
                                                echo "<i class='fa fa-check'></i>";
                                            }
                                            else {
                                                ?>
                                                <i class='fa fa-times'></i>
                                                |
                                                <a class="link" href="index.php?send=true&user=<?php echo $row['id']; ?>&mail=<?php echo $row['email']; ?>&name=<?php echo $row['firstname']; ?>&token=<?php echo $row['token']; ?>""><i class="fa fa-paper-plane"></i></a>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (isset($row['verified'])) {
                                            echo "<i class='fa fa-award'></i>&nbsp;";
                                        }
                                        if (isset($row['awesome'])) {
                                            echo "<i class='fa fa-trophy'></i>&nbsp;";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="link text-primary" href="index.php?promote=verified&user=<?php echo $row['id']; ?>&mail=<?php echo $row['email']; ?>&name=<?php echo $row['firstname']; ?>"><i class="fa fa-award"></i></a>
                                        |
                                        <a class="link text-warning" href="index.php?promote=awesome&user=<?php echo $row['id']; ?>&mail=<?php echo $row['email']; ?>&name=<?php echo $row['firstname']; ?>"><i class="fa fa-trophy"></i></a>
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
                    <p class="text-success"><b>Message Review</b></p>
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
                    else {
                        ?>
                        <span>Select a message first</span>
                        <?php
                    }
                    ?>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <?php
                $get = "SELECT * FROM ticks ORDER BY row DESC ";
                $result = mysqli_query($connection, $get);
                ?>
                <div class="dialog border border-success">
                    <p class="text-success"><b>Tickets</b></p>
                    <hr class="border border-success">
                    <div class="table-responsive">
                        <table class="table table-hover text-center table-bordered border-success table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Ticket ID</th>
                                <th scope="col">User</th>
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
                                        <a class="text-decoration-none text-primary" href="index.php?tik=<?php echo $row['tikid']; ?>">
                                            <?php echo $row['tikid']; ?>
                                        </a>
                                    </th>
                                    <?php
                                    $person = $row["user"];
                                    $getperson = "SELECT * FROM people WHERE id = '$person'";
                                    $resultperson = mysqli_query($connection, $getperson);
                                    $who = mysqli_fetch_assoc($resultperson);
                                    ?>
                                    <td><?php echo $who['firstname'] . " " . $who['lastname']; ?></td>
                                    <td><?php echo $row['datetime']; ?></td>
                                    <td>
                                        <?php
                                        if (isset($row['answer'])) {
                                            echo "<i class='fa fa-check text-primary'></i> <i class='fa fa-check text-primary'></i> <i class='fa fa-check text-primary'></i>";
                                        }
                                        else {
                                            if (isset($row['status'])) {
                                                echo "<i class='fa fa-check text-success'></i> <i class='fa fa-check text-success'></i>";
                                            }
                                            else {
                                                echo "<i class='fa fa-check text-danger'></i>";
                                            }
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
                    <p class="text-success"><b>Ticket Review</b></p>
                    <hr class="border border-success">
                    <?php
                    if (isset($_GET['tik'])) {
                        $tikid = $_GET['tik'];
                        $_SESSION['tikid'] = $tikid;
                        $select = "SELECT * FROM ticks WHERE tikid = '$tikid'";
                        $ticket = mysqli_query($connection, $select);
                        $trow = mysqli_fetch_assoc($ticket);
                        ?>
                        <div>
                            <p><?php echo $trow['title']; ?></p>
                            <p><b><?php echo $trow['describe']; ?></b></p>
                            <p>Write your answer</p>
                            <form method="post" action="index.php">
                                <textarea name="answer" class="form-control" placeholder="Answer" rows="5"></textarea>
                                <br>
                                <button class="btn btn-success" name="answering">Answer</button>
                            </form>
                            <br>
                            <small><?php echo $trow['tikid']; ?></small>
                            <br>
                            <small><?php echo $trow['datetime']; ?></small>
                        </div>
                        <?php
                        $update = "UPDATE ticks SET status = 'seen' WHERE tikid = '$tikid'";
                        mysqli_query($connection, $update);
                    }
                    else {
                        ?>
                        <span>Select a ticket first</span>
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
