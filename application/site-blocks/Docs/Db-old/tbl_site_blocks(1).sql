-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 03, 2016 alle 15:30
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_blocks`
--

CREATE TABLE `tbl_site_blocks` (
  `id` int(8) NOT NULL,
  `title_it` varchar(100) NOT NULL,
  `content_it` text NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `content_en` text NOT NULL,
  `alias` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `active` int(1) NOT NULL
) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_blocks`
--
ALTER TABLE `tbl_site_blocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_site_blocks`
--
ALTER TABLE `tbl_site_blocks`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

