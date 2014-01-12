<?php
/* * **************************************************
 * Project:     Transport_Proj_Zesp
 * Filename:    RegisterPanel.php
 * Encoding:    UTF-8
 * Created:     2014-01-11
 *
 * Author       Bartosz M. Lewiński <jabarti@wp.pl>
 * ************************************************* */
/*$arrFormCont = array( 'PESEL' => '', 
                        'Imie' => '', 
                        'Imie2' => '', 
                        'Nazwisko' => '', 
                        'Adres_Ulica' => '',
                        'Adres_Kod' => '',
                        'Adres_Miasto' => '', 
                        'Adres_Kraj' => '', 
                        'telefon_kom' => '', 
                        'telefon_kom2' => '', 
                        'telefon_stacjonarny' => '',
                        'FAX' => '', 
                        'email' => '', 
                        'Plec' => '', 
                        'Data_urodzenia' => '');;/***/

$SESSFormName = 'RegisterForm';

$arrFormContERR = array('PESEL' => '', 
                        'Imie' => '', 
                        'Nazwisko' => '', 
                        'Adres_Ulica' => '',
                        'Adres_Kod' => '',
                        'Adres_Miasto' => '', 
                        'telefon_kom' => '', 
                        'email' => '');

$arrFormCont = array(   'Imie2' => '', 
                        'Adres_Kraj' => '', 
                        'telefon_kom2' => '', 
                        'telefon_stacjonarny' => '',
                        'FAX' => '', 
                        'Data_urodzenia' => '');
$arrPlecOption = array('M','K');

//echo '<br> Leci foreach';
//DisplayArr($arrPlecOption);
//echo '<br>=================';

//$arrFormContUR = array('');
//$arrFormContHidd = array('');
//$arrFormContTArea = array('');
 

Form('Register', 'RegisterPanel_Mod.php', 'Formularz rejestracyjny', 'RegisterForm', 'head');
//CreateTextForm($arrFormContUR, true);
CreateTextForm($arrFormContERR);
?>
<th>Poniższe dane są niewymagane</th>
<?php
CreateTextForm($arrFormCont, false);
CreateOptionForm('Plec', $arrPlecOption);
?>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
        <tr>
            <td>Data urodzenia</td>
            <td ><input type="text" id="datepicker" name="data_czas" /><td>
        </tr>
        <tr>
            <td>To może regDate!</td>
            <td ><input type="date" name="regDate" value=" <?php echo date('Y-m-d, H:i:s'); ?>" readonly/><td>
        </tr>
<?php
//CreateHiddenTextForm($arrFormContHidd);
//CreateTextareaForm($arrFormContTArea, 25, 5);
Form('Register', 'RegisterPanel_Mod.php', 'Formularz rejestracyjny', $SESSFormName, 'foot');
//Form('Contact', 'Form_Contact_Mod.php', 'Formularz zgłoszeniowy', $SESSFormName, 'foot');

if (isset($_SESSION[$SESSFormName.'RES'])){
    if($_SESSION[$SESSFormName.'RES']){
        echo '<p class="yellow"><b>Formularz skutecznie wysłany.</b></p>';
    }else{
        echo '<p class="red"><b>ERROR Nie udało się skutecznie wysłać formularza!!!</b></p>';
    }
}else{
    echo 'Formularz nie wysłany';
}



?>
