-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 03, 2016 alle 15:40
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_templates`
--

CREATE TABLE `tbl_site_templates` (
  `id` int(8) NOT NULL,
  `title_it` varchar(100) DEFAULT NULL,
  `comment_it` text NOT NULL,
  `template` char(50) NOT NULL,
  `ordering` int(4) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `predefinito` int(1) NOT NULL,
  `contents_html` int(4) NOT NULL,
  `uploads` int(4) NOT NULL,
  `files` int(4) NOT NULL,
  `images` int(4) NOT NULL,
  `galleries` int(4) NOT NULL,
  `blocks` int(4) NOT NULL,
  `css_plugin` text NOT NULL,
  `css_page` text NOT NULL,
  `jscript_ini_code` text NOT NULL,
  `jscript_plugin` text NOT NULL,
  `jscript_page` text NOT NULL,
  `jscript_end_code` text NOT NULL,
  `base_tpl_page` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `active` int(1) DEFAULT NULL
) ;

--
-- Dump dei dati per la tabella `tbl_site_templates`
--

INSERT INTO `tbl_site_templates` (`id`, `title_it`, `comment_it`, `template`, `ordering`, `filename`, `predefinito`, `contents_html`, `uploads`, `files`, `images`, `galleries`, `blocks`, `css_plugin`, `css_page`, `jscript_ini_code`, `jscript_plugin`, `jscript_page`, `jscript_end_code`, `base_tpl_page`, `created`, `active`) VALUES
(1, 'Template Modulo', 'Template per l\'uso di pagine che lincano ad un url od un modulo', 'template-modulo', 1, '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2016-06-09 08:39:43', 1),
(2, 'Template Base', 'Template con un solo contenuto principale', 'template-base', 2, '', 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '2016-11-03 14:33:15', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_templates`
--
ALTER TABLE `tbl_site_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `predefinito` (`predefinito`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_site_templates`
--
ALTER TABLE `tbl_site_templates`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
