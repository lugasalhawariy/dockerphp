<?php
include "function.php";
header("Content-Type: text/xml");
$hasil = query("SELECT * FROM statusku");
echo "<?xml version='1.0'?>";
echo "<data>";
foreach($hasil as $data){
    echo "<mahasiswa>";
    echo "\t"."<nim>",$data['id'],"</nim>";
    echo "\t"."<nama>",$data['argumen'],"</nama>";
    echo "\t"."<jkel>",$data['sumber'],"</jkel>";
    echo "</mahasiswa>";
}
echo "</data>";
?>