<?php
// Ticket Page
?>

<div class="row">
    <div class="col-md-3">
        <div class="mnu">
            <h3>Hey there!</h3>
            <br>
            <ul>
                <a href="index.php?tab=review"><li class="">Review</li></a>
                <a href="index.php?tab=jobs"><li class="">Jobs</li></a>
                <a href="index.php?tab=profile"><li class="">Profile</li></a>
                <a href="index.php?tab=tickets"><li class="selected">Tickets</li></a>
                <a href="index.php?tab=settings"><li class="">Settings</li></a>
                <br>
                <a href="index.php?tab=review"><li>Logout</li></a>
            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-night">Send your ticket to us</h2>
                <p class="text-night">By this feature you can tell us if there is any problem or any other things</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-envelope text-night"></i> Send Ticket</h3>
                    <hr class="border-night">
                    <form method="post" action="index.php">
                        <input name="tictitle" type="text" class="form-control form-control-sm border-night inp"
                               placeholder="Ticket Title">
                        <br>
                        <textarea name="ticdescribe" class="form-control form-control-sm border-night inp"
                                  rows="5" placeholder="Ticket Describtion"></textarea>
                        <br>
                        <button class="btn btn-sm btn-night" name="sendtik" type="submit">Send Ticket</button>
                    </form>
                </div>
                <br>
            </div>
            <div class="col-md-4">
                <h2 class="text-night">Your tickets</h2>
                <p class="text-night">Here you can see your tickets and see if ticket is answered or no</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-paper-plane"></i> My Tickets</h3>
                    <hr class="border-night">
                    <?php
                    $select_tiks = "SELECT * FROM ticks WHERE user = $id ORDER BY row DESC";
                    $result_tiks = mysqli_query($connection, $select_tiks);
                    if (mysqli_num_rows($result_tiks) > 0) {
                        while ($tik_row = mysqli_fetch_assoc($result_tiks)) {
                            ?>
                            <p class="text-night">
                                <?php
                                $tikid = $tik_row['tikid'];
                                $tiktitle = $tik_row['title'];
                                echo "<a class='link text-night' href='index.php?tikid=$tikid'>$tiktitle</a>";
                                if (isset($tik_row['status'])) {
                                    echo "<span style='float: right;' class='text-success'><i class='fa fa-check'></i></span>";
                                } else {
                                    echo "<span style='float: right;' class='text-night'><i class='fa fa-times'></i></span>";
                                }
                                ?>
                            </p>
                            <hr class="border-night">
                            <?php
                        }
                    } else {
                        echo "<p class='text-night'>No tickets yet</p>";
                    }
                    ?>
                </div>
                <br>
            </div>
            <div class="col-md-4">
                <h2 class="text-night">Show ticket</h2>
                <p class="text-night">Here you can select your ticket and see details</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-search"></i> Ticket Review</h3>
                    <hr class="border-night">
                    <?php
                    if (count($tik) > 0) {
                        if ($tik[0] == false) {
                            echo "<p class='text-night'><b>Ticket didnt found.</b></p>";
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
                                    <p class="text-night"><?php echo $tik[0]['answered']; ?></p>
                                    <p><small>Answered in <?php echo $tik[0]['answered']; ?></small></p>
                                    <?php
                                }
                                else {
                                    echo "<p class='text-night'>Support saw ticket, wait for answer</p>";
                                }
                            }
                            else {
                                echo '<p><small class="text-night">Until now support didnt saw ticket</small></p>';
                            }
                            ?>
                            <br>
                            <p>Sent in <b><?php echo $tik[0]['datetime']; ?></b></p>
                            <p>Ticket ID : <b><?php echo $tik[0]['tikid']; ?></b></p>
                            <?php
                        }
                    }
                    else {
                        echo '<p class="text-night">Select ticket first.</p>';
                    }
                    ?>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>