<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<br>linia: '.__LINE__.' I\'m in PHP Function.php';

function Logged(){
	if(isset($_SESSION['uzytk']) && !empty($_SESSION['uzytk'])){   // Mówi o zmiennych dostępnych w obecnej sesji
            echo "<br>Logged() = true<br>";
            echo $_SESSION['uzytk'];
            return true;
        }else{
//            echo $_SESSION['uzytk'];
            echo "<br>Logged() = false<br>";
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
?>