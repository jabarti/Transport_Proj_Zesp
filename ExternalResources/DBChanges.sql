SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `apipo` ;
CREATE SCHEMA IF NOT EXISTS `apipo` DEFAULT CHARACTER SET utf8 ;
USE `apipo` ;

-- -----------------------------------------------------
-- Table `apipo`.`osoba`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apipo`.`osoba` ;

CREATE  TABLE IF NOT EXISTS `apipo`.`osoba` (
  `PESEL` VARCHAR(11) NOT NULL ,
  `Imie` VARCHAR(15) NOT NULL ,
  `Imie2` VARCHAR(15) NULL DEFAULT NULL ,
  `Nazwisko` VARCHAR(25) NOT NULL ,
  `Adres - Ulica` VARCHAR(45) NOT NULL ,
  `Adres - Kod` VARCHAR(6) NOT NULL DEFAULT '42-200' ,
  `Adres - Miasto` VARCHAR(25) NOT NULL DEFAULT 'Czestochowa' ,
  `Adres - Kraj` VARCHAR(15) NOT NULL DEFAULT 'Polska' ,
  `telefon kom` VARCHAR(15) NOT NULL ,
  `telefon kom2` VARCHAR(15) NULL DEFAULT NULL ,
  `telefon stacjonarny` VARCHAR(15) NULL DEFAULT NULL ,
  `FAX` VARCHAR(15) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `Rola` VARCHAR(6) NULL DEFAULT 'Klient' ,
  `Plec` VARCHAR(1) NOT NULL DEFAULT 'M' ,
  `Data urodzenia` DATE NULL DEFAULT NULL ,
  PRIMARY KEY (`PESEL`) ,
  UNIQUE INDEX `PESEL_UNIQUE` (`PESEL` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `apipo`.`pojazd`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apipo`.`pojazd` ;

CREATE  TABLE IF NOT EXISTS `apipo`.`pojazd` (
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
  PRIMARY KEY (`Nr_rej`, `Typ_Pojazdu_FK`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `apipo` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
