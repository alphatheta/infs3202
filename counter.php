<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<title>Page Visit Counter</title>
</head>
<body>
	<h1>This page refreshes every 2 seconds!</h1>
	<?php
		$count_my_page = ("counter.txt");
		$hits = file($count_my_page);
		$hits[0] ++;
		$fp = fopen($count_my_page , "w");
		fputs($fp , "$hits[0]");
		fclose($fp);
		echo $hits[0];
		header("Refresh: 2;");
	?>
</body>
</html>