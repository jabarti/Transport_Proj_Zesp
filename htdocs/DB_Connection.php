﻿<?php
$dbhost = "";
$dbuser	= "";
$dbpass	= "";
$dbname	= "APIPO";

if (PHP_VERSION_ID<50500)
{
    echo "<br>Wersja PHP: ".PHP_VERSION. " < 5.50";
    $DBConn = mysql_connect($dbhost,$dbuser,$dbpass) or die('Connection failed!');
    mysql_select_db($dbname) or die('<br>Selection failed!');
    echo "<br>Connection to ".$dbname." established";
}else{
    echo "<br>Wersja PHP: ".PHP_VERSION. " >= 5.50";
    $DBConn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('<br>Selection failed!');
    echo "<br>Connection to ".$dbname." established";
}
?>