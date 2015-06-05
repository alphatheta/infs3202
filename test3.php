<?php
$server = "tcp:xdsv8dafke.database.windows.net,1433";
$user = "asabri"@xdsv8dafke;
$pwd = "8377394201w$";
$db = "infs3202db";

echo "test1";
try{
    $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(print_r($e));
}
echo "test2";
?>