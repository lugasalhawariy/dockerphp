<?php
require 'function.php';

if(isset($_POST['submit'])){
    if(addDocument($_POST) > 0){
        setcookie('add_dokumen', $_POST['judul'], time() + 60);
    }
}else {
    echo "ISI DATA SESUAI DENGAN DATADIRI!";
}