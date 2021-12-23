<?php  


require '../functions.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa WHERE
			nama LIKE '%$keyword%' OR
			nim LIKE '%$keyword%' OR
			kelas LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%'
		";
$mahasiswa = query($query);


?>
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