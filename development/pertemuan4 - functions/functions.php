<?php  

function salam($nama, $waktu){

	echo "Selamat $waktu, $nama";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
</head>
<body>

	<form method="post">
		nama: <input type="text" name="nama">
		<button type="submit">Submit</button>
	</form>

	<?php if(!empty($_POST['nama'])) : ?>

	<h1><?php echo salam($_POST['nama'], "pagi"); ?></h1>

	<?php else: ?>

	<h1>Masukan nama terlebih dahulu!</h1>

<?php endif; ?>

</body>
</html>