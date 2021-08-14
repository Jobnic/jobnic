<?php
// Jobs Page
?>
<div class="row">
    <div class="col-md-3">
        <h1>Manu</h1>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-night">New Job</h2>
                <p class="text-night">I think you have a project that you cant solve. So, put it here and wait for
                    someone</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-plus text-night"></i> Add new project</h3>
                    <hr class="border-night">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <select name="type" class="form-select form-select-sm border-night inp"
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
                            <input name="title" type="text" class="form-control form-control-sm border-night inp"
                                   placeholder="Project Title">
                            <br>
                            <textarea name="describe" class="form-control form-control-sm border-night inp"
                                      rows="5" placeholder="Project Describtion"></textarea>
                            <br>
                            <input name="skills" type="text"
                                   class="form-control form-control-sm border-night inp"
                                   placeholder="Skills. Ex : php python">
                            <br>
                            <input name="price" type="text" class="form-control form-control-sm border-night inp"
                                   placeholder="Project Price. Let it null for Agreement Price">
                            <small class="text-night">* Let it null for Agreement Price</small>
                            <br>
                            <br>
                            <button name="addjob" class="btn btn-night btn-sm">Add project</button>
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
                <h2 class="text-night">List of your jobs</h2>
                <p class="text-night">It you had shared jobs already, here is the list of them. Click on title to show
                    review</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-list text-night"></i> Projects you shared</h3>
                    <hr class="border-night">
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
                                echo "<a class='link text-night' href='index.php?jobid=$jobid'>$jobtitle</a>";
                                if ($job_row['status'] == 'true') {
                                    echo "<span style='float: right;' class='text-success'>Open</span>";
                                } else {
                                    echo "<span style='float: right;' class='text-night'>Close</span>";
                                }
                                ?>
                            </p>
                            <hr class="border-night">
                            <?php
                        }
                    } else {
                        echo "<p class='text-night'>No projects yet</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
            <div class="col-md-7">
                <h2 class="text-night">Review the job</h2>
                <p class="text-night">It you had selected a job, it with be review here</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-eye text-night"></i> Review project</h3>
                    <hr class="border-night">
                    <?php

                    if (count($job) > 0) {
                        if ($job[0] == false) {
                            echo '<p class="text-night">Sorry, job didnt found.</p>';
                        }
                        else {
                            ?>
                            <div>
                                <span style="float: right;" class="btn btn-outline-night btn-sm"><?php echo $job[0]['type']; ?></span>
                                <span style="float: right;">&nbsp;</span>
                                <span style="float: right" class="btn btn-sm btn-outline-night"><i
                                            class="fa fa-eye"></i> <?php echo $job[0]["views"]; ?></span>
                                <p><b><?php echo $job[0]['title']; ?></b></p>
                                <p><?php echo $job[0]['describe']; ?></p>
                                <p style="font-size: 14px;"><?php echo $job[0]['datetime']; ?></p>
                                <?php
                                $skills = explode(" ", $job[0]['skills']);

                                foreach ($skills as $skill) {
                                    echo "<p class='btn btn-outline-night btn-sm'>$skill</p>&nbsp;";
                                }
                                ?>
                                <br>
                                <hr class="border-night">
                                <?php
                                if ($job[0]['status'] == 'false') {
                                    echo "<p class='text-night'><b>This job is closed.</b></p>";
                                    echo "<p class='text-night'>" . $job[0]['closed'] . "</p>";
                                }
                                else {
                                    ?>
                                    <p>If any one did this project fill this out</p>
                                    <form action="index.php" method="post">
                                        <div class="row">
                                            <div class="form-group">
                                                <input name="jobid" type="number"
                                                       class="border-night form-control-sm form-control inp"
                                                       placeholder="Job ID" value="<?php echo $job[0]['jobid']; ?>">
                                                <small class="text-night">Job ID</small>
                                                <br>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="dider" type="number"
                                                           class="form-control border-night form-control-sm inp"
                                                           placeholder="Person ID">
                                                    <small class="text-night">Here you should enter person id</small>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input name="star" type="number"
                                                           class="form-control border-night form-control-sm inp"
                                                           placeholder="Stars you give">
                                                    <small class="text-night">Here enter stars you give to person</small>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-night" name="closejob">Close job and give stars</button>
                                    </form>
                                    <hr>
                                    <p>If nobody did via <b>Job Nic</b> close it manualy</p>
                                    <a class="btn btn-night btn-sm" href="index.php?close=<?php echo $job['0']['jobid']; ?>">Close Job</a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    else {
                        echo '<p class="text-night">Select job first.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>