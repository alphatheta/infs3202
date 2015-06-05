<?php
	$q = $_GET['q'];
	$conn = mysqli_connect('xdsv8dafke.database.windows.net,1433', 'asabri', '8377394201w$', 'infs3202db');
	
	if (!$conn) {
		die('Could not connect:gtestest ' . mysqli_error($conn));
	}

	$query="SELECT * FROM `dbo`.`Comments` WHERE place_id = '".$q."'";
	$result = mysqli_query($conn, $query);

	echo "<h3>Comments</h3>";

	while($row = mysqli_fetch_array($result)) {
		echo "<li class=\"comments\">" . $row['text'] . "</li>";
	}
	
	mysqli_close($conn);
?>