INSERT INTO `apipo`.`osoba` 
(`ID_Osoba`, `PESEL`, `Imie`, `Imie2`, `Nazwisko`, `Adres_Ulica`, `Adres_Kod`, `Adres_Miasto`, `Adres_Kraj`,
 `telefon_kom`, `telefon_kom2`, `telefon stacjonarny`, `FAX`, `email`, `Plec`, `Data_urodzenia`) 
VALUES 
(NULL, '75050106655', 'Bartek', 'Michał', 'Lewiński', 'OW 11/90', '42-200', 'Czestochowa', 
'Polska', '600000000', NULL, NULL, NULL, NULL, 'M', NULL);


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

INSERT INTO `apipo`.`pracownik` (`ID_Pracownik`, `Stanowisko`, `Pensja`, `data_zatrudnienia`, `data_zwolnienia`, 
`tel_sluzb`, `mail_sluzb`, `osoba_ID_Osoba`) 
VALUES ('1', 'Admin', '1000', '2014-01-01', NULL, NULL, NULL, '2');

INSERT INTO `apipo`.`login` (`ID_Osoba`, `login`, `Password`, `Uprawnienie`) 
VALUES ('2', 'jabarti', 'ff12bbd8c907af067070211d87bdf098be17375b', 'admin');
