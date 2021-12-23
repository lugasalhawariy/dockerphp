<?php  

require 'functions.php';

if(isset($_POST['submit'])){
	if(tambah($_POST) > 0){
		echo "<script>alert('Data Berhasil ditambahkan!'); document.location.href = 'index.php';</script>";
	}
}else{
	echo "ISI DATA SESUAI DENGAN DATADIRI!";
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>

	<ul>
		<form method="post" action="">
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="nim">NIM</label>
				<input type="text" name="nim" id="nim">
			</li>
			<li>
				<label for="kelas">Kelas</label>
				<input type="text" name="kelas" id="kelas">
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="gambar">Gambar</label>
				<input type="text" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Submit</button>
			</li>
		</form>
	</ul>

</body>
</html>