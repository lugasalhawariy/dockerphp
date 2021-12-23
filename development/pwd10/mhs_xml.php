<?php
include "koneksi.php";
header("Content-Type: text/xml");
$query = "SELECT * FROM mahasiswa";
$hasil = mysqli_query($con,$query);
$jumField = mysqli_num_fields($hasil);
echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil))
{
    echo "<mahasiswa>";
    echo "\t"."<nim>",$data['nim'],"</nim>";
    echo "\t"."<nama>",$data['nama'],"</nama>";
    echo "\t"."<jkel>",$data['jkel'],"</jkel>";
    echo "\t"."<alamat>",$data['alamat'],"</alamat>";
    echo "\t"."<tgllhr>",$data['tgllhr'],"</tgllhr>";
    echo "</mahasiswa>";
}
echo "</data>";
?>