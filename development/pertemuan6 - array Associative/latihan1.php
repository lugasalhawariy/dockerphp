<?php  

$mahasiswa = [

	[
		"nama" => "Lugas", 
		"kelas" => "A", 
		"nim" => "1800018023", 
		"email" => "lugas1800018023@webmail.uad.ac.id"
	],

	[
		"nama" => "Aldi", 
		"kelas" => "A", 
		"nim" => "1800018021", 
		"email" => "aldi1800018021@webmail.uad.ac.id"
	],

	[
		"nama" => "Tedi", 
		"kelas" => "A", 
		"nim" => "1800018029", 
		"email" => "tedi1800018029@webmail.uad.ac.id"]
];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>

	<h1>Daftar Array multidimensi</h1>

<?php foreach($mahasiswa as $mhs) : ?>
	<ul>
		<li>Nama : <?php echo $mhs["nama"]; ?></li>
		<li>Kelas : <?php echo $mhs["kelas"]; ?></li>
		<li>NIM : <?php echo $mhs["nim"]; ?></li>
		<li>Email : <?php echo $mhs["email"]; ?></li>
	</ul>
<?php endforeach; ?>

</body>
</html>