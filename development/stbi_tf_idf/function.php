<?php

$koneksi = @mysqli_connect("dockerphp_db_1","root","password","algoritma_stbi");

function query($logic){
    global $koneksi;

    // buat query dari logic parameter fungsi
    $result = @mysqli_query($koneksi, $logic);
    // array penampung
    $rows = [];
    // mysqli_fetch_assoc (mengembalikan array berupa nama dari si array dan bukan lagi angka)
    while( $row = @mysqli_fetch_assoc($result)  ) {
        $rows[] = $row;
    }

    // mengembalikan nilai array yang sudah dibuat associative array.
    return $rows;
}

function addDocument(){
    
}