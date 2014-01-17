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
     $ID = $Gosc->getId();
     $_SESSION['newID'] = $ID;
     ?>
     <script>
        alert ('Zarejestrowana Osoba');
     </script>
     <?php
}
     echo '<br>===============================================$whereGo: '.$whereGo;
     
switch ($whereGo){
    case 'Pracownik':
        echo '<br>Go to PRACOWNIK';
//        header("Location: ".HTTP_VIEWS_PATH.'RegPracPanel.php');
        header("Location: ".HTTP_HTDOCS.'Index.php?Main_view_name=regPrac');
        break;
    
    case 'Klient':
        echo '<br>Go to KLIENT';
//        header("Location: ".HTTP_VIEWS_PATH.'RegKlienPanel.php');
        break;
    
    default: 
        echo '<br>Go to MAKE LOGIN PANEL';
        header("Location: ".HTTP_HTDOCS.'Index.php?Main_view_name=MakeLogin&isFirstLog=1');
        break;
}

?>
