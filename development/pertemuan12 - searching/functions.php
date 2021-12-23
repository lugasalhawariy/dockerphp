<?php  


$koneksi = mysqli_connect("localhost","root","","phpdasar");

function query($query){
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
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
function ubah($data){
	global $koneksi;

	$Id = $data['Id'];
	$nama = htmlspecialchars($data['nama']);
	$nim = htmlspecialchars($data['nim']);
	$kelas = htmlspecialchars($data['kelas']);
	$jurusan = htmlspecialchars($data['jurusan']);
	$email = htmlspecialchars($data['email']);
	$gambar = htmlspecialchars($data['gambar']);

	$result = 

		"UPDATE mahasiswa SET
			nama = '$nama',
			nim = '$nim',
			kelas = '$kelas',
			jurusan = '$jurusan',
			email = '$email',
			gambar = '$gambar'
		WHERE Id = $Id;
		";

	mysqli_query($koneksi, $result);

	return mysqli_affected_rows($koneksi);
}
function cari($keyword){
	global $koneksi;

	$query = 

		"SELECT * FROM mahasiswa WHERE
			nama LIKE '%$keyword%' OR
			nim LIKE '%$keyword%' OR
			kelas LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%'
		";

	return query($query);
}









?>