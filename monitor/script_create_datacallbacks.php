<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Database creation for Data Callbacks</title>";
echo "</head>"
echo "<body>"
echo "<p>";
echo "Opening SQL Lite file..."
$dbhandle = sqlite_open('db/datacallbacks.db', 0666, $error);
if (!$dbhandle) die ($error);
echo "Done !"
echo "</p><p>";
echo "Sending SQL statement..."
$stm = "CREATE TABLE DataCallbacks(Id integer PRIMARY KEY," . 
       "ReceptionTimeShort ReceptionTimeFull SaidTimeShort SaidTimeFull Sequence Viewed_delta NOT NULL)";
$ok = sqlite_exec($dbhandle, $stm, $error);

if (!$ok)
   die("Cannot execute query. $error");

echo "Database DataCallbacks created successfully";
echo "</p><p>";
echo "Closing SQL Lite database..."
sqlite_close($dbhandle);
echo "Done !"
echo "<br></p>";
echo "</body>";
echo "</html>";
?>