<?php

/**
 * Filename: main.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 */
//echo '<br>linia: '.__LINE__.' You are NOT logged';
if(!Logged()){
//     echo '<br>linia: '.__LINE__.' You are NOT logged';
     $view_name = array('Form_Contact', 'CompInfo', 'OtherInfo', 'fićka');
}else{
//     echo '<br>linia: '.__LINE__.' You are logged';    
     $view_name = array('Form_Contact', 'CompInfo', 'OtherInfo', 'srupa');
}   
            
foreach ($view_name as $key => $value){
    echo '<div id="glowny_wew">';
//  echo '<br>KEY: '.$key.' Value: '. $value;
    include LoadView($value);
    echo '</div>';
}
?>
