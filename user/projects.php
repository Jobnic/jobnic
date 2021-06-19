<?php
session_start();

include('core.php');
include("../pack/config.php");

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

$server = $ip;
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

if ($row['status'] == 'not') {
    ?>
    <script>
        window.alert("Sorry, Your account should be active.");
        window.location.replace("../account/pay.php");
    </script>
    <?php
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Projects</title>
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
    <div class="profile-sidebar">
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></div>
            <div class="profile"><?php echo $row['phone']; ?></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class=""><a href="index.php">
                <i class="fa fa-dashboard">&nbsp;</i> Profile</a>
        </li>
        <li class="active">
            <a href="projects.php">
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
            <li><a href="../">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Projects</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-plus"></i> <b>New Project</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <select name="type" class="form-control" aria-label=".form-select-sm example">
                                <option selected>Select type of your project</option>
                                <option value="programming">Programming</option>
                                <option value="design">Design</option>
                                <option value="school">School</option>
                                <option value="school">Android</option>
                                <option value="school">Arduino</option>
                            </select>
                            <br>
                            <input name="title" type="text" class="form-control form-control-sm" placeholder="Project Title">
                            <br>
                            <textarea name="describe" class="form-control form-control-sm" rows="5" placeholder="Project Describtion"></textarea>
                            <br>
                            <input name="skills" type="text" class="form-control form-control-sm" placeholder="Skills. Ex : php python">
                            <br>
                            <button name="addjob" class="btn btn-secondary mbtn">Add project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list"></i> <b>Shared Projects</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <?php
                    $select_jobs = "SELECT * FROM jobs WHERE user = $id ORDER BY row DESC";
                    $result_jobs = mysqli_query($connection, $select_jobs);
                    if (mysqli_num_rows($result_jobs) > 0) {
                        while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                            ?>
                            <p class="text-secondary">
                                <?php
                                $jobid = $job_row['jobid'];
                                $jobtitle = $job_row['title'];
                                echo "<a class='link' href='projects.php?jobid=$jobid'>$jobtitle</a>";
                                if ($job_row['status'] == 'true') {
                                    echo "<span style='float: right;' class='text-success'>Open</span>";
                                }
                                else {
                                    echo "<span style='float: right;' class='text-danger'>Close</span>";
                                }
                                ?>
                            </p>
                            <hr>
                            <?php
                        }
                    }
                    else {
                        echo "<p class='text-secondary'>No projects yet</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list"></i> <b>Shared Projects</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <?php
                    include("review.php");
                    ?>
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