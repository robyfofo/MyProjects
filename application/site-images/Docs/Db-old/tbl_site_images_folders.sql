-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 02, 2016 alle 11:20
-- Versione del server: 5.7.13-0ubuntu0.16.04.2
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_images_folders`
--

CREATE TABLE `tbl_site_images_folders` (
  `id` int(8) NOT NULL,
  `title_it` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `folder_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `active` int(1) NOT NULL
) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_images_folders`
--
ALTER TABLE `tbl_site_images_folders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_site_images_folders`
--
ALTER TABLE `tbl_site_images_folders`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

