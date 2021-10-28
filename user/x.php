<div>
        <?php
        if (count($errors) > 0) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p><strong>حواست کجاست,</strong></p>
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
        <div class="row">
        <!-- Start of review -->
        <div id="profile" style="display: block;">
            <div class="col-md-6">
                <div class="dialog">
                    <h3><i class="fa fa-id-card"></i> پروفایل</h3>
                    <hr class="">
                    <p>
                        <span style="float: left;" class="btn btn-sm jout"><?php echo $row["id"]; ?></span>
                        &nbsp;
                        <span style="" class="btn btn-sm jout"><i class="fa fa-star"></i> <?php echo $row["stars"]; ?></span>
                        &nbsp;
                        <span style="" class="btn btn-sm jout"><i
                                class="fa fa-eye"></i> <?php echo $row["views"]; ?></span>
                    </p>
                    <p><?php echo $row['bio']; ?></p>
                    <small>عضو شده از <?php echo $row['join']; ?></small>
                    <p>

                    </p>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <div class="dialog">
                    <h3><i class="fa fa-id-card"></i> توانایی ها</h3>
                    <hr class="">

                </div>
                <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="dialog">
                    <h3><i class="fa fa-check"></i> Done Jobs</h3>
                    <hr>
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
                        echo "<h4>Noting done yet</h4>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="dialog">
                    <h3><i class="fa fa-award"></i> Request for labels</h3>
                    <hr>
                    <p>
                        <?php
                        if (is_null($row['verified'])) {
                            echo '<a class="link text-info" href="index.php?request=label&type=verified">Request for <b><i class="fa fa-award"></i> verified label</b></a>';
                        }
                        else {
                            echo "<p>You got verified label.</p>";
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        if (is_null($row['awesome'])) {
                            echo '<a class="link text-info" href="index.php?request=label&type=trophy">Request for <b><i class="fa fa-trophy"></i> trophy label</b></a>';
                        }
                        else {
                            echo "<p>You got trophy label.</p>";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- End of review -->
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
        <!-- Start profile -->
        <div class="row">
            <div class="col-md-6">
                <div class="dialog">
                    <h3><i class="fa fa-cloud"></i> You in Social Media</h3>
                    <hr>
                    <form method="post" action="index.php">
                        <div class="group">
                            <i class="fa fa-linkedin text-night"></i>
                            <br>
                            <input name="linkedin" placeholder="Linkedin" class="form-control-sm inp">
                            &nbsp;
                            <button name="updatelinkedin" class="btn jbtn btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-twitter"></i>
                            <br>
                            <input name="twitter" placeholder="Twitter" class="form-control-sm inp">
                            &nbsp;
                            <button name="updatetwitter" class="btn jbtn btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-github"></i>
                            <br>
                            <input name="github" placeholder="GitHub" class="form-control-sm inp">
                            &nbsp;
                            <button name="updategithub" class="btn jbtn btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-telegram"></i>
                            <br>
                            <input name="telegram" placeholder="Telegram" class="form-control-sm inp">
                            &nbsp;
                            <button name="updatetelegram" class="btn jbtn btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-instagram"></i>
                            <br>
                            <input name="instagram" placeholder="Instagram" class="form-control-sm inp">
                            &nbsp;
                            <button name="updateinstagram" class="btn jbtn btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-facebook"></i>
                            <br>
                            <input name="facebook" placeholder="Facebook" class="form-control-sm inp">
                            &nbsp;
                            <button name="updatefacebook" class="btn jbtn btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End profile -->
        <!-- Start settings -->
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="dialog">
                        <h3><i class="fa fa-cog"></i> Settings</h3>
                        <hr>
                        <form method="post" action="index.php" class="">
                            <!--                        <label for="formFileSm" class="form-label">Update profile picture</label>-->
                            <!--                        <input class="form-control form-control-sm" id="formFileSm" type="file">-->
                            <!--                        <hr>-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <p><i class="fa fa-user"></i> Change First Name</p>
                                        <input name="fname" type="text"
                                               class="inp form-control-sm form-control"
                                               placeholder="First Name">
                                        <br>
                                        <button class="btn btn-sm jbtn" name="updatefirstname">Change First Name</button>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <p><i class="fa fa-user"></i> Change Last Name</p>
                                        <input name="lname" type="text"
                                               class="inp form-control-sm form-control"
                                               placeholder="Last Name">
                                        <br>
                                        <button class="btn btn-sm jbtn" name="updatelastname">Change Last Name</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <p><i class="fa fa-phone"></i> Change Phone</p>
                                <input name="phone" type="text"
                                       class="inp form-control-sm form-control"
                                       placeholder="Phone">
                                <br>
                                <button class="btn btn-sm jbtn" name="updatephone">Change Phone</button>
                            </div>
                            <br>
                            <div class="form-group">
                                <p><i class="fa fa-envelope"></i> Change Email</p>
                                <input name="email" type="text"
                                       class="inp form-control-sm form-control"
                                       placeholder="Email">
                                <br>
                                <button class="btn btn-sm jbtn" name="updatemain">Change Email</button>
                            </div>
                            <hr>
                            <div class="form-group">
                                <p><i class="fa fa-key"></i> Change Password</p>
                                <input name="password" type="password"
                                       class="inp form-control-sm form-control"
                                       placeholder="Current password">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="newpassword" type="password"
                                               class="form-control inp form-control-sm"
                                               placeholder="New Password">
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="confirmpassword" type="password"
                                               class="form-control inp form-control-sm"
                                               placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button name="updatepassword" type="submit" class="btn jbtn btn-sm">Change Password</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dialog">
                        <h3><i class="fa fa-moon-o"></i> Theme</h3>
                        <hr>
                        <form method="post" action="index.php" class="">
                            <div class="form-group">
                                <p><i class="fa fa-sun"></i> Set your mode</p>
                                <div>
                                    <input type="radio" name="mode" value="dark" id="dark">
                                    <label for="dark"><i class="fa fa-moon"></i> Dark Mode</label>
                                    &nbsp;
                                    <input type="radio" name="mode" value="light" id="light">
                                    <label for="light"><i class="fa fa-sun"></i> Light Mode</label>
                                </div>
                                <br>
                                <div>
                                    <input type="radio" name="mode" value="auto" id="auto">
                                    <label for="auto"><i class="fa fa-sun"></i> Auto Mode</label>
                                </div>
                                <br>
                                <small>* Your current mode is <b><?php echo $row["theme"]; ?></b>.</small>
                                <br>
                                <br>
                                <button class="btn btn-sm jbtn" name="changemode">Set mode</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
                <div class="col-md-6">
                    <div class="dialog">
                        <h3><i class="fa fa-trash"></i> Delete</h3>
                        <hr>
                        <form method="post" action="index.php" class="">
                            <div class="form-group">
                                <p><i class="fa fa-key"></i> Enter your password</p>
                                <input name="password" type="text"
                                       class="inp form-control-sm form-control"
                                       placeholder="Password">
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input inp" name="iknow" type="checkbox" id="accept">
                                    <label class="form-check-label" for="accept">
                                        Yes, I am agree with deleting my account
                                    </label>
                                </div>
                                <br>
                                <button class="btn btn-sm jbtn" name="deleteaccount">Delete my account</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
            <div>
                <div class="col-md-6">
                    <div class="dialog">
                        <h3><i class="fa fa-shield"></i> 2FA</h3>
                        <hr>
                        <form method="post" action="index.php" class="">
                            <div class="form-group">
                                <p><i class="fa fa-key"></i> Enter 2FA Email</p>
                                <input name="email" type="text"
                                       class="inp form-control-sm form-control"
                                       placeholder="2FA Email">
                                <br>
                                <button class="btn btn-sm jbtn" name="enable2fa">Enable 2FA for my account</button>
                            </div>
                        </form>
                    </div>
                    <br>
                </div>
                <br>
            </div>
        </div>
        <!-- End settings -->
    </div>