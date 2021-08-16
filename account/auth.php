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
    <title>Job Nic - 2FA</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="../pack/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            padding: 8%;
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
                        <a class="nav-link active" aria-current="page" href="../us"><i class="fa fa-bank"></i> We</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4">
                <br>
            </div>
            <div class="col-md-4">
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
                <br>
                <div class="tips border border-dark">
                    <h3 class="text-dark">Prove your self</h3>
                    <hr class="border border-dark">
                    <div>
                        <form method="post" action="index.php">
                            <label for="tfa">Enter your 2FA code</label>
                            <input name="tfa" id="tfa" class="form-control" placeholder="2FA code">
                            <br>
                            <button class="btn btn-success" name="tfasubmit" type="submit">Verify</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <br>
            </div>
        </div>
    </div>
</div>
<script src="../pack/js/bootstrap.min.js"></script>
</body>
</html>