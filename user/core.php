<?php

session_start();

$id = $_SESSION['id'];

$server = '127.0.0.1';
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