<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    MakeLoginPanel.php
 * Encoding:    UTF-8
 * Created:     2014-01-14
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
//require_once "common.inc.php";
if (isset($_SESSION['userLogin'])){
    $login = $_SESSION['userLogin'];
    $type = 'password';
    $readonly = 'readonly = readonly';
    $OldPass = 'haslo';   // MA BYC PUSTE!!!!
    $upraw = '       
        <tr>
            <td>Uprawnienia:</td>
            <td><select id="upraw" name="upraw">
                    <option>admin</option>
                    <option>manager</option>
                    <option>pracownik</option>
                    <option>klient</option>
                </select>
            </td>
	</tr>';
}else{
    $login = '';
    $type = 'hidden';
    $readonly = '';
    $OldPass = '123456789WqX%';   // Jest zmienione, takie jest tylko do walidacji nowych haseł - nie ma to znaczenia!
    $upraw = '        
        <tr>
            <td colspan="2"><input type="hidden" id="upraw" name="upraw" value="Klient" ></input></td>
	</tr>';
}

if(isset($_GET['MakeLogin'])){
    echo $_GET['MakeLogin'];
    
    switch($_GET['MakeLogin']){
        case 'first':
            echo '<br>$_GET[\'MakeLogin\'] == first';
            break;
        
        case 'change':
            echo '<br>$_GET[\'MakeLogin\'] == change';
            break;
        
        default:
            echo '<br>$_GET[\'MakeLogin\'] == default';
            break;
    }
}
//    echo HTTP_MODELS_PATH;
    $Path = HTTP_MODELS_PATH.'MakeLoginPanel_Mod.php';

echo '  
<form id="MakeLogin" action='.$Path.' method="POST">       
    <table>
        <tr>
            <td>Użytkownik/Login:</td>
            <td><input type="text" id="uzytkownik" name="uzytkownik" '.$readonly.' value='.$login.'></td>
	</tr>
        <tr>
            <td colspan="2"><div id="erroruzytkownik" class="error"></div></td>
	</tr>
        <tr>
            <td>Stare hasło:</td>
            <td><input type="'.$type.'" id="haslo1" name="haslo1" value="'.$OldPass.'"></td>
	</tr>
        <tr>
            <td colspan="2"><div  id="errorhaslo1" class="error"></div></td>
	</tr>
	<tr>
            <td>Utwórz hasło:</td>
            <td><input type="password" id="haslo2" name="haslo2" value="haslo"></td>
	</tr>
        <tr>
            <td colspan="2"><div id="errorhaslo2" class="error"></div></td>
	</tr>
        <tr>
            <td>Powtórz hasło:</td>
            <td><input type="password" id="haslo3" name="haslo3" value="haslo"></td>
	</tr>
        <tr>
            <td colspan="2"><div id="errorhaslo3" class="error"></div></td>
	</tr>
        '.$upraw.'
    </table>
    <input type="submit" value="Zaloguj"/>
</form>
';
  
    
?>