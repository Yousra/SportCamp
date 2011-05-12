<?php
$host="localhost";
$dbh=mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("phplogin") or die('I cannot select the database because: ' . mysql_error());
?>