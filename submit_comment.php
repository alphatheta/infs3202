<?php
	$conn = mysqli_connect('localhost', 'admin', 'password', 'myrestaurant');

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$images = mysqli_real_escape_string($conn, $_POST['images']);
	$lat = mysqli_real_escape_string($conn, $_POST['latitude']);
	$long = mysqli_real_escape_string($conn, $_POST['longitude']);
	$desc = mysqli_real_escape_string($conn, $_POST['description']);
	
	$query = "INSERT INTO `myrestaurant`.`Restaurants` (`id`, `name`, `location`, `contact`, `url`, `latitude`, `longitude`, `description`) VALUES (NULL, '$name', '$address', '$phone', '$images', '$lat', '$long', '$desc')";

	mysqli_query($conn, $query);
	mysqli_close($conn);
	header('location: admin.php'); 
?>