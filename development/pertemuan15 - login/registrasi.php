<?php  

require 'functions.php';

if(isset($_POST['registrasi'])){

	if(registrasi($_POST) > 0){
		echo 
			"<script>
				alert('User berhasil ditambahkan');
			</script>
			";
	}else{
		echo mysqli_error($koneksi);
	}
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
	<style>
		
		label{
			display: block;
		}

	</style>
</head>
<body>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">username</label>
			<input type="text" name="username">
		</li>
		<li>
			<label for="password">password</label>
			<input type="password" name="password">
		</li>
		<li>
			<label for="konfirmasi">Konfirmasi</label>
			<input type="password" name="konfirmasi">
		</li>
		<li>
			<label for="password">password</label>
			<button type="submit" name="registrasi">Registrasi</button>
		</li>
	</ul>
</form>

</body>
</html>