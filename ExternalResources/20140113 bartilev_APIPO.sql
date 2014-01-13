SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `bartilev_APIPO` ;
CREATE SCHEMA IF NOT EXISTS `bartilev_APIPO` DEFAULT CHARACTER SET utf8 ;
USE `bartilev_APIPO` ;

-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`osoba`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`osoba` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`osoba` (
  `ID_Osoba` INT NOT NULL AUTO_INCREMENT ,
  `PESEL` VARCHAR(11) NULL ,
  `Imie` VARCHAR(15) NOT NULL ,
  `Imie2` VARCHAR(15) NULL DEFAULT NULL ,
  `Nazwisko` VARCHAR(25) NOT NULL ,
  `Adres_Ulica` VARCHAR(45) NOT NULL ,
  `Adres_Kod` VARCHAR(45) NOT NULL DEFAULT '42-200' ,
  `Adres_Miasto` VARCHAR(25) NOT NULL DEFAULT 'Czestochowa' ,
  `Adres_Kraj` VARCHAR(15) NOT NULL DEFAULT 'Polska' ,
  `telefon_kom` VARCHAR(15) NOT NULL ,
  `telefon_kom2` VARCHAR(15) NULL ,
  `telefon stacjonarny` VARCHAR(15) NULL ,
  `FAX` VARCHAR(15) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `Plec` ENUM('M','F') NOT NULL DEFAULT 'M' ,
  `Data_urodzenia` DATE NULL DEFAULT NULL ,
  `RegDate` DATETIME NULL DEFAULT NULL COMMENT 'Data rejestracji' ,
  PRIMARY KEY (`ID_Osoba`) ,
  UNIQUE INDEX `PESEL_UNIQUE` (`PESEL` ASC) ,
  UNIQUE INDEX `ID_Osoba_UNIQUE` (`ID_Osoba` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`Klient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`Klient` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`Klient` (
  `ID_Klient` INT NOT NULL AUTO_INCREMENT ,
  `osoba_ID_Osoba` INT NOT NULL ,
  PRIMARY KEY (`ID_Klient`) ,
  INDEX `fk_Klient_osoba1_idx` (`osoba_ID_Osoba` ASC) ,
  CONSTRAINT `fk_Klient_osoba1`
    FOREIGN KEY (`osoba_ID_Osoba` )
    REFERENCES `bartilev_APIPO`.`osoba` (`ID_Osoba` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`Zlecenie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`Zlecenie` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`Zlecenie` (
  `ID_Zlecenia` INT NOT NULL AUTO_INCREMENT ,
  `osoba_ID_Osoba` INT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `telefon` VARCHAR(45) NOT NULL ,
  `Adres_ul_1` VARCHAR(45) NOT NULL ,
  `Adres_kod_1` VARCHAR(6) NOT NULL ,
  `Adres_miast_1` VARCHAR(45) NOT NULL ,
  `Adres_ul_2` VARCHAR(45) NOT NULL ,
  `Adres_kod_2` VARCHAR(6) NOT NULL ,
  `Adres_miast_2` VARCHAR(45) NOT NULL ,
  `Klient_ID_Klient` INT NOT NULL ,
  PRIMARY KEY (`ID_Zlecenia`) ,
  INDEX `fk_Zlecenie_osoba1_idx` (`osoba_ID_Osoba` ASC) ,
  INDEX `fk_Zlecenie_Klient1_idx` (`Klient_ID_Klient` ASC) ,
  CONSTRAINT `fk_Zlecenie_osoba1`
    FOREIGN KEY (`osoba_ID_Osoba` )
    REFERENCES `bartilev_APIPO`.`osoba` (`ID_Osoba` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zlecenie_Klient1`
    FOREIGN KEY (`Klient_ID_Klient` )
    REFERENCES `bartilev_APIPO`.`Klient` (`ID_Klient` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`pojazd`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`pojazd` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`pojazd` (
  `ID_Pojazdu` INT NOT NULL AUTO_INCREMENT ,
  `Nr_rej` VARCHAR(8) NOT NULL ,
  `Typ_Pojazdu_FK` VARCHAR(7) NOT NULL DEFAULT 'TIR 44t' COMMENT 'TIR 44t\nTIR 25t\ndo3,5t\nod3,5t' ,
  `VIN` VARCHAR(17) NULL DEFAULT NULL ,
  `Marka` VARCHAR(10) NOT NULL ,
  `Model` VARCHAR(20) NOT NULL ,
  `poj_silnika [cm3]` FLOAT NOT NULL DEFAULT '12500' ,
  `DMC zestawu [kg]` FLOAT NOT NULL DEFAULT '42000' ,
  `Masa ciagnika [kg]` FLOAT NOT NULL DEFAULT '7200' ,
  `Waznosc_UDT` DATE NOT NULL ,
  `Waznosc_OC` DATE NOT NULL ,
  `Waznosc_AC` DATE NOT NULL ,
  `Waznosc_NNW` DATE NOT NULL ,
  `Waznosc_Bad_tech.` DATE NOT NULL ,
  `Wlasciciel_NIP_FK` VARCHAR(10) NULL DEFAULT NULL ,
  `Status dostepnosci` VARCHAR(10) NOT NULL DEFAULT 'OCZEKUJE' COMMENT 'aktywny = wykonuje zlecenie\noczekuje = oczekuje na zlecenie\nnieaktywny = remont itp. ' ,
  `Lokalizacja` ENUM('baza','trasa','inne') NOT NULL DEFAULT 'baza' COMMENT 'trasa / baza / inne' ,
  `ID_Zlecenia` INT NULL ,
  `ID_Osoba` INT NOT NULL ,
  PRIMARY KEY (`ID_Pojazdu`) ,
  INDEX `fk_pojazd_Zlecenie1_idx` (`ID_Zlecenia` ASC) ,
  UNIQUE INDEX `Nr_rej_UNIQUE` (`Nr_rej` ASC) ,
  INDEX `fk_pojazd_osoba1_idx` (`ID_Osoba` ASC) ,
  CONSTRAINT `fk_pojazd_Zlecenie1`
    FOREIGN KEY (`ID_Zlecenia` )
    REFERENCES `bartilev_APIPO`.`Zlecenie` (`ID_Zlecenia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pojazd_osoba1`
    FOREIGN KEY (`ID_Osoba` )
    REFERENCES `bartilev_APIPO`.`osoba` (`ID_Osoba` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`Login`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`Login` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`Login` (
  `ID_Osoba` INT NOT NULL ,
  `login` VARCHAR(45) NOT NULL ,
  `Password` VARCHAR(45) NOT NULL ,
  `Uprawnienie` ENUM('admin','manager','pracownik','klient') NOT NULL DEFAULT 'pracownik' COMMENT 'enum(\'admin\',\'manager\',\'pracownik\',\'klient\')' ,
  `lastLogin` DATETIME NULL ,
  PRIMARY KEY (`ID_Osoba`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  INDEX `fk_Login_osoba_idx` (`ID_Osoba` ASC) ,
  CONSTRAINT `fk_Login_osoba`
    FOREIGN KEY (`ID_Osoba` )
    REFERENCES `bartilev_APIPO`.`osoba` (`ID_Osoba` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`Pracownik`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`Pracownik` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`Pracownik` (
  `ID_Pracownik` INT NOT NULL AUTO_INCREMENT ,
  `Stanowisko` ENUM('Kierowca','Spedytor','Manager','Admin') NOT NULL COMMENT 'ENUM(\'Kierowca\',\'Spedytor\',\'Manager\',\'Admin\')' ,
  `Pensja` FLOAT NULL ,
  `data_zatrudnienia` DATE NOT NULL ,
  `data_zwolnienia` DATE NULL ,
  `tel_sluzb` VARCHAR(15) NULL ,
  `mail_sluzb` VARCHAR(45) NULL ,
  `osoba_ID_Osoba` INT NOT NULL ,
  PRIMARY KEY (`ID_Pracownik`) ,
  INDEX `fk_Pracownik_osoba1_idx` (`osoba_ID_Osoba` ASC) ,
  CONSTRAINT `fk_Pracownik_osoba1`
    FOREIGN KEY (`osoba_ID_Osoba` )
    REFERENCES `bartilev_APIPO`.`osoba` (`ID_Osoba` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bartilev_APIPO`.`Formularz`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bartilev_APIPO`.`Formularz` ;

CREATE  TABLE IF NOT EXISTS `bartilev_APIPO`.`Formularz` (
  `ID_Form` INT NOT NULL AUTO_INCREMENT ,
  `Imie` VARCHAR(45) NOT NULL ,
  `Nazwisko` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(45) NOT NULL ,
  `Klient_ID_Klient` INT NULL ,
  `zgloszenie` VARCHAR(45) NOT NULL ,
  `Zlecenie_ID_Zlecenia` INT NULL ,
  `RegData` DATETIME NULL COMMENT 'Data rej formularza' ,
  PRIMARY KEY (`ID_Form`) ,
  INDEX `fk_table1_Zlecenie1_idx` (`Zlecenie_ID_Zlecenia` ASC) ,
  INDEX `fk_table1_Klient1_idx` (`Klient_ID_Klient` ASC) ,
  CONSTRAINT `fk_table1_Zlecenie1`
    FOREIGN KEY (`Zlecenie_ID_Zlecenia` )
    REFERENCES `bartilev_APIPO`.`Zlecenie` (`ID_Zlecenia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_Klient1`
    FOREIGN KEY (`Klient_ID_Klient` )
    REFERENCES `bartilev_APIPO`.`Klient` (`ID_Klient` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `bartilev_APIPO` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bartilev_APIPO`.`osoba`
-- -----------------------------------------------------
START TRANSACTION;
USE `bartilev_APIPO`;
INSERT INTO `bartilev_APIPO`.`osoba` (`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`, `RegDate`) VALUES (1, '1111111', 'Ala', 'Ma', 'Kota', 'OM 12', '42-200', 'Częstochowa', 'Polska', '5005050', '1', '0', '0', 'j@wqwqw.pl', 'K', '1975-01-01', '2013-01-01');

COMMIT;
