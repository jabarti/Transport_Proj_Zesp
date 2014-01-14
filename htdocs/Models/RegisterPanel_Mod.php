<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegisterPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "../common.inc.php";
$whereGo = '';

//if (isset($_POST['RegisterForm'])){
if (isset($_POST['RegisterForm'])){
    DisplayArr($_POST);
    
        if($_POST['RegisterForm']=='Wyślij'){
            echo($_POST['RegisterForm']);
            unset($_POST['RegisterForm']);
        }
        
        if(isset($_POST['Klient/Pracownik']))
            $whereGo = $_POST['Klient/Pracownik'];
            unset($_POST['Klient/Pracownik']);
            
        $tab = $_POST;


     $Gosc = new Osoba($tab);
}
     
switch ($whereGo){
    case 'Pracownik':
        echo '<br>Go to PRACOWNIK';
        break;
    
    case 'Klient':
        echo '<br>Go to KLIENT';
        break;
    
    default:
        echo '<br>Go to DEFAULT';
        //header("Location: ".HTTP_HTDOCS.'Index.php?Main_view_name=register');
        break;
}

?>
