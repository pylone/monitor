<?php
   
$dbhandle = sqlite_open('db/datacallbacks.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$query = "SELECT ReceptionTimeShort, ReceptionTimeFull, SaidTimeShort, SaidTimeFull, Sequence, Viewed_delta FROM DataCallbacks ORDER BY Id DESC LIMIT 1";

$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
$last_request = $row['ReceptionTimeFull'];
$enlapsed_time = $_SERVER['REQUEST_TIME_FLOAT'] - var_dump($last_request);
echo($enlapsed_time);

sqlite_close($dbhandle);

?>