<?php
require_once "common.inc.php";
require_once VIEWS_PATH.DIRECTORY_SEPARATOR.'header.php';
//echo "<br>START index.php<br>=================================<br>";
if (isset($_SESSION['count'])){
    $_SESSION['count']++;
//    echo '<br>linia: '.__LINE__.'$_SESSION[\'count\']: '.$_SESSION['count'].'<br>';

}

if (isset($_POST['uzytkownik'])){
//    echo '<br>linia: '.__LINE__.' '.$_POST['uzytkownik'];
}
if (isset($_SESSION['uzytk'])){
//    echo '<br>linia: '.__LINE__.' '.$_SESSION['uzytk'];
}

//switch ($view_name){
//    case 'login':
//        echo '<br>linia: '.__LINE__.' '.$view_name;
//        break;
//    default:
//        echo '<br>linia: '.__LINE__.' '.$view_name;
//        break; 
//}

//echo 'Logged: '.Logged();

if(!Logged())
	{
            echo '<div id="glowny_index">';
            echo '<br>linia: '.__LINE__.' You are NOT logged';
//            unset($_COOKIE['user']);
            include LoadView('login');
//            include VIEWS_PATH.DIRECTORY_SEPARATOR.'LogInPanel.php';
            echo '</div>';
	}
        else
        {
            echo '<br>linia: '.__LINE__.' You are logged';    
            //session_destroy();
            if(isset($_SESSION)){
                echo '<br> >>>>>>>>>>>>>>>>>>>>> Session Active';
            }else{
                echo '<br> >>>>>>>>>>>>>>>>>>>>> Session destroyed!';
            }
            //header("Location: Index.php");
        }
/*
echo '<br>linia: '.__LINE__.' =============================================<br>';
//    require_once("common.inc.php");
//    require_once VIEWS_PATH.DIRECTORY_SEPARATOR."head.php";
//    echo PICTURES_PATH.DIRECTORY_SEPARATOR.'favicon_no_euro.ico';
    
    $SQL1a = 'SELECT * FROM `osoba` WHERE `PESEL` = "75050106655";';

    echo '<br>linia: '.__LINE__.' '.'$SQL1a: '.$SQL1a.'<br>';

    $result = mysql_query($SQL1a);

    $row = mysql_fetch_row($result);

    print_r($row) or die('Pusto');
    
echo '<br>linia: '.__LINE__.' =============================================<br>';

$Gosc = new Osoba(null, '1111111113', 'Jurij', 'Wiktor', 'Gagarin',"Kosmonautów 12", '42-212', "Warszawa")or die('NIe moge utworzyc takiej osoby');
echo '<br>';

echo '<br>linia: '.__LINE__.' =============================================<br>';
$Gosc2 = new Osoba(1);
$row = $Gosc;
var_dump($row);

echo '<br>linia: '.__LINE__.' =============================================<br>';
$Gosc3 = new Osoba();
$row = $Gosc3->GetOsobaById(3);

var_dump($row);


//$Gosc->setFullName('Barti', "Levi");

//echo $Gosc->name.'<br>';
/**/
echo "<br>END header.php<br>=================================<br>";
require_once VIEWS_PATH.DIRECTORY_SEPARATOR.'footer.php';
?>

