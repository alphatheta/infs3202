<?php
	$q = $_GET['q'];
	$t = $_GET['t'];
	$conn = mysqli_connect('tcp:xdsv8dafke.database.windows.net,1433', 'asabri', '8377394201w$', 'dbo');
	
	if (!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	$query="INSERT INTO dbo.Comments (place_id, text) VALUES ('$q', '$t')";
	mysqli_query($conn, $query);

	echo "<li class=\"comments\">" . $t . "</li>";
	
	mysqli_close($conn);
?>