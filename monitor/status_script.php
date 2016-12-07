<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Status of PHP environment</title>";
echo "</head>"
echo "<body>"
echo "<p>";
echo "Opening SQL Lite file..."
echo sqlite_libversion();
echo "<br>";
echo phpversion();
echo "</p>";
echo "</body>";
echo "</html>";
?>