<?php

session_start();
include("../pack/config.php");

$id = $_SESSION['id'];

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$select_user = "SELECT * FROM people WHERE id = '$id'";
$result_user = mysqli_query($connection, $select_user);
$row_user = mysqli_fetch_assoc($result_user);

if (isset($_POST["updateskill"])) {
    $skillname = mysqli_real_escape_string($connection, $_POST["skillname"]);
    $skillper = mysqli_real_escape_string($connection, $_POST["skillper"]);

    $skill = $skillname . "-" . $skillper;
    $both = $row_user['skills'] . " " . $skill;

    $update_skill = "UPDATE people SET skills = '$both' WHERE id = '$id'";

    if (mysqli_query($connection, $update_skill)) {
        ?>
            <script>
                window.alert("Skills updated.");
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

if (isset($_POST['updatebio'])) {
    $bio = mysqli_real_escape_string($connection, $_POST['bio']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updatelinkedin'])) {
    $social = mysqli_real_escape_string($connection, $_POST['linkedin']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updateinstagram'])) {
    $social = mysqli_real_escape_string($connection, $_POST['instagram']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updatetelegram'])) {
    $social = mysqli_real_escape_string($connection, $_POST['telegram']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updategithub'])) {
    $social = mysqli_real_escape_string($connection, $_POST['github']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updatetwitter'])) {
    $social = mysqli_real_escape_string($connection, $_POST['twitter']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updatephone'])) {
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updatemail'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);

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
        ?>
        <script>
            window.alert("<?php echo mysqli_error($connection); ?>");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['updatepassword'])) {
    $currentpass = $row_user['password'];

    $oldpassword = mysqli_real_escape_string($connection, $_POST['password']);
    $newpassword = mysqli_real_escape_string($connection, $_POST['newpassword']);
    $confirmpassword = mysqli_real_escape_string($connection, $_POST['confirmpassword']);

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
                ?>
                <script>
                    window.alert("<?php echo mysqli_error($connection); ?>");
                    window.location.replace(".");
                </script>
                <?php
            }
        }
        else {
            ?>
            <script>
                window.alert("Password don't match.");
                window.location.replace(".");
            </script>
            <?php
        }
    }
    else {
        ?>
        <script>
            window.alert("Current password is wrong.");
            window.location.replace(".");
        </script>
        <?php
    }
}

if (isset($_POST['addjob'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $describe = mysqli_real_escape_string($connection, $_POST['describe']);
    $skills = mysqli_real_escape_string($connection, $_POST['skills']);
    $type = mysqli_real_escape_string($connection, $_POST['type']);

    $jobid = rand(11111, 99999);

    $addjob = "INSERT INTO jobs(`jobid`, `type`, `user`, `title`, `describe`, `skills`, `status`) VALUES ('$jobid', '$type', '$id', '$title', '$describe', '$skills', 'true')";

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