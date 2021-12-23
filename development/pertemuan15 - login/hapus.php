<?php  

require 'functions.php';

$Id = $_GET['Id'];

if(hapus($Id) > 0){
	echo "<script>alert('Data Berhasil dihapus!'); document.location.href = 'index.php';</script>";
}else{
	echo "<script>alert('Data Gagal dihapus!'); document.location.href = 'index.php';</script>";
}

?>