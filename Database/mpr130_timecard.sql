-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Set 18, 2020 alle 09:08
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
-- Struttura della tabella `mpr130_timecard`
--

CREATE TABLE `mpr130_timecard` (
  `id` int(8) NOT NULL,
  `users_id` int(8) NOT NULL DEFAULT '0',
  `id_project` int(8) NOT NULL,
  `datains` date NOT NULL,
  `content` text NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `worktime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mpr130_timecard`
--
ALTER TABLE `mpr130_timecard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_project`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mpr130_timecard`
--
ALTER TABLE `mpr130_timecard`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
