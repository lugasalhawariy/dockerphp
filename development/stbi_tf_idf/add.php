<?php
require 'function.php';
$return = new TFIDF;

if(isset($_POST['submit'])){
    if($return->addDocument($_POST) > 0){
        setcookie('add_dokumen', $_POST['judul'], time() + 10);
        header("Location: index.php");
    }
}else {
    echo "ISI DATA SESUAI DENGAN DATADIRI!";
}