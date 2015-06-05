<?php
$server = "tcp:xdsv8dafke.database.windows.net,1433";
$user = "asabri"@xdsv8dafke;
$pwd = "8377394201w$";
$db = "infs3202db";

$conn = sqlsrv_connect($server, array("UID"=>$user, "PWD"=>$pwd, "Database"=>$db));

if($conn === false){
    die(print_r(sqlsrv_errors()));
} else {
	echo "test";
}


?>