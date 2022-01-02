<!-- PROSES PHP -->
<?php  

require 'function.php';

session_start();


if(isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}

// 1. Jika ada POST registrasi yang terkirim, maka proses di dalamnya dijalankan
if(isset($_POST['registrasi'])){

    // 1.1. Proses pertama adalah validasi. Jika proses dari Functions registrasi berhasil atau > 0
	if(registrasi($_POST) > 0){
        // 1.1.1. Akan menampilkan JavaScript berhasil
		echo 
			"<script>
				alert('User berhasil ditambahkan');
			</script>
			";
	}else{
        // 1.1.2. Jika salah maka akan menampikan Error
		echo mysqli_error($koneksi);
	}
}
// Akhir Proses PHP
?>


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
            <li class="nav-item">
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
    <div class="container p-3 pt-4 mt-5">
    <form method="POST" action="" enctype="multipart/form-data">
        
        <div class="form-row pb-2">
            <div class="col">
            <input type="text" class="form-control" placeholder="First name" name="nama_depan">
            </div>
            <div class="col">
            <input type="text" class="form-control" placeholder="Last name" name="nama_belakang">
            </div>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username">
            <small id="emailHelp" class="form-text text-muted">Username anda tidak kami sebar sembarangan</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>

        <!-- upload foto -->
        <div class="row">
            <div class="form-group col p-3">
                <label for="foto">Masukan foto Anda</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Check me out</label>
        </div><br><br>
        <button type="submit" class="btn btn-primary" name="registrasi">Daftar</button>
    </form>
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
