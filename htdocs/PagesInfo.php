<?php

/**
 * Filename: PagesInfo.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 */

if (!isset($_SESSION['title'])){
        $title = 'Transport Zespołowy GMBH';
}else{
        $title = $_SESSION['title'];
//        echo '<br>=================<br>TITLE: '.$title.'<br>=================<br>';
}
    
//$BASE_FILE = $_SERVER['SCRIPT_NAME'];	// $PLIK ZAPAMIĘTUJE ŚCIEŻKĘ    
if (!isset($_GET['Main_view_name'])){
//        $Main_view_name = 'index.php';
        $Main_view_name = 'index';
}else{
//        $view_name = sha1($_GET['view_name']);   // It doesn't encode it!!!
        $Main_view_name = $_GET['Main_view_name'];
//        echo '<br>$_GET["Main_view_name"]: '.$_GET['Main_view_name'];
}
?>
