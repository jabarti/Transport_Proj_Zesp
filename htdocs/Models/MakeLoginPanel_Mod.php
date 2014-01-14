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

echo '<br>==========================================<br>';
echo 'haslo1: '.$_POST['haslo1'].', sha1(haslo): '.sha1($_POST['haslo1']);
echo '<br>haslo: ff12bbd8c907af067070211d87bdf098be17375b'



//header("Location: ".HTTP_HTDOCS.'Index.php');
?>
