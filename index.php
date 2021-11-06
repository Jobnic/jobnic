<?php
session_start();

$stat = $_SESSION['status'];

include("pack/config/config.php");

?>

<!doctype html>
<html lang="en">
<head>
    <title>جاب نیک | صفحه اصلی</title>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="جاب نیک | محلی برای فریلنسر ها">
    <meta name="author" content="Amirhossein Mohammadi">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="جاب نیک | محلی برای فریلنسر ها">
    <meta name="keywords"
          content="jobnic, job, github, neotrinost llc, blackiq, neotrinost, amirhossein mohammadi, annahita mirhosseini">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="Jobnic | A place to find jobs!">
    <meta property="og:type" content="programming, development">
    <link rel="shortcut icon" type="image/jpg" href="<?php echo $path; ?>/pack/etc/logo.jpg"/>
    <meta property="og:image" content="<?php echo $path; ?>/pack/etc/logo.jpg">
    <meta property="og:description" content="دیوار آگهی های فریلنسری!">
    <meta name="google-site-verification" content="L-KQ2EHn0z7-hAkPsqAyiyFLIxmA3cfyMbvYCCPQDPQ">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9342796678288422"
            crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/4a679d8ec0.js" crossorigin="anonymous"></script>
    <link href="pack/cos/main.css" rel="stylesheet" type="text/css">
    <link href="pack/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="">
    <?php include("pack/panels/header.php"); ?>
    <br>
    <div class="container-fluid">
        <div class="index">
            <div class="row">
                <div class="col-md-6 jntext">
                    <h1>به جاب نیک خوش آمدید!</h1>
                    <hr>
                    <p>آگهی های خود را به صورت<b> رایگان </b>ثبت کنید.</p>
                    <p>به صورت<b> رایگان </b>آگهی ببینید.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
