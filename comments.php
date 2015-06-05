<?php
	$q = $_GET['q'];
	$conn = mysqli_connect('localhost', 'admin', 'password', 'comments');
	
	if (!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	$query="SELECT * FROM `comments`.`Comments` WHERE place_id = '".$q."'";
	$result = mysqli_query($conn, $query);

	echo "<h3>Comments</h3>";

	while($row = mysqli_fetch_array($result)) {
		echo "<li class=\"comments\">" . $row['text'] . "</li>";
	}
	
	mysqli_close($conn);
?>