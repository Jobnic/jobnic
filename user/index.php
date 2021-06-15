<?php
session_start();

$stat = $_SESSION['status'];

if ($stat != true) {
    ?>
    <script>
        window.location.replace("../");
    </script>
    <?php
}

$server = '127.0.0.1';
$user = 'narbon';
$passwd = 'narbon';
$db = 'jobnic';

$connection = mysqli_connect($server, $user, $passwd, $db);

$id = $_SESSION['id'];

$profile = "SELECT * FROM people WHERE id = '$id'";
$result = mysqli_query($connection, $profile);
$row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            padding: 8%;
        }

        .dialog {
            border: solid 1px #d3d3d3;
            padding: 5%;
        }

        .icon {
            padding: 5px;
            border-radius: 5px;
        }

        .link {
            text-decoration: none;
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
            <a class="navbar-brand" href=".">Job Nic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a class="nav-link active" href="../account/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="dialog">
                    <h3><i class="fa fa-id-card text-secondary"></i> Profile Review</h3>
                    <hr>
                    <p><b><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></b></p>
                    <p><?php echo $row['bio']; ?></p>
                    <p>
                        <?php
                            $colors = array("primary", 'danger', 'warning', 'info','success', 'dark', 'secondary');

                            $dbskills = $row['skills'];
                            $all = explode(" ", $dbskills);

                            foreach ($all as $skill) {
                                $each = explode("-", $skill);

                                $color = rand(0, 6);

                                ?>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $each[1]; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $each[1]; ?>%;"><?php echo $each[0] . " " . $each[1]; ?> %</div>
                                </div>
                                <br>
                                <?php
                            }
                        ?>
                    </p>
                    <p>
                        <i class="icon fa fa-phone text-white bg-success" data-bs-toggle="tooltip"
                           data-bs-placement="top" title="<?php echo $row['phone']; ?>"></i>
                        <i class="icon fa fa-envelope text-white bg-primary" data-bs-toggle="tooltip"
                           data-bs-placement="top" title="<?php echo $row['email']; ?>"></i>
                    </p>
                    <p>
                        <?php
                        if ($row['linkedin'] != 'n') {
                            ?>
                            <a target="_blank" class="link"
                               href="https://linkedin.com/in/<?php echo $row['linkedin']; ?>"><i
                                        class="icon fa fa-linkedin text-white bg-primary"></i></a>
                            <?php
                        }
                        if ($row['github'] != 'n') {
                            ?>
                            <a target="_blank" class="link" href="https://github.com/<?php echo $row['github']; ?>"><i
                                        class="icon fa fa-github text-white bg-dark"></i></a>
                            <?php
                        }
                        if ($row['telegram'] != 'n') {
                            ?>
                            <a target="_blank" class="link" href="https://t.me/<?php echo $row['telegram']; ?>"><i
                                        class="icon fa fa-telegram text-white bg-primary"></i></a>
                            <?php
                        }
                        if ($row['instagram'] != 'n') {
                            ?>
                            <a target="_blank" class="link"
                               href="https://instagram.com/<?php echo $row['instagram']; ?>"><i
                                        class="icon fa fa-instagram text-white bg-danger"></i></a>
                            <?php
                        }
                        if ($row['twitter'] != 'n') {
                            ?>
                            <a target="_blank" class="link" href="https://twitter.com/<?php echo $row['twitter']; ?>"><i
                                        class="icon fa fa-twitter text-white bg-info"></i></a>
                            <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dialog">
                    <h3><i class="fa fa-refresh text-secondary"></i> Update Your Profile</h3>
                    <hr>
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <p><i class="fa fa-info text-secondary"></i> Add a bio, Describe your self</p>
                            <textarea class="form-control form-control-sm" rows="5" placeholder="Bio"></textarea>
                            <br>
                            <button class="btn btn-light mbtn btn-sm">Update Bio</button>
                        </div>
                    </form>
                    <hr>
                    <p><i class="fa fa-cogs text-secondary"></i> Add skills or languages</p>
                    <form method="post" action="index.php" class="">
                        <input type="text" class="form-control form-control-sm" placeholder="Skill Name. Ex : Python">
                        <br>
                        <input type="number" max="100" class="form-control form-control-sm" placeholder="How Much. Ex : 75">
                        <br>
                        <button type="submit" class="btn btn-light btn-sm mbtn">Add</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dialog">
                    <h3><i class="fa fa-cloud text-secondary"></i> You in Social Media</h3>
                    <hr>
                    <form class="">
                        <div class="group">
                            <i class="fa fa-linkedin text-primary"></i>
                            <br>
                            <input placeholder="Linkedin" class="form-control-sm inp border-primary">
                            &nbsp;
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-twitter text-info"></i>
                            <br>
                            <input placeholder="Twitter" class="form-control-sm inp border-info">
                            &nbsp;
                            <button class="btn btn-info text-white btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-github text-dark"></i>
                            <br>
                            <input placeholder="GitHub" class="form-control-sm inp border-dark">
                            &nbsp;
                            <button class="btn btn-dark btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-telegram text-primary"></i>
                            <br>
                            <input placeholder="Telegram" class="form-control-sm inp border-primary">
                            &nbsp;
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-instagram text-danger"></i>
                            <br>
                            <input placeholder="Instagram" class="form-control-sm inp border-danger">
                            &nbsp;
                            <button class="btn btn-danger btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="dialog">
                    <h3><i class="fa fa-plus text-secondary"></i> Add new project</h3>
                    <hr>
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Select type of your project</option>
                                <option value="programming">Programming</option>
                                <option value="design">Design</option>
                                <option value="school">School</option>
                            </select>
                            <br>
                            <input type="text" class="form-control form-control-sm" placeholder="Project Title">
                            <br>
                            <textarea class="form-control form-control-sm" rows="5" placeholder="Project Describtion"></textarea>
                            <br>
                            <input type="text" class="form-control form-control-sm" placeholder="Skills. Ex : php python">
                            <br>
                            <button class="btn btn-light mbtn btn-sm">Add project</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dialog">
                    <h3><i class="fa fa-list text-secondary"></i> Projects you shared</h3>
                    <hr>

                </div>
            </div>
            <div class="col-md-4">
                <div class="dialog">
                    <h3><i class="fa fa-eye text-secondary"></i> Review project</h3>
                    <hr>
                    <p class="text-secondary">Select a project to review here.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="dialog">
                    <h3><i class="fa fa-cog text-secondary"></i> Settings</h3>
                    <hr>
                    <form method="post" action="index.php" class="">
                        <label for="formFileSm" class="form-label">Update profile picture</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                        <hr>
                        <div class="group">
                            <i class="fa fa-phone text-secondary"></i>
                            &nbsp;
                            <input placeholder="Phome" class="form-control-sm inp">
                            &nbsp;
                            <button class="btn btn-light mbtn btn-sm">Change Phone</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-envelope text-secondary"></i>
                            &nbsp;
                            <input placeholder="Email" class="form-control-sm inp">
                            &nbsp;
                            <button class="btn btn-light mbtn btn-sm">Change Email</button>
                        </div>
                        <hr>
                        <div class="form-group">
                            <p><i class="fa fa-key text-secondary"></i> Update Password</p>
                            <input type="password" class="inp form-control-sm form-control" placeholder="Current password">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-light btn-sm mbtn">Change Password</button>
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
