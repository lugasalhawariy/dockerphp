<?php
//membangun koneksi ke database
$konek = @mysqli_connect("dockerphp_db_1", "root", "password", "stbi") or die(@mysql_error());
