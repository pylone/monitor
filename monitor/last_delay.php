<?php
   
$dbhandle = sqlite_open('db/datacallbacks.db', 0666, $error);

if (!$dbhandle) die ($error);
    
$query = "SELECT ReceptionTimeShort, ReceptionTimeFull, SaidTimeShort, SaidTimeFull, Sequence, Viewed_delta FROM DataCallbacks ORDER BY Id DESC LIMIT 1";

$result = sqlite_query($dbhandle, $query);
if (!$result) die("Cannot execute query.");

$row = sqlite_fetch_array($result, SQLITE_ASSOC); 
$last_delay = var_dump($row['Viewed_delta']);
echo($last_delay);

sqlite_close($dbhandle);

?>