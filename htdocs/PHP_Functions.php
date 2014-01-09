<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo '<br>linia: '.__LINE__.' I\'m in PHP Function.php';
//echo ($_COOKIE['user'])?($_COOKIE['user']):'NOT ESTABLISHED';

function Logged(){
//	if(isset($_SESSION['uzytk']) AND !empty($_SESSION['uzytk']) AND isset($_SESSION['user'])){   // Mówi o zmiennych dostępnych w obecnej sesji
	if(isset($_SESSION['uzytk']) AND !empty($_SESSION['uzytk']) ){   // Mówi o zmiennych dostępnych w obecnej sesji
            echo "<br>Logged() = true<br>";
//            echo $_SESSION['uzytk'];
            return true;
        }else{
//            echo $_SESSION['uzytk'];
            echo "<br>Logged() = false<br>";
//            unset($_COOKIE['user']);
            return false;
	}
}

function db_query($sql)
{
	$ret = @mysql_query($sql);
	
	if (!$ret)
		die('MySQL query failed: '.$sql.' Error message: '.mysql_error());//,$sql,mysql_error());
	return $ret;
}

function unsetter(){
    foreach ($_SESSION as $key){
//        echo '<br>$_SESSION['.$key.'] - destroyed';
            unset($_SESSION[$key]) ;//or die("error");
    }
//        foreach ($_COOKIE as $key){
//        echo '<br>$_COOKIE['.$key.'] - destroyed';
//            unset($_COOKIE[$key]) ;//or die("error");
//    }
}

function LoadView($view_name){
    switch ($view_name){
    case 'login':
//        echo '<br>linia: '.__LINE__.' '.$view_name;
        return HDD_VIEWS_PATH.'LogInPanel.php';
        break;
    default:
        echo '<br>linia: '.__LINE__.' '.$view_name;
        break; 
}
}

//function IncludeAll($path, $file){
//    $path1 = 'HDD_'.strtoupper($path).'_PATH.';
//    $path2 = 'HTTP_'.strtoupper($path).'_PATH.';
//    $path3 = strtoupper($path).'_PATH.DIRECTORY_SEPARATOR.';
//    
//    echo $path1.'\''.$file.'\'';
//    
//    if(include $path1.'\''.$file.'\''){
//        echo '<br>include 1 HDD_CLASSES_PATH .Obiekt.class.php - OK';
//    }else{
//        if(include $path2.'\''.$file.'\''){
//            echo '<br>include 2 HTTP_CLASSES_PATH.Obiekt.class.php - OK';
//        }else{
//            if (include $path3.$file){ 
//                echo '<br>include 3 CLASSES_PATH.DIRECTORY_SEPARATOR.Obiekt.class.php - OK';
//            }else{
//                echo '<br>No file: Obiekt.class.php Loaded - NOT OK';
//            }
//        }
//    }
//}
?>