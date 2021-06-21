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
            <br>
            <?php
                if ($job[0]['status'] == 'false') {
                    echo "<p class='text-danger'><b>This job is closed.</b></p>";
                    echo "<p class='text-danger'>" . $job[0]['closed'] . "</p>";
                }
                else {
                    ?>
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