-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 04, 2016 alle 10:44
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";


-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_levels`
--

CREATE TABLE `tbl_site_levels` (
  `id` int(11) NOT NULL,
  `title_it` varchar(100) NOT NULL,
  `modules` text NOT NULL,
  `active` int(1) NOT NULL
) ;

--
-- Dump dei dati per la tabella `tbl_site_levels`
--

INSERT INTO `tbl_site_levels` (`id`, `title_it`, `modules`, `active`) VALUES
(1, 'Amministratore', 'site-home,users,site-pages,site-images,site-files,site-galleries,site-blocks,site-filemanager,site-tools', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_levels`
--
ALTER TABLE `tbl_site_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_site_levels`
--
ALTER TABLE `tbl_site_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
