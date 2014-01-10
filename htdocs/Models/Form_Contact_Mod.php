<?php

/**
 * Filename: Form_Contact_Mod.php
 * 
 * Created: 2014-01-10
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 */

require_once "../common.inc.php";
$arrContForm = array();

if (isset($_POST['ContactForm'])){
    foreach ($_POST as $key => $value){
        echo '<br>$POST["'.$key.'"] = '.$value;
//        $arrContForm += $key => $value;
        $_SESSION[$key] = $value;
        $arrContForm[$key] = $value;
    }
}
echo '<br>=====<br>var_dump($_SESSION):';
var_dump($_SESSION);                // use it to send data!!!!!
echo '<br>=====<br>var_dump($arrContForm):';
var_dump($arrContForm);             // use it to work here!!!!!
echo '<br>=====<br>session?($arrContForm):';
$_SESSION['arrContForm'] = $arrContForm;
var_dump($_SESSION['arrContForm']);  // use it to work and send ir somewhere!!!!!
//header("Location: ".HTTP_HTDOCS.'Index.php');
?>
