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
<form id="Contact1" name="Contact2" action="<?php echo HTTP_MODELS_PATH.'Form_Contact_Mod.php' ?>" method="POST">
    <input type="text" name="imie" value="<?php echo (isset($_SESSION['imie'])) ? $_SESSION['imie']: ''; ?>"></input>    
    <input type="text" name="imie" value="<?php echo (isset($_SESSION['imie'])) ? $_SESSION['imie']: ''; ?>"></input>    
    
    <input type="submit" name="Contact3" value="Wyślij">
</form>