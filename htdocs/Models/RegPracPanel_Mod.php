<?php

/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegPracPanel_Mod.php
 * Encoding:    UTF-8
 * Created:     2014-01-17
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
require_once "../common.inc.php";
echo '<br>============== $_SESSION ============================<br>';
DisplayArr($_SESSION);
echo '<br>================$$POST==========================<br>';
DisplayArr($_POST);

$PracForm = $_POST;

$Prac = new Pracownik($PracForm);
?>
