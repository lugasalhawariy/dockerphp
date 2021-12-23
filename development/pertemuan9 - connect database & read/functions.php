<?php  


$koneksi = mysqli_connect("dockerphp_db_1","root","password","phpdasar");

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}










?>