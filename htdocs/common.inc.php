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
                echo '<br>$_SESSION['.$key.'] => '. $value;
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
//??? >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//ECHO '<BR><BR> DEFINE DIRECTORIES OLD Way<BR><BR>';
define('BASE_PATH', dirname(__FILE__));
define('INCLUDE_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'includes');
define('CLASSES_PATH', INCLUDE_PATH . DIRECTORY_SEPARATOR . 'classes');
define('FILES_PATH', substr(BASE_PATH, 0, strrpos(BASE_PATH, DIRECTORY_SEPARATOR)) . DIRECTORY_SEPARATOR . 'files');
define('PICTURES_PATH', FILES_PATH . DIRECTORY_SEPARATOR . 'pictures');
define('STYLES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'styles');

//echo 'linia: '.__LINE__.' BASE_PATH: '.BASE_PATH.'<br>';
//echo 'linia: '.__LINE__.' INCLUDE_PATH: '.INCLUDE_PATH.'<br>';
//echo 'linia: '.__LINE__.' CLASSES_PATH: '.CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' FILES_PATH: '.FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' PICTURES_PATH: '.PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' STYLES_PATH: '.STYLES_PATH.'<br>';
//??? >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//ECHO '<BR><BR> DEFINE DIRECTORIES<BR><BR>';

if (!defined('DIR_SEP'))
    define('DIR_SEP', '/');
//echo 'linia: '.__LINE__.' DIRECTORY_SEPARATOR: '.DIRECTORY_SEPARATOR.'<br>';
//echo 'linia: '.__LINE__.' DIR_SEP: '.DIR_SEP.'<br>';

//echo 'linia: '.__LINE__.'$_SERVER[\'PHP_SELF\']: '.$_SERVER['PHP_SELF'].'<br><br>';

//var_dump(explode(DIR_SEP, $_SERVER['PHP_SELF']));
//echo '<br>';

//=============================================================================
//ECHO '<BR><BR>// HTTP Directories  //<BR><BR>';

if (!defined('ROOT'))    define('ROOT', $_SERVER['HTTP_HOST']);
if (!defined('PRO_NAME'))    define('PRO_NAME', explode(DIR_SEP, $_SERVER['PHP_SELF'])[1]);
if (!defined('HTTP_HTDOCS'))    define('HTTP_HTDOCS', DIR_SEP.PRO_NAME.DIR_SEP.explode(DIR_SEP, $_SERVER['PHP_SELF'])[2].DIR_SEP);
if (!defined('HTTP_MODELS_PATH'))    define('HTTP_MODELS_PATH', HTTP_HTDOCS.'Models'.DIR_SEP);
if (!defined('HTTP_STYLES_PATH'))    define('HTTP_STYLES_PATH', HTTP_HTDOCS.'Styles'.DIR_SEP);
if (!defined('HTTP_VIEWS_PATH'))    define('HTTP_VIEWS_PATH', HTTP_HTDOCS.'Views'.DIR_SEP);
if (!defined('HTTP_PICTURES_PATH'))    define('HTTP_PICTURES_PATH', HTTP_HTDOCS.'Pictures'.DIR_SEP);
if (!defined('HTTP_SCRIPTS_PATH'))    define('HTTP_SCRIPTS_PATH', HTTP_HTDOCS.'scripts'.DIR_SEP);
if (!defined('HTTP_ROOT_PATH'))    define('HTTP_ROOT_PATH', DIR_SEP.PRO_NAME.DIR_SEP);
if (!defined('HTTP_INCLUDES_PATH'))    define('HTTP_INCLUDES_PATH', HTTP_ROOT_PATH.'Includes'.DIR_SEP);
if (!defined('HTTP_CLASSES_PATH'))    define('HTTP_CLASSES_PATH', HTTP_INCLUDES_PATH.'Classes'.DIR_SEP);
if (!defined('HTTP_FILES_PATH'))    define('HTTP_FILES_PATH', HTTP_ROOT_PATH.'files'.DIR_SEP);
if (!defined('HTTP_IMG_PATH'))    define('HTTP_IMG_PATH', HTTP_FILES_PATH.'Img'.DIR_SEP);
if (!defined('ROOT_SERV')){    define('ROOT_SERV', $_SERVER['PHP_SELF']);}

//echo 'linia: '.__LINE__.' ROOT_SERV: '.ROOT_SERV.'<br>';
//echo 'linia: '.__LINE__.' HTTP_IMG_PATH: '.HTTP_IMG_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_FILES_PATH: '.HTTP_FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_CLASSES_PATH: '.HTTP_CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_INCLUDES_PATH: '.HTTP_INCLUDES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_ROOT_PATH: '.HTTP_ROOT_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_SCRIPTS_PATH: '.HTTP_SCRIPTS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_PICTURES_PATH: '.HTTP_PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_VIEWS_PATH: '.HTTP_VIEWS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HTTP_STYLES_PATH: '.HTTP_STYLES_PATH.'<br>';
//echo 'linia: '.__LINE__.' ROOT: '.ROOT.'<br>';
//echo 'linia: '.__LINE__.' PRO_NAME: '.PRO_NAME.'<br>----------------------<br>';
//echo 'linia: '.__LINE__.' HTTP_HTDOCS:'.HTTP_HTDOCS.'<br>';
//echo 'linia: '.__LINE__.' HTTP_MODELS_PATH: '.HTTP_MODELS_PATH.'<br>';
//==============================================================================
//ECHO '<BR><BR>// HDD Directories //<BR><BR>';

if (!defined('HDD_PATH'))    define('HDD_PATH', implode(DIRECTORY_SEPARATOR, explode(DIRECTORY_SEPARATOR, dirname(__FILE__))).DIRECTORY_SEPARATOR);
if (!defined('HDD_ROOT_PATH'))    define('HDD_ROOT_PATH', substr(HDD_PATH, 0, strrpos(HDD_PATH, DIRECTORY_SEPARATOR, -2)) . DIRECTORY_SEPARATOR);
if (!defined('HDD_INCLUDES_PATH'))    define('HDD_INCLUDES_PATH',  HDD_ROOT_PATH  . 'Includes' . DIRECTORY_SEPARATOR);
if (!defined('HDD_CLASSES_PATH'))    define('HDD_CLASSES_PATH', HDD_INCLUDES_PATH . 'Classes'. DIRECTORY_SEPARATOR);
if (!defined('HDD_FILES_PATH'))    define('HDD_FILES_PATH', HDD_ROOT_PATH  . 'files'. DIRECTORY_SEPARATOR);
if (!defined('HDD_IMG_PATH'))    define('HDD_IMG_PATH', HDD_FILES_PATH  . 'Img'. DIRECTORY_SEPARATOR);
if (!defined('HDD_MODELS_PATH'))    define('HDD_MODELS_PATH', HDD_PATH  . 'Models'. DIRECTORY_SEPARATOR);
if (!defined('HDD_STYLES_PATH'))    define('HDD_STYLES_PATH', HDD_PATH  . 'Styles'. DIRECTORY_SEPARATOR);
if (!defined('HDD_VIEWS_PATH'))    define('HDD_VIEWS_PATH', HDD_PATH  . 'Views'. DIRECTORY_SEPARATOR);
if (!defined('HDD_PICTURES_PATH'))    define('HDD_PICTURES_PATH', HDD_PATH  . 'Pictures'. DIRECTORY_SEPARATOR);
if (!defined('HDD_SCRIPT_PATH'))    define('HDD_SCRIPT_PATH', HDD_PATH  . 'scripts'. DIRECTORY_SEPARATOR);

//echo 'linia: '.__LINE__.' HDD_SCRIPT_PATH: '.HDD_SCRIPT_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_PICTURES_PATH: '.HDD_PICTURES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_VIEWS_PATH: '.HDD_VIEWS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_STYLES_PATH: '.HDD_STYLES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_MODELS_PATH: '.HDD_MODELS_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_IMG_PATH: '.HDD_IMG_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_FILES_PATH: '.HDD_FILES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_CLASSES_PATH: '.HDD_CLASSES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_INCLUDES_PATH: '.HDD_INCLUDES_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_ROOT_PATH: '.HDD_ROOT_PATH.'<br>';
//echo 'linia: '.__LINE__.' HDD_PATH: '.HDD_PATH.'<br>';
//echo 'linia: '.__LINE__.' =============================================<br>';

//echo '<br>$_SERVER[\'HTTP_HOST\']: '.$_SERVER['HTTP_HOST'];
//echo '<br>$_SERVER[\'SCRIPT_NAME\']: '.$_SERVER['SCRIPT_NAME'];
//echo '<br>$_SERVER[\'REQUEST_URI\']: '.$_SERVER['REQUEST_URI'];
//echo '<br>$_SERVER[\'PHP_SELF\']: '.$_SERVER['PHP_SELF'];
//echo '<br>__FILE__: '.__FILE__;
/**/

mysql_query('SET NAMES utf8')or die ('error');

mb_internal_encoding('UTF-8') or die ('error');

/*** Ed stuff: ***/
//define('DATA_DIR', HDD_PATH);

if (!isset($_SESSION['title'])){
        $title = 'Transport Zespołowy GMBH';
    }else{
        $title = $_SESSION['title'];
        echo '<br>=================<br>TITLE: '.$title.'<br>=================<br>';
    }
$BASE_FILE = $_SERVER['SCRIPT_NAME'];	// $PLIK ZAPAMIĘTUJE ŚCIEŻKĘ    
if (!isset($_SESSION['view_name'])){
        $view_name = $BASE_FILE;
    }else{
        $view_name = $_SESSION['view_name'];
    }
    
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


    if(include HDD_CLASSES_PATH.'Obiekt.class.php'){
//        echo '<br>include 1 HDD_CLASSES_PATH .Obiekt.class.php - OK';
    }else{
        if(include HTTP_CLASSES_PATH.'Obiekt.class.php'){
//            echo '<br>include 2 HTTP_CLASSES_PATH.Obiekt.class.php - OK';
        }else{
            if (include CLASSES_PATH.DIRECTORY_SEPARATOR.'Obiekt.class.php'){ 
//                echo '<br>include 3 CLASSES_PATH.DIRECTORY_SEPARATOR.Obiekt.class.php - OK';
            }else{
//                echo '<br>No file: Obiekt.class.php Loaded - NOT OK';
            }
        }
    }

    if(include HDD_CLASSES_PATH.'Osoba.class.php'){
//        echo '<br>include 1 HDD_CLASSES_PATH .Obiekt.class.php - OK';
    }else{
        if(include HTTP_CLASSES_PATH.'Osoba.class.php'){
//            echo '<br>include 2 HTTP_CLASSES_PATH.Osoba.class.php - OK';
        }else{
            if (include CLASSES_PATH.DIRECTORY_SEPARATOR.'Osoba.class.php'){ 
//                echo '<br>include 3 CLASSES_PATH.DIRECTORY_SEPARATOR.Osoba.class.php - OK';
            }else{
//                echo '<br>No file: Osoba.class.php Loaded - NOT OK';
            }
        }
    }
    
    if(include HDD_CLASSES_PATH.'Person.class.php'){
//        echo '<br>include 1 HDD_CLASSES_PATH .Person.class.php - OK';
    }else{
        if(include HTTP_CLASSES_PATH.'Person.class.php'){
//            echo '<br>include 2 HTTP_CLASSES_PATH.Person.class.php - OK';
        }else{
            if (include CLASSES_PATH.DIRECTORY_SEPARATOR.'Person.class.php'){ 
//                echo '<br>include 3 CLASSES_PATH.DIRECTORY_SEPARATOR.Person.class.php - OK';
            }else{
//                echo '<br>No file: Person.class.php Loaded - NOT OK';
            }
        }
    }
    
    require 'DB_Connection.php';
    require 'buttons.php';
    require_once 'PHP_Functions.php';
//    
//    IncludeAll('classes', 'Obiekt.class.php');
    
if (!isset($_COOKIE['user'])){          // SKOŃCZYŁ SIE CZAS SESJI USERA
    unsetter();                         // really works?
    unset($_SESSION['uzytk']);
    echo ('Sesja usera wygasła');
//    echo $_SESSION['uzytk'];
    Logged();
}
//    echo "<br>END common.inc.php<br>=================================<br>";
?>
