<?php

if (count($job) > 0) {
    if ($job[0] == false) {
        echo '<p class="text-danger">Sorry, job didnt found.</p>';
    }
    else {
        ?>
        <div>
            <span style="float: right;" class="btn btn-outline-danger btn-sm"><?php echo $job[0]['type']; ?></span>
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
                                <small class="text-muted">Enter Job ID here</small>
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