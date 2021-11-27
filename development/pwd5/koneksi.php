<?php
	// kita buat terlebih dahulu aturan koneksinya.
	$host="dockerphp_db_1"; //nama docker container database yang dibuat
	$username="root";
	$password="";
	$databasename="akademik";
	// lalu kita panggil fingsi mysqli_connect sesuai dokumentasi php
	$koneksi=@mysqli_connect($host,$username,$password,$databasename);
	// jika koneksi berhasil maka selesai, jika tidak akan error.
	if (!$koneksi) {
	echo "Error: " . @mysqli_connect_error(); exit();
	}
?>
