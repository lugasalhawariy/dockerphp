<?php  

//array adalah variabel yang dapat memiliki banyak nilai

$hari = array("Senin", "Selasa", "Rabu", "Kamis"); // Cara lama

$bulan = ["Januari", "Februari", "Maret"]; //Cara baru

//Cara menampilkan array ada 2 : var_dump($variabel) / print_r($variabel);

var_dump($hari); echo "<br><br>";

//Cara menambahkan nilai array

$hari[] = "Jum'at";

print_r($hari);

