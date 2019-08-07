<?php include"header.php" ?>
                        <form method="post" action="proses-admin.php">
                            <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="username" class="form-control" placeholder="Nama pengguna" maxlength="5" required="" autofocus="">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Kata sandi" maxlength="15" required="">
                                </div>
                                <!--div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div-->
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Masuk">
                            </fieldset>
                        </form>
<?php include"footer.php" ?>
