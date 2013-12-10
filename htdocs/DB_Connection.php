<?php
$dbhost = "localhost";
$dbuser	= "user";
$dbpass	= "haslo";
$dbname	= "APiPO";

if (PHP_VERSION_ID<50500)
{
    echo "<br>Wersja PHP: ".PHP_VERSION. " < 5.50";
    mysql_connect($dbhost,$dbuser,$dbpass) or die('Connection failed!');
    mysql_select_db($dbname) or die('<br>Selection failed!');
    echo "<br>Connection to ".$dbname." established";
}else{
    echo "<br>Wersja PHP: ".PHP_VERSION. " >= 5.50";
    mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('<br>Selection failed!');
    echo "<br>Connection to ".$dbname." established";
}
?>