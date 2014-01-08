<?php
require_once "common.inc.php";
//require VIEWS_PATH.DIRECTORY_SEPARATOR.'header.php';
?>

<h4 style="text-align: center">Proszę się zalogować<br>Dalsza praca tylko dla zalogowanych użytkowników</h4>
<?php 
echo '<br>linia: '.__LINE__.' '.$BASE_FILE;

$_SESSION['title'] = 'Logowanie';

echo '<br>'.$_SESSION['count'].'<br>';
?>
<!--<form action='<?php echo MODELS_PATH.DIRECTORY_SEPARATOR."LogInPanel_Mod.php"; ?>' method="POST">       <!-- // SIMPLE 1 -->
<form action='../htdocs/Models/LogInPanel_Mod.php' method="POST">       <!-- // SIMPLE 1 -->
<!--<form action=<?php echo $BASE_FILE; ?> method="POST">       <!--        // SIMPLE 1 -->

	<table>
		<tr>
			<td>Użytkownik/Login:</td>
			<!--td><input type="text" name="uzytkownik"></td-->     							 <!-- To MA BY�!!!!!!!!!!!!!!!!!!!!!!!!! -->
			<td><select name="uzytkownik" >															 <!-- To jest absolutnie niepoprawne i ma by� USUNIETE!!!! -->
								<option>jabarti</option>
								<option>admin</option>
								<option>brak</option>
								<option>handl</option>
					</select></td>
		</tr>
		<tr>
			<td>Hasło:</td>
			<td><input type="password" name="pass" value="haslo"></td>
		</tr>
	</table>
	<input type="submit" value="Zaloguj"/>

</form>

<?php                // SIMPLE 1


