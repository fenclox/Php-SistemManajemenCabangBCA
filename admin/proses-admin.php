<?php
session_start();
require_once("../koneksi/koneksi.php");
$user = $_POST['username'];
$pass = $_POST['password'];
$cekuser = mysql_query("SELECT username,password as 'pass' from admin WHERE username = '$user'");
$hasil = mysql_fetch_array($cekuser);
if($hasil['pass'] == $pass) {

    $_SESSION['username'] = $hasil['username'];
    header('location:../pages/admin/index.php');

} else {
    ?>
    <script type="text/javascript">
        alert("Login Gagal");
        document.location="index.php";
    </script>
<?php
}
?>