<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Główna</title>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
<?php
    include 'DB_Connection.php';
    include 'buttons.php';

    $SQL1a = 'SELECT * FROM `osoba` WHERE `PESEL` = "75050106651";';

    echo '<br>$SQL1a: '.$SQL1a.'<br>';

    $result = mysql_query($SQL1a);

    $row = mysql_fetch_row($result);

    print_r($row);
?>
    </body>
</html>
