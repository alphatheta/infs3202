<?php
	$q = $_GET['q'];
	$t = $_GET['t'];
	$conn = mysqli_connect('localhost', 'admin', 'password', 'comments');
	
	if (!$conn) {
		die('Could not connect: ' . mysqli_error($conn));
	}

	$query="INSERT INTO `comments`.`Comments` (`id`, `place_id`, `text`) VALUES (NULL, '$q', '$t')";
	mysqli_query($conn, $query);

	echo "<li class=\"comments\">" . $t . "</li>";
	
	mysqli_close($conn);
?>