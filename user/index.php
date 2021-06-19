<?php

include('core.php');
include("../pack/config.php");
include("includes/head.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Profile</title>
    <style>
        .icon {
            padding: 5px;
            border-radius: 5px;
        }

        .link {
            text-decoration: none;
            color: gray;
        }

        .mbtn {
            border: solid 1px #d3d3d3;
        }

        .mbtn:hover {
            border: solid 1px #d3d3d3;
        }

        .inp {
            border: solid 1px #d3d3d3;
        }

        .inp:hover {
            border: solid 1px #d3d3d3;
        }
    </style>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../../NarTik/pack/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../NarTik/pack/css/datepicker3.css" rel="stylesheet">
    <link href="../../NarTik/pack/css/styles.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="../">Job Nic</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" href="../account/logout.php">
                        <em class="fa fa-sign-out"></em>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar primg">
        <div class="profile-usertitle">
            <?php
            include("includes/wel.php");
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="index.php">
                <i class="fa fa-dashboard">&nbsp;</i> Profile</a>
        </li>
        <li>
            <a class="" href="projects.php">
                <i class="fa fa-list">&nbsp;</i> Projects
            </a>
        </li>
        <li>
            <a class="" href="setting.php">
                <i class="fa fa-cogs">&nbsp;</i> Setting
            </a>
        </li>
    </ul>
</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="../user">
                    <em class="fa fa-user"></em>
                </a></li>
            <li class="active">Profile</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-id-card"></i> Profile Review
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <p>
                        <b><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></b>
                        <span style="float: right;" class="btn btn-sm btn-danger"><?php echo $row["id"]; ?></span>
                    </p>
                    <p><?php echo $row['bio']; ?></p>
                    <hr>
                    <?php
                    if (isset($row['skills'])) {
                        ?>
                        <p>
                        <?php
                        $colors = array("primary", 'danger', 'warning', 'info','success', 'dark', 'secondary');

                        $dbskills = $row['skills'];
                        $all = explode(" ", $dbskills);
//                        unset($all[0]);

                        foreach ($all as $skill) {
                            $each = explode("-", $skill);

                            $color = rand(0, 6);

                            ?>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-primary text-white progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $each[1]; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $each[1]; ?>%;">
                                </div>
                            </div>
                            <span class="text-primary" style="font-size: 10px;"><?php echo $each[0] . " " . $each[1]; ?> %</span>
                            <a href="index.php?skill=<?php echo $each[0]; ?>">
                                <span style="float: right;" class="text-danger"><i class="fa fa-trash-o"></i></span>
                            </a>
                            <hr>
                            <?php
                        }
                        ?>
                        </p>
                        <?php
                    }
                    ?>
                    <p>
                    <p><i class="icon fa fa-phone text-white bg-success"></i> <?php echo $row['phone']; ?></p>
                    <p><i class="icon fa fa-envelope text-white bg-info"></i> <?php echo $row['email']; ?></p>
                    </p>
                    <p>
                        <?php
                        if (isset($row['linkedin'])) {
                            ?>
                            <a target="_blank" class="link"
                               href="https://linkedin.com/in/<?php echo $row['linkedin']; ?>"><i
                                        class="icon fa fa-linkedin text-white bg-primary"></i></a>
                            <?php
                        }
                        if (isset($row['github'])) {
                            ?>
                            <a target="_blank" class="link" href="https://github.com/<?php echo $row['github']; ?>"><i
                                        class="icon fa fa-github text-white bg-dark"></i></a>
                            <?php
                        }
                        if (isset($row['telegram'])) {
                            ?>
                            <a target="_blank" class="link" href="https://t.me/<?php echo $row['telegram']; ?>"><i
                                        class="icon fa fa-telegram text-white bg-primary"></i></a>
                            <?php
                        }
                        if (isset($row['instagram'])) {
                            ?>
                            <a target="_blank" class="link"
                               href="https://instagram.com/<?php echo $row['instagram']; ?>"><i
                                        class="icon fa fa-instagram text-white bg-danger"></i></a>
                            <?php
                        }
                        if (isset($row['twitter'])) {
                            ?>
                            <a target="_blank" class="link" href="https://twitter.com/<?php echo $row['twitter']; ?>"><i
                                        class="icon fa fa-twitter text-white bg-info"></i></a>
                            <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-refresh"></i> Add Bio or Skills
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <p><i class="fa fa-info text-secondary"></i> Add a bio, Describe your self</p>
                            <textarea name="bio" class="form-control form-control-sm" rows="5" placeholder="Bio"></textarea>
                            <br>
                            <button name="updatebio" class="btn btn-light mbtn btn-sm">Update Bio</button>
                        </div>
                    </form>
                    <hr>
                    <p><i class="fa fa-cogs text-secondary"></i> Add skills or languages</p>
                    <form method="post" action="index.php" class="">
                        <input type="text" name="skillname" class="form-control form-control-sm" placeholder="Skill Name. Ex : Python">
                        <br>
                        <input type="number" name="skillper" max="100" class="form-control form-control-sm" placeholder="How Much. Ex : 75">
                        <br>
                        <button type="submit" name="updateskill" class="btn btn-light btn-sm mbtn">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-cloud"></i> Update Social Media
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <form method="post" action="index.php">
                        <div class="group">
                            <i class="fa fa-linkedin text-primary"></i>
                            <br>
                            <input name="linkedin" placeholder="Linkedin" class="form-control-sm inp border-primary">
                            &nbsp;
                            <button name="updatelinkedin" class="btn btn-primary btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-twitter text-info"></i>
                            <br>
                            <input name="twitter" placeholder="Twitter" class="form-control-sm inp border-info">
                            &nbsp;
                            <button name="updatetwitter" class="btn btn-info text-white btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-github text-dark"></i>
                            <br>
                            <input name="github" placeholder="GitHub" class="form-control-sm inp border-dark">
                            &nbsp;
                            <button name="updategithub" style="background: black; color: white;" class="btn btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-telegram text-primary"></i>
                            <br>
                            <input name="telegram" placeholder="Telegram" class="form-control-sm inp border-primary">
                            &nbsp;
                            <button name="updatetelegram" class="btn btn-primary btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-instagram text-danger"></i>
                            <br>
                            <input name="instagram" placeholder="Instagram" class="form-control-sm inp border-danger">
                            &nbsp;
                            <button name="updateinstagram" class="btn btn-danger btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../NarTik/pack/js/jquery-1.11.1.min.js"></script>
<script src="../../NarTik/pack/js/bootstrap.min.js"></script>
<script src="../../NarTik/pack/js/bootstrap-datepicker.js"></script>
<script src="../../NarTik/pack/js/custom.js"></script>
</body>
</html>