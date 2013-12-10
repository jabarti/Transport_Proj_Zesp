<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Główna</title>
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
    require_once(CLASSES_PATH.DIRECTORY_SEPARATOR.'osoba.class.php');
    //InitPage();
    
    include 'DB_Connection.php';
    include 'buttons.php';

    $SQL1a = 'SELECT * FROM `osoba` WHERE `PESEL` = "75050106655";';

    echo '<br>$SQL1a: '.$SQL1a.'<br>';

    $result = mysql_query($SQL1a);

    $row = mysql_fetch_row($result);

    print_r($row) or die('Pusto');
    
echo BASE_PATH.'<br>';
echo UPRODUCE_UPLOAD_PATH.'<br>';
echo INCLUDE_PATH.'<br>';
echo CLASSES_PATH.'<br>';
echo LOCALE_PATH.'<br>';
echo FILES_PATH.'<br>';
echo PICTURES_PATH.'<br>';
echo STYLES_PATH.'<br>';
echo INFO_IMG_FILE_PATH.'<br>';
echo XML_RESOURCES_DIR.'<br>';
echo PAGE_THUMBS_PATH.'<br>';

$Bartek = new Osoba('75050106655');

var_dump($Bartek);

if($Bartek){
    echo ('To jest '.$Bartek['imie']);
}
?>
    </body>
</html>
