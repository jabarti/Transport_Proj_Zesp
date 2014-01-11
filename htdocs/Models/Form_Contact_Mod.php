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
$SQL ='';
$arr='';
if (isset($_POST['ContactForm'])){
    $SQL .= 'INSERT INTO `formularz` (';
            
    foreach ($_POST as $key => $value){
        echo '<br>$POST["'.$key.'"] = '.$value;
        if ($key != 'ContactForm'){
            $arr[$key] = $key;
        }
    } 
    $SQL .= '`'.join( "`,`", $arr).'`) VALUES (';
    $arr = '';

    foreach ($_POST as $key => $value){
        if ($key != 'ContactForm'){
            $arr[$value] = $value;
        }
    }  
    
    $SQL .= '"'.join( '","', $arr).'");';
            
//        $arrContForm += $key => $value;
   echo "<br>Oto SQL: ".$SQL;
//   echo '<br>'.var_dump($arr);
//   echo '<br>'.join(',',$arr);
   
   mysql_query($SQL) or die ('<br><b>SQL is wrong</b>');
   
        $_SESSION[$key] = $value;
        $arrContForm[$key] = $value;

    
//    $Form = new Formularz();
    
    
    
    
}
//$_SESSION['arrContForm'] = $arrContForm;

//echo '<br>=====<br>var_dump($_SESSION):';
//var_dump($_SESSION);                // use it to send data!!!!!
//echo '<br>=====<br>var_dump($arrContForm):';
//var_dump($arrContForm);             // use it to work here!!!!!
//echo '<br>=====<br>session?($arrContForm):';
//var_dump($_SESSION['arrContForm']);  // use it to work and send ir somewhere!!!!!
//header("Location: ".HTTP_HTDOCS.'Index.php');
?>
