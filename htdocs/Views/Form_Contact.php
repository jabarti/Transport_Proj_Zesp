<?php

/**
 * Filename: Form_Contact.php
 * 
 * Created: 2014-01-09
 *
 * @author Bartosz M. Lewiński <jabarti@wp.pl>
 */
/*
    protected $_ID_Osoba;   
    protected $_PESEL;
    protected $_Imie;
    protected $_Imie2;
    protected $_Nazwisko;
    protected $_Adres_Ulica;
    protected $_Adres_Kod;
    protected $_Adres_Miasto;
    protected $_Adres_Kraj;
    protected $_telefon_kom;
    protected $_telefon_kom2;
    protected $_telefon_stacjonarny;
    protected $_FAX;
    protected $_email;
    protected $_Plec;
    protected $_Data_urodzenia;
 * 
 * $Gosc = new Osoba(null, '1111111113', 'Jurij', 'Wiktor', 'Gagarin',"Kosmonautów 12", 
 * '42-212', "Warszawa")or die('NIe moge utworzyc takiej osoby');
 */
    /**/

?>
<form id="Contact" action="<?php echo HTTP_MODELS_PATH.'Form_Contact_Mod.php' ?>" method="POST">
    <table>
        <th colspan="2"> Formularz zgłoszeniowy </th>
        <tr>
            <td>Imie</td>
            <td><input type="text" name="imie" value="<?php echo (isset($_SESSION['imie'])) ? $_SESSION['imie']: ''; ?>"></input> </td>
        </tr>
        <tr>
            <td>Nazwisko</td>
            <td><input type="text" name="nazwisko" value="<?php echo (isset($_SESSION['nazwisko'])) ? $_SESSION['nazwisko']: ''; ?>"></input></td>
        <tr>
         <tr>
            <td>email</td>
            <td><input type="text" name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email']: ''; ?>"></input></td>
        <tr>
        <tr>
            <td>phone</td>
            <td><input type="text" name="phone" value="<?php echo (isset($_SESSION['phone'])) ? $_SESSION['phone']: ''; ?>"></input></td>
        <tr>
        <tr>
            <td>Zgłoszenie</td>
            <td><textarea name="zgloszenie" cols="25" rows="5"><?php echo (isset($_SESSION['zgloszenie'])) ? $_SESSION['zgloszenie']: 'Enter your request here...'; ?></textarea></td>
<!--            <td><input type="textbox" name="zgloszenie" value="<?php echo (isset($_SESSION['zgloszenie'])) ? $_SESSION['zgloszenie']: 'Enter your request here...'; ?>"></input></td>-->
        <tr>
            <td></td>
            <td style="text-align: right;"><input type="submit" name="ContactForm" value="Wyślij"></td>
        </tr>
    </table>
</form>