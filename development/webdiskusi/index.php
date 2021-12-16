<!-- Koneksi dengan PHP -->
<?php

// Algoritma

// 0. JIKA TIDAK ADA SESSION LOGIN MAKA TIDAK BISA MASUK KE INDEX
// 1. jika tidak ada login, maka akan dilemparkan ke header('Location: login.php')
// 2. jika ada maka bisa langsung melihat halaman index

session_start();

// Jika cookie Id sudah habis maka kembali login
if(!isset($_COOKIE['id'])){
    header('Location: logout.php');
	exit;
}

if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}



require 'function.php';
// ambil Query dari tabel statusku
if(isset($_GET['keyword'])){
    $statusku = cari($_GET['keyword']);
}else{
    $statusku = query("SELECT * FROM statusku JOIN user ON user.id_user = statusku.id_user");
}
// ambil Query dari tabel user
$id = $_COOKIE['id'];


// 1.2. Query semua kolom dari tabel *user yang memiliki *Id = dari variabel penampung cookie
// 1.3. Buat menjadi array assosiative
$result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
$data = mysqli_fetch_assoc($result);


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
            <li class="nav-item active">
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


            <!-- Jika sudah login maka menu *login tidak tampil -->
            <?php if(isset($_SESSION['login'])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            
            <?php } ?>
            
            </ul>
            <form class="form-inline my-2 my-lg-0" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
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
    </div>
    
    <div class="container p-3 mt-5">

    <!-- Jika ada session login maka bisa buat status, jika tidak ya tidak! -->
    <?php if(isset($_SESSION['login'])) : ?>
        
    <form method="POST" action="tambah_status.php">
        
        <input type="hidden" name="id_user" id="id_user" value=" <?php echo $data['id_user']; ?>">
        <div class="form-row">
            <div class="col-8">
                <input type="text" class="form-control" placeholder="Buat Argumen baru" name="argumen">
            </div>&emsp;&emsp;&emsp;
            <div class="col">
                <input type="text" class="form-control" placeholder="Referensi" name="sumber">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
            </div>
        </div> 
    </form>
    <br><br><br><br>
    <?php endif; ?>

    <!-- lakukan PERULANGAN untuk menampilkan data tabel statusku -->
    <?php foreach ($statusku as $status) : ?>

    <div class="row">
        <div class="col-small-md-2">
            <!-- kolom pertama menampilkan foto profile -->
            <img src="img/user/<?php echo $status['foto']; ?>" alt="Foto Profile" class="img-thumbnail" width="80px">
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <?php echo $status['nama_depan']; ?><?php echo " " . $status['nama_belakang']; ?>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <p><?php echo $status['argumen']; ?></p>
                    <footer class="blockquote-footer"><?php echo $status['sumber']; ?> <cite title="Source Title">diskusi</cite></footer>
                    </blockquote>
                </div>
            
                <?php if($status['id_user'] === $id) : ?>
                <a href="delete.php?id_status=<?php echo $status['id_status']; ?>" onclick="return confirm('Yakin?');">
                    <div class="col p-3">
                    <button type="button" class="btn btn-outline-danger"><img src="img/hapus.png" alt="" width="30px"></button>
                    </div>
                </a>
                <?php endif; ?>
            </div>
        </div>

    <!-- akhir dari baris -->
    </div>


    <?php endforeach; ?>
    <!-- akhir dari container -->
    </div>
    
    <!-- akhir foto header -->

    
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