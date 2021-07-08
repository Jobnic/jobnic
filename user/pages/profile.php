<div class="row">
    <div class="col-md-6">
        <h2 class="text-danger">Profile Updating</h2>
        <p class="text-danger">If you wanna update your profile easily, use here</p>
        <div class="dialog border border-danger">
            <h3 class="text-danger"><i class="fa fa-refresh text-danger"></i> Update Your Profile</h3>
            <hr class="border border-danger">
            <form method="post" action="index.php" class="">
                <div class="group">
                    <p class="text-danger"><i class="fa fa-info text-danger"></i> Add a bio, Describe your self
                    </p>
                    <textarea name="bio" class="form-control form-control-sm border border-danger" rows="5"
                              placeholder="Bio"></textarea>
                    <br>
                    <button name="updatebio" class="btn btn-danger btn-sm">Update Bio</button>
                </div>
            </form>
            <hr class="border border-danger">
            <p class="text-danger"><i class="fa fa-cogs text-danger"></i> Add skills or languages</p>
            <form method="post" action="index.php" class="">
                <input type="text" name="skillname" class="form-control form-control-sm border border-danger"
                       placeholder="Skill Name. Ex : Python">
                <br>
                <input type="number" name="skillper" max="100"
                       class="form-control form-control-sm border border-danger"
                       placeholder="How Much. Ex : 75">
                <br>
                <button type="submit" name="updateskill" class="btn btn-danger btn-sm">Add</button>
            </form>
        </div>
        <br>
    </div>
    <div class="col-md-6">
        <h2 class="text-primary">Social Media</h2>
        <p class="text-primary">If you have social medias, Use here to add them</p>
        <div class="dialog border border-primary">
            <h3 class="text-primary"><i class="fa fa-cloud text-primary"></i> You in Social Media</h3>
            <hr class="border border-primary">
            <form method="post" action="index.php">
                <div class="group">
                    <i class="fa fa-linkedin text-primary"></i>
                    <br>
                    <input name="linkedin" placeholder="Linkedin" class="form-control-sm inp border-primary">
                    &nbsp;
                    <button name="updatelinkedin" class="btn btn-primary btn-sm">Update</button>
                </div>
                <br>
                <div class="group">
                    <i class="fa fa-twitter text-info"></i>
                    <br>
                    <input name="twitter" placeholder="Twitter" class="form-control-sm inp border-info">
                    &nbsp;
                    <button name="updatetwitter" class="btn btn-info text-white btn-sm">Update</button>
                </div>
                <br>
                <div class="group">
                    <i class="fa fa-github text-dark"></i>
                    <br>
                    <input name="github" placeholder="GitHub" class="form-control-sm inp border-dark">
                    &nbsp;
                    <button name="updategithub" class="btn btn-dark btn-sm">Update</button>
                </div>
                <br>
                <div class="group">
                    <i class="fa fa-telegram text-primary"></i>
                    <br>
                    <input name="telegram" placeholder="Telegram" class="form-control-sm inp border-primary">
                    &nbsp;
                    <button name="updatetelegram" class="btn btn-primary btn-sm">Update</button>
                </div>
                <br>
                <div class="group">
                    <i class="fa fa-instagram text-danger"></i>
                    <br>
                    <input name="instagram" placeholder="Instagram" class="form-control-sm inp border-danger">
                    &nbsp;
                    <button name="updateinstagram" class="btn btn-danger btn-sm">Update</button>
                </div>
                <br>
                <div class="group">
                    <i class="fa fa-facebook text-primary"></i>
                    <br>
                    <input name="facebook" placeholder="Facebook" class="form-control-sm inp border-primary">
                    &nbsp;
                    <button name="updatefacebook" class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>