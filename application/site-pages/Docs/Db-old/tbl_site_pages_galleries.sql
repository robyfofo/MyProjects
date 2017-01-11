-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 04, 2016 alle 16:02
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_pages_galleries`
--

CREATE TABLE `tbl_site_pages_galleries` (
  `id_page` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `position` int(4) NOT NULL
) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_pages_galleries`
--
ALTER TABLE `tbl_site_pages_galleries`
  ADD KEY `id_page` (`id_page`,`id_gallery`);

