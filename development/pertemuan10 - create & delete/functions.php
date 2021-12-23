<?php  


$koneksi = @mysqli_connect("dockerphp_db_1","root","password","phpdasar");

function query($query){
	global $koneksi;
	$result = @mysqli_query($koneksi, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
function tambah($data){
	global $koneksi;

	$nama = htmlspecialchars($data['nama']);
	$nim = htmlspecialchars($data['nim']);
	$kelas = htmlspecialchars($data['kelas']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$email = htmlspecialchars($data['email']);
	$gambar = htmlspecialchars($data['gambar']);

	$result = "INSERT INTO mahasiswa VALUES('','$nama', '$nim', '$kelas', '$jurusan', '$email', '$gambar')";

	mysqli_query($koneksi, $result);

	return mysqli_affected_rows($koneksi);
}
function hapus($Id){
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE Id=$Id");
	return mysqli_affected_rows($koneksi);
}









?>