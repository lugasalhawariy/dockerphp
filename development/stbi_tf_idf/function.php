<?php


class TFIDF
{
    public $koneksi;
    public function __construct()
    {
        $this->koneksi = @mysqli_connect("dockerphp_db_1","root","password","algoritma_stbi");
    }

    public function query($logic){
        // buat query dari logic parameter fungsi
        $result = @mysqli_query($this->koneksi, $logic);
        // array penampung
        $rows = [];
        // mysqli_fetch_assoc (mengembalikan array berupa nama dari si array dan bukan lagi angka)
        while( $row = @mysqli_fetch_assoc($result)  ) {
            $rows[] = $row;
        }

        // mengembalikan nilai array yang sudah dibuat associative array.
        return $rows;
    }

    public function query_array($logic){
        // buat query dari logic parameter fungsi
        $result = @mysqli_query($this->koneksi, $logic);
        // array penampung
        $rows = [];
        // mysqli_fetch_assoc (mengembalikan array berupa nama dari si array dan bukan lagi angka)
        while( $row = @mysqli_fetch_array($result)  ) {
            $rows[] = $row;
        }

        // mengembalikan nilai array yang sudah dibuat array
        return $rows;
    }

    public function addDocument($data){
        $judul = htmlspecialchars($data['judul']);
        $isi = htmlspecialchars($data['isi']);
        mysqli_query($this->koneksi, "INSERT INTO dokumen VALUES (null, '$judul', '$isi')");
        return mysqli_affected_rows($this->koneksi);
    }

    public function stemming(){
        // ambil semua isi dari dokumen (menghasilkan array)
        $words = $this->query("SELECT isi FROM dokumen");
        $penampung = [];
        foreach($words as $word){
            $penampung = array_push($word['isi']);
        }
        return print_r($penampung);
    }
}