<?php
require_once "koneksi.php";

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$sql="select * from mahasiswa where nim like'%".$cari."%'";
	$query = mysqli_query($koneksi,$sql);
}else{
	$sql="select * from mahasiswa";
	$query = mysqli_query($koneksi,$sql);
}
	while ($row = mysqli_fetch_assoc($query)) {
		$data[] = $row;
	}
	header('content-type: application/json'); 
	echo json_encode($data);
mysqli_close($koneksi);
?>
