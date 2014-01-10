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
//            echo "<br>Logged() = true<br>";
//            echo $_SESSION['uzytk'];
            return true;
        }else{
//            echo $_SESSION['uzytk'];
//            echo "<br>Logged() = false<br>";
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

function LoadMainView($Main_view_name){
    switch ($Main_view_name){
        case 'main':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
            $_SESSION['title'] = 'Main | Główna';
            return HDD_VIEWS_PATH.'main.php';
        break;
    
        case 'login':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
            $_SESSION['title'] = 'Login | Logowanie';
            return HDD_VIEWS_PATH.'LogInPanel.php';
        break;
    
        default:
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>Main View_name: '.$Main_view_name. " <-tak?";
            $_SESSION['title'] = 'Main | Główna | Default';
            return HDD_VIEWS_PATH.'main.php';
        break; 
}
}

function LoadView($view_name){
    switch ($view_name){
        case 'Form_Contact':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Main | Główna';
            return HDD_VIEWS_PATH.$view_name.'.php';
        break;
    
        case 'CompInfo':
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Login | Logowanie';
            return HDD_VIEWS_PATH.$view_name.'.php';
        break;
    
        default:
//            echo '<br>linia: '.__LINE__.' from: '.__FILE__.' <br>View_name: '.$view_name. " <<-tak???";
//            $_SESSION['title'] = 'Main | Główna | Default';
            return HDD_VIEWS_PATH.$view_name.'.php';
        break; 
}
}

function IncludeClassFile($file){
    if(include HDD_CLASSES_PATH.$file){
//        echo '<br>include 1 HDD_CLASSES_PATH .'.$file.' - OK';
    }else{
        if(include HTTP_CLASSES_PATH.$file){
//            echo '<br>include 2 HTTP_CLASSES_PATH.'.$file.' - OK';
        }else{
            if (include CLASSES_PATH.DIRECTORY_SEPARATOR.$file){ 
//                echo '<br>include 3 CLASSES_PATH.DIRECTORY_SEPARATOR.'.$file.' - OK';
            }else{
                echo '<br>No file: '.$file.' NOT Loaded - NOT OK';
            }
        }
    }
}
?>