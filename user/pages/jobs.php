<div class="row">
    <div class="col-md-6">
        <h2 class="text-warning">New Job</h2>
        <p class="text-warning">I think you have a project that you cant solve. So, put it here and wait for
            someone</p>
        <div class="dialog border border-warning">
            <h3 class="text-warning"><i class="fa fa-plus text-warning"></i> Add new project</h3>
            <hr class="border border-warning">
            <form method="post" action="index.php" class="">
                <div class="group">
                    <select name="type" class="form-select form-select-sm border border-warning"
                            aria-label=".form-select-sm example">
                        <option value="default">Select type of your project</option>
                        <option value="programming">Programming</option>
                        <option value="android">Android</option>
                        <option value="backend">Back-ENd</option>
                        <option value="design">Design</option>
                        <option value="school">School</option>
                        <option value="costume">Costume</option>
                    </select>
                    <br>
                    <input name="title" type="text" class="form-control form-control-sm border border-warning"
                           placeholder="Project Title">
                    <br>
                    <textarea name="describe" class="form-control form-control-sm border border-warning"
                              rows="5" placeholder="Project Describtion"></textarea>
                    <br>
                    <input name="skills" type="text"
                           class="form-control form-control-sm border border-warning"
                           placeholder="Skills. Ex : php python">
                    <br>
                    <input name="price" type="text" class="form-control form-control-sm border border-warning"
                           placeholder="Project Price. Let it null for Agreement Price">
                    <small class="text-warning">* Let it null for Agreement Price</small>
                    <br>
                    <br>
                    <button name="addjob" class="btn btn-warning text-white btn-sm">Add project</button>
                </div>
            </form>
        </div>
        <br>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-5">
        <h2 class="text-info">List of your jobs</h2>
        <p class="text-info">It you had shared jobs already, here is the list of them. Click on title to show
            review</p>
        <div class="dialog border border-info">
            <h3 class="text-info"><i class="fa fa-list text-info"></i> Projects you shared</h3>
            <hr class="border border-info">
            <?php
            $select_jobs = "SELECT * FROM jobs WHERE user = $id ORDER BY row DESC";
            $result_jobs = mysqli_query($connection, $select_jobs);
            if (mysqli_num_rows($result_jobs) > 0) {
                while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                    ?>
                    <p class="text-info">
                        <?php
                        $jobid = $job_row['jobid'];
                        $jobtitle = $job_row['title'];
                        echo "<a class='link text-info' href='index.php?jobid=$jobid'>$jobtitle</a>";
                        if ($job_row['status'] == 'true') {
                            echo "<span style='float: right;' class='text-success'>Open</span>";
                        } else {
                            echo "<span style='float: right;' class='text-danger'>Close</span>";
                        }
                        ?>
                    </p>
                    <hr class="border border-info">
                    <?php
                }
            } else {
                echo "<p class='text-info'>No projects yet</p>";
            }
            ?>
        </div>
        <br>
    </div>
    <div class="col-md-7">
        <h2 class="text-secondary">Review the job</h2>
        <p class="text-secondary">It you had selected a job, it with be review here</p>
        <div class="dialog border border-secondary">
            <h3 class="text-secondary"><i class="fa fa-eye text-secondary"></i> Review project</h3>
            <hr class="border border-secondary">
            <?php

            if (count($job) > 0) {
                if ($job[0] == false) {
                    echo '<p class="text-danger">Sorry, job didnt found.</p>';
                }
                else {
                    ?>
                    <div>
                        <span style="float: right;" class="btn btn-outline-danger btn-sm"><?php echo $job[0]['type']; ?></span>
                        <span style="float: right; color: white;">-</span>
                        <span style="float: right" class="btn btn-sm btn-outline-dark"><i
                                class="fa fa-eye"></i> <?php echo $job[0]["views"]; ?></span>
                        <p><b><?php echo $job[0]['title']; ?></b></p>
                        <p><?php echo $job[0]['describe']; ?></p>
                        <p style="font-size: 14px;"><?php echo $job[0]['datetime']; ?></p>
                        <?php
                        $skills = explode(" ", $job[0]['skills']);

                        foreach ($skills as $skill) {
                            echo "<p class='btn btn-outline-secondary btn-sm'>$skill</p>&nbsp;";
                        }
                        ?>
                        <br>
                        <hr class="border border-secondary">
                        <?php
                        if ($job[0]['status'] == 'false') {
                            echo "<p class='text-danger'><b>This job is closed.</b></p>";
                            echo "<p class='text-danger'>" . $job[0]['closed'] . "</p>";
                        }
                        else {
                            ?>
                            <p>If any one did this project fill this out</p>
                            <form action="index.php" method="post">
                                <div class="row">
                                    <div class="form-group">
                                        <input name="jobid" type="number"
                                               class="border border-secondary form-control-sm form-control"
                                               placeholder="Job ID" value="<?php echo $job[0]['jobid']; ?>">
                                        <small class="text-muted">Job ID</small>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="dider" type="number"
                                                   class="form-control border border-secondary form-control-sm"
                                                   placeholder="Person ID">
                                            <small class="text-muted">Here you should enter person id</small>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="star" type="number"
                                                   class="form-control border border-secondary form-control-sm"
                                                   placeholder="Stars you give">
                                            <small class="text-muted">Here enter stars you give to person</small>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-secondary" name="closejob">Close job and give stars</button>
                            </form>
                            <hr>
                            <p>If nobody did via <b>Job Nic</b> close it manualy</p>
                            <a class="btn btn-danger btn-sm" href="index.php?close=<?php echo $job['0']['jobid']; ?>">Close Job</a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            else {
                echo '<p class="text-secondary">Select job first.</p>';
            }

            ?>
        </div>
    </div>
</div>