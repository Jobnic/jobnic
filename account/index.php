<?php
session_start();

include('core.php');

if ($_SESSION['status'] == true) {
    $id = $_SESSION['id'];

    $select_user = "SELECT * FROM people WHERE id = '$id'";
    $result_user = mysqli_query($connection, $select_user);
    $row_user = mysqli_fetch_assoc($result_user);

    if ($row_user['active'] == true) {
        ?>
        <script>
            window.location.replace("../user");
        </script>
        <?php
    }
    else {
        $_SESSION['activation_page'] = true;
        $_SESSION['home'] = false;
    }
}
else if (isset($_SESSION['is_auth'])) {
    if ($_SESSION['is_auth']) {
        $_SESSION['authpage'] = true;
        $_SESSION['home'] = false;
    }
    else {
        $_SESSION['authpage'] = false;
        $_SESSION['home'] = true;
    }
}
else {
    $_SESSION['is_auth'] = false;
    $_SESSION['authpage'] = false;
    $_SESSION['home'] = true;
    // header("Refresh:0");
}

if ($_SESSION['home']) {
    $home = "block";
}
else {
    $home = "none";
}

if ($_SESSION['authpage']) {
    $authpage = 'block';
}
else {
    $authpage = 'none';
}

if ($_SESSION['activation_page']) {
    $activation = 'block';
}
else {
    $activation = 'none';
}

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
    <script>
        function show(shown, hidden) {
            document.getElementById(shown).style.display = 'block';
            document.getElementById(hidden).style.display = 'none';
            return false;
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div id="create" class="col-md-6 mainform overflow-auto" style="display:<?php echo $home; ?>;">
            <h3 class="jntext">ساخت حساب کاربری</h3>
            <br>
            <form action="index.php" method="post" autocomplete="off">
                <div class="row">
                    <div class="col">
                        <div class="">
                            <input name="firstname" type="text" class="form-control jnborder" id="lbl" placeholder="نام">
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <input name="lastname" type="text" class="form-control jnborder" id="lbl" placeholder="نام خانوادگی">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="">
                            <input name="phone" type="text" class="form-control jnborder" id="lbl" placeholder="شماره همراه">
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <input name="email" type="email" class="form-control jnborder" id="lbl" placeholder="ایمیل">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="">
                            <input name="password" type="password" class="form-control jnborder" id="lbl" placeholder="رمز">
                        </div>
                    </div>
                    <div class="col">
                        <div class="">
                            <input name="confirm" type="password" class="form-control jnborder" id="lbl" placeholder="تایید رمز">
                        </div>
                    </div>
                </div>
                <br>
                <button name="create" class="btn jnbtn" type="submit">ساخت</button>
            </form>
            <hr class="jnborder">
            <p class="hints">
                <a class="formslink" href="#" onclick="return show('login','create');">یه اکانت دارم. بریم لاگین کنیم.</a>
            </p>
        </div>
        <div id="login" class="col-md-6 mainform overflow-auto" style="display:none">
            <h3 class="jntext">ورود به حساب کاربری</h3>
            <br>
            <form action="index.php" method="post" autocomplete="off">
                <div class="">
                    <input name="mail" type="email" class="form-control jnborder" placeholder="ایمیل">
                    <small class="jntext">برای دریافت رمز یکبار مصرف، این فیلد را پر کنید.</small>
                </div>
                <br>
                <div class="">
                    <input name="password" type="password" class="form-control jnborder" id="floatingPassword" placeholder="رمز">
                </div>
                <br>
                <button name="login" class="btn jnbtn" type="submit">ورود</button>
                <button style="float: left;" class="btn jnout" type="submit" name="onetime">گرفتن رمز یکبار مصرف</button>
            </form>
            <hr class="jnborder">
            <p class="hints">
                <a class="formslink" href="#" onclick="return show('forgot','login');">رمزم یادم رفت! بریم ریکاوری کنیم.</a>
                <br>
                <a class="formslink" href="#" onclick="return show('create','login');">بریم یه حساب جدید بسازیم.</a>
            </p>
        </div>
        <div id="forgot" class="col-md-6 mainform overflow-auto" style="display:none">
            <h3 class="jntext">فراموشی رمز</h3>
            <br>
            <form action="index.php" method="post" autocomplete="off">
                <div>
                    <input name="mail" type="email" class="form-control jnborder" placeholder="ایمیل">
                    <small class="jntext">برای دریافت رمز، ایمیل خود را وارد کنید.</small>
                </div>
                <br>
                <button name="forgot" class="btn jnbtn" type="submit">بازیابی رمز</button>
            </form>
            <hr class="jnborder">
            <p class="hints">
                <a class="formslink" href="#" onclick="return show('login','forgot');">رمز یادم اومد! بریم لاگین کنیم.</a>
                <br>
                <a class="formslink" href="#" onclick="return show('create','forgot');">بریم یه حساب جدید بسازیم.</a>
            </p>
        </div>
        <div id="auth" class="col-md-6 mainform overflow-auto" style="display:<?php echo $authpage; ?>">
            <h3 class="jntext">تایید مالکیت حساب</h3>
            <br>
            <form action="index.php" method="post" autocomplete="off">
                <div class="">
                    <input name="tfa" type="text" class="form-control jnborder" placeholder="کد ارسال شده">
                    <small class="jntext">کد ارسال شده را در این فیلد وارد کنید</small>
                </div>
                <br>
                <button name="tfasubmit" class="btn jnbtn" type="submit">تایید</button>
            </form>
            <hr class="jnborder">
            <p class="hints">
                ارسال مجدد کد
            </p>
            <!-- <p class="hints">
                <a class="formslink" href="#" onclick="return show('forgot','login');">رمزم یادم رفت! بریم ریکاوری کنیم.</a>
                <br>
                <a class="formslink" href="#" onclick="return show('create','login');">بریم یه حساب جدید بسازیم.</a>
            </p> -->
        </div>
        <div id="auth" class="col-md-6 mainform overflow-auto" style="display:<?php echo $activation; ?>">
            <h3 class="jntext">فعال سازی حساب</h3>
            <br>
            <hr class="jnborder">
            <div>
                <small>ایمیل فعال سازی به <span class="jntext"><?php echo $row_user['email']; ?></span> ارسال شده است.</small>
            </div>
            <p class="hints">
                ارسال مجدد کد
            </p>
            <!-- <p class="hints">
                <a class="formslink" href="#" onclick="return show('forgot','login');">رمزم یادم رفت! بریم ریکاوری کنیم.</a>
                <br>
                <a class="formslink" href="#" onclick="return show('create','login');">بریم یه حساب جدید بسازیم.</a>
            </p> -->
        </div>
        <div class="col-md-6 gradiant overflow-auto">
            <h2>به جاب نیک خوش آمدید.</h2>
            <br>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
            <div class="errors">
                <?php
                    if (count($errors) > 0) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p><strong>مراقب باش!</strong></p>
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
            <br>
        </div>
    </div>
</div>

<script src="https://cdn.neotrinost.ir/jobnic/js/bootstrap.min.js"></script>
</body>
</html>