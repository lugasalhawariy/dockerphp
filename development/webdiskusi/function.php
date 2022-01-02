<?php  


$koneksi = @mysqli_connect("dockerphp_db_1","root","lugasdev","webdiskusi");


//1. QUERY
function query($query){
	global $koneksi;
	$result = @mysqli_query($koneksi, $query);
	$rows = [];

	while ($row = @mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

//2. REGISTRASI
function registrasi($data){

	global $koneksi;

	// merubah string menjadi huruf kecil semua
	$username = strtolower(stripcslashes($data['username']));
	// agar data yang masuk benar-benar string
	$password = mysqli_real_escape_string($koneksi, $data['password']);
	// agar tidak ada tag html
	$nama_depan = htmlspecialchars($data['nama_depan']);
	$nama_belakang = htmlspecialchars($data['nama_belakang']);
	$foto = upload_user();
	//variabel penampung data input foto
	if(!$foto){
		return false;
	}
	
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

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//insert ke database
	mysqli_query($koneksi, "INSERT INTO user VALUES(null, '$nama_depan', '$nama_belakang', '$username', '$password', '$foto')");
	return mysqli_affected_rows($koneksi);
}

//3. UPLOAD FILE
function upload_user(){
	
	$nama = $_FILES['foto']['name'];
	$error = $_FILES['foto']['error'];
	$tempat = $_FILES['foto']['tmp_name'];
	$ukuran = $_FILES['foto']['size'];

	// Jika error sudah 4 maka gambar belum dipilih
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
	$folder = "img/user/";
	if(!file_exists($folder)){
		mkdir($folder);
	}
	//membuat nama baru
	$nama_baru = uniqid();
	$nama_baru .= '.';
	$nama_baru .= $ekstensiGambar;

	move_uploaded_file($tempat , 'img/user/'.$nama_baru);
	return $nama_baru;

}

// 4. TAMBAH STATUS
function tambah_status($data){

	$status = htmlspecialchars($data['argumen']);
	$sumber = htmlspecialchars($data['sumber']);
	$id_user = $data['id_user'];

	global $koneksi;
	//insert ke database
	mysqli_query($koneksi, "INSERT INTO statusku VALUES(null, '$id_user', '$status', '$sumber')");
	return mysqli_affected_rows($koneksi);
}

// 5. UPDATE PROFILE
function update($data){
	global $koneksi;

	$Id = $data['id_user'];
	$nama_depan = htmlspecialchars($data['nama_depan']);
	$nama_belakang = htmlspecialchars($data['nama_belakang']);
	$FotoLama = $data['FotoLama'];
	
	if($_FILES['foto']['error'] === 4){
		$foto = $FotoLama;
	}else{
		$foto = upload_user();
	}
	

	$result = 

		"UPDATE user SET
			nama_depan = '$nama_depan',
			nama_belakang = '$nama_belakang',
			foto = '$foto'
		WHERE id_user = $Id;
		";

	mysqli_query($koneksi, $result);

	return mysqli_affected_rows($koneksi);
}

// 6. DELETE STATUS
function hapus($Id){
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM statusku WHERE id_status=$Id");
	return mysqli_affected_rows($koneksi);
}

// 7. CARI DATA
function cari($keyword){
	global $koneksi;

	$query = 

		"SELECT * FROM statusku JOIN user ON user.id_user = statusku.id_user WHERE
			argumen LIKE '%$keyword%' OR
			sumber LIKE '%$keyword%'
		";

	// return $query;
	return query($query);
}

