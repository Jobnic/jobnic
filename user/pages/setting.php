<?php
// Setting Page
?>
<div class="row">
    <div class="col-md-6">
        <h2 class="text-dark">Account Setting</h2>
        <p class="text-dark">Yed, here is your account setting. Change phone or email or password</p>
        <div class="dialog border border-dark">
            <h3 class="text-dark"><i class="fa fa-cog text-dark"></i> Settings</h3>
            <hr class="border border-dark">
            <form method="post" action="index.php" class="">
                <!--                        <label for="formFileSm" class="form-label">Update profile picture</label>-->
                <!--                        <input class="form-control form-control-sm" id="formFileSm" type="file">-->
                <!--                        <hr>-->
                <div class="form-group">
                    <p><i class="fa fa-phone text-dark"></i> Change Phone</p>
                    <input name="phone" type="text"
                           class="border border-dark form-control-sm form-control"
                           placeholder="Phone">
                    <br>
                    <button class="btn btn-sm btn-dark" name="updatephone">Change Phone</button>
                </div>
                <br>
                <div class="form-group">
                    <p><i class="fa fa-envelope text-dark"></i> Change Email</p>
                    <input name="email" type="text"
                           class="border border-dark form-control-sm form-control"
                           placeholder="Email">
                    <br>
                    <button class="btn btn-sm btn-dark" name="updatemain">Change Email</button>
                </div>
                <hr class="border border-dark">
                <div class="form-group">
                    <p><i class="fa fa-key text-dark"></i> Change Password</p>
                    <input name="password" type="password"
                           class="border border-dark form-control-sm form-control"
                           placeholder="Current password">
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="newpassword" type="password"
                                   class="form-control border border-dark form-control-sm"
                                   placeholder="New Password">
                        </div>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="confirmpassword" type="password"
                                   class="form-control border border-dark form-control-sm"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <br>
                <button name="updatepassword" type="submit" class="btn btn-dark btn-sm">Change Password</button>
            </form>
        </div>
        <br>
    </div>
    <div class="col-md-4">
        <h2 class="text-danger">Delete Account</h2>
        <p class="text-danger">You can delete your account from here</p>
        <div class="dialog border border-danger">
            <h3 class="text-danger"><i class="fa fa-trash text-danger"></i> Delete</h3>
            <hr class="border border-danger">
            <form method="post" action="index.php" class="">
                <div class="form-group">
                    <p><i class="fa fa-key text-danger"></i> Enter your password</p>
                    <input name="password" type="text"
                           class="border border-danger form-control-sm form-control"
                           placeholder="Password">
                    <br>
                    <button class="btn btn-sm btn-danger" name="deleteaccount">Delete my account</button>
                </div>
            </form>
        </div>
    </div>
</div>