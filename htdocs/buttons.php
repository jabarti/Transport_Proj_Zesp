<?php 
//$name = sha1('login');
$name = 'login';
?>


<div class="guziki">
	<a href="/.." class="myButton">localhost</a>
	<a href="<?php echo HTTP_HTDOCS.'Index.php' ?>" class="myButton">Do Głównej</a>
	<a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name='.$name ?>" class="myButton">Zaloguj</a>
	<a href="<?php echo HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>

</div>