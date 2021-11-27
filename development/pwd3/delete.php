<?php
include_once("koneksi.php");

// Get id from URL to delete that user
$nim = @$_GET['nim'];

// Delete user row from table based on given id
$result = @mysqli_query($con, "DELETE FROM user WHERE nim=’$nim’");

header("Location:index.php");
?>
