<?php  
session_start();
require 'functions.php';

//JIKA TIDAK ADA SESSION MAKA TIDAK BISA MASUK KE INDEX
if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}

//konfigurasi PAGINATION
$dataPerHalaman = 2;
$banyakData = count(query("SELECT * FROM mahasiswa"));
$banyakHalaman = ceil($banyakData / $dataPerHalaman);
$halamanAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($dataPerHalaman * $halamanAktif) - $dataPerHalaman;

$conn = mysqli_connect("localhost", "root", "", "phpdasar");
//Kunci PAGINATION adalah LIMIT
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY Id DESC LIMIT $awalData, $dataPerHalaman"); //ORDER BY berfungsi sebagai mengurutkan / mengorder

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
		<input type="text" name="keyword" autofocus autocomplete="off" size="40">
		<button type="submit" name="cari">Cari</button>
	</form>
	
<!-- Buat navigation untuk pagination -->

<!-- JIKA HALAMAN AKTIF LEBIH DARI 1, MAKA PANAH KE KIRI MUNCUL DAN PINDAH HALAMAN -->
<?php if($halamanAktif > 1) : ?>
	<a href="?hal=<?php echo $halamanAktif-1; ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $banyakHalaman; $i++) : ?>
	<!-- cek kondisi hanya untuk memberikan style / css -->
	<!-- kirim data dengan metode get -->
	<?php if($i == $halamanAktif) : ?>
		<a href="?hal=<?php echo $i; ?>" style="font-weight: bold; color: red;"><?php echo $i; ?></a>
	<?php else : ?>
		<a href="?hal=<?php echo $i; ?>"><?php echo $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>

<!-- JIKA HALAMAN AKTIF KURANG DARI JUMLAH HALAMAN, MAKA PANAH KE KANAN MUNCUL DAN PINDAH HALAMAN -->
<?php if($halamanAktif < $banyakHalaman) : ?>
	<a href="?hal=<?php echo $halamanAktif+1; ?>">&raquo;</a>
<?php endif; ?>

<br>
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

</body>
</html>