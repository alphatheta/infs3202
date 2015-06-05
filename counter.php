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
		header("Refresh: 2;");
	?>
</body>
</html>