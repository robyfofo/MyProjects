-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Set 18, 2020 alle 09:11
-- Versione del server: 5.7.31-0ubuntu0.18.04.1
-- Versione PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phprojekt.altervista_myprojects130`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `mpr130_modules_levels_access`
--

CREATE TABLE `mpr130_modules_levels_access` (
  `id` int(8) NOT NULL,
  `modules_id` int(8) NOT NULL DEFAULT '0',
  `levels_id` int(8) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL DEFAULT '0',
  `read_access` int(1) NOT NULL DEFAULT '0',
  `write_access` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mpr130_modules_levels_access`
--
ALTER TABLE `mpr130_modules_levels_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mpr130_modules_levels_access`
--
ALTER TABLE `mpr130_modules_levels_access`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
