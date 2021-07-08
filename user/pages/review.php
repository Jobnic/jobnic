<div class="row">
    <div class="col-md-8">
        <h2 class="text-success">Profile Part</h2>
        <p class="text-success">Here you can review your profile that people cat see</p>
        <div class="dialog border border-success">
            <h3 class="text-success"><i class="fa fa-id-card text-success"></i> Profile Review</h3>
            <hr class="border border-success">
            <p><b><?php echo $row['firstname'] . '&nbsp;' . $row['lastname']; ?></b>
                &nbsp;
                <span style="float: right;" class="btn btn-sm btn-outline-success"><?php echo $row["id"]; ?></span>
                &nbsp;
                <span style="" class="btn btn-sm btn-outline-dark"><i class="fa fa-star"></i> <?php echo $row["stars"]; ?></span>
                &nbsp;
                <span style="" class="btn btn-sm btn-outline-dark"><i
                        class="fa fa-eye"></i> <?php echo $row["views"]; ?></span>
            </p>
            <p><?php echo $row['bio']; ?></p>
            <small>Joined <?php echo $row['join']; ?></small>
            <hr class="border border-success">
            <?php
            if (isset($row['skills'])) {
                ?>
                <p>
                <?php
                $colors = array("primary", 'danger', 'warning', 'info', 'success', 'dark', 'secondary');

                $dbskills = $row['skills'];
                $all = explode(" ", $dbskills);

                foreach ($all as $skill) {
                    $each = explode("-", $skill);

                    $color = rand(0, 6);

                    ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success text-white progress-bar-animated"
                             role="progressbar" aria-valuenow="<?php echo $each[1]; ?>" aria-valuemin="0"
                             aria-valuemax="100" style="width: <?php echo $each[1]; ?>%;">
                        </div>
                    </div>
                    <span class="text-success" style="font-size: 10px;"><?php echo $each[0] . " " . $each[1]; ?> %</span>
                    <a href="index.php?delete=skill">
                        <span style="float: right;" class="text-danger"><i class="fa fa-trash-o"></i></span>
                    </a>
                    <hr class="border border-success">
                    <?php
                }
                ?>
                </p>
                <?php
            }
            ?>
            <p>
            <p><i class="icon fa fa-phone text-white bg-success"></i> <?php echo $row['phone']; ?></p>
            <p><i class="icon fa fa-envelope text-white bg-primary"></i> <?php echo $row['email']; ?></p>
            </p>
            <p>
                <?php
                if (isset($row['linkedin'])) {
                    ?>
                    <a target="_blank" class="link"
                       href="https://linkedin.com/in/<?php echo $row['linkedin']; ?>"><i
                            class="icon fa fa-linkedin text-white bg-primary"></i></a>
                    <?php
                }
                if (isset($row['github'])) {
                    ?>
                    <a target="_blank" class="link" href="https://github.com/<?php echo $row['github']; ?>"><i
                            class="icon fa fa-github text-white bg-dark"></i></a>
                    <?php
                }
                if (isset($row['telegram'])) {
                    ?>
                    <a target="_blank" class="link" href="https://t.me/<?php echo $row['telegram']; ?>"><i
                            class="icon fa fa-telegram text-white bg-primary"></i></a>
                    <?php
                }
                if (isset($row['instagram'])) {
                    ?>
                    <a target="_blank" class="link"
                       href="https://instagram.com/<?php echo $row['instagram']; ?>"><i
                            class="icon fa fa-instagram text-white bg-danger"></i></a>
                    <?php
                }
                if (isset($row['twitter'])) {
                    ?>
                    <a target="_blank" class="link" href="https://twitter.com/<?php echo $row['twitter']; ?>"><i
                            class="icon fa fa-twitter text-white bg-info"></i></a>
                    <?php
                }
                if (isset($row['facebook'])) {
                    ?>
                    <a target="_blank" class="link" href="https://facebook.com/<?php echo $row['facebook']; ?>"><i
                            class="icon fa fa-facebook text-white bg-primary"></i></a>
                    <?php
                }
                ?>
            </p>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <h2 class="text-dark">Jobs Done</h2>
        <p class="text-dark">Here you can see what jobs you did before</p>
        <div class="dialog border border-dark">
            <h3 class="text-dark"><i class="fa fa-check text-dark"></i> Done Jobs</h3>
            <hr class="border border-dark">
            <?php
            $get_jobs = "SELECT * FROM jobs WHERE person = '$id'";
            $job_result = mysqli_query($connection, $get_jobs);
            if (mysqli_num_rows($job_result) > 0) {
                ?>
                <div class="table-responsive">
                    <table class="table table-hover text-center table-bordered border-dark table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Time</th>
                            <th scope="col">Stars</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($job_row = mysqli_fetch_assoc($job_result)) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $job_row['title']; ?></th>
                                <td><?php echo $job_row['type']; ?></td>
                                <td><?php echo $job_row['closed']; ?></td>
                                <td><?php echo $job_row['stars']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            else {
                echo "<h4 class='text-dark'>Noting done yet</h4>";
            }
            ?>
        </div>
    </div>
</div>