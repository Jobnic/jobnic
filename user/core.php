<?php

session_start();
include("../pack/config.php");

$id = $_SESSION['id'];

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$errors = array();

$job = array();

$select_user = "SELECT * FROM people WHERE id = '$id'";
$result_user = mysqli_query($connection, $select_user);
$row_user = mysqli_fetch_assoc($result_user);

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
            ?>
            <script>
                window.alert("Skills updated.");
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
            ?>
            <script>
                window.alert("Bio updated.");
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
            ?>
            <script>
                window.alert("Linkedin updated.");
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
            ?>
            <script>
                window.alert("Instagram updated.");
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
            ?>
            <script>
                window.alert("Telegram updated.");
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
            ?>
            <script>
                window.alert("Github updated.");
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
            ?>
            <script>
                window.alert("Twitter updated.");
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
            ?>
            <script>
                window.alert("Phone updated.");
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
            ?>
            <script>
                window.alert("Email updated.");
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
                $updatepassword = "UPDATE people SET password = '$newpassword'";

                if (mysqli_query($connection, $updatepassword)) {
                    ?>
                    <script>
                        window.alert("Password changed.");
                        window.location.replace(".");
                    </script>
                    <?php
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
        ?>
        <script>
            window.alert("Job added.");
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
        ?>
        <script>
            window.alert("Job closed.");
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
        ?>
        <script>
            window.alert("Skills deleted");
            window.location.replace(".");
        </script>
        <?php
    }
    else {
        array_push($errors, mysqli_error($connection));
    }
}