<?php  
session_start();

//JIKA TIDAK ADA SESSION MAKA TIDAK BISA MASUK KE INDEX
if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}
require 'function.php';

if(isset($_POST['submit'])){
	
	if(tambah_status($_POST) > 0){

		echo "<script>alert('Data Berhasil ditambahkan!'); document.location.href = 'index.php';</script>";
	}
}else{
	echo "ISI DATA SESUAI DENGAN DATADIRI!";
}

?>