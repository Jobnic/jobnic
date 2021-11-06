<div>
        <!-- Start of jobs -->
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <h3><i class="fa fa-plus"></i> Add new project</h3>
                    <hr>
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
                            <input name="title" type="text" class="form-control form-control-sm inp"
                                   placeholder="Project Title">
                            <br>
                            <textarea name="describe" class="form-control form-control-sm inp"
                                      rows="5" placeholder="Project Describtion"></textarea>
                            <br>
                            <input name="skills" type="text"
                                   class="form-control form-control-sm inp"
                                   placeholder="Skills. Ex : php python">
                            <br>
                            <input name="price" type="text" class="form-control form-control-sm inp"
                                   placeholder="Project Price. Let it null for Agreement Price">
                            <br>
                            <small>* Let <b>Price</b> null for Agreement Price</small>
                            <br>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input inp" name="nes" type="checkbox" id="nes">
                                <label class="form-check-label" for="nes">
                                    This job need to be done soon
                                </label>
                            </div>
                            <br>
                            <button name="addjob" class="btn jbtn btn-sm">Add project</button>
                        </div>
                    </form>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="dialog">
                    <h3><i class="fa fa-list"></i> Projects</h3>
                    <hr>
                    <?php
                    $select_jobs = "SELECT * FROM jobs WHERE user = $id ORDER BY row DESC";
                    $result_jobs = mysqli_query($connection, $select_jobs);
                    if (mysqli_num_rows($result_jobs) > 0) {
                        while ($job_row = mysqli_fetch_assoc($result_jobs)) {
                            ?>
                            <p class="">
                                <?php
                                $jobid = $job_row['jobid'];
                                $jobtitle = $job_row['title'];
                                echo "<a class='link' href='index.php?tab=jobs&jobid=$jobid'>$jobtitle</a>";
                                if ($job_row['status'] == 'true') {
                                    echo "<span style='float: right;' class='text-success'>Open</span>";
                                } else {
                                    echo "<span style='float: right;' class='text-danger'>Close</span>";
                                }
                                ?>
                            </p>
                            <hr>
                            <?php
                        }
                    } else {
                        echo "<p>No projects yet</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
            <div class="col-md-7">
                <div class="dialog">
                    <h3><i class="fa fa-eye"></i> Review project</h3>
                    <hr>
                    <?php

                    if (count($job) > 0) {
                        if ($job[0] == false) {
                            echo '<p>Sorry, job didnt found.</p>';
                        }
                        else {
                            ?>
                            <div>
                                <span style="float: right;" class="btn jout btn-sm"><?php echo $job[0]['type']; ?></span>
                                <span style="float: right;">&nbsp;</span>
                                <span style="float: right" class="btn btn-sm jout"><i
                                            class="fa fa-eye"></i> <?php echo $job[0]["views"]; ?></span>
                                <p><b><?php echo $job[0]['title']; ?></b></p>
                                <p><?php echo $job[0]['describe']; ?></p>
                                <p style="font-size: 14px;"><?php echo $job[0]['datetime']; ?></p>
                                <?php
                                $skills = explode(" ", $job[0]['skills']);

                                foreach ($skills as $skill) {
                                    echo "<p class='btn jout btn-sm'>$skill</p>&nbsp;";
                                }
                                ?>
                                <br>
                                <hr>
                                <p><b>People applied</b></p>
                                <?php
                                $jobid = $job[0]['jobid'];
                                $get_applied = "SELECT * FROM applies WHERE job = '$jobid' ORDER BY row DESC";
                                $res_applied = mysqli_query($connection, $get_applied);
                                if (mysqli_num_rows($result_jobs) > 0) {
                                    ?>
                                    <table class="table table-striped table-responsive table-bordered border-dark tbl">
                                        <thead>
                                            <tr>
                                                <th scope="col">User</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($apply = mysqli_fetch_assoc($res_applied)) {
                                                $user = $apply['userid'];
                                                $get_user = "SELECT * FROM people WHERE id = '$user'";
                                                $res_user = mysqli_query($connection, $get_user);
                                                $row_user = mysqli_fetch_assoc($res_user);

                                                $user_name = $row_user["firstname"] . " " . $row_user["firstname"];
                                                ?>
                                                <tr>
                                                    <td><a class="link" href="user.php?userid=<?php echo $user; ?>"><?php echo $user_name; ?></a></td>
                                                    <td><?php echo $apply["dt"]; ?></td>
                                                    <td>
                                                        <a href="index.php?act=check&user=<?php echo $user; ?>&jobid=<?php echo $jobid; ?>" class="text-success link">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        |
                                                        <a href="index.php?act=times&user=<?php echo $user; ?>&jobid=<?php echo $jobid; ?>" class="text-danger link">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                                else {
                                    echo "<p>No one applied yet.</p>";
                                }
                                ?>
                                <hr>
                                <?php
                                if ($job[0]['status'] == 'false') {
                                    echo "<p class=''><b>This job is closed.</b></p>";
                                    echo "<p class=''>" . $job[0]['closed'] . "</p>";
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
                                        <button class="btn btn-sm jbtn" name="closejob">Close job and give stars</button>
                                    </form>
                                    <hr>
                                    <p>If nobody did via <b>Job Nic</b> close it manualy</p>
                                    <a class="btn jbtn btn-sm" href="index.php?close=<?php echo $job['0']['jobid']; ?>">Close Job</a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    else {
                        echo '<p>Select job first.</p>';
                    }
                    ?>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <h3><i class="fa fa-tasks"></i> Applied</h3>
                    <hr>
                    <?php
                    $select_applies = "SELECT * FROM applies WHERE userid = $id ORDER BY row DESC";
                    $result_applies = mysqli_query($connection, $select_applies);
                    if (mysqli_num_rows($result_applies) > 0) {
                        ?>
                        <table class="table table-striped table-responsive table-bordered border-dark">
                            <thead>
                            <tr>
                                <th scope="col">Job</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($apply = mysqli_fetch_assoc($result_applies)) {
                                ?>
                                <tr>
                                    <td><a class="link" href="../jobs/job.php?jobid=<?php echo $apply['job']; ?>"><?php echo $apply['job']; ?></a></td>
                                    <td><?php echo $apply["dt"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    else {
                        echo "<p>No applies yet.</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
        </div>
        <!-- End of jobs -->
        <!-- Start of tickets -->
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <h3><i class="fa fa-envelope"></i> Send Ticket</h3>
                    <hr>
                    <form method="post" action="index.php">
                        <input name="tictitle" type="text" class="form-control form-control-sm inp"
                               placeholder="Ticket Title">
                        <br>
                        <textarea name="ticdescribe" class="form-control form-control-sm inp"
                                  rows="5" placeholder="Ticket Describtion"></textarea>
                        <br>
                        <button class="btn btn-sm jbtn" name="sendtik" type="submit">Send Ticket</button>
                    </form>
                </div>
                <br>
            </div>
            <div class="col-md-5">
                <div class="dialog">
                    <h3><i class="fa fa-paper-plane"></i> My Tickets</h3>
                    <hr>
                    <?php
                    $select_tiks = "SELECT * FROM ticks WHERE user = $id ORDER BY row DESC";
                    $result_tiks = mysqli_query($connection, $select_tiks);
                    if (mysqli_num_rows($result_tiks) > 0) {
                        while ($tik_row = mysqli_fetch_assoc($result_tiks)) {
                            ?>
                            <p>
                                <?php
                                $tikid = $tik_row['tikid'];
                                $tiktitle = $tik_row['title'];
                                echo "<a class='link' href='index.php?tab=tickets&tikid=$tikid'>$tiktitle</a>";
                                if (isset($tik_row['status'])) {
                                    echo "<span style='float: right;' class='text-success'><i class='fa fa-check'></i></span>";
                                } else {
                                    echo "<span style='float: right;' class='text-night'><i class='fa fa-times'></i></span>";
                                }
                                ?>
                            </p>
                            <hr>
                            <?php
                        }
                    } else {
                        echo "<p>No tickets yet</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
            <div class="col-md-7">
                <div class="dialog">
                    <h3><i class="fa fa-search"></i> Ticket Review</h3>
                    <hr>
                    <?php
                    if (count($tik) > 0) {
                        if ($tik[0] == false) {
                            echo "<p><b>Ticket didnt found.</b></p>";
                        }
                        else {
                            ?>
                            <h3><?php echo $tik[0]['title']; ?></h3>
                            <p><?php echo $tik[0]['describe']; ?></p>
                            <br>
                            <?php
                            if (isset($tik[0]['status'])) {
                                if (isset($tik[0]['answered'])) {
                                    ?>
                                    <p><b><?php echo $tik[0]['answer']; ?></b></p>
                                    <p><?php echo $tik[0]['answered']; ?></p>
                                    <p><small>Answered in <?php echo $tik[0]['answered']; ?></small></p>
                                    <?php
                                }
                                else {
                                    echo "<p>Support saw ticket, wait for answer</p>";
                                }
                            }
                            else {
                                echo '<p><small>Until now support didnt saw ticket</small></p>';
                            }
                            ?>
                            <br>
                            <p>Sent in <b><?php echo $tik[0]['datetime']; ?></b></p>
                            <p>Ticket ID : <b><?php echo $tik[0]['tikid']; ?></b></p>
                            <?php
                        }
                    }
                    else {
                        echo '<p>Select ticket first.</p>';
                    }
                    ?>
                </div>
                <br>
            </div>
        </div>
        <!-- End of tickets -->
        </div>