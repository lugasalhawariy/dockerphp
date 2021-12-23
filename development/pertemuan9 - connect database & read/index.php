<?php  

require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "phpdasar");
$mahasiswa = query("SELECT * FROM mahasiswa");



?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>

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
		<?php foreach($mahasiswa as $mhs) : ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><a href="">Ubah</a>|<a href="">Hapus</a></td>
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