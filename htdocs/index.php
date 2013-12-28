<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Główna</title>
        <link rel="shortcut icon" href="../files/pictures/favicon_no_euro.ico" type="image/x-icon"/>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="Stylesheet" type="text/css" href="Styles/style.css" />
    </head>
    <body>
<?php
    ob_start();
    require_once("common.inc.php");
    echo STYLES_PATH.DIRECTORY_SEPARATOR.'style.css'.'<br>';
    echo CLASSES_PATH.DIRECTORY_SEPARATOR.'osoba.class.php';
    //include CLASSES_PATH.DIRECTORY_SEPARATOR.'osoba.class.php';
    //InitPage();
    
    include 'DB_Connection.php';
    include 'buttons.php';
 

    $SQL1a = 'SELECT * FROM `osoba` WHERE `PESEL` = "75050106655";';

    echo '<br>linia: '.__LINE__.' '.'$SQL1a: '.$SQL1a.'<br>';

    $result = mysql_query($SQL1a);

    $row = mysql_fetch_row($result);

    print_r($row) or die('Pusto');
    
echo '<br>linia: '.__LINE__.' =============================================<br>';

$Gosc = new Osoba(null, '1111111113', 'Jurij', 'Wiktor', 'Gagarin',"Kosmonautów 12", '42-212', "Warszawa")or die('NIe moge utworzyc takiej osoby');
echo '<br>';
$Gosc2 = new Osoba(1);


//$Gosc->setFullName('Barti', "Levi");

//echo $Gosc->name.'<br>';


?>
    </body>
</html>
