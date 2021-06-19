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
    <title>Job Nic - Setting</title>
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
            <?php
            include("includes/wel.php");
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class=""><a href="index.php">
                <i class="fa fa-dashboard">&nbsp;</i> Profile</a>
        </li>
        <li>
            <a href="projects.php">
                <i class="fa fa-list">&nbsp;</i> Projects
            </a>
        </li>
        <li class="active">
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
            <li class="active">Setting</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Settings</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-plus"></i> <b>Setting</b>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left">
                        <em class="fa fa-toggle-up"></em>
                    </span>
                </div>
                <div class="panel-body">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <p><i class="fa fa-phone text-secondary"></i> Change Phone</p>
                            <input name="phone" placeholder="Phome" class="form-control inp">
                            <br>
                            <button name="updatephone" class="btn btn-light mbtn btn-sm">Change Phone</button>
                        </div>
                        <br>
                        <div class="group">
                            <p><i class="fa fa-envelope text-secondary"></i> Change Email</p>
                            <input name="email" placeholder="Email" class="form-control inp">
                            <br>
                            <button name="updatemail" class="btn btn-light mbtn btn-sm">Change Email</button>
                        </div>
                        <hr>
                        <div class="form-group">
                            <p><i class="fa fa-key text-secondary"></i> Update Password</p>
                            <input name="password" type="password" class="inp form-control-sm form-control"
                                   placeholder="Current password">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="newpassword" type="password" class="form-control form-control-sm"
                                           placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="confirmpassword" type="password" class="form-control form-control-sm"
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button name="updatepassword" type="submit" class="btn btn-light btn-sm mbtn">Change Password
                        </button>
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