<?php  

require 'functions.php';

if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

	//cek apakah username ada atau tidak
	if(mysqli_num_rows($result) === 1){

		//ambil data dari query
		$data = mysqli_fetch_assoc($result);
		//cek apakah passwordnya benar atau salah
		if(password_verify($password, $data['password'])){
			//jika benar maka akan menuju ke index
			header("Location: index.php");
			exit;
		}
		
	}
	//jika salah maka akan dibuat variabel error
	$error = true;
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
	<h1>Halaman Login</h1>

	<?php if(isset($error)) : ?>
		<p style="color: red; font-style: italic">Username / Password salah!</p>
	<?php endif; ?>

	<form method="post" action="">
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
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	</form>

</body>
</html>