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
if (isset($_SESSION['count'])){
//    echo '<br>linia: '.__LINE__.' $_SESSION[\'count\']: '.$_SESSION['count'].'<br>';
//    echo 'session set';
        foreach ($_SESSION as $key => $value){
//                echo '<br>$_SESSION['.$key.'] => '. $value;
        }
//        echo '<br>';
}else{
//    echo '<br>session WAS NOT set, I\'ve set it<br>';
    //session_start();
    $_SESSION['count'] = 1;
//    echo '<br>linia: '.__LINE__.' '.$_SESSION['count'].'<br>';
}

if(!empty($_SERVER['HTTP_REFERER'])) 
		$ref = $_SERVER['HTTP_REFERER'];   	// PHP.NET: The address of the page (if any) which referred

if (!defined('MAX_MAIL_BATCH')) {
	define('MAX_MAIL_BATCH', 1); // Maximum number of emails to send while running the newsletter mailer job.
}

define(DIRECTORY_SEPARATOR, '/');

// DEFINE DIRECTORIES
define('BASE_PATH', dirname(__FILE__));
define('ROOT', dirname(dirname(__FILE__))); 
$temp = explode(DIRECTORY_SEPARATOR, ROOT);
//var_dump($temp);
$len = count($temp)-1;
//echo($len);
define('ROOT_PATH', $temp[$len]);
define('UPRODUCE_UPLOAD_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'uProduceUploads');
define('INCLUDE_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'Includes');
define('CLASSES_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'Classes');

define('LOCALE_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'locale');
define('FILES_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'files');

define('MODELS_PATH',   BASE_PATH . DIRECTORY_SEPARATOR . 'Models');
define('STYLES_PATH',   BASE_PATH . DIRECTORY_SEPARATOR . 'Styles');
define('VIEWS_PATH',    BASE_PATH . DIRECTORY_SEPARATOR . 'Views');
define('PICTURES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'pictures');
define('SCRIPT_PATH',   BASE_PATH . DIRECTORY_SEPARATOR . 'scripts');


define('INFO_IMG_FILE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'infoImages');
define('XML_RESOURCES_DIR', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'xmlResources');
define('PAGE_THUMBS_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'page_thumbs');

/*
echo 'linia: '.__LINE__.' DIRECTORY_SEPARATOR: '.DIRECTORY_SEPARATOR.'<br>';
echo '<br><br>linia: '.__LINE__.' ROOT: '.ROOT.'<br>';
echo 'linia: '.__LINE__.' BASE_PATH: '.BASE_PATH.'<br>';/**/
//echo '<br>linia: '.__LINE__.' ROOT_PATH: '.ROOT_PATH.'<br>';
/*echo 'linia: '.__LINE__.' UPRODUCE_UPLOAD_PATH: '.UPRODUCE_UPLOAD_PATH.'<br>';
echo 'linia: '.__LINE__.' INCLUDE_PATH: '.INCLUDE_PATH.'<br>';
echo 'linia: '.__LINE__.' CLASSES_PATH: '.CLASSES_PATH.'<br>';
echo 'linia: '.__LINE__.' LOCALE_PATH: '.LOCALE_PATH.'<br>';
echo 'linia: '.__LINE__.' FILES_PATH: '.FILES_PATH.'<br>';
echo 'linia: '.__LINE__.' MODELS_PATH: '.MODELS_PATH.'<br>';


echo 'linia: '.__LINE__.' PICTURES_PATH: '.PICTURES_PATH.'<br>';
echo 'linia: '.__LINE__.' SCRIPT_PATH: '.SCRIPT_PATH.'<br>';
echo 'linia: '.__LINE__.' STYLES_PATH: '.STYLES_PATH.'<br>';
echo 'linia: '.__LINE__.' VIEWS_PATH: '.VIEWS_PATH.'<br>';
echo 'linia: '.__LINE__.' INFO_IMG_FILE_PATH: '.INFO_IMG_FILE_PATH.'<br>';
echo 'linia: '.__LINE__.' XML_RESOURCES_DIR: '.XML_RESOURCES_DIR.'<br>';
echo 'linia: '.__LINE__.' PAGE_THUMBS_PATH: '.PAGE_THUMBS_PATH.'<br>';
echo 'linia: '.__LINE__.' =============================================<br>';

echo '<br>$_SERVER[\'HTTP_HOST\']: '.$_SERVER['HTTP_HOST'];
echo '<br>$_SERVER[\'SCRIPT_NAME\']: '.$_SERVER['SCRIPT_NAME'];
echo '<br>$_SERVER[\'REQUEST_URI\']: '.$_SERVER['REQUEST_URI'];
echo '<br>$_SERVER[\'PHP_SELF\']: '.$_SERVER['PHP_SELF'];
echo '<br>__FILE__: '.__FILE__;
/**/

mysql_query('SET NAMES utf8')or die ('error');

mb_internal_encoding('UTF-8') or die ('error');

/*** Ed stuff: ***/
define('DATA_DIR', BASE_PATH);

$BASE_FILE = $_SERVER['SCRIPT_NAME'];	// $PLIK ZAPAMIĘTUJE ŚCIEŻKĘ

if (!isset($_SESSION['title'])){
        $title = 'Transport Zespołowy GMBH';
    }else{
        $title = $_SESSION['title'];
        echo '<br>=================<br>TITLE: '.$title.'<br>=================<br>';
    }
    
if (!isset($_SESSION['view_name'])){
        $view_name = $BASE_FILE;
    }else{
        $view_name = $_SESSION['view_name'];
    }
    
if (isset($_SESSION['user'])){
//    echo "<br>Jest Session USER";
    $expire=time()+60*5;			// 5min! - Odświarzanie musi być ustawione na dłuższy czas niż długość życia cookie!!!!!
    setcookie("user", $_SESSION['user'], $expire);
    
    if (isset($_COOKIE['user'])){
//    echo "<br><br>\$_COOKIE[\'user\']: ".$_COOKIE['user'];
//    echo '<br>date start: '.date('Y-M-D, H:M:s');
//    echo '<br>expire: '.$expire;
//    echo '<br>=====================================<br>';
    }
}

//if (!isset($_COOKIE['user'])){          // SKOŃCZYŁ SIE CZAS SESJI USERA
//    unsetter();
//}



//if (!defined('DO_NOT_CLOSE_SESSION')) {
//	session_write_close();
//}
    include CLASSES_PATH.DIRECTORY_SEPARATOR.'Obiekt.class.php';
    include CLASSES_PATH.DIRECTORY_SEPARATOR.'Osoba.class.php';
    include CLASSES_PATH.DIRECTORY_SEPARATOR.'Person.class.php';
    
    require 'DB_Connection.php';
    require 'buttons.php';
    require_once 'PHP_Functions.php';
    
if (!isset($_COOKIE['user'])){          // SKOŃCZYŁ SIE CZAS SESJI USERA
    unsetter();                         // really works?
    unset($_SESSION['user']);
}
//    echo "<br>END common.inc.php<br>=================================<br>";
?>
