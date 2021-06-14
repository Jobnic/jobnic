<?php

    include('core.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="../pack/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            padding: 8%;
        }

        .tabs {
            padding: 5%;
            border: solid 1px #d3d3d3;
            border-top: none;
        }

        .tips {
            border: solid 1px #d3d3d3;
            padding: 5%;
        }

        .mbtn {
            border: solid 1px #d3d3d3;
        }
        .mbtn:hover {
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
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="tips">
                    <h3>Why Use Job Nic?</h3>
                    <hr>
                    <p><b>First thing first</b> It is Free !</p>
                    <p><b>First thing first</b> It is Free !</p>
                    <p><b>First thing first</b> It is Free !</p>
                </div>
                <br>
            </div>
            <div class="col-md-7">
                <nav class="" style="border-bottom: none;">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" style="color: black;" id="nav-signup-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-signup"
                                type="button" role="tab" aria-controls="nav-signup" aria-selected="true">Sign Up
                        </button>
                        <button class="nav-link" style="color: black;" id="nav-login-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-login"
                                type="button" role="tab" aria-controls="nav-login" aria-selected="false">Sign In
                        </button>
                    </div>
                </nav>
                <div class="tab-content tabs" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                        <h3>Create a new account</h3>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lbl" placeholder="First Name">
                                    <label for="lbl">First Name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lbl" placeholder="Last Name">
                                    <label for="lbl">Last Name</label>
                                </div>
                            </div>
                        </div>
                        <form action="index.php" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lbl" placeholder="Phone">
                                        <label for="lbl">Phone</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="lbl" placeholder="Email">
                                        <label for="lbl">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lbl" placeholder="Password">
                                        <label for="lbl">Password</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="lbl" placeholder="Confirm Password">
                                        <label for="lbl">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-light mbtn" type="submit">Login</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                        <h3>Login to your account</h3>
                        <hr>
                        <form action="index.php" method="post">
                            <div class="form-floating mb-3">
                                <input name="mail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <br>
                            <button name="login" class="btn btn-light mbtn" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../pack/bootstrap.min.js"></script>
</body>
</html>