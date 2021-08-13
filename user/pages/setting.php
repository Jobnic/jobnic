<?php
// Setting Page
?>
<div class="row">
    <div class="col-md-6">
        <h2 class="text-night">Account Setting</h2>
        <p class="text-night">Yed, here is your account setting. Change phone or email or password</p>
        <div class="dialog border-night">
            <h3 class="text-night"><i class="fa fa-cog text-night"></i> Settings</h3>
            <hr class="border-night">
            <form method="post" action="index.php" class="">
                <!--                        <label for="formFileSm" class="form-label">Update profile picture</label>-->
                <!--                        <input class="form-control form-control-sm" id="formFileSm" type="file">-->
                <!--                        <hr>-->
                <div class="form-group">
                    <p><i class="fa fa-phone text-night"></i> Change Phone</p>
                    <input name="phone" type="text"
                           class="inp border-night form-control-sm form-control"
                           placeholder="Phone">
                    <br>
                    <button class="btn btn-sm btn-night" name="updatephone">Change Phone</button>
                </div>
                <br>
                <div class="form-group">
                    <p><i class="fa fa-envelope text-night"></i> Change Email</p>
                    <input name="email" type="text"
                           class="inp border-night form-control-sm form-control"
                           placeholder="Email">
                    <br>
                    <button class="btn btn-sm btn-night" name="updatemain">Change Email</button>
                </div>
                <hr class="border-night">
                <div class="form-group">
                    <p><i class="fa fa-key text-night"></i> Change Password</p>
                    <input name="password" type="password"
                           class="inp border-night form-control-sm form-control"
                           placeholder="Current password">
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="newpassword" type="password"
                                   class="form-control inp border-night form-control-sm"
                                   placeholder="New Password">
                        </div>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="confirmpassword" type="password"
                                   class="form-control inp border-night form-control-sm"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <br>
                <button name="updatepassword" type="submit" class="btn btn-night btn-sm">Change Password</button>
            </form>
        </div>
        <br>
    </div>
    <div class="col-md-4">
        <h2 class="text-night">Delete Account</h2>
        <p class="text-night">You can delete your account from here</p>
        <div class="dialog border-night">
            <h3 class="text-night"><i class="fa fa-trash text-night"></i> Delete</h3>
            <hr class="border border-night">
            <form method="post" action="index.php" class="">
                <div class="form-group">
                    <p><i class="fa fa-key text-night"></i> Enter your password</p>
                    <input name="password" type="text"
                           class="inp border-night form-control-sm form-control"
                           placeholder="Password">
                    <br>
                    <div class="form-check">
                        <input class="form-check-input inp" name="iknow" type="checkbox" id="accept">
                        <label class="form-check-label text-night" for="accept">
                            I know what I am doing
                        </label>
                    </div>
                    <br>
                    <button class="btn btn-sm btn-night" name="deleteaccount">Delete my account</button>
                </div>
            </form>
        </div>
        <br>
        <h2 class="text-night">Appearance</h2>
        <p class="text-night">Set Jobnic account theme</p>
        <div class="dialog border-night">
            <h3 class="text-night"><i class="fa fa-moon-o"></i> Theme</h3>
            <hr class="border border-night">
            <form method="post" action="index.php" class="">
                <div class="form-group">
                    <p><i class="fa fa-sun text-night"></i> Set your mode</p>
                    <div>
                        <input type="radio" class="btn-check" name="mode" value="dark" id="dark" autocomplete="off">
                        <label class="btn btn-sm btn-outline-dark" for="dark"><i class="fa fa-moon"></i> Dark Mode</label>
                        &nbsp;
                        <input type="radio" class="btn-check" name="mode" value="dark" id="light" autocomplete="off">
                        <label class="btn btn-sm btn-outline-dark" for="light"><i class="fa fa-sun"></i> Light Mode</label>
                    </div>
                    <br>
                    <div>
                        <input type="radio" class="btn-check" name="mode" value="dark" id="auto" autocomplete="off">
                        <label class="btn btn-sm btn-outline-dark" for="auto"><i class="fa fa-car"></i> Auto Mode</label>
                    </div>
                    <br>
                    <button class="btn btn-sm btn-night" name="changemode">Set mode</button>
                </div>
            </form>
        </div>
    </div>
</div>