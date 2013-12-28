<?php

/*
 * osoba.class.php
 */

/*
 * Description of osoba
 * @author Bartek Lewiński
 //*/
class Osoba extends Obiekt{

    /*
     * unikalne ID w bazie danych
     * @var varchar
    //*/

    
    /*
     * Imię w bazie danych
     * @var varchar
    //*/    
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
    
            
    /**
    * Returns the database table of the Cuser object
    * @return string Allways returns "user".
    */
    public function table() {
	return "osoba";
    }
    
    public $Osoba_pola = array();
   // public $fields = array('PESEL', 'Imie', 'Imie2', 'Nazwisko', 'Adres_Ulica','Adres_Kod','Adres_Miasto', 'Adres_Kraj', 'telefon_kom', 'telefon_kom2', 'telefon_stacjonarny','FAX', 'email', 'Plec', 'Data_urodzenia');
    /**/
    		/*$this->PESEL,$this->Imie,$this->Imie2,$this->Nazwisko,$this->Adres_Ulica,$this->Adres_Kod,$this->Adres_Miasto,$this->Adres_Kraj,
		$this->telefon_kom,$this->telefon_kom2,$this->telefon stacjonarny,$this->FAX,$this->email,$this->Plec,$this->Data_urodzenia*/
    /*
     * konstruktor klasy osoba
     * @param	Integer	id			
    //*/
    public function __construct($PESEL, $Imie, $Nazwisko){
      $this->_Imie = $Imie;
      $this->_Imie = $Nazwisko;
      $this->_PESEL = $PESEL;
      
      $sql = 'SELECT `ID_Osoba` FROM '.$this->table().' WHERE PESEL='.$this->_PESEL.';';
      echo 'linia: '.__LINE__.' '.$sql;
      $ID_Osoba = mysql_result(mysql_query($sql),0);
      
      if($ID_Osoba){
          echo '<br>Jest już w bazie!!!';
          
          $sql = 'UPDATE '.$this->table().' SET `Imie2`=[value-4],`Nazwisko`=[value-5],`Adres_Ulica`=[value-6],
                 `Adres_Kod`=[value-7],`Adres_Miasto`=[value-8],`Adres_Kraj`=[value-9],`telefon_kom`=[value-10],
                 `telefon_kom2`=[value-11],`telefon stacjonarny`=[value-12],`FAX`=[value-13],`email`=[value-14],
                 `Plec`=[value-15],`Data_urodzenia`=[value-16] WHERE `ID_Osoba` = '.$ID_Osoba.';';
      }else{
          echo '<br>NIE Jest';
          $sql = 'INSERT INTO `osoba`(`PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, 
                                      `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, 
                                      `Plec`, `Data_urodzenia`) 
                                      VALUES (
                                      [value-1],
                                      [value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16])'.';';
      }
      
   } // end __construct();

    public function GetOsobaById($ID_Osoba){
        $this->_ID_Osoba = $ID_Osoba;
		if ($id_osoba) {
                        $sql = 'SELECT * FROM '.$this->table().' WHERE PESEL='.$id_osoba;
                        echo 'linia: '.__LINE__.' '.$sql;
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
                        
                        mysql_free_result($result);
                        if ($row) {
                                $this->_ustawArtybut($row);
                        } else {
                                $this->id = 0;
                        }
                        
                        return $row;
		}
    }
    
    public function getImie(){
        return $this->imie = $row[3];
    }
    
    
    //public function setData( $this->PESEL, $this->Imie, $this->Imie2, $this->Nazwisko, $this->Adres_Ulica, $this->Adres_Kod, $this->Adres_Miasto, $this->Adres_Kraj, $this->telefon_kom, $this->telefon_kom2, $this->telefon_stacjonarny, $this->FAX, $this->email, $this->Plec, $this->Data_urodzenia)
    public function setData( $PESEL ,$Imie=null, $Imie2=null, $Nazwisko=null, $Adres_Ulica=null,$Adres_Kod=null,$Adres_Miasto=null, $Adres_Kraj=null, $telefon_kom=null, $telefon_kom2=null, $telefon_stacjonarny=null,$FAX=null, $email=null, $Plec=null, $Data_urodzenia=null)
                {
                /*$ID_Osoba = $this->ID_Osoba;*/
                $PESEL = $this->PESEL;
                $Imie = $this->Imie;
                $Imie2 = $this->Imie2;
                $Nazwisko = $this->Nazwisko;
                $Adres_Ulica = $this->Adres_Ulica;
                $Adres_Kod = $this->Adres_Kod;
                $Adres_Miasto = $this->Adres_Miasto;
                $Adres_Kraj = $this->Adres_Kraj;
                $telefon_kom = $this->telefon_kom;
                $telefon_kom2 = $this->telefon_kom2;
                $telefon_stacjonarny = $this->telefon_stacjonarny;
                $FAX = $this->FAX;
                $email = $this->email;
                $Plec = $this->Plec;
                $Data_urodzenia = $this->Data_urodzenia;   
                
                $sql1 = mysql_real_escape_string('SELECT * FROM '.$this->table().' WHERE PESEL='.$PESEL.'');
                echo '<br>Oto ten SQL1 z osoba.class: '.$sql1.'<br>';
                $res =  mysql_fetch_array(mysql_query($sql1));
                var_dump($res);
                
                if( !$res[0]){
                    //`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`)
                    
                    $sql2 = 'INSERT INTO `osoba`(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`,
                    `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon_stacjonarny`,
                    `FAX`, `email`, `Plec`, `Data_urodzenia`) 
                            VALUES ("",
                                    "'.$this->PESEL.'",
                                    "'.$this->Imie.'",
                                    "'.$this->Imie2.'",
                                    "'.$this->Nazwisko.'",
                                    "'.$this->Adres_Ulica.'",
                                    "'.$this->Adres_Kod.'",
                                    "'.$this->Adres_Miasto.'",
                                    "'.$this->Adres_Kraj.'",
                                    "'.$this->telefon_kom.'",
                                    "'.$this->telefon_kom2.'",
                                    "'.$this->telefon_stacjonarny.'",
                                    "'.$this->FAX.'", 
                                    "'.$this->email.'",
                                    "'.$this->Plec.'",
                                    "'.$this->Data_urodzenia.'")';
                    echo '<br>Oto ten SQL2 z osoba.class: '.$sql2.'<br>';
                    $mres = mysql_real_escape_string($sql2);
                    mysql_query($mres) or die ('zapytanie nie wykonane');
                } else {
                    echo 'Jest już w BD taka osoba';
                }
	}
        
        
        public function getIdByPESEL() {
                echo '$this->PESEL:'.$this->PESEL;
		$query = mysql_real_escape_string('SELECT * FROM '.$this->table().' WHERE PESEL='.$this->PESEL.'');
                echo '<br>'.$query.'<br>';
                $res =  mysql_fetch_array(mysql_query($query));
                var_dump($res);
                return $this->ID_Osoba = $res[0];
	}
    
    
    function _ustawArtybut(&$row)
    {
	foreach ($row as $key => $value)
		$this->$key = $value;
    }
    
    	public function hideable() {
		return true;
	}
    
}

?>
