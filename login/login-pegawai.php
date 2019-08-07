<?php include"header.php" ?>
                        <form method="post" action="proses-pegawai.php">
                            <fieldset>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="nip" class="form-control" placeholder="NIP" maxlength="8" required="" autofocus="">
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" placeholder="Kata sandi" maxlength="15" required="">
                                </div>
                                <div class="form-group input-group">
                                  <span class="input-group-addon"><i class="fa fa-chevron-down  "></i>
                                  </span>
                                    <select class="form-control" name="level" required="">
                                      <option value="">Pilih level pengguna</option>
                                      <option value="2">Pegawai</option>
                                      <option value="1">Supervisor</option>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Masuk">
                            </fieldset>
                        </form>
<?php include"footer.php" ?>
