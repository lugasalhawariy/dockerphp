<?php  

$jumlah = [12, 21, 33, 43, 50];

?>




<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.kotak{
			width: 50px;
			height: 50px;
			background-color: lightblue;

			display: inline-block;
			line-height: 50px;
			text-align: center;
			margin-top: 5px;
		}
		.clear{
			clear: both;
		}
	</style>
	<title>Web Lugas</title>
</head>
<body>

	<?php for($i = 0; $i < count($jumlah); $i++) : ?>

		<div class="kotak"><?php echo $jumlah[$i]; ?></div>
	<?php endfor; ?>

	<div class="clear"></div>

<!-- PAKAI Foreach() -->

	<?php foreach ($jumlah as $tempat) : ?>
		<div class="kotak"><?php echo $tempat; ?></div>
	<?php endforeach; ?>


</body>
</html>