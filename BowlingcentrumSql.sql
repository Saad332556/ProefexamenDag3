DROP DATABASE IF EXISTS BowlingCentrum;
CREATE DATABASE BowlingCentrum;
USE BowlingCentrum;



CREATE TABLE `TypePersoon`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`Naam` VARCHAR(10) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO TypePersoon (Naam, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES ( 'Klant', 1, '', SYSDATE(), SYSDATE())
, ( 'Medewerker', 1, '', SYSDATE(), SYSDATE())
, ( 'Gast', 1, '', SYSDATE(), SYSDATE());



CREATE TABLE `Persoon`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `TypePersoonId` INT UNSIGNED NOT NULL,
    `Voornaam` VARCHAR(255) NOT NULL,
    `Tussenvoegsel` VARCHAR(20) NULL,
    `Achternaam` VARCHAR(255) NOT NULL,
    `Roepnaam` VARCHAR(255) NOT NULL,
    `IsVolwassen` BIT NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
    ,FOREIGN KEY(`TypePersoonId`) REFERENCES `TypePersoon`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Persoon (TypePersoonId, Voornaam, Tussenvoegsel, Achternaam, Roepnaam, IsVolwassen, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES ( 1, 'Mazin', NULL, 'Jamil', 'Mazin', 1, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Arjan', 'de', 'Ruijter', 'Arjan', 1, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Hans', NULL, 'Odijk', 'Hans', 1, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Dennis', 'van', 'Wakeren', 'Dennis', 1, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Wilco', 'van de', 'Grift', 'Wilco', 1, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Tom', NULL, 'Sanders', 'Tom', 0, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Andrew', NULL, 'Sanders', 'Andrew', 0, 1, '', SYSDATE(), SYSDATE())
, ( 1, 'Julian', NULL, 'Kaldenheuvel', 'Julian', 1, 1, '', SYSDATE(), SYSDATE());



CREATE TABLE `Contact`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`PersoonId` INT UNSIGNED NOT NULL,
    `Mobiel` VARCHAR(15) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
    ,FOREIGN KEY(`PersoonId`) REFERENCES `Persoon`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Contact (PersoonId, Mobiel, Email, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES (1, '0612365478', 'm.jamil@gmail.com', 1, '', SYSDATE(), SYSDATE())
, (2, '0637264532', 'a.ruijter@gmail.com', 1, '', SYSDATE(), SYSDATE())
, (3, '0639451238', 'h.odijk@gmail.com', 1, '', SYSDATE(), SYSDATE())
, (4, '0693234612', 'd.van.wakeren@gmail.com', 1, '', SYSDATE(), SYSDATE())
, (5, '0693234694', 'w.van.grift@gmail.com', 1, '', SYSDATE(), SYSDATE());
	

	
CREATE TABLE `Spel`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `PersoonId` INT UNSIGNED NOT NULL,
    `ReserveringId` INT UNSIGNED NOT NULL,
    `IsActief` BIT NOT NULL,
    `Opmerking` VARCHAR(255) NOT NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
    ,FOREIGN KEY(`PersoonId`) REFERENCES `Persoon`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Spel (PersoonId, ReserveringId, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES (1, 1, 1, '', SYSDATE(), SYSDATE())
, (2, 2, 1, '', SYSDATE(), SYSDATE())
, (3, 3, 1, '', SYSDATE(), SYSDATE())
, (4, 4, 1, '', SYSDATE(), SYSDATE())
, (5, 5, 1, '', SYSDATE(), SYSDATE())
, (6, 4, 1, '', SYSDATE(), SYSDATE())
, (7, 4, 1, '', SYSDATE(), SYSDATE())
, (8, 4, 1, '', SYSDATE(), SYSDATE());



CREATE TABLE `Uitslag`(
    `Id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `SpelId` INT UNSIGNED NOT NULL,
    `Aantalpunten` INT(10) NOT NULL,
    `IsActief` BIT NULL,
    `Opmerking` VARCHAR(255) NULL,
    `DatumAangemaakt` DATETIME NOT NULL,
    `DatumGewijzigd` DATETIME NOT NULL
	,PRIMARY KEY (`Id`)
    ,FOREIGN KEY(`SpelId`) REFERENCES `Spel`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Uitslag (SpelId, Aantalpunten, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd)
VALUES (1, 290, 1, '', SYSDATE(), SYSDATE())
, (2, 300, 1, '', SYSDATE(), SYSDATE())
, (3, 120, 1, '', SYSDATE(), SYSDATE())
, (4, 34, 1, '', SYSDATE(), SYSDATE())
, (5, 234, 1, '', SYSDATE(), SYSDATE())
, (6, 299, 1, '', SYSDATE(), SYSDATE())
, (7, 255, 1, '', SYSDATE(), SYSDATE());