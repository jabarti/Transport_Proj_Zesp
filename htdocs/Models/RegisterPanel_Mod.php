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

//if (isset($_POST['RegisterForm'])){
if (isset($_POST['RegisterForm'])){
    DisplayArr($_POST);
}
//header("Location: ".HTTP_HTDOCS.'Index.php?Main_view_name=register');
?>
