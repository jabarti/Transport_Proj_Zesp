<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo '<br>linia: '.__LINE__.' I\'m in PHP Function.php';
//echo ($_COOKIE['user'])?($_COOKIE['user']):'NOT ESTABLISHED';
function Logged(){
	if(isset($_SESSION['uzytk']) AND !empty($_SESSION['uzytk']) AND isset($_SESSION['user'])){   // Mówi o zmiennych dostępnych w obecnej sesji
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
        return VIEWS_PATH.DIRECTORY_SEPARATOR.'LogInPanel.php';
        break;
    default:
        echo '<br>linia: '.__LINE__.' '.$view_name;
        break; 
}
}
?>