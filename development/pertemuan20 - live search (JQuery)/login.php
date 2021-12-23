<?php  

require 'functions.php';
session_start();

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($koneksi, "SELECT username FROM user WHERE Id = '$id'");
	$data = mysqli_fetch_assoc($result);

	if($key === hash('sha256', $data['username'])){
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION['login'])){
	header("Location: index.php");
	exit;
}

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
			//Create SESSION
			setcookie('id', $data['Id'], time() + 60 * 2);
			setcookie('key', hash('sha256', $data['username']), time() + 60 * 2);

			$_SESSION['login'] = true;
			//jika benar maka akan menuju ke index
			header("Location: index.php");
			exit;
		}
		
	}

	$error = true;
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Web Lugas</title>
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
			<input type="checkbox" name="remember">
			<label for="remember">Remember me</label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	</form>

</body>
</html>