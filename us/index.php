<?php

session_start();

include("../pack/config/config.php");

$id = $_SESSION['id'];

$errors = array();

if (isset($_POST["newmessage"])) {
    $fullname = mysqli_real_escape_string($connection, $_POST["fullname"]);
    $mail = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $message = mysqli_real_escape_string($connection, $_POST["message"]);

    if (empty($fullname)) {
        array_push($errors, "Full name is required");
    }
    if (empty($mail)) {
        array_push($errors, "E-Mail is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($message)) {
        array_push($errors, "Message is required");
    }

    $messageid = rand(11111, 99999);

    $dt = date("M d, Y H:i:s");

    if (count($errors) == 0) {
        $insert = "INSERT INTO messages (msgid, fullname, email, phone, message, datetime) VALUES ('$messageid', '$fullname', '$mail', '$phone', '$message', '$dt')";
        if (mysqli_query($connection, $insert)) {
            ?>
            <script>
                window.alert("Mwssage sent\nTNX");
                window.location.replace(".");
            </script>
            <?php
        }
        else {
            ?>
            <script>
                window.alert("<?php mysqli_error($connection); ?>");
                window.location.replace(".");
            </script>
            <?php
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Nic - We</title>
    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            padding: 8%;
        }
        .card {
            padding: 2%;
        }
        .link {
            text-decoration: none;
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
                        <a class="nav-link active" aria-current="page" href="."><i class="fa fa-list"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="us"><i class="fa fa-bank"></i> We</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <?php
                    if ($stat == true) {
                        ?>
                        <a class="nav-link active" href="../user"><i class="fa fa-dashboard"></i> Go To Panel</a> <a class="nav-link active" href="../account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        <?php
                    }
                    else {
                        ?>
                        <a class="nav-link active" href="../account/index.php"><i class="fa fa-plus"></i> Sign Up</a> <a class="nav-link active" href="../account/index.php"><i class="fa fa-sign-in"></i> Sign In</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <br>
        <div class="row" id="about">
            <div class="col-md-12">
                <div class="card border border-dark">
                    <h3>About Us</h3>
                    <hr class="border border-dark">
                    <p class="text-dark">
                        We are <b>Job Nic</b> team, working under <b>Neotrinost Limited Liability Company</b> founded by <b>Amirhossein Mohammadi</b> and <b>Annahita Mirhosseini</b>.
                        <br>
                        <br>
                        <b>Job Nic</b> Founded in 12 Jun 2021 by <b>Amirhossein Mohammadi</b> with all entire <b>PHP</b> but company is working on new version of <b>Job Nic</b> with <b>Laravel</b>.
                        <br>
                        <br>
                        Ok, <b>Job Nic</b> is a place for find small or big jobs. Here you have a special ID that means your CV. You can add your skills and other things.
                        <br>
                        <br>
                        You can find the right <b>Jobs</b> for your abilities by looking in the jobs section. Go for <b>Job</b> details and make contact with employer.
                        <br>
                        If you did the <b>Jobs</b> and the employer approved it, it will be added to your <b>Done Jobs</b> list.
                        <br>
                        <br>
                        Anyway, If it was something that you could not do, you could place an ad on the site so that people who can do it would accept it.
                        <br>
                        Whenever a person did your <b>Job</b>, close it and say who did. You also can give <b>Star</b> to person.
                        <br>
                        <br>
                        Join free and make money! <b>Our income is your trust in the company</b>.
                        <br>
                        We <b>do not</b> receive money from employees and employers.
                        <br>
                        The best and the <b>most secure</b> way to store your information in <b>Job Nic</b>.
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="row" id="contact">
            <div class="col-md-12">
                <div class="card border border-dark">
                    <h3>Contact Us</h3>
                    <hr class="border border-dark">
                    <p class="text-dark">
                        <b>Job Nic</b> <b class="text-primary">Telegram</b> Channel is <a class="link text-primary" href="https://t.me/JobNic">@JobNic</a> that you can see new news or any fun festival.
                        <br>
                        You can see <b>Job Nic</b> <b class="text-primary">LinkedIn</b> and see people working here.
                        <br>
                        <br>
                        Until now there is no <b class="text-danger">Instagram</b> or <b class="text-info">Twitter</b> account.
                        <br>
                        But there will be!
                        <br>
                        <br>
                        If you wanna contact us, for asking or saying goodies you can easily send us via E-Mail. Or you can fill this form below.
                    </p>
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
                    <form action="index.php" method="post" class="row g-3">
                        <div class="col-12">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="mail" class="form-label">E-Mail</label>
                            <input type="email" name="email" class="form-control" id="mail" placeholder="E-Mail">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea rows="5" name="message" id="message" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="newmessage" class="btn btn-dark">Send Message</button>
                        </div>
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
