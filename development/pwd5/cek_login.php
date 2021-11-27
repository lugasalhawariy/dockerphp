<?php
// kita masukkan file koneksi.php kesini
include "koneksi.php";
// ambil id_user yang masuk
$id_user = $_POST['id_user'];
// data password diamankan dengan md5
$pass = md5($_POST['paswd']);
// ambil data user sesuai input
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
$login = mysqli_query($koneksi, $sql);

$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// jika ketemu data dari input di atas maka next progress.
if ($ketemu > 0) {
    session_start();

    // buat session
    $_SESSION['iduser'] = $r['id_user'];
    $_SESSION['passuser'] = $r['password'];

    // berhasil login.
    echo "USER BERHASIL LOGIN<br>";
    echo "id user =", $_SESSION['iduser'], "<br>";
    echo "password=", $_SESSION['passuser'], "<br>";
    echo "<a href=logout.php><b>LOGOUT</b></a></center>";
} else {
    echo "<center>Login gagal! username & password tidak benar<br>";
    echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
