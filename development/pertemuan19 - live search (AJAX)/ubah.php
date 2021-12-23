<?php  
session_start();

//JIKA TIDAK ADA SESSION MAKA TIDAK BISA MASUK KE INDEX
if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}
require 'functions.php';

$Id = $_GET['Id'];

$data_ubah = query("SELECT * FROM mahasiswa WHERE Id = $Id")[0];

if(isset($_POST['submit'])){
	if(ubah($_POST) > 0){
		echo "<script>alert('Data Berhasil diUbah!'); document.location.href = 'index.php';</script>";
	}
}else{
	echo "PAGE UBAH DATA!";
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>

	<ul>
		<form method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="Id" value="<?php echo $data_ubah['Id']; ?>">
			<input type="hidden" name="gambarLama" value="<?php echo $data_ubah['gambar']; ?>">
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" value="<?php echo $data_ubah['nama']; ?>">
			</li>
			<li>
				<label for="nim">NIM</label>
				<input type="text" name="nim" id="nim" value="<?php echo $data_ubah['nim']; ?>">
			</li>
			<li>
				<label for="kelas">Kelas</label>
				<input type="text" name="kelas" id="kelas" value="<?php echo $data_ubah['kelas']; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" value="<?php echo $data_ubah['jurusan']; ?>">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $data_ubah['email']; ?>">
			</li>
			<li>
				<label for="gambar">Upload Gambar</label>
				<img src="img/<?php echo $data_ubah['gambar']; ?>" width="50">
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
		</form>
	</ul>

</body>
</html>