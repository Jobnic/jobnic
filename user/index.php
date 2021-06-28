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
    <title>Job Nic - User Panel</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            padding: 8%;
        }

        .dialog {
            padding: 5%;
        }

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
</head>
<body>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../">Job Nic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../jobs"><i class="fa fa-list"></i>
                            Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="us"><i class="fa fa-bank"></i> We</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a class="nav-link active" href="../account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <?php
        if (count($errors) > 0) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><strong>Oh GOD! Watch error!</strong></p>
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
        <br>
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-success">Profile Part</h2>
                <p class="text-success">Here you can review your profile that people cat see</p>
                <div class="dialog border border-success">
                    <h3 class="text-success"><i class="fa fa-id-card text-success"></i> Profile Review</h3>
                    <hr class="border border-success">
                    <p><b><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></b>
                        &nbsp;
                        <span style="float: right;" class="btn btn-sm btn-outline-success"><?php echo $row["id"]; ?></span>
                        &nbsp;
                        <span style="" class="btn btn-sm btn-outline-dark"><i class="fa fa-star"></i> <?php echo $row["stars"]; ?></span>
                        &nbsp;
                        <span style="" class="btn btn-sm btn-outline-dark"><i
                                    class="fa fa-eye"></i> <?php echo $row["views"]; ?></span>
                    </p>
                    <p><?php echo $row['bio']; ?></p>
                    <p><small>Joined <?php echo $row['join']; ?></small></p>
                    <hr class="border border-success">
                    <?php
                    if (isset($row['skills'])) {
                        ?>
                        <p>
                        <?php
                        $colors = array("primary", 'danger', 'warning', 'info', 'success', 'dark', 'secondary');

                        $dbskills = $row['skills'];
                        $all = explode(" ", $dbskills);
//                        unset($all[0]);

                        foreach ($all as $skill) {
                            $each = explode("-", $skill);

                            $color = rand(0, 6);

                            ?>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success text-white progress-bar-animated"
                                     role="progressbar" aria-valuenow="<?php echo $each[1]; ?>" aria-valuemin="0"
                                     aria-valuemax="100" style="width: <?php echo $each[1]; ?>%;">
                                </div>
                            </div>
                            <span class="text-success" style="font-size: 10px;"><?php echo $each[0] . " " . $each[1]; ?> %</span>
                            <a href="index.php?delete=skill">
                                <span style="float: right;" class="text-danger"><i class="fa fa-trash-o"></i></span>
                            </a>
                            <hr class="border border-success">
                            <?php
                        }
                        ?>
                        </p>
                        <?php
                    }
                    ?>
                    <p>
                    <p><i class="icon fa fa-phone text-white bg-success"></i> <?php echo $row['phone']; ?></p>
                    <p><i class="icon fa fa-envelope text-white bg-primary"></i> <?php echo $row['email']; ?></p>
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
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-danger">Profile Updating</h2>
                <p class="text-danger">If you wanna update your profile easily, use here</p>
                <div class="dialog border border-danger">
                    <h3 class="text-danger"><i class="fa fa-refresh text-danger"></i> Update Your Profile</h3>
                    <hr class="border border-danger">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <p class="text-danger"><i class="fa fa-info text-danger"></i> Add a bio, Describe your self
                            </p>
                            <textarea name="bio" class="form-control form-control-sm border border-danger" rows="5"
                                      placeholder="Bio"></textarea>
                            <br>
                            <button name="updatebio" class="btn btn-danger btn-sm">Update Bio</button>
                        </div>
                    </form>
                    <hr class="border border-danger">
                    <p class="text-danger"><i class="fa fa-cogs text-danger"></i> Add skills or languages</p>
                    <form method="post" action="index.php" class="">
                        <input type="text" name="skillname" class="form-control form-control-sm border border-danger"
                               placeholder="Skill Name. Ex : Python">
                        <br>
                        <input type="number" name="skillper" max="100"
                               class="form-control form-control-sm border border-danger"
                               placeholder="How Much. Ex : 75">
                        <br>
                        <button type="submit" name="updateskill" class="btn btn-danger btn-sm">Add</button>
                    </form>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">Social Media</h2>
                <p class="text-primary">If you have social medias, Use here to add them</p>
                <div class="dialog border border-primary">
                    <h3 class="text-primary"><i class="fa fa-cloud text-primary"></i> You in Social Media</h3>
                    <hr class="border border-primary">
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
                            <button name="updategithub" class="btn btn-dark btn-sm">Update</button>
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
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-warning">New Project</h2>
                <p class="text-warning">I think you have a project that you cant solve. So, put it here and wait for
                    someone</p>
                <div class="dialog border border-warning">
                    <h3 class="text-warning"><i class="fa fa-plus text-warning"></i> Add new project</h3>
                    <hr class="border border-warning">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <select name="type" class="form-select form-select-sm border border-warning"
                                    aria-label=".form-select-sm example">
                                <option value="default">Select type of your project</option>
                                <option value="programming">Programming</option>
                                <option value="android">Android</option>
                                <option value="backend">Back-ENd</option>
                                <option value="design">Design</option>
                                <option value="school">School</option>
                                <option value="costume">Costume</option>
                            </select>
                            <br>
                            <input name="title" type="text" class="form-control form-control-sm border border-warning"
                                   placeholder="Project Title">
                            <br>
                            <textarea name="describe" class="form-control form-control-sm border border-warning"
                                      rows="5" placeholder="Project Describtion"></textarea>
                            <br>
                            <input name="skills" type="text"
                                   class="form-control form-control-sm border border-warning"
                                   placeholder="Skills. Ex : php python">
                            <br>
                            <input name="price" type="text" class="form-control form-control-sm border border-warning"
                                   placeholder="Project Price. Let it null for Agreement Price">
                            <small class="text-warning">* Let it null for Agreement Price</small>
                            <br>
                            <br>
                            <button name="addjob" class="btn btn-warning text-white btn-sm">Add project</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <h2 class="text-dark">Jobs Done</h2>
                <p class="text-dark">Here you can see what jobs you did before</p>
                <div class="dialog border border-dark">
                    <h3 class="text-dark"><i class="fa fa-check text-dark"></i> Done Jobs</h3>
                    <hr class="border border-dark">
                    <?php
                    $get_jobs = "SELECT * FROM jobs WHERE person = '$id'";
                    $job_result = mysqli_query($connection, $get_jobs);
                    if (mysqli_num_rows($job_result) > 0) {
                        ?>
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-bordered border-success table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Stars</th>
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
                        echo "<h4 class='text-dark'>Noting done yet</h4>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-5">
                <h2 class="text-info">List of your jobs</h2>
                <p class="text-info">It you had shared jobs already, here is the list of them. Click on title to show
                    review</p>
                <div class="dialog border border-info">
                    <h3 class="text-info"><i class="fa fa-list text-info"></i> Projects you shared</h3>
                    <hr class="border border-info">
                    <?php
                    $select_jobs = "SELECT * FROM jobs WHERE user = $id ORDER BY row DESC";
                    $result_jobs = mysqli_query($connection, $select_jobs);
                    if (mysqli_num_rows($result_jobs) > 0) {
                        while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                            ?>
                            <p class="text-info">
                                <?php
                                $jobid = $job_row['jobid'];
                                $jobtitle = $job_row['title'];
                                echo "<a class='link text-info' href='index.php?jobid=$jobid'>$jobtitle</a>";
                                if ($job_row['status'] == 'true') {
                                    echo "<span style='float: right;' class='text-success'>Open</span>";
                                } else {
                                    echo "<span style='float: right;' class='text-danger'>Close</span>";
                                }
                                ?>
                            </p>
                            <hr class="border border-info">
                            <?php
                        }
                    } else {
                        echo "<p class='text-info'>No projects yet</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
            <div class="col-md-7">
                <h2 class="text-secondary">Review the job</h2>
                <p class="text-secondary">It you had selected a job, it with be review here</p>
                <div class="dialog border border-secondary">
                    <h3 class="text-secondary"><i class="fa fa-eye text-secondary"></i> Review project</h3>
                    <hr class="border border-secondary">
                    <?php include("review.php"); ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <h2>Send your ticket to us</h2>
                <p>By this feature you can tell us if there is any problem or any other things</p>
                <div class="dialog border border-dark">
                    <h3><i class="fa fa-envelope"></i> Send Ticket</h3>
                    <hr class="border border-dark">
                    <form method="post" action="index.php">
                        <input name="tictitle" type="text" class="form-control form-control-sm border border-dark"
                               placeholder="Ticket Title">
                        <br>
                        <textarea name="ticdescribe" class="form-control form-control-sm border border-dark"
                                  rows="5" placeholder="Ticket Describtion"></textarea>
                        <br>
                        <button class="btn btn-sm btn-dark" type="submit">Send Ticket</button>
                    </form>
                </div>
                <br>
            </div>
            <div class="col-md-4">
                <h2>Your tickets</h2>
                <p>Here you can see your tickets and see if ticket is answered or no</p>
                <div class="dialog border border-dark">
                    <h3><i class="fa fa-paper-plane"></i> My Tickets</h3>
                    <hr class="border border-dark">
                    <?php
                    $select_tiks = "SELECT * FROM ticks WHERE user = $id ORDER BY row DESC";
                    $result_tiks = mysqli_query($connection, $select_tiks);
                    if (mysqli_num_rows($result_tiks) > 0) {
                        while ($tik_row = mysqli_fetch_assoc($result_tiks)) {
                            ?>
                            <p class="text-info">
                                <?php
                                $tikid = $tik_row['tikid'];
                                $tiktitle = $tik_row['title'];
                                echo "<a class='link text-info' href='index.php?tikid=$tikid'>$tiktitle</a>";
                                if ($tik_row['status'] == 'true') {
                                    echo "<span style='float: right;' class='text-success'>Open</span>";
                                } else {
                                    echo "<span style='float: right;' class='text-danger'>Close</span>";
                                }
                                ?>
                            </p>
                            <hr class="border border-dark">
                            <?php
                        }
                    } else {
                        echo "<p class='text-dark'>No tickets yet</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
            <div class="col-md-4">
                <h2>Show ticket</h2>
                <p>Here you can select your ticket and see details</p>
                <div class="dialog border border-dark">
                    <h3><i class="fa fa-search"></i> Ticket Review</h3>
                    <hr class="border border-dark">
                    <?php include(''); ?>
                </div>
                <br>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-dark">Account Setting</h2>
                <p class="text-dark">Yed, here is your account setting. Change phone or email or password</p>
                <div class="dialog border border-dark">
                    <h3 class="text-dark"><i class="fa fa-cog text-dark"></i> Settings</h3>
                    <hr class="border border-dark">
                    <form method="post" action="index.php" class="">
                        <!--                        <label for="formFileSm" class="form-label">Update profile picture</label>-->
                        <!--                        <input class="form-control form-control-sm" id="formFileSm" type="file">-->
                        <!--                        <hr>-->
                        <div class="form-group">
                            <p><i class="fa fa-phone text-dark"></i> Change Phone</p>
                            <input name="phone" type="text"
                                   class="border border-dark form-control-sm form-control"
                                   placeholder="Phone">
                            <br>
                            <button class="btn btn-sm btn-dark" name="updatephone">Change Phone</button>
                        </div>
                        <br>
                        <div class="form-group">
                            <p><i class="fa fa-envelope text-dark"></i> Change Email</p>
                            <input name="email" type="text"
                                   class="border border-dark form-control-sm form-control"
                                   placeholder="Email">
                            <br>
                            <button class="btn btn-sm btn-dark" name="updatemain">Change Email</button>
                        </div>
                        <hr class="border border-dark">
                        <div class="form-group">
                            <p><i class="fa fa-key text-dark"></i> Change Password</p>
                            <input name="password" type="password"
                                   class="border border-dark form-control-sm form-control"
                                   placeholder="Current password">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="newpassword" type="password"
                                           class="form-control border border-dark form-control-sm"
                                           placeholder="New Password">
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="confirmpassword" type="password"
                                           class="form-control border border-dark form-control-sm"
                                           placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button name="updatepassword" type="submit" class="btn btn-dark btn-sm">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>
</html>
