<?php  
session_start();

//JIKA TIDAK ADA SESSION MAKA TIDAK BISA MASUK KE INDEX
if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}


require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "phpdasar");
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY Id DESC"); //ORDER BY berfungsi sebagai mengurutkan / mengorder

if(isset($_POST['cari'])){
	$mahasiswa = cari($_POST['keyword']);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah data mahasiswa</a>&emsp;&emsp;&emsp;&emsp;<a href="logout.php">Logout</a>
<br>
	<form action="" method="post">
		<input type="text" name="keyword" autofocus autocomplete="off" size="40" placeholder="masukan kata pencarian..." id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
	</form>
<br>
<div id="container">
	<table border="1" cellspacing="0" cellpadding="10" align="center">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nama</th>
			<th>NIM</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Email</th>
			<th>ID</th>
			<th>Gambar</th>
		</tr>
		<?php $i = 1; ?>
		<!-- Membaca FILE database -->
		<?php foreach($mahasiswa as $mhs) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<!-- Mengirim data tidak boleh ada space contoh : hapus.php?Id = .... (tidak bisa / gagal) -->
			<td><a href="ubah.php?Id=<?php echo $mhs['Id']; ?>">Ubah</a>|<a href="hapus.php?Id=<?php echo $mhs['Id']; ?>" onclick="return confirm('Yakin?');">Hapus</a></td> 
			<td><?php echo $mhs['nama']; ?></td>
			<td><?php echo $mhs['nim']; ?></td>
			<td><?php echo $mhs['kelas']; ?></td>
			<td><?php echo $mhs['jurusan']; ?></td>
			<td><?php echo $mhs['email']; ?></td>
			<td><?php echo $mhs['Id']; ?></td>
			<td><img src="img/<?php echo $mhs['gambar']; ?>" width="50px"></td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
</div>
<!-- ambil script javascript untuk melakukan search live -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>