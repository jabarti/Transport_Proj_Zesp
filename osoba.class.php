<?php

/*
 * osoba.class.php
 */

/*
 * Description of osoba
 * @author Bartek Lewiński
 //*/
class osoba {

    /*
     * unikalne ID w bazie danych
     * @var varchar
    //*/
    var $id_osoba;
    /*
     * Imię w bazie danych
     * @var varchar
    //*/    
    
    var $imie;
    
    
    /*
     * konstruktor klasy osoba
     * @param	Integer	id			
    //*/

    function gc_picture($id_osoba=0)
    {
		if ($this->id_osoba = $id) {
			$result = mysql_query('SELECT * FROM osoba WHERE id='.$id);
			$row = mysql_fetch_assoc($result);
			mysql_free_Result($result);
			if ($row) {
				$this->_ustawArtybut($row);
			} else {
				$this->id = 0;
			}
		}
    }
    
    
    function _ustawArtybut(&$row)
    {
	foreach ($row as $key => $value)
		$this->$key = $value;
    }
    
}

?>
