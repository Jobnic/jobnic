<?php
session_start();

if ($_SESSION['status'] == true) {
    ?>
    <script>
        window.location.replace("../user");
    </script>
    <?php
}

include('core.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - Login or Create account</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../pack/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            padding: 8%;
        }

        .tabs {
            padding: 5%;
            border: solid 1px #d3d3d3;
            border-top: none;
        }

        .tips {
            padding: 5%;
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
                        <a class="nav-link active" aria-current="page" href="../jobs"><i class="fa fa-list"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="us"><i class="fa fa-bank"></i> We</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="tips border border-warning">
                    <h3 class="text-warning">Why Use Job Nic?</h3>
                    <hr class="border border-warning">
                    <p><b>First thing first</b> It is Free !</p>
                    <p><b>First thing first</b> It is Free !</p>
                    <p><b>First thing first</b> It is Free !</p>
                </div>
                <br>
                <?php
                if (count($errors) > 0) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p><strong>Maybe something important!</strong></p>
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
            </div>
            <div class="col-md-7">
                <nav class="" style="border-bottom: none;">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active text-success" style="color: black;" id="nav-signup-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-signup"
                                type="button" role="tab" aria-controls="nav-signup" aria-selected="true">Sign Up
                        </button>
                        <button class="nav-link text-primary" style="color: black;" id="nav-login-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-login"
                                type="button" role="tab" aria-controls="nav-login" aria-selected="false">Sign In
                        </button>
                    </div>
                </nav>
                <div class="tab-content tabs" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                        <h3 class="text-success">Create a new account</h3>
                        <hr class="border border-success">
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input name="firstname" type="text" class="form-control border border-success" id="lbl" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input name="lastname" type="text" class="form-control border border-success" id="lbl" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input name="phone" type="text" class="form-control border border-success" id="lbl" placeholder="Phone. Ex: 9014784362">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input name="email" type="email" class="form-control border border-success" id="lbl" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input name="password" type="password" class="form-control border border-success" id="lbl" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input name="confirm" type="password" class="form-control border border-success" id="lbl" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button name="create" class="btn btn-success" type="submit">Create</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                        <h3 class="text-primary">Login to your account</h3>
                        <hr class="border border-primary">
                        <form action="index.php" method="post">
                            <div class="">
                                <input name="mail" type="email" class="form-control border border-primary" placeholder="name@example.com">
                                <small class="text-primary">For get one time password just fill this field</small>
                            </div>
                            <br>
                            <div class="">
                                <input name="password" type="password" class="form-control border border-primary" id="floatingPassword" placeholder="Password">
                            </div>
                            <br>
                            <button name="login" class="btn btn-primary" type="submit">Login</button>
                            <button style="float: right;" class="btn btn-outline-primary" type="submit" name="onetime">Get one-time password</button>
                        </form>
                        <br>
                        <h3 class="text-danger">Forgot password</h3>
                        <hr class="border border-danger">
                        <form action="index.php" method="post">
                            <div class="">
                                <input name="mail" type="email" class="form-control border border-danger" placeholder="name@example.com">
                                <small class="text-danger">Enter your account mail to send you new passcode</small>
                            </div>
                            <br>
                            <button name="forgot" class="btn btn-danger" type="submit">Recovery</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../pack/js/bootstrap.min.js"></script>
</body>
</html>