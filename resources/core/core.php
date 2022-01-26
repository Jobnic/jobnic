<?php

session_start();

include("../config/config.php");

date_default_timezone_set('Iran');

$user_status = $_SESSION['status'];

if ($user_status == true) {
    $_USER = $_SESSION['user'];
    $name = $_USER['firstname'] . $_USER['lastname'];
    $user_email = $_USER['email'];
    $user_name = $_USER['name'];
}

if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM people")) == 0) $table_status = true;
else $table_status = false;

$emails = mysqli_fetch_assoc(mysqli_query($connection, "SELECT email FROM people"));
$phones = mysqli_fetch_assoc(mysqli_query($connection, "SELECT phone FROM people"));

$errors = array();
$job = array();

// Login
if (isset($_POST['login'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($mail)) array_push($errors, "ایمیل الزامیست.");
    if (empty($password)) array_push($errors, "رمز الزامیست.");

    if (count($errors) == 0) {
        $check = "SELECT * FROM people WHERE email = '$mail' AND password = '$password'";
        $check_result = mysqli_query($connection, $check);
        if (mysqli_num_rows($check_result) == 1) {
            $_SESSION['status'] = true;
            $_SESSION['user'] = mysqli_fetch_assoc($check_result);
        } else array_push($errors, mysqli_error($connection));
    }
}

// Register
if (isset($_POST['create'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm = mysqli_real_escape_string($connection, $_POST['confirm']);

    if (empty($fname)) array_push($errors, "نام الزامیست.");
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
                            } else array_push($errors, mysqli_error($connection));
                        } else array_push($errors, "تلفن وجود دارد.");
                    }
                } else array_push($errors, "ایمیل وجود دارد.");
            }
        } else {
            if (count($errors) == 0) {
                $id = rand(111111, 999999);
                $token = md5(uniqid(rand(111111111, 999999999), true));
                $join = date("M d, Y H:i:s");
                if (mysqli_query($connection, "INSERT INTO people (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `join`, `status`, `token`, `theme`) VALUES ('$id', '$fname', '$lname', '$phone', '$email', '$password', '$join', 'payed', '$token', 'light')")) {
                    $_SESSION['status'] = true;
                    $_SESSION['user'] = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM people WHERE id = '$id'"));
                    header('location:' . $path . '/user');
                }
            } else array_push($errors, mysqli_error($connection));
        }
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('location:' . $path);
}

