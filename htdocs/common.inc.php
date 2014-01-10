<?php
/**
 * common.inc.php
 *
 * Includes all necessary files for the project.
 *
 * @author Bartosz Lewiński <jabarti@wp.pl>
 *
 */

ob_start();
session_start();

//echo session_id();

echo '<div id="LogInfo" style="left: 5px; opacity:1">';
if (isset($_SESSION['count'])){
//    echo '<br>linia: '.__LINE__.' $_SESSION[\'count\']: '.$_SESSION['count'].'<br>';
//    echo 'session set';
        foreach ($_SESSION as $key => $value){
                echo '<br>$_SESSION['.$key.'] => '. $value;
        }
echo '</div>';
//        echo '<br>';
}else{
//    echo '<br>session WAS NOT set, I\'ve set it<br>';
    //session_start();
    $_SESSION['count'] = 1;
//    echo '<br>linia: '.__LINE__.' '.$_SESSION['count'].'<br>';
}

if(!empty($_SERVER['HTTP_REFERER'])) 
		$ref = $_SERVER['HTTP_REFERER'];   	// PHP.NET: The address of the page (if any) which referred

//if (!defined('MAX_MAIL_BATCH')) {
//	define('MAX_MAIL_BATCH', 1); // Maximum number of emails to send while running the newsletter mailer job.
//}

require 'Paths.php';

mysql_query('SET NAMES utf8')or die ('error');

mb_internal_encoding('UTF-8') or die ('error');
    
if (isset($_SESSION['user'])){
//    echo "<br>Jest Session USER";
    $expire=time()+60*1;			// 2min! - Odświarzanie musi być ustawione na dłuższy czas niż długość życia cookie!!!!!
    setcookie("user", $_SESSION['user'], $expire);
    
    if (isset($_COOKIE['user'])){
//    echo "<br><br>\$_COOKIE[\'user\']: ".$_COOKIE['user'];
//    echo '<br>date start: '.date('Y-M-D, H:M:s');
//    echo '<br>expire: '.$expire;
//    echo '<br>=====================================<br>';
    }
}

    require 'DB_Connection.php';
    require 'buttons.php';
    require_once 'PHP_Functions.php';
    require 'PagesInfo.php';
  
    IncludeClassFile('Obiekt.class.php');
    IncludeClassFile('Person.class.php');
    IncludeClassFile('Osoba.class.php');
    
if (!isset($_COOKIE['user'])){          // SKOŃCZYŁ SIE CZAS SESJI USERA
    unsetter();                         // really works?
    unset($_SESSION['uzytk']);
//    echo ('Sesja usera wygasła');
//    echo $_SESSION['uzytk'];
//    Logged();
}

if(Logged()){
    echo '<div id="LogInfo"><h1>ZALOGOWANY</h1></div>';
}else{
    echo '<div id="LogInfo"><h1>NIE ZALOGOWANY</h1></div>';
}


//    echo "<br>END common.inc.php<br>=================================<br>";
?>
