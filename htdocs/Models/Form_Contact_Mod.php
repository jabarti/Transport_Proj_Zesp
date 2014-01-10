<?php

/**
 * Filename: Form_Contact_Mod.php
 * 
 * Created: 2014-01-10
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 */

require_once "../common.inc.php";

if (isset($_POST[imie])){
    $imie = $_POST['imie'];
    $_SESSION['imie'] = $imie;
}


header("Location: ".HTTP_HTDOCS.'Index.php');
?>
