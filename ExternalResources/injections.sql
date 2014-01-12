INSERT INTO `apipo`.`osoba` 
(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`,
 `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`) 
VALUES 
(NULL, '75050106655', 'Bartek', 'Michał', 'Lewiński', 'OW 11/90', '42-200', 'Czestochowa', 
'Polska', '600000000', NULL, NULL, NULL, NULL, 'M', NULL);

UPDATE `apipo`.`osoba` SET `email` = 'jabarti@wp.pl' WHERE `osoba`.`ID_Osoba` = 2;


INSERT INTO `apipo`.`osoba` 
(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`,
 `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`) 
VALUES (NULL, '75050106657', 'Herek', 'Mich', 'Lewi', 'OW', '42-200', 'Czestochowa', 'Polska', '601', '0', '0', '0', 'ja',
 'M', '2013-11-07');


INSERT INTO `apipo`.`osoba` 
(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`,
 `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`) 
VALUES (NULL, '75050106651', 'Rab', NULL, 'Fongus', '', '42-200', 'Czestochowa', 'Polska', '', NULL, NULL, NULL, NULL, 'M',
 NULL);

INSERT INTO `apipo`.`osoba` 
(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`, `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`) 
VALUES (NULL, '22222222222', 'Szef', NULL, 'Szef', 'Szefoska 13', '42-200', 'Czestochowa', 'Polska', '1111111', NULL, NULL, NULL, 'szef@2.2', 'F', '1999-01-01');

INSERT INTO `apipo`.`pracownik` (`ID_Pracownik`, `Stanowisko`, `Pensja`, `data_zatrudnienia`, `data_zwolnienia`, 
`tel_sluzb`, `mail_sluzb`, `osoba_ID_Osoba`) 
VALUES ('1', 'Admin', '1000', '2014-01-01', NULL, NULL, NULL, '2');

INSERT INTO `apipo`.`pracownik` (`ID_Pracownik`, `Stanowisko`, `Pensja`, `data_zatrudnienia`, `data_zwolnienia`, `tel_sluzb`, `mail_sluzb`, `osoba_ID_Osoba`) 
VALUES (NULL, 'Manager', '2000', '2014-01-07', NULL, '12121212', '12121212', '5');

INSERT INTO `apipo`.`login` (`ID_Osoba`, `login`, `Password`, `Uprawnienie`) 
VALUES ('2', 'jabarti', 'ff12bbd8c907af067070211d87bdf098be17375b', 'admin');

INSERT INTO `apipo`.`login` (`ID_Osoba`, `login`, `Password`, `Uprawnienie`) 
VALUES ('5', 'admin', 'ff12bbd8c907af067070211d87bdf098be17375b', 'admin'); 

INSERT INTO `apipo`.`login` (`ID_Osoba`, `login`, `Password`, `Uprawnienie`) VALUES ('1', 'Alus', 'ff12bbd8c907af067070211d87bdf098be17375b', 'klient');

INSERT INTO `apipo`.`formularz` (`imie`,`nazwisko`,`email`,`phone`,`zgloszenie`) VALUES ("Bartek","Lewiński","jabarti@wp.pl","600000000","Enter your request here...");

INSERT INTO `apipo`.`klient` (`ID_Klient`, `osoba_ID_Osoba`) VALUES (NULL, '1');

INSERT INTO `apipo`.`pracownik` (`ID_Pracownik`, `Stanowisko`, `Pensja`, `data_zatrudnienia`, `data_zwolnienia`, `tel_sluzb`, `mail_sluzb`, `osoba_ID_Osoba`) 
VALUES (NULL, 'Spedytor', '2000', '2014-01-07', NULL, '12121212', 'rab@firma.com', '4');

INSERT INTO `apipo`.`login` (`ID_Osoba`, `login`, `Password`, `Uprawnienie`) VALUES ('4', 'spedytor', 'ff12bbd8c907af067070211d87bdf098be17375b', 'pracownik');