<?php
	$q = $_GET['q'];
	$t = $_GET['t'];
	$server = "tcp:xdsv8dafke.database.windows.net,1433";
	$user = "asabri@xdsv8dafke";
	$pwd = "8377394201w$";
	$db = "infs3202db";
	
	try{
		$conn = new PDO( "sqlsrv:Server= $server; Database = $db", $user, $pwd);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e){
		die(print_r($e));
	}

	$query="INSERT INTO dbo.Comments (place_id, text) VALUES ('$q', '$t')";
	$conn->query($query);

	echo "<li class=\"comments\">" . $t . "</li>";
	
	mysqli_close($conn);
?>