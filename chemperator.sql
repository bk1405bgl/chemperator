-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 26. Nov 2023 um 12:14
-- Server-Version: 10.6.14-MariaDB-cll-lve
-- PHP-Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `chemperator`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Artikel`
--

CREATE TABLE `Artikel` (
  `ArtikelID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Artikelnummer` varchar(50) DEFAULT NULL,
  `Kurzbeschreibung` text DEFAULT NULL,
  `LangeBeschreibung` text DEFAULT NULL,
  `Nettopreis` decimal(10,2) DEFAULT NULL,
  `Steuerklasse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabellenstruktur für Tabelle `ArtikelKategorien`
--

CREATE TABLE `ArtikelKategorien` (
  `VerknupfungID` int(11) NOT NULL,
  `ArtikelID` int(11) DEFAULT NULL,
  `KategorieID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabellenstruktur für Tabelle `ArtikelKomponenten`
--

CREATE TABLE `ArtikelKomponenten` (
  `KomponentenID` int(11) NOT NULL,
  `ArtikelID` int(11) DEFAULT NULL,
  `KomponentenName` varchar(255) DEFAULT NULL,
  `Gewicht` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabellenstruktur für Tabelle `Bewertungen`
--

CREATE TABLE `Bewertungen` (
  `BewertungsID` int(11) NOT NULL,
  `ArtikelID` int(11) DEFAULT NULL,
  `Bewertung` int(11) DEFAULT NULL,
  `Kommentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Einkaufshistorie`
--

CREATE TABLE `Einkaufshistorie` (
  `HistorieID` int(11) NOT NULL,
  `RohstoffID` int(11) DEFAULT NULL,
  `Menge` int(11) DEFAULT NULL,
  `Einheitspreis` decimal(10,2) DEFAULT NULL,
  `Einkaufsdatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kategorien`
--

CREATE TABLE `Kategorien` (
  `KategorieID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tabellenstruktur für Tabelle `Lagerbestand`
--

CREATE TABLE `Lagerbestand` (
  `LagerID` int(11) NOT NULL,
  `ArtikelID` int(11) DEFAULT NULL,
  `Menge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lieferanten`
--

CREATE TABLE `Lieferanten` (
  `LieferantenID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Rezepturen`
--

CREATE TABLE `Rezepturen` (
  `RezepturID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Dichte` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `RezepturPositionen`
--

CREATE TABLE `RezepturPositionen` (
  `PositionID` int(11) NOT NULL,
  `RezepturID` int(11) DEFAULT NULL,
  `RohstoffID` int(11) DEFAULT NULL,
  `Menge` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Rohstoffe`
--

CREATE TABLE `Rohstoffe` (
  `RohstoffID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Dichte` float DEFAULT NULL,
  `Einkaufspreis` decimal(10,2) DEFAULT NULL,
  `LieferantenID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_uid` tinytext NOT NULL,
  `users_pwd` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes für die Tabelle `Artikel`
--
ALTER TABLE `Artikel`
  ADD PRIMARY KEY (`ArtikelID`);

--
-- Indizes für die Tabelle `ArtikelKategorien`
--
ALTER TABLE `ArtikelKategorien`
  ADD PRIMARY KEY (`VerknupfungID`),
  ADD KEY `ArtikelID` (`ArtikelID`),
  ADD KEY `KategorieID` (`KategorieID`);

--
-- Indizes für die Tabelle `ArtikelKomponenten`
--
ALTER TABLE `ArtikelKomponenten`
  ADD PRIMARY KEY (`KomponentenID`),
  ADD KEY `ArtikelID` (`ArtikelID`);

--
-- Indizes für die Tabelle `Bewertungen`
--
ALTER TABLE `Bewertungen`
  ADD PRIMARY KEY (`BewertungsID`),
  ADD KEY `ArtikelID` (`ArtikelID`);

--
-- Indizes für die Tabelle `Einkaufshistorie`
--
ALTER TABLE `Einkaufshistorie`
  ADD PRIMARY KEY (`HistorieID`),
  ADD KEY `RohstoffID` (`RohstoffID`);

--
-- Indizes für die Tabelle `Kategorien`
--
ALTER TABLE `Kategorien`
  ADD PRIMARY KEY (`KategorieID`);

--
-- Indizes für die Tabelle `Lagerbestand`
--
ALTER TABLE `Lagerbestand`
  ADD PRIMARY KEY (`LagerID`),
  ADD KEY `ArtikelID` (`ArtikelID`);

--
-- Indizes für die Tabelle `Lieferanten`
--
ALTER TABLE `Lieferanten`
  ADD PRIMARY KEY (`LieferantenID`);

--
-- Indizes für die Tabelle `Rezepturen`
--
ALTER TABLE `Rezepturen`
  ADD PRIMARY KEY (`RezepturID`);

--
-- Indizes für die Tabelle `RezepturPositionen`
--
ALTER TABLE `RezepturPositionen`
  ADD PRIMARY KEY (`PositionID`),
  ADD KEY `RezepturID` (`RezepturID`),
  ADD KEY `RohstoffID` (`RohstoffID`);

--
-- Indizes für die Tabelle `Rohstoffe`
--
ALTER TABLE `Rohstoffe`
  ADD PRIMARY KEY (`RohstoffID`),
  ADD KEY `LieferantenID` (`LieferantenID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ArtikelKategorien`
--
ALTER TABLE `ArtikelKategorien`
  ADD CONSTRAINT `ArtikelKategorien_ibfk_1` FOREIGN KEY (`ArtikelID`) REFERENCES `Artikel` (`ArtikelID`),
  ADD CONSTRAINT `ArtikelKategorien_ibfk_2` FOREIGN KEY (`KategorieID`) REFERENCES `Kategorien` (`KategorieID`);

--
-- Constraints der Tabelle `ArtikelKomponenten`
--
ALTER TABLE `ArtikelKomponenten`
  ADD CONSTRAINT `ArtikelKomponenten_ibfk_1` FOREIGN KEY (`ArtikelID`) REFERENCES `Artikel` (`ArtikelID`);

--
-- Constraints der Tabelle `Bewertungen`
--
ALTER TABLE `Bewertungen`
  ADD CONSTRAINT `Bewertungen_ibfk_1` FOREIGN KEY (`ArtikelID`) REFERENCES `Artikel` (`ArtikelID`);

--
-- Constraints der Tabelle `Einkaufshistorie`
--
ALTER TABLE `Einkaufshistorie`
  ADD CONSTRAINT `Einkaufshistorie_ibfk_1` FOREIGN KEY (`RohstoffID`) REFERENCES `Rohstoffe` (`RohstoffID`);

--
-- Constraints der Tabelle `Lagerbestand`
--
ALTER TABLE `Lagerbestand`
  ADD CONSTRAINT `Lagerbestand_ibfk_1` FOREIGN KEY (`ArtikelID`) REFERENCES `Artikel` (`ArtikelID`);

--
-- Constraints der Tabelle `RezepturPositionen`
--
ALTER TABLE `RezepturPositionen`
  ADD CONSTRAINT `RezepturPositionen_ibfk_1` FOREIGN KEY (`RezepturID`) REFERENCES `Rezepturen` (`RezepturID`),
  ADD CONSTRAINT `RezepturPositionen_ibfk_2` FOREIGN KEY (`RohstoffID`) REFERENCES `Rohstoffe` (`RohstoffID`);

--
-- Constraints der Tabelle `Rohstoffe`
--
ALTER TABLE `Rohstoffe`
  ADD CONSTRAINT `Rohstoffe_ibfk_1` FOREIGN KEY (`LieferantenID`) REFERENCES `Lieferanten` (`LieferantenID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
