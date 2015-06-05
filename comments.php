<?php
	$q = $_GET['q'];
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

	$query="SELECT * FROM dbo.Comments WHERE place_id = '".$q."'";
	$result = $conn->query($query);

	echo "<h3>Comments</h3>";

	while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo "<li class=\"comments\">" . $row['text'] . "</li>";
	}
	
	$conn = null;
?>