<?php
// Setting Page
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
                <a href="index.php?tab=tickets"><li class="">Tickets</li></a>
                <a href="index.php?tab=settings"><li class="selected">Settings</li></a>
                <br>
                <a href="../../account/logout.php"><li>Logout</li></a>
            </ul>
            <br>
            <div class="tgrm" onclick="location.href='https://t.me/Job_Nic';">
                <div class="row">
                    <div class="col-md-3">
                        <h1><i class="fa fa-telegram"></i></h1>
                    </div>
                    <div class="col-md-9">
                        <small>
                            Join our Telegram channel to be informed of the latest news and updates.
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-8">
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
    </div>
</div>