<?php
	$host="dockerphp_db_1";
	$username="root";
	$password="password";
	$databasename="akademik";
	$koneksi=@mysqli_connect($host,$username,$password,$databasename);
	
	if (!$koneksi) {
	echo "Error: " . mysqli_connect_error(); exit();
	}
	
?>
