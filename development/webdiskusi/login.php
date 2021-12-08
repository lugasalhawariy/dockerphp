<!-- Proses PHP -->
<?php  

require 'function.php';
session_start();

// --------------Algoritma--------------

// 1 . Jika ada cookie id dan key, maka proses di dalamnya dijalankan
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    // 1.1. Proses pertama adalah membuat variabel penampung untuk kedua cookie
    $id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

    // 1.2. Query kolom *username dari tabel *user yang memiliki *Id = dari variabel penampung cookie
	$result = mysqli_query($koneksi, "SELECT username FROM user WHERE id_user = '$id'");
    // 1.3. Buat menjadi array assosiative
    $data = mysqli_fetch_assoc($result);

    // 1.4. Jika kunci dari cookie tervalidasi, maka proses di dalamnya dijalankan
	if($key === hash('sha256', $data['username'])){
        // 1.4.1. Proses-nya adalah beri nilai true ke session login
		$_SESSION['login'] = true;
	}
}

// 2. Jika session login bernilai true, maka proses di dalamnya dijalankan
if(isset($_SESSION['login'])){
    // 2.1. User bisa langsung melihat halaman Utama
	header("Location: index.php");
	exit;
}

// 3. Jika ada POST login yang terkirim ke halaman ini, maka proses di dalamnya dijalankan
if(isset($_POST['login'])){
    
    // 3.1. Kita buat 2 variabel penampung untuk POST username dan password yang dikirim
	$username = $_POST['username'];
    $password = $_POST['password'];

    // 3.2. Ambil baris yang *username nya sama dengan POST yang terkirim
	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $blokir = mysqli_query($koneksi, "SELECT * FROM blokir JOIN user ON user.id_user = blokir.id_user WHERE user.username = '$username'");


    // 3.3. Cek apakah username ada atau tidak (mysqli_num_rows adalah fungsi menghitung baris yang sama dengan Query)
    //      Jika ada, maka proses di dalamnya dijalankan
	if(mysqli_num_rows($result) === 1){

        if(mysqli_num_rows($blokir) === 1){

            echo 
                "<script>
                    alert('Akun telah diblokir');
                </script>
                ";
                header("Location: index.php");
                exit;
                
        }

		// 3.3.1. Ambil data dari Query
		$data = mysqli_fetch_assoc($result);
		// 3.3.2. Cek apakah passwordnya benar atau salah, jika benar proses di dalamnya dijalankan
		if(password_verify($password, $data['password'])){
			// 3.3.2.1. Create COOKIE
			setcookie('id', $data['id_user'], time() + 60 * 24);
			setcookie('key', hash('sha256', $data['username']), time() + 60 * 2);

            // 3.3.2.2. Isi session login dengan true
			$_SESSION['login'] = true;
			// 3.3.2.3. Karena benar dan session login bernilai true maka akan menuju ke index
			header("Location: index.php");
			exit;
		}
		
    }
    
    // 3.4. Selain itu jika kondisi di atas tidak terpenuhi semua, maka akan terjadi error
	$error = true;
}


?>

<!-- Akhir dari Proses Login PHP -->




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Web Diskusiku</title>
  </head>
  <body>

    <!-- Harus selalu ada div container agar ada jarak diantara kita -->
    <div class="container">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="#">Diskusiku.com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Premium
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="premium.php">Akses Premium</a>
                <a class="dropdown-item" href="#">Daftar Premium</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Atau sesuatu yang lain</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- Akhir Navbar -->
    </div>
    <!-- akhir dari div container -->

    <!-- Foto Header -->
    <div class="bg">
        <img src="img/bg.jpg" alt="" width="100%" height="328px">
        <!-- <img src="img/bg.jpg" class="img-fluid" alt="Responsive image" width="100%" height="328px"> -->
    </div>
    
    <!-- akhir dari foto header -->

    <!-- Form masuk Login -->
    <div class="container">
    <div class="container">
    <div class="container">
    <div class="container p-3 pt-4 mt-5">
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username">
            <small id="emailHelp" class="form-text text-muted">Username anda tidak kami sebar tanpa seizin anda.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div><br><br>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <a href="daftar.php"><button type="button" class="btn btn-link">Daftar</button></a>
    </form>
    <!-- akhir dari container -->
    </div>
    </div>
    </div>
    </div><br><br><br><br><br><br><br><br>
    <!-- akhir dari form login -->
    
    <!-- Footer -->
    <footer class="border-top p-5">
	
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-1">
				 <a href="index.php"><img src="img/logo_small.png"></a>
			</div>
			<div class="col-4 col-sm-3 text-right">
				<a href=""><img src="img/asset/fb.png"></a>
				<a href=""><img src="img/asset/tweet.png"></a>
				<a href=""><img src="img/asset/ig.png"></a>
			</div>
		</div>

	<div class="row mt-3 justify-content-between">
		<div class="col-sm-5 pt-3">
			<p>All right Reserved by Diskusiku Copyright 2019.</p>
		</div>
		<div class="col-sm-5">
			<nav class="nav justify-content-end">
			  <a class="nav-link active" href="#">Jobs</a>
			  <a class="nav-link" href="#">Developer</a>
			  <a class="nav-link" href="#">Terms</a>
			  <a class="nav-link pr-0" href="#">Privacy Policy</a>
			</nav>
		</div>
	</div>
	</div>

    </footer>
    <!-- akhir dari Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
