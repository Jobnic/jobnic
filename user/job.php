<?php
session_start();

include('core.php');
include("../resources/config/config.php");

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

$theme = $row['theme'];

$jobid = $_GET["jobid"];

if (!isset($jobid)) {
    ?>
    <script>
        window.alert("کد آگهی را وارد نکردید");
        window.location.replace(".");
    </script>
    <?php
}
else {
    $getjob = "SELECT * FROM jobs WHERE jobid = '$jobid'";
    if ($result = mysqli_query($connection, $getjob)) {
        if (mysqli_num_rows($result) == 1) {
            $job = mysqli_fetch_assoc($result);
        }
        else {
            ?>
            <script>
                window.alert("آگهی پیدا نشد");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/jpg" href="<?php echo $path; ?>/resources/images/logo.jpg"/>
    <meta property="og:image" content="<?php echo $path; ?>/pack/etc/logo.jpg">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>جاب نیک - آگهی  شماره <?php echo $jobid; ?></title>
    <script src="../resources/js/tabs.js"></script>
    <!-- <script src="../pack/js/fa.js"></script> -->
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
    <!-- <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
    <link href="../resources/cos/main.css" rel="stylesheet" type="text/css">
</head>
<body class="dash">
    <?php include('../resources/widgets/header.php'); ?>
<br>
<div class="container-fluid">
    <div class="">
        <div class="row">
            <div class="col-md-7">
                <div class="dialog">
                    <div class="head">
                        <h4><i class="fa fa-info"></i> اطلاعات آگهی</h4>
                    </div>
                    <div class="body">
                    <span style="float: left;" class="btn jnout btn-sm"><?php echo $job['type']; ?></span>
                        <span style="float: left;">&nbsp;</span>
                        <span style="float: left" class="btn btn-sm jnout">
                            <i class="fa fa-eye"></i>
                            <?php
                            if (isset($job['views'])) {
                                echo $job["views"];
                            }
                            else {
                                echo "0";
                            }
                            ?>
                        </span>
                        <p><b><?php echo $job['title']; ?></b></p>
                        <p><?php echo $job['describe']; ?></p>
                        <p style="font-size: 14px;"><?php echo $job['datetime']; ?></p>
                        <?php
                        $skills = explode(" ", $job['skills']);

                        foreach ($skills as $skill) {
                            echo "<p class='btn jnout btn-sm'>$skill</p>&nbsp;";
                        }
                        ?>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-5">
                <div class="dialog">
                    <div class="head">
                        <h4><i class="fa fa-times"></i> بستن آگهی</h4>
                    </div>
                    <div class="body">
                        <?php
                        if ($job['status'] == 'false') {
                            echo "<p class=''><b>این آگهی بسته شده است</b></p>";
                            echo "<p class=''>" . $job['closed'] . "</p>";
                        }
                        else {
                            ?>
                            <p>اگر از کاربران جاب نیک این آگهی را انجام داده است، فرم زیر را پر نمایید.</p>
                            <form action="index.php" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <input name="jobid" type="number"
                                            class="form-control-sm form-control"
                                            placeholder="کد آگهی" value="<?php echo $job['jobid']; ?>">
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
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <div class="head">
                        <h4><i class="fa fa-pencil"></i> درخواست ها</h4>
                    </div>
                    <div class="body">
                        <?php
                        $get_applied = "SELECT * FROM applies WHERE job = '$jobid' ORDER BY `row` DESC";
                        $res_applied = mysqli_query($connection, $get_applied);
                        if (mysqli_num_rows($res_applied) != 0) {
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

                                        $user_name = $row_user["firstname"] . " " . $row_user["lastname"];
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
                </div>
                <br>
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