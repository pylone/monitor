<?php
   
$dbhandle = sqlite_open('db/datacallbacks.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$query = "SELECT ReceptionTimeShort, ReceptionTimeFull, SaidTimeShort, SaidTimeFull, Sequence, Viewed_delta FROM DataCallbacks ORDER BY Id DESC LIMIT 1";

$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
$last_delay = var_dump($row['Viewed_delta']);
$last_request = var_dump($row['ReceptionTimeFull']);
$current_age = var_dump($_SERVER['REQUEST_TIME_FLOAT']) - $last_request;
echo("
	{
		[\"last_reception\" : \"$last_request\", \"last_delay\" : \"$last_delay\", \"age\" : \"$current_age\"]
	}");

sqlite_close($dbhandle);

?>