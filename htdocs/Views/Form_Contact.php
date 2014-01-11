<?php
/***********************************************
 * Filename: Form_Contact.php
 * 
 * Created:  2014-01-09
 *
 * @author   Bartosz M. Lewiński <jabarti@wp.pl>
 ***********************************************/
?>

<form id="Contact" action="<?php echo HTTP_MODELS_PATH.'Form_Contact_Mod.php' ?>" method="POST">
    <table>
        <th colspan="2"> Formularz zgłoszeniowy </th>
<?php

//$arrFormCont = array('imie' => '','nazwisko'=> '', 'email' => '', 'phone' => '');
CreateTextForm($arrFormContUR, true);
CreateTextForm($arrFormCont);
CreateHiddenTextForm($arrFormContHidd);
CreateTextareaForm($arrFormContTArea, 25, 5)

?>        
            <td></td>
            <td style="text-align: right;"><input type="submit" name="ContactForm" value="Wyślij"></td>
        </tr>
    </table>
</form>