<?php

/****************************************************
 * Filename: main.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 ****************************************************/

//echo '<br>linia: '.__LINE__.' You are NOT logged';
if(Logged()){
    switch($_SESSION['upraw']){
        case 'admin':
                 $view_name = array('CompInfo', 'OtherInfo');
//                 $arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
        break;
        case 'klient':
                 $view_name = array('CompInfo', 'OtherInfo', 'Form_Contact');
                 $arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
        break;
    }
//     $view_name = array('CompInfo', 'OtherInfo', 'Form_Contact');
//     $arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
}else{
//     echo '<br>linia: '.__LINE__.' You are logged';    
     $view_name = array('Form_Contact', 'CompInfo', 'OtherInfo');
     $arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
}   
            
foreach ($view_name as $key => $value){
    echo '<div id="glowny_wew">';
//  echo '<br>KEY: '.$key.' Value: '. $value;
    include LoadView($value);
    echo '</div>';
}
?>
