-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 04, 2016 alle 15:58
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_pages`
--

CREATE TABLE `tbl_site_pages` (
  `id` int(8) NOT NULL,
  `parent` int(8) NOT NULL,
  `title_meta_it` varchar(100) NOT NULL,
  `title_seo_it` varchar(100) NOT NULL,
  `title_it` varchar(100) NOT NULL,
  `title_meta_en` varchar(100) NOT NULL,
  `title_seo_en` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `ordering` int(4) NOT NULL,
  `id_template` int(8) NOT NULL,
  `type` varchar(50) NOT NULL,
  `menu` int(1) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) NOT NULL,
  `jscript_init_code` text NOT NULL,
  `created` datetime NOT NULL,
  `active` int(1) NOT NULL
) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_pages`
--
ALTER TABLE `tbl_site_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `parent` (`parent`),
  ADD KEY `id_template` (`id_template`),
  ADD KEY `active` (`active`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_site_pages`
--
ALTER TABLE `tbl_site_pages`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

