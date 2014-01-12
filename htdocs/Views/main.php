<?php

/****************************************************
 * Filename: main.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 ****************************************************/

if(Logged()){
    switch($_SESSION['upraw']){
        case 'admin':
                 $view_name = array('CompInfo', 'OtherInfo', 'Prices');
//                 $arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
        break;
    
        case 'klient':
                 $view_name = array('CompInfo', 'OtherInfo', 'Form_Contact', 'Prices');
            
                 $arrFormCont = array('email' => '', 'phone' => '');
                 $arrFormContUR = array('imie' => '','nazwisko'=> '');
                 $arrFormContHidd = array('klient_ID_Klient' => $_SESSION['uzytkID']);
                 $arrFormContTArea = array('zgloszenie' => 'Enter your request here...');
        break;   
    
        case 'pracownik':
                 $view_name = array('CompInfo', 'OtherInfo', 'Prices');
        break;
    
        default:
                 $view_name = array('CompInfo', 'OtherInfo', 'Prices');
        break;
    }
}else{    
     $view_name = array('Form_Contact', 'CompInfo', 'OtherInfo', 'Prices');
     $arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
     $arrFormContUR = array();
     $arrFormContHidd = array();
     $arrFormContTArea = array('zgloszenie' => 'Enter your request here...');
}   
            
foreach ($view_name as $key => $value){
    echo '<div id="glowny_wew">';
//  echo '<br>KEY: '.$key.' Value: '. $value;
    include LoadView($value);
    echo '</div>';
}
?>
