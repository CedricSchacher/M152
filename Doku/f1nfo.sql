-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Mrz 2021 um 08:58
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `f1nfo`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `ID` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `picture` text NOT NULL,
  `thumbnail` text NOT NULL,
  `copyright` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `ID` int(11) NOT NULL,
  `artikelID` int(11) NOT NULL,
  `name` text NOT NULL,
  `datum` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArtikelID` (`artikelID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD CONSTRAINT `kommentar_ibfk_1` FOREIGN KEY (`artikelID`) REFERENCES `artikel` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
