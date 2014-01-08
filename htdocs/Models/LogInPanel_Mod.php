<?php
/* 
 * @author Bartosz Lewiński <jabarti@wp.pl>
 *
 */

require_once "../common.inc.php";

$_SESSION['title'] = 'Main | Główna';
//echo '<br>$_SESSION[\'title\']: '.$_SESSION['title'];

	//echo "Polaczony z baza(forma.inc.php): ".$bd."<br>";
	//_CheckConnection($DBConn);
	
	if(isset($_POST['uzytkownik'])&& isset($_POST['pass']))
	{
		echo 'linia: '.__LINE__.' '.'Krok0: OK<br>';
		$uzy = $_POST['uzytkownik'];
                echo 'linia: '.__LINE__.' '.$uzy;
		$has = $_POST['pass'];
		$hah = sha1($has);
		//echo $hah."<br>";
		if(!empty($uzy)&&!empty($has)){
				echo '<br>linia: '.__LINE__.' '.'Krok1: OK<br>';
/*SQL 01*/			$SQL_Log_001 = sprintf("SELECT `ID_Osoba` FROM `login` WHERE `login` ='".mysql_real_escape_string($uzy)."'AND `Password`='".mysql_real_escape_string($hah)."'");

								
							echo '<br>linia: '.__LINE__.' '.'Krok2: OK<br>'.$SQL_Log_001."<br>";
							echo '<br>linia: '.__LINE__.' '."Polaczony z baza: ".$dbname;
								//*/
                                echo "<br>".$DBConn;
				$mq_Log_001 = mysql_query($SQL_Log_001,$DBConn) or die ('<br>linia: '.__LINE__.'<br>sorry zły sql') or die(mysql_error());
                                                        
				if($mq_Log_001)
				{
					echo '<br>__FILE__: '.__FILE__.' | linia: '.__LINE__.' '.'Krok3: OK<br>';
					echo '<br>linia: '.__LINE__.' '."mysql_query: ".$mq_Log_001;
					echo '<br>linia: '.__LINE__.' '."\$mq_Log_001= ".$mq_Log_001."<br>";

					$mnr_Log_001 = mysql_num_rows($mq_Log_001);
					if($mnr_Log_001 == 0)
					{	
						echo '<br>linia: '.__LINE__.' '.'Krok4: NO!!<br>';
						echo '<br>linia: '.__LINE__.' '."Zła nazwa użytkownika lub hasło!";
                                                echo '$_COOKIE[\'user\']: '.$_COOKIE['user'];
                                                unset($_COOKIE['user']);
                                                session_destroy();
                                                echo '$_COOKIE[\'user\']: '.$_COOKIE['user'];
                                                header('Location: '.$ref);   	// - wróci do strony z której było logowanie.
					}
					else if($mnr_Log_001 == 1)
						{
							echo '<br>linia: '.__LINE__.' '.'Krok4: OK<br>';
							echo '<br>linia: '.__LINE__.' '.'Sukces<br>';
							//=================  POBIERA UPRAWNIENIA =====================''
/*SQL 02*/			$SQL_Log_002 = sprintf("SELECT `Uprawnienie` FROM `login`
							WHERE `ID_Osoba` = '".mysql_result($mq_Log_001, 0, 0)."'");
							echo 'linia: '.__LINE__.' '.$SQL_Log_002."<br>";
							$mq_Log_002 = mysql_query($SQL_Log_002, $DBConn) or die('<br>linia: '.__LINE__.' Wykonanie zapytania nie powiodło się : ' . mysql_error());
							$mr_Log_002 = mysql_result($mq_Log_002, 0, 0);
							$_SESSION['upraw'] = $mr_Log_002;
                                                        echo $_SESSION['upraw'];
							//==========  =======*/
/*SQL 03*/			$SQL_Log_003 = sprintf("SELECT CONCAT(`imie`,' ', `nazwisko`) FROM `osoba` os join `pracownik` pr ON (os.`ID_Osoba` = pr.`osoba_ID_Osoba`)
																		WHERE `ID_Osoba` = '".mysql_result($mq_Log_001, 0, 0)."'");
							echo '<br>linia: '.__LINE__.$SQL_Log_003."<br>";
							$mq_Log_003 = mysql_query($SQL_Log_003, $DBConn) or die('<br>linia: '.__LINE__.' Wykonanie zapytania nie powiodło się : ' . mysql_error());
							$mr_Log_003 = mysql_result($mq_Log_003, 0, 0);
							$_SESSION['user'] = $mr_Log_003;
							echo $_SESSION['user']."<br>";
							//================= to bedzie klucz sesji!!
							$uzytk = mysql_result($mq_Log_001, 0, 0);
							$_SESSION['uzytk'] = $uzytk;
                                                        
							
							echo '<br>linia: '.__LINE__."\$uzytk: ".$uzytk;
							echo '<br>linia: '.__LINE__."\$_SESSION\[\'uzytk\'\]: ".$_SESSION['uzytk'];
                                                        echo '<br>linia: '.__LINE__.$ref;
                                                        
							header('Location: '.$ref);   	// - wróci do strony z której było logowanie.
															// header('Location: index.php'); - wr�ci tylko do index.php
															// $ref - W��CZONE!!!!!!!!!!!!! w core_v2.0.inc.php!!!!!!!!!!
						}
				}
				else
				{
					echo '<br>linia: '.__LINE__.' '.'Krok3: NO!<br>';
				}		
			}
			else
			{
				echo '<br>linia: '.__LINE__.' '."Musisz wypełnić wszystkie pola";
			}
	}
	//else
	//{
	//echo 'Krok0: NO<br>';
	//_CheckConnection($DBConn);
	//}
?>
