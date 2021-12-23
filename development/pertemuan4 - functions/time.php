<?php 

//detik yang sudah berlalu sejak 1 Januari 1970
//disebut UNIX time atau EPOCH time
echo mktime();
echo "<br>";
echo "Tanggal 5 hari kebelakang = ".date("l, d-M-Y", time()-60*60*24*5);
echo "<br><br>";
//ketahui detik sekarang dengan string tanggal
echo strtotime("15 jul 2019");
 ?>