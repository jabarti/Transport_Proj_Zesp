<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "../common.inc.php";

//    if (isset($_SESSION) || isset($_COOKIES)){
//    echo '<br>================SPRAWDZAM SESSIE I COOKIES=======================<br>';
//    foreach ($_SESSION as $key => $value){
//            echo '<br>$_SESSION['.$key.'] = '.$value;
//            unset($_SESSION[$key]);
//        }
//        
////    foreach ($_COOKIES as $key => $value){
////            echo '<br>$key: '.$key.' = '.$value;
////        }
//    echo '<br>=================================================================<br>';
//    }
//        setcookie("user", null, -1, '/') or die ('sth wrong with unsetting cookie');
        setcookie("user", '', time()-3600) or die ('sth wrong with unsetting cookie');
	session_destroy() or die ('Nie moge zamknąć sesji');
//        setcookie("user", null, -6, '/') or die ('sth wrong with unsetting cookie');
	echo "Zostales wylogowany";
        unsetter();
        echo '<br>$_COOKIE[\'user\']'.$_COOKIE['user'];
      
//	header("Location: ../Index.php");
	header("Location: ".HTTP_HTDOCS.'Index.php');
        echo "<br>Jest OK";
?>
