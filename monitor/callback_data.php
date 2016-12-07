<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Aquiring callback from data callbacks</title>";
echo "</head>"
echo "<body>"
echo "<p>";
echo "Parsing data from device..."

$done = False   
if(isset($_POST['data']) && (strlen($_POST['data']) == 16) {
     $my_time = str_split($_POST['data'],12);
     $my_seconds = str_split($_POST['data'],4);
     $SaidTimeShort = hexdec($my_time[0]);
     $number_ms = hexdec($my_seconds[3]);
     $SaidTimeFull = var_dump("$SaidTimeShort;.$number_ms;");
     $ReceptionTimeShort = $_SERVER['REQUEST_TIME'];
     $ReceptionTimeFull = $_SERVER['REQUEST_TIME_FLOAT'];
     $Viewed_delta = $ReceptionTimeFull - $SaidTimeFull;
     $done = True;
}

if (!$done) die ("No valid data field");

echo "Done !"
echo "</p><p>";
echo "Parsing sequence number..."

$done= False;
if(isset($_POST['sequence'])) {
	$sequence = var_dump($_POST['sequence'])
	$done = True
}

if (!$done) die ("No valid sequence number");

echo "Done !"
echo "</p><p>";
echo "Cleaning variables prior storing..."

$dbhandle = sqlite_open('db/datacallbacks.db', 0666, $error);

if (!$dbhandle) die ($error);

$ReceptionTimeShort_clean = sqlite_escape_string(ReceptionTimeShort);
$ReceptionTimeFull_clean = sqlite_escape_string(ReceptionTimeFull);
$SaidTimeShort_clean = sqlite_escape_string(SaidTimeShort);
$SaidTimeFull_clean = sqlite_escape_string(SaidTimeFull);
$Sequence_clean = sqlite_escape_string(Sequence);
$Viewed_delta = ReceptionTimeFull - SaidTimeFull;
$stm1 = "INSERT INTO DataCallbacks VALUES($ReceptionTimeShort_clean, $ReceptionTimeFull_clean, $SaidTimeShort_clean, $SaidTimeFull_clean, $Sequence_clean, $Viewed_delta)";

echo "Done !"
echo "</p><p>";
echo "Storing values..."

$ok1 = sqlite_exec($dbhandle, $stm1);
if (!$ok1) die("Cannot execute statement.");

echo "Done !"
echo "</p><p>";
echo "Closing database..."

sqlite_close($dbhandle);

echo "Data inserted successfully";
echo "<br></p>";
echo "</body>";
echo "</html>";

?>