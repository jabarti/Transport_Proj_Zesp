<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    MakeLoginPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-14
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "../common.inc.php";

echo '<br>============== $_SESSION ============================<br>';
DisplayArr($_SESSION);
echo '<br>================$$POST==========================<br>';
DisplayArr($_POST);
$login = $_POST['uzytkownik'];
$upraw = $_POST['upraw'];
if($upraw){
    echo '<br>'.$upraw;
}

if(isset($_SESSION['newID'])){
    $ID_Osoba = $_SESSION['newID'];
} else {
    $SQL = sprintf('SELECT `ID_Osoba` FROM `login` WHERE `login` = "'.$login.'";');
    echo '<br>SQL:'.$SQL;
    $ID_Osoba = mysql_result(mysql_query($SQL), 0);
}
echo '<br>sha(haslo) =  ff12bbd8c907af067070211d87bdf098be17375b';
echo '<br>==========================================<br>';
echo '<br>haslo1: '.$_POST['haslo1'].', sha1(haslo1): '.sha1($_POST['haslo1']);
$passOLD = sha1($_POST['haslo1']);
echo '<br>haslo2: '.$_POST['haslo2'].', sha1(haslo2): '.sha1($_POST['haslo2']);
$passNEW = sha1($_POST['haslo2']);


//echo '<br>'.$_SESSION['user'];
//if ($_SESSION['user'] == 'Bartosz Lewiński'){
//    echo '<br>$_SESSION[user] == Bartosz Lewiński = true';
//}else{
//    echo '<br>$_SESSION[user] == Bartosz Lewiński = false';
//}
if (isset($_SESSION['userLogin'])){
$SQL = sprintf('SELECT `Password` FROM `login` WHERE `login` = "'.$_SESSION['userLogin'].'";');
}
echo '<br>SQL: '.$SQL;
$passDB = mysql_result(mysql_query($SQL), 0);

echo '<br>$passDB):'.$passDB;
echo '<br>$passOLD:'.$passOLD;
echo '<br>$passNEW'.$passNEW;

echo '//******************************<br>
Tymczasowo ustalone hasło na sztywno wpisywane do BD!!!!!! usunąć!!!!<br>
'.__FILE__.'  '.__LINE___.'<br>
//******************************';
// PONIŻSZE USUNĄĆ (Wystarczy zakomentować)!!!!!!!!!!!!!!!!!!!!!!!!!!!
$passNEW = sha1('haslo');

if ($passDB == $passOLD){
    echo '<br>TO ZMIENIAM hasło z BD (Update)!';
    $SQL = sprintf('UPDATE `login` SET `Password`="'.$passNEW.'" WHERE `login` = "'.$login.'";');
    echo '<br>SQL:'.$SQL;
    mysql_query($SQL) or die('<br>===============<br>NIE udało sie ZMIENIĆ hasła<br>===============<br>');
}
else if ($passOLD == sha1('123456789WqX%')){            // jest równe fikcyjnemu haslu z MakeLoginPanel.php
    echo '<br>TO TWORZE NOWE HASŁO!!!!! hasło!';
    $SQL = sprintf('INSERT INTO `login`(`ID_Osoba`, `login`, `Password`, `Uprawnienie`, `lastLogin`) 
                    VALUES ("'.$ID_Osoba.'", "'.$login.'", "'.$passNEW.'", "'.$upraw.'", "'.time().'");');
    echo '<br>SQL:'.$SQL;
    mysql_query($SQL) or die('<br>===============<br>NIE udało sie UTWORZYĆ hasła<br>===============<br>');
}

$_SESSION['title'] = 'Przelogowanie | Re-Loggin';
header("Location: ".HTTP_HTDOCS.'Index.php?Main_view_name=login');
?>
