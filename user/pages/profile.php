<?php
// Profile Page
?>

<div class="row">
    <div class="col-md-3">
        <div class="mnu">
            <h3>Hey there!</h3>
            <br>
            <ul>
                <a href="index.php?tab=review"><li class="">Review</li></a>
                <a href="index.php?tab=jobs"><li class="">Jobs</li></a>
                <a href="index.php?tab=profile"><li class="selected">Profile</li></a>
                <a href="index.php?tab=tickets"><li class="">Tickets</li></a>
                <a href="index.php?tab=settings"><li class="">Settings</li></a>
                <br>
                <a href="../../account/logout.php"><li>Logout</li></a>
            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-night">Profile Updating</h2>
                <p class="text-night">If you wanna update your profile easily, use here</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-refresh text-night"></i> Update Your Profile</h3>
                    <hr class="border-night">
                    <form method="post" action="index.php" class="">
                        <div class="group">
                            <p class="text-night"><i class="fa fa-info text-night"></i> Add a bio, Describe your self
                            </p>
                            <textarea name="bio" class="form-control form-control-sm border-night inp" rows="5"
                                      placeholder="Bio"></textarea>
                            <br>
                            <button name="updatebio" class="btn btn-night btn-sm inp">Update Bio</button>
                        </div>
                    </form>
                    <hr class="border-night">
                    <p class="text-night"><i class="fa fa-cogs text-night"></i> Add skills or languages</p>
                    <form method="post" action="index.php" class="">
                        <input type="text" name="skillname" class="form-control form-control-sm inp border-night"
                               placeholder="Skill Name. Ex : Python">
                        <br>
                        <input type="number" name="skillper" max="100"
                               class="form-control form-control-sm inp border-night"
                               placeholder="How Much. Ex : 75">
                        <br>
                        <button type="submit" name="updateskill" class="btn btn-night btn-sm">Add</button>
                    </form>
                </div>
                <br>
            </div>
            <div class="col-md-6">
                <h2 class="text-night">Social Media</h2>
                <p class="text-night">If you have social medias, Use here to add them</p>
                <div class="dialog border-night">
                    <h3 class="text-night"><i class="fa fa-cloud text-night"></i> You in Social Media</h3>
                    <hr class="border-night">
                    <form method="post" action="index.php">
                        <div class="group">
                            <i class="fa fa-linkedin text-night"></i>
                            <br>
                            <input name="linkedin" placeholder="Linkedin" class="form-control-sm inp border-night">
                            &nbsp;
                            <button name="updatelinkedin" class="btn btn-night btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-twitter text-night"></i>
                            <br>
                            <input name="twitter" placeholder="Twitter" class="form-control-sm inp border-night">
                            &nbsp;
                            <button name="updatetwitter" class="btn btn-night btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-github text-night"></i>
                            <br>
                            <input name="github" placeholder="GitHub" class="form-control-sm inp border-night">
                            &nbsp;
                            <button name="updategithub" class="btn btn-night btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-telegram text-night"></i>
                            <br>
                            <input name="telegram" placeholder="Telegram" class="form-control-sm inp border-night">
                            &nbsp;
                            <button name="updatetelegram" class="btn btn-night btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-instagram text-night"></i>
                            <br>
                            <input name="instagram" placeholder="Instagram" class="form-control-sm inp border-night">
                            &nbsp;
                            <button name="updateinstagram" class="btn btn-night btn-sm">Update</button>
                        </div>
                        <br>
                        <div class="group">
                            <i class="fa fa-facebook text-night"></i>
                            <br>
                            <input name="facebook" placeholder="Facebook" class="form-control-sm inp border-night">
                            &nbsp;
                            <button name="updatefacebook" class="btn btn-night btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>