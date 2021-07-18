<?php

session_start();
include("../pack/config.php");

$id = $_SESSION['id'];

$errors = array();

$job = array();
$tik = array();

$select_user = "SELECT * FROM people WHERE id = '$id'";
$result_user = mysqli_query($connection, $select_user);
$row_user = mysqli_fetch_assoc($result_user);

$name = $row_user['firstname'] . $row_user['lastname'];

date_default_timezone_set('Iran');

if (isset($_POST["updateskill"])) {
    $skillname = mysqli_real_escape_string($connection, $_POST["skillname"]);
    $skillper = mysqli_real_escape_string($connection, $_POST["skillper"]);

    if (empty($skillname)) {
        array_push($errors, "Skill name is required");
    }
    if (empty($skillper)) {
        array_push($errors, "Skill percentage is required");
    }

    if (count($errors) == 0) {
        $skill = $skillname . "-" . $skillper;

        if (isset($row_user['skills'])) {
            $both = $row_user['skills'] . " " . $skill;
            $update_skill = "UPDATE people SET skills = '$both' WHERE id = '$id'";
        }
        else {
            $update_skill = "UPDATE people SET skills = '$skill' WHERE id = '$id'";
        }

        if (mysqli_query($connection, $update_skill)) {
            array_push($errors, true);
            array_push($errors, "Skills updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatebio'])) {
    $bio = mysqli_real_escape_string($connection, $_POST['bio']);

    if (empty($bio)) {
        array_push($errors, "Bio is required");
    }

    if (count($errors) == 0) {
        $update_bio = "UPDATE people SET bio = '$bio' WHERE id = '$id'";

        if (mysqli_query($connection, $update_bio)) {
            array_push($errors, true);
            array_push($errors, "Bio updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatelinkedin'])) {
    $social = mysqli_real_escape_string($connection, $_POST['linkedin']);

    if (empty($social)) {
        array_push($errors, "LinkedIn id is required");
    }

    if (count($errors) == 0) {
        $updatesocial = "UPDATE people SET linkedin = '$social' WHERE id = '$id'";

        if (mysqli_query($connection, $updatesocial)) {
            array_push($errors, true);
            array_push($errors, "LinkedIn updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updateinstagram'])) {
    $social = mysqli_real_escape_string($connection, $_POST['instagram']);

    if (empty($social)) {
        array_push($errors, "Instagram id is required");
    }

    if (count($errors) == 0) {
        $updatesocial = "UPDATE people SET instagram = '$social' WHERE id = '$id'";

        if (mysqli_query($connection, $updatesocial)) {
            array_push($errors, true);
            array_push($errors, "Instagram updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatetelegram'])) {
    $social = mysqli_real_escape_string($connection, $_POST['telegram']);

    if (empty($social)) {
        array_push($errors, "Telegram id is required");
    }

    if (count($errors) == 0) {
        $updatesocial = "UPDATE people SET telegram = '$social' WHERE id = '$id'";

        if (mysqli_query($connection, $updatesocial)) {
            array_push($errors, true);
            array_push($errors, "Telegram updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updategithub'])) {
    $social = mysqli_real_escape_string($connection, $_POST['github']);

    if (empty($social)) {
        array_push($errors, "Github id is required");
    }

    if (count($errors) == 0) {
        $updatesocial = "UPDATE people SET github = '$social' WHERE id = '$id'";

        if (mysqli_query($connection, $updatesocial)) {
            array_push($errors, true);
            array_push($errors, "Github updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatetwitter'])) {
    $social = mysqli_real_escape_string($connection, $_POST['twitter']);

    if (empty($social)) {
        array_push($errors, "Twitter id is required");
    }

    if (count($errors) == 0) {
        $updatesocial = "UPDATE people SET twitter = '$social' WHERE id = '$id'";

        if (mysqli_query($connection, $updatesocial)) {
            array_push($errors, true);
            array_push($errors, "Twitter updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatefacebook'])) {
    $social = mysqli_real_escape_string($connection, $_POST['facebook']);

    if (empty($social)) {
        array_push($errors, "Facebook id is required");
    }

    if (count($errors) == 0) {
        $updatesocial = "UPDATE people SET facebook = '$social' WHERE id = '$id'";

        if (mysqli_query($connection, $updatesocial)) {
            array_push($errors, true);
            array_push($errors, "Facebook updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatephone'])) {
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);

    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }

    if (count($errors) == 0) {
        $updatephone = "UPDATE people SET phone = '$phone' WHERE id = '$id'";

        if (mysqli_query($connection, $updatephone)) {
            array_push($errors, true);
            array_push($errors, "Phone updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatemail'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    if (empty($email)) {
        array_push($errors, "Mail id is required");
    }

    if (count($errors) == 0) {
        $updatemail = "UPDATE people SET email = '$email' WHERE id = '$id'";

        if (mysqli_query($connection, $updatemail)) {
            array_push($errors, true);
            array_push($errors, "Email updated");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_POST['updatepassword'])) {
    $currentpass = $row_user['password'];

    $oldpassword = mysqli_real_escape_string($connection, $_POST['password']);
    $newpassword = mysqli_real_escape_string($connection, $_POST['newpassword']);
    $confirmpassword = mysqli_real_escape_string($connection, $_POST['confirmpassword']);

    if (empty($oldpassword)) {
        array_push($errors, "Current password is required");
    }
    if (empty($newpassword)) {
        array_push($errors, "New password is required");
    }
    if (empty($confirmpassword)) {
        array_push($errors, "Confirm new password is required");
    }

    if (count($errors) == 0) {
        if ($oldpassword == $currentpass) {
            if ($newpassword == $confirmpassword) {
                $updatepassword = "UPDATE people SET password = '$newpassword' WHERE id = '$id'";

                if (mysqli_query($connection, $updatepassword)) {
                    $passchange = new PHPMailer;

                    $passchange->IsSMTP();
                    $passchange->SMTPAuth = true;
                    $passchange->Host = "smtp.zoho.com";
                    $passchange->Port = 587;
                    $passchange->Username = $mailaddr;
                    $passchange->Password = $mailpass;
                    $passchange->SMTPSecure = 'tsl';
                    $passchange->Subject = 'Do not replay';

                    $passchange->setFrom($mailaddr, 'Jobnic');
                    $passchange->addAddress($mail);
                    $passchange->isHTML(true);

                    $name = $row_user['firstname'];

                    $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
                    $bodyContent .= '<h3>Your password changed successfully.</h3>';
                    $bodyContent .= '<br>';
                    $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

                    $passchange->Body = $bodyContent;

                    if (!$passchange->send()) {
                        array_push($errors, 'Message could not be sent. Mailer Error: ' . $passchange->ErrorInfo);
                    } else {
                        array_push($errors, true);
                        array_push($errors, "Password sent");
                        ?>
                        <script>
                            window.location.replace(".");
                        </script>
                        <?php
                    }
                }
                else {
                    array_push($errors, mysqli_error($connection));
                }
            }
            else {
                array_push($errors, "Password dont match");
            }
        }
        else {
            array_push($errors, "Current password is wrong");
        }
    }
}

if (isset($_POST['addjob'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $describe = mysqli_real_escape_string($connection, $_POST['describe']);
    $skills = mysqli_real_escape_string($connection, $_POST['skills']);
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);

    if (empty($title)) {
        array_push($errors, "Job title is required");
    }
    if (empty($describe)) {
        array_push($errors, "Job description is required");
    }
    if (empty($skills)) {
        array_push($errors, "Job skills is required");
    }
    if ($type == "default") {
        array_push($errors, "Job type is required");
    }

    if (count($errors) == 0) {
        if (isset($price)) {
            $per = $price;
        }

        if (empty($price)) {
            $per = "Agreement";
        }

        $jobid = rand(11111, 99999);

        $dt = date("M d, Y H:i:s");

        $addjob = "INSERT INTO jobs(`jobid`, `type`, `user`, `title`, `describe`, `skills`, `datetime`, `price`,`status`) VALUES ('$jobid', '$type', '$id', '$title', '$describe', '$skills', '$dt', '$per', 'true')";

        if (mysqli_query($connection, $addjob)) {
            array_push($errors, true);
            array_push($errors, "Job added");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_GET["jobid"])) {
    $jobid = $_GET["jobid"];

    $getjob = "SELECT * FROM jobs WHERE jobid = '$jobid'";

    if ($result = mysqli_query($connection, $getjob)) {
        if (mysqli_num_rows($result) == 1) {
            array_push($job, mysqli_fetch_assoc($result));
        }
        else {
            array_push($job, false);
        }
    }
}

if (isset($_GET["close"])) {
    $close = $_GET["close"];

    $dt = date("M d, Y H:i:s");

    $closequery = "UPDATE jobs SET status = 'false' WHERE jobid = '$close'";
    if (mysqli_query($connection, $closequery)) {
        $addtime = "UPDATE jobs SET closed = '$dt' WHERE jobid = '$close'";
        mysqli_query($connection, $addtime);
        array_push($errors, true);
        array_push($errors, "Job closed");
        ?>
        <script>
            window.location.replace(".");
        </script>
        <?php
    }
    else {
        array_push($errors, mysqli_error($connection));
    }
}

if (isset($_GET['delete'])) {
    $delete = "UPDATE people SET skills = NULL WHERE id = '$id'";

    if (mysqli_query($connection, $delete)) {
        array_push($errors, true);
        array_push($errors, "Skills deleted");
        ?>
        <script>
            window.location.replace(".");
        </script>
        <?php
    }
    else {
        array_push($errors, mysqli_error($connection));
    }
}

if (isset($_POST["closejob"])) {
    $userid = mysqli_real_escape_string($connection, $_POST["dider"]);
    $stars = mysqli_real_escape_string($connection, $_POST["star"]);
    $jobid = mysqli_real_escape_string($connection, $_POST["jobid"]);

    if (empty($userid)) {
        array_push($errors, "User id is required");
    }
    if (empty($stars)) {
        array_push($errors, "Least 1 stat is required");
    }
    if (empty($jobid)) {
        array_push($errors, "Job ID is required");
    }

    if (count($errors) == 0) {
        $getuser = "SELECT * from people WHERE id = '$userid'";
        $getdata = mysqli_query($connection, $getuser);
        if (mysqli_num_rows($getdata) == 1) {
            $rows = mysqli_fetch_assoc($getdata);

            if (empty($rows['stars'])) {
                $current = 0;
            }
            else {
                $current = $rows['stars'];
            }

            $new = $current + $stars;
            $dt = date("M d, Y H:i:s");

            $updatestars = "UPDATE people SET stars = '$new' WHERE id = '$userid'";
            if (mysqli_query($connection, $updatestars)) {
                $closequery = "UPDATE jobs SET status = 'false' WHERE jobid = '$jobid'";
                if (mysqli_query($connection, $closequery)) {
                    $addtime = "UPDATE jobs SET closed = '$dt' WHERE jobid = '$jobid'";
                    if (mysqli_query($connection, $addtime)) {
                        $addperson = "UPDATE jobs SET person = '$userid' WHERE jobid = '$jobid'";
                        if (mysqli_query($connection, $addperson)) {
                            $addstars = "UPDATE jobs SET stars = '$stars' WHERE jobid = '$jobid'";
                            if (mysqli_query($connection, $addstars)) {
                                array_push($errors, true);
                                array_push($errors, "Closed");
                                ?>
                                <script>
                                    window.location.replace(".");
                                </script>
                                <?php
                            }
                        }
                    }
                }
                else {
                    array_push($errors, mysqli_error($connection));
                }
            }
            else {
                array_push($errors, mysqli_error($connection));
            }
        }
        else {
            array_push($errors, "User didnt found");
        }
    }
}

if (isset($_POST["sendtik"])) {
    $tiktitle = mysqli_real_escape_string($connection, $_POST["tictitle"]);
    $ticdes = mysqli_real_escape_string($connection, $_POST["ticdescribe"]);

    if (empty($tiktitle)) {
        array_push($errors, "Ticket title is required");
    }
    if (empty($ticdes)) {
        array_push($errors, "Ticket Describe is required");
    }

    $dt = date("M d, Y H:i:s");
    $tikid = rand(10000, 99999);

    if (count($errors) == 0) {
        $newtik = "INSERT INTO ticks (`tikid`, `user`, `title`, `describe`, `datetime`) VALUES ('$tikid', '$id', '$tiktitle', '$ticdes', '$dt')";
        if (mysqli_query($connection, $newtik)) {
            array_push($errors, true);
            array_push($errors, "Ticket sent");
            ?>
            <script>
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}

if (isset($_GET["tikid"])) {
    $tikid = $_GET["tikid"];

    $gettik = "SELECT * FROM ticks WHERE tikid = '$tikid'";

    if ($result = mysqli_query($connection, $gettik)) {
        if (mysqli_num_rows($result) == 1) {
            array_push($tik, mysqli_fetch_assoc($result));
        }
        else {
            array_push($tik, false);
        }
    }
}

if (isset($_POST["deleteaccount"])) {
    $userpass = mysqli_real_escape_string($connection, $_POST["password"]);
    $check = mysqli_real_escape_string($connection, $_POST["iknow"]);

    if (empty($userpass)) {
        array_push($errors, "Password is empty");
    }
    if (empty($check)) {
        array_push($errors, "You didnt check the checkbox");
    }

    if (count($errors) == 0) {
        $deleteaccount = "DELETE FROM people WHERE id = '$id'";
        if (mysqli_query($connection, $deleteaccount)) {
            ?>
            <script>
                window.alert("Account deleted");
                window.location.replace("../account/logout.php");
            </script>
            <?php
        }
        else {
            array_push($errors, mysqli_error($connection));
        }
    }
}