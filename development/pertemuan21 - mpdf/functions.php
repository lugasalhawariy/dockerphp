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
	
	//PROSES PENGECEKAN FILE
	$gambar = upload();
	if(!$gambar){
		return false;
	}

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
	$gambarLama = htmlspecialchars($data['gambarLama']);
	
	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarLama;
	}else{
		$gambar = upload();
	}
	

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
function upload(){
	
	$nama = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tempat = $_FILES['gambar']['tmp_name'];
	$ukuran = $_FILES['gambar']['size'];

	if($error === 4){
		echo 
			"<script>
				alert('Pilih Gambar terlebih dahulu!');
			</script>
			";
		return false;
	}

	//CEK APAKAH YANG DI-UPLOAD ADALAH GAMBAR


	//pertama - buat dulu ekstensi apa saja yang boleh diupload (buat dgn array)
	$jerami = ['png','jpg','jpeg'];
	//lalu ambil ekstensi dari nama file dgn menggunakan explode
	$ekstensiGambar = explode('.', $nama);
	$ekstensiGambar = end($ekstensiGambar);
	$ekstensiGambar = strtolower($ekstensiGambar);

	//cek menggunakan in_array untuk mencari apakah variabel tersebut ada di array
	if(!in_array($ekstensiGambar, $jerami)){
		echo 
			"<script>
				alert('Hanya Gambar yang boleh di-upload!');
			</script>
			";
		return false;
	}

	//CEK APAKAH UKURAN TERLALU BESAR
	if($ukuran > 3000000){
		echo 
			"<script>
				alert('Ukuran File terlalu besar!');
			</script>
			";
		return false;
	}

	//CEK APAKAH FOLDER IMG ADA ATAU TIDAK
	//JIKA TIDAK ADA MAKA DIBUAT BARU
	$folder = "img/";
	if(!file_exists($folder)){
		mkdir($folder);
	}
	//membuat nama baru
	$nama_baru = uniqid();
	$nama_baru .= '.';
	$nama_baru .= $ekstensiGambar;

	move_uploaded_file($tempat, 'img/'.$nama_baru);
	return $nama_baru;

}
function registrasi($data){

	global $koneksi;

	$username = strtolower(stripcslashes($data['username']));
	$password = mysqli_real_escape_string($koneksi, $data['password']);
	$konfirmasi = mysqli_real_escape_string($koneksi, $data['konfirmasi']);

	//cek apakah username sudah ada atau belum di database
	$cekUsername = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($cekUsername)){
		//jika ada maka kondisi ini akan bernilai benar dan akan dihentikan
		echo 
			"<script>
				alert('Username sudah terpakai');
			</script>
			";
		return false;
	}

	//cek konfirmasi password
	if($password !== $konfirmasi){
		echo 
			"<script>
				alert('Konfirmasi salah!');
			</script>
			";
		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//insert ke database
	mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')");
	return mysqli_affected_rows($koneksi);
}








?>