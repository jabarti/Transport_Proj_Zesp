<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "../common.inc.php";

    if (isset($_SESSION) AND isset($_COOKIES)){
    echo '<br>================SPRAWDZAM SESSIE I COOKIES=======================<br>';
    foreach ($_SESSION as $key => $value){
            echo '<br>$key: '.$key.' = '.$value;
        }
        
    foreach ($_COOKIES as $key => $value){
            echo '<br>$key: '.$key.' = '.$value;
        }
    echo '<br>=================================================================<br>';
    }
    setcookie("user", $_SESSION['user'], $expire = 0);
	session_destroy();
	echo "Zostales wylogowany";
        unsetter();
        
      
	header("Location: ../Index.php");
        echo "Jest OK";
?>
