<?php
session_start();
require_once("../koneksi/koneksi.php");
$nip    = $_POST['nip'];
$pass   = $_POST['password'];
$level    = $_POST['level'];

			$query = mysql_query("SELECT * FROM pegawai WHERE nip='$nip' AND password='$pass'");
					if(mysql_num_rows($query) == 0){
            ?>
            <script type="text/javascript">
                alert("Login Gagal");
                document.location="login-pegawai.php";
            </script>
            <?php
					}else{
						$row = mysql_fetch_array($query);

						if($row['level'] == 1 && $level == 1){
							//kd_bank
							$_SESSION['kd_bank'] = $row['kd_bank'];
							$_SESSION['nip']=$nip;
							$_SESSION['level']='Supervisor';
							header("Location:../pages/spv/index.php");
						}else if($row['level'] == 2 && $level == 2){
							//kd_bank
							$_SESSION['kd_bank'] = $row['kd_bank'];
							$_SESSION['nip']=$nip;
							$_SESSION['level']='Pegawai';
							header("Location:../pages/pegawai/index.php");
						}else{
              ?>
              <script type="text/javascript">
                  alert("Login Gagal");
                  document.location="login-pegawai.php";
              </script>
              <?php
						}
					}
?>
