<?php
/* * *********************************************
 * Filename:    LogInPanel.php
 * 
 * Created:     2014-01-11
 *
 * @author      Bartosz M. Lewiński <jabarti@wp.pl>
 * ********************************************* */

require_once "common.inc.php";
//require VIEWS_PATH.DIRECTORY_SEPARATOR.'header.php';
?>

<h4 style="text-align: center">Proszę się zalogować<br>Dalsza praca tylko dla zalogowanych użytkowników</h4>
<?php 
//echo '<br>linia: '.__LINE__.' '.$BASE_FILE;

$_SESSION['title'] = 'Logowanie';

//echo '<br>'.$_SESSION['count'].'<br>';
?>   
<form action='<?php echo HTTP_MODELS_PATH."LogInPanel_Mod.php"; ?>' method="POST">       
    <table>
        <tr>
            <td>Użytkownik/Login:</td>
            <!--td><input type="text" name="uzytkownik"></td--> <!-- To MA BYć w wersji WORK!!!!!!!!!!!!!!!!!!!!!!!!! -->
            <td><select name="uzytkownik" >															 <!-- To jest absolutnie niepoprawne i ma by� USUNIETE!!!! -->
                    <option>jabarti</option>
                    <option>admin</option>
                    <option>brak</option>
                    <option>handl</option>
            </select></td>
	</tr>
	<tr>
            <td>Hasło:</td>
            <td><input type="password" name="pass" value="haslo"></td> <!-- Remove 'haslo" in Workable!!!!-->
	</tr>
    </table>
    <input type="submit" value="Zaloguj"/>
</form>
<?php                // SIMPLE 1


