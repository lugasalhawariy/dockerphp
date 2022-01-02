<?php

include "function.php";
$hasil = query("SELECT * FROM statusku");
$response = ['data' => $hasil];
echo json_encode($response);
?>