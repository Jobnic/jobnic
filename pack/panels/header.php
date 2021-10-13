<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand jntext" href="<?php echo $path; ?>">Job Nic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active jntext" aria-current="page" href="<?php echo $path; ?>/jobs"><i class="fa fa-list"></i> Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active jntext" aria-current="page" href="<?php echo $path; ?>/us"><i class="fa fa-bank"></i> We</a>
                </li>
            </ul>
            <div class="navbar-nav">
                <?php
                if ($stat == true) {
                    ?>
                    <a class="nav-link active jntext" href="<?php echo $path; ?>/user"><i class="fa fa-dashboard"></i> Go To Panel</a> <a
                            class="nav-link active jntext" href="<?php echo $path; ?>/account/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                    <?php
                } else {
                    ?>
                    <a class="nav-link active jntext" href="<?php echo $path; ?>/account/index.php"><i class="fa fa-plus"></i> Sign Up</a> <a
                            class="nav-link active jntext" href="<?php echo $path; ?>/account/index.php"><i class="fa fa-sign-in"></i> Sign
                        In</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>