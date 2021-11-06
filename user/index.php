<?php
session_start();

include('core.php');
include("../pack/config/config.php");

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

$theme = $row['theme'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/jpg" href="<?php echo $path; ?>/pack/etc/logo.jpg"/>
    <meta property="og:image" content="<?php echo $path; ?>/pack/etc/logo.jpg">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جاب نیک - پنل کاربر</title>
    <script src="../pack/js/tabs.js"></script>
    <!-- <script src="../pack/js/fa.js"></script> -->
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
    <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link href="../pack/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <?php
    if ($theme == "auto") {
        ?>
        <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/auto.css" type="text/css" rel="stylesheet"> -->
        <?php
    }
    else {
        ?>
        <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/dark.css" type="text/css" rel="stylesheet"> -->
        <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/light.css" type="text/css" rel="stylesheet"> -->
        <?php
    }
    ?>
    <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" type="text/css" rel="stylesheet"> -->
    <style>
		.tgrm {
			cursor: pointer;
			padding: 5%;
			background: blue;
			border-radius: 10px;
			color: white;
		}
    </style>
    <link href="../pack/cos/main.css" rel="stylesheet" type="text/css">
</head>
<body class="dash">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand jntext" href="<?php echo $path; ?>"><i class="fa fa-home"></i> صفحه اصلی</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                </li>
            </ul>
            <div class="navbar-nav" style="font-size: 10px;">
                <a class="nav-link active jntext jnpointer" onclick="return show('profile');"><i class="fa fa-user"></i> پروفایل</a>
                <a class="nav-link active jntext jnpointer" onclick="return show('settings');"><i class="fa fa-cogs"></i> تنظیمات</a>
                <a class="nav-link active jntext jnpointer" onclick="return show('tickets');"><i class="fa fa-envelope"></i> تیکت ها</a>
                <a class="nav-link active jntext jnpointer" onclick="return show('jobs');"><i class="fa fa-check"></i> آگهی های من</a>
                <a class="nav-link active jntext jnpointer" onclick="return show('applies');"><i class="fa fa-check"></i> درخواست های من</a>
            </div>
            <span class="jntext">
            |
            </span>
            <div class="navbar-nav" style="font-size: 12px;">
                <a class="nav-link active jntext jnlink" href="../jobs"><i class="fa fa-list"></i> اگهی ها</a>
                <a class="nav-link active jntext jnlink" href="../account/logout.php"><i class="fa fa-sign-out"></i> خروج</a>
            </div>
        </div>
    </div>
</nav>
<br>
<div class="container-fluid">
    <?php
    if (count($errors) > 0) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong>حواست کجاست,</strong></p>
            <?php
            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
    }
    ?>
    <div class="">
        <div id="profile" style="display: block;">
            <div class="row">
                <div class="col-md-4">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-id-card"></i> پروفایل شما</h4>
                        </div>
                        <div class="body">
                            <h4><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></h4>
                            <br>
                            <p>
                                <?php
                                    if (isset($row['bio'])) {
                                        echo $row['bio'];
                                    }
                                    else {
                                        echo "<i>بیوگرافی هنوز وارد نشده است.</i>";
                                    }
                                ?>
                                <br>
                                <span class="selectable" style="font-size: 10px" data-toggle="modal" data-target="#editbio" class="jntext">
                                    <i class="fa fa-pencil"></i> ویرایش بیوگرافی
                                </span>
                            </p>
                            <br>
                            <p><i class="icon fa fa-phone text-white bg-success"></i> <?php echo $row['phone']; ?></p>
                            <p><i class="icon fa fa-envelope text-white bg-primary"></i> <?php echo $row['email']; ?></p>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-wrench"></i> توانایی های شما</h4>
                        </div>
                        <div class="body">
                            <?php
                            $get_skills = "SELECT * FROM skills WHERE user = '$id'";
                            $get_skills_result = mysqli_query($connection, $get_skills);
                            if (mysqli_num_rows($get_skills_result) != 0) {
                                while ($skill = mysqli_fetch_assoc($get_skills_result)) {
                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar jnbg"
                                             role="progressbar" aria-valuenow="<?php echo $skill['skill_number']; ?>" aria-valuemin="0"
                                             aria-valuemax="100" style="width: <?php echo $skill['skill_number']; ?>%;">
                                        </div>
                                    </div>
                                    <span class="" style="font-size: 10px;"><?php echo $skill['skill_name'] . " " . $skill['skill_number']; ?> %</span>
                                    <a href="index.php?delskill=<?php echo $skill['skill_id']; ?>">
                                        <span style="float: left;" class="text-danger"><i class="fa fa-trash-o"></i></span>
                                    </a>
                                    <hr>
                                    <?php
                                }
                            }
                            else {
                                echo "<p>توانایی ثبت نشده است.</p>";
                            }
                            ?>
                            <button data-toggle="modal" data-target="#addnewskill" class="btn btn-sm jnbtn">افزودن توانایی جدید</button>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-cloud"></i> شبکه های اجتماعی</h4>
                        </div>
                        <div class="body">
                        <?php
                            $get_social = "SELECT * FROM socialmedia WHERE user = '$id'";
                            $get_social_result = mysqli_query($connection, $get_social);
                            if (mysqli_num_rows($get_social_result) != 0) {
                                while ($media = mysqli_fetch_assoc($get_social_result)) {
                                    ?>
                                    <p>
                                        <i class="fa fa-<?php echo $media['social_media']; ?>"></i>
                                        |
                                        <?php echo $media['social_link']; ?>
                                        <a href="index.php?delsocial=<?php echo $media['social_id']; ?>">
                                            <span style="float: left;" class="text-danger"><i class="fa fa-trash-o"></i></span>
                                        </a>
                                    </p>
                                    <hr>
                                    <?php
                                }
                            }
                            else {
                                echo "<p>شبکه ای ثبت نشده است.</p>";
                            }
                            ?>
                            <button data-toggle="modal" data-target="#addnewmedia" class="btn btn-sm jnbtn">افزودن شبکه اجتماعی</button>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-check"></i> کار های انجام شده</h4>
                        </div>
                        <div class="body">
                            <?php
                            $get_jobs = "SELECT * FROM jobs WHERE person = '$id'";
                            $job_result = mysqli_query($connection, $get_jobs);
                            if (mysqli_num_rows($job_result) > 0) {
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-hover text-center table-bordered border-dark table-sm">
                                        <thead>
                                        <tr>
                                            <th scope="col">موضوع</th>
                                            <th scope="col">نوع</th>
                                            <th scope="col">زمان</th>
                                            <th scope="col">ستاره</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($job_row = mysqli_fetch_assoc($job_result)) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $job_row['title']; ?></th>
                                                <td><?php echo $job_row['type']; ?></td>
                                                <td><?php echo $job_row['closed']; ?></td>
                                                <td><?php echo $job_row['stars']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            }
                            else {
                                echo "<p>تاکنون کاری انجام نداده اید.</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-award"></i> درخواست برای لیبل</h4>
                        </div>
                        <div class="body">
                            <p>
                                <?php
                                if (is_null($row['verified'])) {
                                    echo '<a class="jnlink" href="index.php?request=label&type=verified">درخواست برای <b><i class="fa fa-award"></i> لیبل تایید</b> را ثبت کنید.</a>';
                                }
                                else {
                                    echo "<p>شما لیبل تاییده را دریافت کرده اید.</p>";
                                }
                                ?>
                            </p>
                            <p>
                                <?php
                                if (is_null($row['awesome'])) {
                                    echo '<a class="jnlink" href="index.php?request=label&type=trophy">درخواست برای <b><i class="fa fa-trophy"></i> لیبل جام</b> را ثبت کنید.</a>';
                                }
                                else {
                                    echo "<p>شما لیبل جام را دریافت کرده اید.</p>";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="settings" style="display: none;">
        <div class="row">
                <div class="col-md-6">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-cog"></i> تنظیمات کاربر</h4>
                        </div>
                        <div class="body">
                            <form method="post" action="index.php" class="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <p><i class="fa fa-user"></i> تغییر نام</p>
                                            <input name="fname" type="text"
                                                class="inp form-control-sm form-control"
                                                placeholder="نام">
                                            <br>
                                            <button class="btn btn-sm jnbtn" name="updatefirstname">تغییر نام</button>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p><i class="fa fa-user"></i> تغییر نام خانوادگی</p>
                                            <input name="lname" type="text"
                                                class="inp form-control-sm form-control"
                                                placeholder="نام خانوادگی">
                                            <br>
                                            <button class="btn btn-sm jnbtn" name="updatelastname">تغییر نام خانوادگی</button>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <p><i class="fa fa-phone"></i> تغییر شماره همراه</p>
                                    <input name="phone" type="text"
                                        class="inp form-control-sm form-control"
                                        placeholder="شماره همراه">
                                    <br>
                                    <button class="btn btn-sm jnbtn" name="updatephone">تغییر شماره همراه</button>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <p><i class="fa fa-envelope"></i> تغییر ایمیل</p>
                                    <input name="email" type="text"
                                        class="inp form-control-sm form-control"
                                        placeholder="ایمیل">
                                    <br>
                                    <button class="btn btn-sm jnbtn" name="updatemain">تغییر ایمیل</button>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <p><i class="fa fa-key"></i> تغییر رمز</p>
                                    <input name="password" type="password"
                                        class="inp form-control-sm form-control"
                                        placeholder="رمز فعلی">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="newpassword" type="password"
                                                class="form-control inp form-control-sm"
                                                placeholder="رمز جدید">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="confirmpassword" type="password"
                                                class="form-control inp form-control-sm"
                                                placeholder="تایید رمز جدید">
                                        </div>
                                    </div>
                                </div>
                                <button name="updatepassword" type="submit" class="btn jnbtn btn-sm">تغییر رمز</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-6">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-shield"></i> تایید دو مرحله ای</h4>
                        </div>
                        <div class="body">
                            <form method="post" action="index.php" class="">
                                <div class="form-group">
                                    <p><i class="fa fa-key"></i> ایمیل خود را وارد کنید</p>
                                    <input name="email" type="text"
                                        class="inp form-control-sm form-control"
                                        placeholder="ایمیل">
                                    <br>
                                    <button class="btn btn-sm jnbtn" name="enable2fa">فعال سازی تایید دو مرحله ای</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-moon-o"></i> تم</h4>
                        </div>
                        <div class="body">
                            <form method="post" action="index.php" class="">
                                <div class="form-group">
                                    <p><i class="fa fa-sun"></i> تغییر تم</p>
                                    <div>
                                        <input type="radio" name="mode" value="dark" id="dark">
                                        <label for="dark"><i class="fa fa-moon"></i> تم تاریک</label>
                                        &nbsp;
                                        <input type="radio" name="mode" value="light" id="light">
                                        <label for="light"><i class="fa fa-sun"></i> تم روشن</label>
                                    </div>
                                    <br>
                                    <div>
                                        <input type="radio" name="mode" value="auto" id="auto">
                                        <label for="auto"><i class="fa fa-sun"></i> تم اتوماتیک بنا بر سیستم</label>
                                    </div>
                                    <br>
                                    <small>* تم فعلی شما <b><?php echo $row["theme"]; ?></b> میباشد.</small>
                                    <br>
                                    <br>
                                    <button class="btn btn-sm jnbtn" name="changemode">تغییر تم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="dialog delete">
                        <div class="head delete">
                            <h4><i class="fa fa-trash"></i> حذف حساب کاربری</h4>
                        </div>
                        <div class="body delete">
                            <form method="post" action="index.php" class="">
                                <div class="form-group">
                                    <p><i class="fa fa-key"></i> رمز خود را وارد کنید</p>
                                    <input name="password" type="text"
                                        class="inp form-control-sm form-control"
                                        placeholder="رمز">
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input inp" name="iknow" type="checkbox" id="accept">
                                        <label class="form-check-label" for="accept">
                                            بله، بنده با حذف حساب کاربری ام موافق هستم.
                                        </label>
                                    </div>
                                    <br>
                                    <button class="btn btn-sm jndelbtn" name="deleteaccount">حذف حساب</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div id="jobs" style="display: none;">
            <div class="row">
                <div class="col-md-7">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-plus"></i> اضافه کردن پروژه جدید</h4>
                        </div>
                        <div class="body">
                            <form method="post" action="index.php" class="">
                                <div class="group">
                                    <select name="type" class="form-select form-select-sm border-night inp"
                                            aria-label=".form-select-sm example">
                                        <option value="default">دسته بندی آگهی را انتخاب کنید</option>
                                        <option value="programming">برنامه نویسی</option>
                                        <option value="android">اندروید</option>
                                        <option value="backend">بک اند</option>
                                        <option value="design">طراحی</option>
                                        <option value="school">مدرسه ای</option>
                                        <option value="costume">غیره</option>
                                    </select>
                                    <br>
                                    <input name="title" type="text" class="form-control form-control-sm inp"
                                        placeholder="موضوع آگهی">
                                    <br>
                                    <textarea name="describe" class="form-control form-control-sm inp"
                                            rows="5" placeholder="توضیحات آگهی"></textarea>
                                    <br>
                                    <input name="skills" type="text"
                                        class="form-control form-control-sm inp"
                                        placeholder="توانایی های لازمه. برای مثال: پایتون - فتوشاپ">
                                    <br>
                                    <input name="price" type="text" class="form-control form-control-sm inp"
                                        placeholder="بودجه">
                                    <br>
                                    <small>* اگر<b> قیمت </b>خالی باشد، به صورت پیش فرض، توافثی ثبت میشود.</small>
                                    <br>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input inp" name="nes" type="checkbox" id="nes">
                                        <label class="form-check-label" for="nes">
                                            این آگهی، فوری میباشد.
                                        </label>
                                    </div>
                                    <br>
                                    <button name="addjob" class="btn jnbtn btn-sm">انتشار آگهی</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-md-5">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-list"></i> آگهی ها</h4>
                        </div>
                        <div class="body">
                            <?php
                            $select_jobs = "SELECT * FROM jobs WHERE user = $id ORDER BY row DESC";
                            $result_jobs = mysqli_query($connection, $select_jobs);
                            if (mysqli_num_rows($result_jobs) > 0) {
                                while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                                    ?>
                                    <p class="">
                                        <?php
                                        $jobid = $job_row['jobid'];
                                        $jobtitle = $job_row['title'];
                                        echo "<a class='jnlink' href='index.php?tab=jobs&jobid=$jobid'>$jobtitle</a>";
                                        if ($job_row['status'] == 'true') {
                                            echo "<span style='float: left;' class='text-success'>باز</span>";
                                        } else {
                                            echo "<span style='float: left;' class='text-danger'>بسته</span>";
                                        }
                                        ?>
                                    </p>
                                    <hr>
                                    <?php
                                }
                            } else {
                                echo "<p>هیج آگهی ثبت نشده است.</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-list"></i> پیش نمایش آگهی</h4>
                        </div>
                        <div class="body">
                            <div class="row">
                            <?php
                                if (count($job) > 0) {
                                    if ($job[0] == false) {
                                        echo '<p>متاسفانه، آگهی شما پیدا نشد.</p>';
                                    }
                                    else {
                                        ?>
                                        <div class="col-md-4">
                                            <div>
                                                <span style="float: left;" class="btn jnout btn-sm"><?php echo $job[0]['type']; ?></span>
                                                <span style="float: left;">&nbsp;</span>
                                                <span style="float: left" class="btn btn-sm jnout">
                                                    <i class="fa fa-eye"></i>
                                                    <?php
                                                    if (isset($job[0]['views'])) {
                                                        echo $job[0]["views"];
                                                    }
                                                    else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                </span>
                                                <p><b><?php echo $job[0]['title']; ?></b></p>
                                                <p><?php echo $job[0]['describe']; ?></p>
                                                <p style="font-size: 14px;"><?php echo $job[0]['datetime']; ?></p>
                                                <?php
                                                $skills = explode(" ", $job[0]['skills']);

                                                foreach ($skills as $skill) {
                                                    echo "<p class='btn jnout btn-sm'>$skill</p>&nbsp;";
                                                }
                                                ?>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <p><b>درخواست ها</b></p>
                                                <?php
                                                $jobid = $job[0]['jobid'];
                                                $get_applied = "SELECT * FROM applies WHERE job = '$jobid' ORDER BY row DESC";
                                                $res_applied = mysqli_query($connection, $get_applied);
                                                if (mysqli_num_rows($result_jobs) != 0) {
                                                    ?>
                                                    <table class="table table-striped table-responsive table-bordered jnborder">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">کاربر</th>
                                                                <th scope="col">تاریخ</th>
                                                                <th scope="col">عملیات</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($apply = mysqli_fetch_assoc($res_applied)) {
                                                                $user = $apply['userid'];
                                                                $get_user = "SELECT * FROM people WHERE id = '$user'";
                                                                $res_user = mysqli_query($connection, $get_user);
                                                                $row_user = mysqli_fetch_assoc($res_user);

                                                                $user_name = $row_user["firstname"] . " " . $row_user["firstname"];
                                                                ?>
                                                                <tr>
                                                                    <td><a class="link" href="user.php?userid=<?php echo $user; ?>"><?php echo $user_name; ?></a></td>
                                                                    <td><?php echo $apply["dt"]; ?></td>
                                                                    <td>
                                                                        <a href="index.php?act=check&user=<?php echo $user; ?>&jobid=<?php echo $jobid; ?>" class="text-success jnlink">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        |
                                                                        <a href="index.php?act=times&user=<?php echo $user; ?>&jobid=<?php echo $jobid; ?>" class="text-danger jnlink">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                }
                                                else {
                                                    echo "<p>هنوز درخواستی ثبت نشده است.</p>";
                                                }
                                                ?>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <?php
                                                if ($job[0]['status'] == 'false') {
                                                    echo "<p class=''><b>این آگهی بسته شده است</b></p>";
                                                    echo "<p class=''>" . $job[0]['closed'] . "</p>";
                                                }
                                                else {
                                                    ?>
                                                    <p>اگر از کاربران جاب نیک این آگهی را انجام داده است، فرم زیر را پر نمایید.</p>
                                                    <form action="index.php" method="post">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <input name="jobid" type="number"
                                                                    class="form-control-sm form-control"
                                                                    placeholder="کد آگهی" value="<?php echo $job[0]['jobid']; ?>">
                                                                <small class="jntext">کد آگهی</small>
                                                                <br>
                                                                <br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input name="dider" type="number"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="کد کاربر">
                                                                    <small class="jntext">کد کاربر را وارد کنید</small>
                                                                </div>
                                                                <br>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input max="5" name="star" type="number"
                                                                        class="form-control form-control-sm"
                                                                        placeholder="تعداد ستاره ها">
                                                                    <small class="jntext">از 1 تا پنج به کاربر ستاره دهید</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button class="btn btn-sm jnbtn" name="closejob">بستن آگهی با و امتیاز دهی</button>
                                                    </form>
                                                    <hr>
                                                    <p>اگر کسی از جاب نیک این کار را انجام نداده است، از این طریق آگهی را ببندید.</p>
                                                    <a class="btn jnbtn btn-sm" href="index.php?close=<?php echo $job['0']['jobid']; ?>">بستن آگهی</a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <br>
                                        </div>
                                        <?php
                                    }
                                }
                                else {
                                    echo '<p>ابتدا آگهی را انتخاب کنید.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div id="applies" style="display: none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="dialog">
                        <div class="head">
                            <h4><i class="fa fa-tasks"></i> درخواست ها</h4>
                        </div>
                        <div class="body">
                            <?php
                            $select_applies = "SELECT * FROM applies WHERE userid = $id ORDER BY row DESC";
                            $result_applies = mysqli_query($connection, $select_applies);
                            if (mysqli_num_rows($result_applies) > 0) {
                                ?>
                                <table class="table table-striped table-responsive table-bordered jnborder">
                                    <thead>
                                    <tr>
                                        <th scope="col">آگهی</th>
                                        <th scope="col">تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($apply = mysqli_fetch_assoc($result_applies)) {
                                        ?>
                                        <tr>
                                            <td><a class="link" href="../jobs/job.php?jobid=<?php echo $apply['job']; ?>"><?php echo $apply['job']; ?></a></td>
                                            <td><?php echo $apply["dt"]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            else {
                                echo "<p>تاکنون درخواستی ثبت نکرده اید.</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div id="tickets" style="display: none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="dialog">
                        <h3><i class="fa fa-envelope"></i> Send Ticket</h3>
                        <hr>
                        <form method="post" action="index.php">
                            <input name="tictitle" type="text" class="form-control form-control-sm inp"
                                placeholder="Ticket Title">
                            <br>
                            <textarea name="ticdescribe" class="form-control form-control-sm inp"
                                    rows="5" placeholder="Ticket Describtion"></textarea>
                            <br>
                            <button class="btn btn-sm jbtn" name="sendtik" type="submit">Send Ticket</button>
                        </form>
                    </div>
                    <br>
                </div>
                <div class="col-md-5">
                    <div class="dialog">
                        <h3><i class="fa fa-paper-plane"></i> My Tickets</h3>
                        <hr>
                        <?php
                        $select_tiks = "SELECT * FROM ticks WHERE user = $id ORDER BY row DESC";
                        $result_tiks = mysqli_query($connection, $select_tiks);
                        if (mysqli_num_rows($result_tiks) > 0) {
                            while ($tik_row = mysqli_fetch_assoc($result_tiks)) {
                                ?>
                                <p>
                                    <?php
                                    $tikid = $tik_row['tikid'];
                                    $tiktitle = $tik_row['title'];
                                    echo "<a class='link' href='index.php?tab=tickets&tikid=$tikid'>$tiktitle</a>";
                                    if (isset($tik_row['status'])) {
                                        echo "<span style='float: right;' class='text-success'><i class='fa fa-check'></i></span>";
                                    } else {
                                        echo "<span style='float: right;' class='text-night'><i class='fa fa-times'></i></span>";
                                    }
                                    ?>
                                </p>
                                <hr>
                                <?php
                            }
                        } else {
                            echo "<p>No tickets yet</p>";
                        }
                        ?>
                    </div>
                    <br>
                </div>
                <div class="col-md-7">
                    <div class="dialog">
                        <h3><i class="fa fa-search"></i> Ticket Review</h3>
                        <hr>
                        <?php
                        if (count($tik) > 0) {
                            if ($tik[0] == false) {
                                echo "<p><b>Ticket didnt found.</b></p>";
                            }
                            else {
                                ?>
                                <h3><?php echo $tik[0]['title']; ?></h3>
                                <p><?php echo $tik[0]['describe']; ?></p>
                                <br>
                                <?php
                                if (isset($tik[0]['status'])) {
                                    if (isset($tik[0]['answered'])) {
                                        ?>
                                        <p><b><?php echo $tik[0]['answer']; ?></b></p>
                                        <p><?php echo $tik[0]['answered']; ?></p>
                                        <p><small>Answered in <?php echo $tik[0]['answered']; ?></small></p>
                                        <?php
                                    }
                                    else {
                                        echo "<p>Support saw ticket, wait for answer</p>";
                                    }
                                }
                                else {
                                    echo '<p><small>Until now support didnt saw ticket</small></p>';
                                }
                                ?>
                                <br>
                                <p>Sent in <b><?php echo $tik[0]['datetime']; ?></b></p>
                                <p>Ticket ID : <b><?php echo $tik[0]['tikid']; ?></b></p>
                                <?php
                            }
                        }
                        else {
                            echo '<p>Select ticket first.</p>';
                        }
                        ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.neotrinost.ir/jobnic/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<div class="modal fade" id="editbio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="index.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغییر بیوگرافی</h5>
                    <i data-dismiss="modal" aria-label="Close" class="selectable fa fa-times"></i>
                </div>
                <div class="modal-body">
                    <textarea name="bio" class="form-control form-control-sm inp" rows="5" placeholder="بیوگرافی را وارد کنید . . ."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updatebio" class="btn jnbtn">تغییر</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addnewskill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="index.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافه کردن توانایی</h5>
                    <i data-dismiss="modal" aria-label="Close" class="selectable fa fa-times"></i>
                </div>
                <div class="modal-body">
                    <input type="text" name="skillname" class="form-control form-control-sm inp border-night"
                           placeholder="نام. برای مثال: پایتون">
                    <br>
                    <input type="number" name="skillper" max="100"
                           class="form-control form-control-sm inp border-night"
                           placeholder="درصد تسلط. برای مثال 50">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updateskill" class="btn jnbtn">اضافه کردن</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addnewmedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="index.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافه کردن شبکه اجتماعی</h5>
                    <i data-dismiss="modal" aria-label="Close" class="selectable fa fa-times"></i>
                </div>
                <div class="modal-body">
                    <select name="social" class="form-control">
                        <option selected>شبکه اجتماعی را انتخاب کنید</option>
                        <option value="github">گیتهاب</option>
                        <option value="linkedin">لینکدین</option>
                        <option value="twitter">توییتر</option>
                        <option value="facebook">فیسبوک</option>
                        <option value="quora">کوئورا</option>
                        <option value="instagram">اینستاگرام</option>
                    </select>
                    <br>
                    <input name="username" class="form-control" placeholder="نام کاربری خود را در این شبکه وارد کنید">
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updatemedia" class="btn jnbtn">اضافه کردن</button>
                </div>
            </form>
        </div>
    </div>
</div>