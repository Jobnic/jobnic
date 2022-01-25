<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand jntext" href="<?php echo $path; ?>">جاب نیک</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active jntext" aria-current="page" href="<?php echo $path; ?>/jobs"><i class="fa fa-list"></i> آگهی ها</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link active jntext" aria-current="page" href="<?php echo $path; ?>/us"><i class="fa fa-bank"></i> We</a>
                </li> -->
            </ul>
            <div class="navbar-nav">
                <?php
                if ($stat == true) {
                    ?>
                    <a class="nav-link active jntext" href="<?php echo $path; ?>/user"><i class="fa fa-dashboard"></i> ورود به پنل</a> <a
                            class="nav-link active jntext" href="<?php echo $path; ?>/client/logout.php"><i class="fa fa-sign-out"></i> خروج از حساب کاربری</a>
                    <?php
                } else {
                    ?>
                    <a class="nav-link active jntext" href="<?php echo $path; ?>/client/index.php"><i class="fa fa-sign-in"></i> ورود یا ثبت نام</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>