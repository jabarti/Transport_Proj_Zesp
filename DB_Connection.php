<?php
$dbhost = "localhost";
$dbuser	= "user";
$dbpass	= "haslo";
$dbname	= "APiPO";
mysql_connect($dbhost,$dbuser,$dbpass) or die('Connection failed!');
mysql_select_db($dbname)or die('Seletion failed!');
?>