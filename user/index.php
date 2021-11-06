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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - User Panel</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"-->
<!--          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
    <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
            <div class="navbar-nav" style="font-size: 12px;">
                <a class="nav-link active jntext" onclick="show()"><i class="fa fa-user"></i> پروفایل</a>
                <a class="nav-link active jntext" onclick="show()"><i class="fa fa-cogs"></i> تنظیمات</a>
                <a class="nav-link active jntext" onclick="show()"><i class="fa fa-envelope"></i> تیکت ها</a>
                <a class="nav-link active jntext" onclick="show()"><i class="fa fa-check"></i> آگهی های من</a>
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
        <div id="user" style="display: block;">
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
                            <h4><i class="fa fa-id-card"></i> توانایی های شما</h4>
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
                            <h4><i class="fa fa-id-card"></i> شبکه های اجتماعی</h4>
                        </div>
                        <div class="body">
                            <?php
                            if (isset($row['linkedin'])) {
                                ?>
                                <p>
                                    <a target="_blank" class="link" href="https://linkedin.com/in/<?php echo $row['linkedin']; ?>">
                                        <i class="icon fa fa-linkedin text-white bg-primary"></i>&nbsp;لینکدین
                                    </a>
                                </p>
                                <?php
                            }
                            if (isset($row['github'])) {
                                ?>
                                <p>
                                    <a target="_blank" class="link" href="https://github.com/<?php echo $row['github']; ?>">
                                        <i class="icon fa fa-github text-white bg-dark"></i>&nbsp;گیتهاب
                                    </a>
                                </p>
                                <?php
                            }
                            if (isset($row['telegram'])) {
                                ?>
                                <p>
                                    <a target="_blank" class="link" href="https://t.me/<?php echo $row['telegram']; ?>">
                                        <i class="icon fa fa-telegram text-white bg-primary"></i>&nbsp;تلگرام
                                    </a>
                                </p>
                                <?php
                            }
                            if (isset($row['instagram'])) {
                                ?>
                                <p>
                                    <a target="_blank" class="link" href="https://instagram.com/<?php echo $row['instagram']; ?>">
                                        <i class="icon fa fa-instagram text-white bg-danger"></i>&nbsp;اینستاگرام
                                    </a>
                                </p>
                                <?php
                            }
                            if (isset($row['twitter'])) {
                                ?>
                                <p>
                                    <a target="_blank" class="link" href="https://twitter.com/<?php echo $row['twitter']; ?>">
                                        <i class="icon fa fa-twitter text-white bg-info"></i>&nbsp;توئیتر
                                    </a>
                                </p>
                                <?php
                            }
                            if (isset($row['facebook'])) {
                                ?>
                                <p>
                                    <a target="_blank" class="link" href="https://facebook.com/<?php echo $row['facebook']; ?>">
                                        <i class="icon fa fa-facebook text-white bg-primary"></i>&nbsp;فیسبوک
                                    </a>
                                </p>
                                <?php
                            }
//                            else {
//                                echo "<p class='jntext'>شبکه اجتماعی وارد نشده است.</p>";
//                            }
                            ?>
                            <button data-toggle="modal" data-target="#addnewmedia" class="btn btn-sm jnbtn">افزودن شبکه اجتماعی</button>
                        </div>
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
                    <div class="row">
                        <div class="col-md-2">
                            <div class="">
                                <select class="form-control">
                                    <option data-content="<i class='fa fa-github'></i> aria-hidden='true'"></option>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-10">
                            <div class="">
                                <input class="form-control">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="updatemedia" class="btn jnbtn">اضافه کردن</button>
                </div>
            </form>
        </div>
    </div>
</div>