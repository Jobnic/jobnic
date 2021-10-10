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
    <link href="https://cdn.neotrinost.ir/jobnic/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../pack/cos/main.css" rel="stylesheet" type="text/css">
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
    <?php include("../pack/panels/header.php"); ?>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-7">
                <nav class="" style="border-bottom: none;">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active jntext" id="nav-signup-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-signup"
                                type="button" role="tab" aria-controls="nav-signup" aria-selected="true">Sign Up
                        </button>
                        <button class="nav-link jntext" id="nav-login-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-login"
                                type="button" role="tab" aria-controls="nav-login" aria-selected="false">Sign In
                        </button>
                    </div>
                </nav>
                <div class="tab-content tabs" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                        <h3 class="jntext">Create a new account</h3>
                        <hr class="jnborder">
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input name="firstname" type="text" class="form-control jnborder" id="lbl" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input name="lastname" type="text" class="form-control jnborder" id="lbl" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input name="phone" type="text" class="form-control jnborder" id="lbl" placeholder="Phone. Ex: 9014784362">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input name="email" type="email" class="form-control jnborder" id="lbl" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input name="password" type="password" class="form-control jnborder" id="lbl" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="">
                                        <input name="confirm" type="password" class="form-control jnborder" id="lbl" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button name="create" class="btn jnbtn" type="submit">Create</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                        <h3 class="jntext">Login to your account</h3>
                        <hr class="jnborder">
                        <form action="index.php" method="post">
                            <div class="">
                                <input name="mail" type="email" class="form-control jnborder" placeholder="name@example.com">
                                <small class="jntext">For get one time password just fill this field</small>
                            </div>
                            <br>
                            <div class="">
                                <input name="password" type="password" class="form-control jnborder" id="floatingPassword" placeholder="Password">
                            </div>
                            <br>
                            <button name="login" class="btn jnbtn" type="submit">Login</button>
                            <button style="float: right;" class="btn jnout" type="submit" name="onetime">Get one-time password</button>
                        </form>
                        <br>
                        <h3 class="jntext">Forgot password</h3>
                        <hr class="jnborder">
                        <form action="index.php" method="post">
                            <div class="">
                                <input name="mail" type="email" class="form-control jnborder" placeholder="name@example.com">
                                <small class="jntext">Enter your account mail to send you new passcode</small>
                            </div>
                            <br>
                            <button name="forgot" class="btn jnbtn" type="submit">Recovery</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
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
        </div>
    </div>
</div>
<script src="https://cdn.neotrinost.ir/jobnic/js/bootstrap.min.js"></script>
</body>
</html>