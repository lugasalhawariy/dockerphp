<?php  


$mahasiswa = ["Lugas", "A", "1800018023", "lugas1800018023@webmail.uad.ac.id"];

$mahasiswa2 = [

	["Lugas", "A", "1800018023", "lugas1800018023@webmail.uad.ac.id"],
	["Aldi", "A", "1800018021", "aldi1800018021@webmail.uad.ac.id"],
	["Tedi", "A", "1800018029", "tedi1800018029@webmail.uad.ac.id"]
];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>

	<h1>Daftar Mahasiswa</h1>

	<ul>
		<?php foreach($mahasiswa as $mhs) : ?>
			<li><?php echo $mhs; ?></li>
		<?php endforeach; ?>
	</ul>

	<h1>Daftar Array multidimensi</h1>

<?php foreach($mahasiswa2 as $mhs) : ?>
	<ul>
		<li>Nama : <?php echo $mhs[0]; ?></li>
		<li>Kelas : <?php echo $mhs[1]; ?></li>
		<li>NIM : <?php echo $mhs[2]; ?></li>
		<li>Email : <?php echo $mhs[3]; ?></li>
	</ul>
<?php endforeach; ?>

</body>
</html>