// Update skills
if (isset($_POST["updateskill"])) {
    $skillname = mysqli_real_escape_string($connection, $_POST["skillname"]);
    $skillper = mysqli_real_escape_string($connection, $_POST["skillper"]);

    if (empty($skillname)) array_push($errors, "نام توانایی الزامیست");
    if (empty($skillper)) array_push($errors, "حد توانایی الزامیست");

    if (count($errors) == 0) {
        $skill_id = rand(11111, 99999);
        $id = $_USER['id'];

        if (mysqli_query($connection, "INSERT INTO skills (`user`, `skill_id`, `skill_name`, `skill_number`) VALUES ('$id', '$skill_id', '$skillname', '$skillper')")) {
            ?>
            <script>
                window.alert("توانایی اضافه شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        } else array_push($errors, mysqli_error($connection));
    }
}

// Update bio
if (isset($_POST['updatebio'])) {
    $bio = mysqli_real_escape_string($connection, $_POST['bio']);

    if (empty($bio)) {
        array_push($errors, "متن بیوگرافی الزامیست");
    }

    if (count($errors) == 0) {
        if (mysqli_query($connection, "UPDATE people SET bio = '$bio' WHERE id = '$id'")) {
            ?>
            <script>
                window.alert("بیوگرافی آپدیت شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        } else array_push($errors, mysqli_error($connection));
    }
}

// Update mobile
if (isset($_POST['updatephone'])) {
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);

    if (empty($phone)) {
        array_push($errors, "شماره همراه الزامیست");
    }

    if (count($errors) == 0) {
        if (mysqli_query($connection, "UPDATE people SET phone = '$phone' WHERE id = '$id'")) {
            ?>
            <script>
                window.alert("موبایل آپدیت شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        } else array_push($errors, mysqli_error($connection));
    }
}

if (isset($_POST['updatemail'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    if (empty($email)) {
        array_push($errors, "ایمیل الزامیست");
    }

    if (count($errors) == 0) {
        if (mysqli_query($connection, "UPDATE people SET email = '$email' WHERE id = '$id'")) {
            ?>
            <script>
                window.alert("ایمیل آپدیت شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        }
        else array_push($errors, mysqli_error($connection));
    }
}

// Update first name
if (isset($_POST['updatefirstname'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);

    if (empty($fname)) {
        array_push($errors, "نام الزامیست");
    }

    if (count($errors) == 0) {
        if (mysqli_query($connection, "UPDATE people SET firstname = '$fname' WHERE id = '$id'")) {
            ?>
            <script>
                window.alert("نام آپدیت شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        } else array_push($errors, mysqli_error($connection));
    }
}

if (isset($_POST['updatelastname'])) {
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);

    if (empty($lname)) {
        array_push($errors, "نام خانوادگی الزامیست");
    }

    if (count($errors) == 0) {
        $updatelname = "UPDATE people SET firstname = '$lname' WHERE id = '$id'";

        if (mysqli_query($connection, $updatelname)) {
            ?>
            <script>
                window.alert("نام خانوادگی آپدیت شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        } else array_push($errors, mysqli_error($connection));
    }
}

if (isset($_POST['updatepassword'])) {
    $currentpass = $_USER['password'];

    $oldpassword = mysqli_real_escape_string($connection, $_POST['password']);
    $newpassword = mysqli_real_escape_string($connection, $_POST['newpassword']);
    $confirmpassword = mysqli_real_escape_string($connection, $_POST['confirmpassword']);

    if (empty($oldpassword)) {
        array_push($errors, "رمز فعلی الزامیست");
    }
    if (empty($newpassword)) {
        array_push($errors, "رمز جدید الزامیست");
    }
    if (empty($confirmpassword)) {
        array_push($errors, "تایید رمز جدید الزامیست");
    }

    if (count($errors) == 0) {
        if ($oldpassword == $currentpass) {
            if ($newpassword == $confirmpassword) {
                if (mysqli_query($connection, "UPDATE people SET password = '$newpassword' WHERE id = '$id'")) {
                    ?>
                    <script>
                        window.alert("رمز تغییر کرد.");
                    </script>
                    <?php
                    header('location:' . $path . '/user');
                } else array_push($errors, mysqli_error($connection));
            } else array_push($errors, "رمز ها یکسان نمیباشد");
        } else array_push($errors, "رمز فعلی درست نمیباشد");
    }
}

if (isset($_POST['addjob'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $describe = mysqli_real_escape_string($connection, $_POST['describe']);
    $skills = mysqli_real_escape_string($connection, $_POST['skills']);
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $nes = mysqli_real_escape_string($connection, $_POST['nes']);

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

        if (isset($nes)) $addjob = "INSERT INTO jobs(`jobid`, `type`, `user`, `title`, `describe`, `skills`, `datetime`, `price`,`status`, `nes`) VALUES ('$jobid', '$type', '$id', '$title', '$describe', '$skills', '$dt', '$per', 'true', 'true')";
        else $addjob = "INSERT INTO jobs(`jobid`, `type`, `user`, `title`, `describe`, `skills`, `datetime`, `price`,`status`) VALUES ('$jobid', '$type', '$id', '$title', '$describe', '$skills', '$dt', '$per', 'true')";

        if (mysqli_query($connection, $addjob)) {
            $addjobmail = new PHPMailer;

            $addjobmail->IsSMTP();
            $addjobmail->SMTPAuth = true;
            $addjobmail->Host = "smtp.zoho.com";
            $addjobmail->Port = 587;
            $addjobmail->Username = $mailaddr;
            $addjobmail->Password = $mailpass;
            $addjobmail->SMTPSecure = 'tsl';
            $addjobmail->Subject = 'New job';

            $addjobmail->setFrom($mailaddr, 'Jobnic');
            $addjobmail->addAddress($user_email);
            $addjobmail->isHTML(true);

            $name = $row_user['firstname'];

            $link = "http://$host/jobnic/jobs/job.php?jobid=$jobid";

            $bodyContent = '<h1>Hi dear ' . $name . ',</h1>';
            $bodyContent .= '<h3>Your new job added successfully.</h3>';
            $bodyContent .= '<h3>You can visit the job via <a href=' . $link . '>this link</a>.</h3>';
            $bodyContent .= '<br>';
            $bodyContent .= '<small>Jobnic Team, working under Neotrinost LLC.</small>';

            $addjobmail->Body = $bodyContent;

            if (!$addjobmail->send()) {
                array_push($errors, 'Message could not be sent. Mailer Error: ' . $addjobmail->ErrorInfo);
            } else {
                ?>
                <script>
                    window.alert("Job added");
                </script>
                <?php
                header('location:' . $path . '/user');
            }
        } else array_push($errors, mysqli_error($connection));
    }
}

if (isset($_GET["jobid"])) {
    $jobid = $_GET["jobid"];
    $getjob = "SELECT * FROM jobs WHERE jobid = '$jobid'";
    if ($result = mysqli_query($connection, $getjob)) {
        if (mysqli_num_rows($result) == 1) {
            array_push($job, mysqli_fetch_assoc($result));
        } else array_push($job, false);
    }
}

if (isset($_GET["close"])) {
    $close = $_GET["close"];
    $dt = date("M d, Y H:i:s");
    if (mysqli_query($connection, "UPDATE jobs SET status = 'false' WHERE jobid = '$close'")) {
        mysqli_query($connection, "UPDATE jobs SET closed = '$dt' WHERE jobid = '$close'");
        ?>
        <script>
            window.alert("آگهی بسته شد");
        </script>
        <?php
        header('location:' . $path . '/user');
    } else array_push($errors, mysqli_error($connection));
}

if (isset($_GET['delskill'])) {
    $skill = $_GET['delskill'];
    if (mysqli_query($connection, "DELETE FROM skills WHERE skill_id = '$skill'")) {
        ?>
        <script>
            window.alert("توانایی حذف شد");
        </script>
        <?php
        header('location:' . $path . '/user');
    } else array_push($errors, mysqli_error($connection));
}

if (isset($_GET['delsocial'])) {
    $media = $_GET['delsocial'];
    if (mysqli_query($connection, "DELETE FROM socialmedia WHERE social_id = '$media'")) {
        ?>
        <script>
            window.alert("شبکه حذف شد");
        </script>
        <?php
        header('location:' . $path . '/user');
    } else array_push($errors, mysqli_error($connection));
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

            if (empty($rows['stars'])) $current = 0;
            else $current = $rows['stars'];

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
                                ?>
                                <script>
                                    window.alert("Closed");
                                </script>
                                <?php
                                header('location:' . $path . '/user');
                            }
                        }
                    }
                } else array_push($errors, mysqli_error($connection));
            } else array_push($errors, mysqli_error($connection));
        } else array_push($errors, "User didnt found");
    }
}

// Delete account
if (isset($_POST["deleteaccount"])) {
    $userpass = mysqli_real_escape_string($connection, $_POST["password"]);
    $check = mysqli_real_escape_string($connection, $_POST["iknow"]);

    if (empty($userpass)) array_push($errors, "Password is empty");
    if (empty($check)) array_push($errors, "You didnt check the checkbox");

    if (count($errors) == 0) {
        if (mysqli_query($connection, "DELETE FROM people WHERE id = '$id'")) {
            ?>
            <script>
                window.alert("جساب شما حذف شد.");
            </script>
            <?php
            header('location:' . $path . '/?logout=true');
        } else array_push($errors, mysqli_error($connection));
    }
}

// Update social media
if (isset($_POST['updatemedia'])) {
    $media = mysqli_real_escape_string($connection, $_POST["social"]);
    $username = mysqli_real_escape_string($connection, $_POST["username"]);

    if (empty($media)) array_push($errors, "نام شبکه اجتماعی الزامیست");
    if (empty($username)) array_push($errors, "یوزرنیم الزامیست");

    if (count($errors) == 0) {
        $social_id = rand(11111, 99999);
        $id = $_USER['id'];
        if (mysqli_query($connection, "INSERT INTO socialmedia (`user`, `social_id`, `social_media`, `social_link`) VALUES ('$id', '$social_id', '$media', '$username')")) {
            ?>
            <script>
                window.alert("شبکه اجتماعی اضافه شد.");
            </script>
            <?php
            header('location:' . $path . '/user');
        } else array_push($errors, mysqli_error($connection));
    }
}