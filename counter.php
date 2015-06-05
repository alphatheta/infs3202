<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<title>Page Visit Counter</title>
</head>
<body>
	<?php
		$count_my_page = ("counter.txt");
		$hits = file($count_my_page);
		$hits[0] ++;
		$fp = fopen($count_my_page , "w");
		fputs($fp , "$hits[0]");
		fclose($fp);
		echo "<h1> Total number of visits: ".$hits[0]."</h1>";
		header("Refresh: 2;");
	?>
	<h2>This page auto-refreshes every 2 seconds</h2>
</body>
</html>