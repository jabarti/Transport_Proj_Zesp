<?php 
//$name = sha1('login');
//$name = 'login';
//function CreateButton($file, $title, $direction = '',$path = HTTP_HTDOCS){
//    if ($file && $title){
// ?>   
    <!--<a href="////<?php echo $path.$file.'?Main_view_name='.$direction ?>" class="myButton"><?php echo $title ?></a>-->
 <?php  
//    }
//    else{
//?>
        <!--<a href="/.." class="myButton">localhost</a>-->
<?php
//    }
//}

if (isset($_SESSION['upraw'])){
    switch($_SESSION['upraw']){
        case 'admin':
?>
            <div class="guziki">
                <a href="/.." class="myButton">localhost</a>
                <a href="<?php echo HTTP_HTDOCS.'Index.php' ?>" class="myButton">Do Głównej</a>
<!--                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>-->
                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj Osobe</a>
                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=MakeLogin' ?>" class="myButton">Zmień hasło</a>
                <a href="<?php echo HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>  
<?php
        break;
    
        case 'pracownik':
?>      
            <div class="guziki">
                <a href="<?php echo HTTP_HTDOCS.'Index.php' ?>" class="myButton">Do Głównej</a>
                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj osobe</a>
                <a href="<?php echo HTTP_VIEWS_PATH.'MakeLoginPanel.php?MakeLogin' ?>" class="myButton">Zmień hasło</a>
                <a href="<?php echo HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>
<?php
        break;
    
        case 'klient':
?>      
            <div class="guziki">
                <a href="<?php echo HTTP_HTDOCS.'Index.php' ?>" class="myButton">Do Głównej</a>
                <!--<a href="<?php echo HTTP_VIEWS_PATH.'MakeLoginPanel.php?MakeLogin=change' ?>" class="myButton">Zmień hasło</a>-->
                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=MakeLogin' ?>" class="myButton">Zmień hasło</a>
                <a href="<?php echo HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>
<?php            
        break;
    
        default:
?>      
            <div class="guziki">
                <!--<a href="/.." class="myButton">localhost</a>-->
                <a href="<?php echo HTTP_HTDOCS.'Index.php' ?>" class="myButton">Do Głównej</a>
                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>
                <a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj się</a>
                <a href="<?php echo HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
            </div>
<?php 
        break;
    }
}else{

?>      
<div class="guziki">
	<!--<a href="/.." class="myButton">localhost</a>-->
	<a href="<?php echo HTTP_HTDOCS.'Index.php' ?>" class="myButton">Do Głównej</a>
	<a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=login' ?>" class="myButton">Zaloguj</a>
	<a href="<?php echo HTTP_HTDOCS.'Index.php?Main_view_name=register' ?>" class="myButton">Zarejestruj się</a>
	<a href="<?php echo HTTP_MODELS_PATH.'LoggOut_Mod.php'?>" class="myButton">Wyloguj</a>
</div>
<?php 
}
?>
