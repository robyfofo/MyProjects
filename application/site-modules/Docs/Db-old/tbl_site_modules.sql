-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 04, 2016 alle 09:53
-- Versione del server: 5.7.16-0ubuntu0.16.04.1
-- Versione PHP: 7.0.8-0ubuntu0.16.04.3

SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Struttura della tabella `tbl_site_modules`
--

CREATE TABLE `tbl_site_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `code_menu` text NOT NULL,
  `ordering` int(4) NOT NULL,
  `section` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `help_small` varchar(255) NOT NULL,
  `help` text NOT NULL
) ;

--
-- Dump dei dati per la tabella `tbl_site_modules`
--

INSERT INTO `tbl_site_modules` (`id`, `name`, `label`, `alias`, `comment`, `code_menu`, `ordering`, `section`, `active`, `help_small`, `help`) VALUES
(1, 'site-users', 'Utenti', 'site-user', 'Il modulo che gestisce gli utenti', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-users fa-fw"></i> {{LABEL}}</a></li>', 2, 0, 1, 'Aiuto breve del modulo site-users', '<p>Aiuto del modulo site-users</p>'),
(2, 'site-levels', 'Livelli Utente', 'site-levels', 'Il modulo che gestisce i livelli utente', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-users fa-fw"></i> {{LABEL}}</a></li>', 3, 0, 1, 'aiuto breve livelli utente', '<p>aiuto livelli utente</p>'),
(3, 'site-home', 'Home', 'home', 'La pagina home di ogni utente', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-home fa-fw"></i> {{LABEL}}</a></li>', 1, 0, 1, 'Aiuto breve modulo Home', '<p>Aiuto modulo Home</p>'),
(4, 'site-pages', 'Pagine', 'site-pages', 'Le pagine del sito', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-file-text-o fa-fw"></i> {{LABEL}}</a></li>', 1, 1, 1, 'Aiuto breve Pagine Sito', '<h5>Variabili predefinite</h5>\r\n<p>All\'interno del contenuto di una pagina &egrave; possibile inserire alcune variabili di sistema che saranno sostituite da parametri di configurazione, eccole:<br />{{NOMESITO}} = il nome del sito; {{URLSITE}} = URL base del sito; {{UPLOADDIR}} la cartelle degli uploads; {{AZIENDAREFERENTE}} = il nome della azienda; {{AZIENDAINDIRIZZO}} = l\'indirizzo della azienda; {{AZIENDACAP}} = il CAP della azienda; {{AZIENDACOMUNE}} = il comune della azienda; {{AZIENDACITTA}} = la citta della azienda; {{AZIENDASTATO}} = lo stato della azienda; {{AZIENDAEMAIL}} = l\'indirizzo email principale della azienda; {{AZIENDAEMAILPEC}} = l\'indirizzo di posta certificata principale della azienda; {{AZIENDATELEFONO}} = il numero di telefono della azienda; {{AZIENDAFAX}} = il numero di FAX della azienda; {{AZIENDAMOBILE}} = il numero di cellulare della azienda; {{AZIENDACODICEFISCALE}} = il codice fiscale della azienda; {{AZIENDAPARTITAIVA}} = la Partita IVA della azienda;</p>'),
(5, 'site-images', 'Immagini sito', 'site-images', 'La gestione delle immagini del sito', '<li class="{{LICLASS}}"><a href="#"><i class="fa fa-picture-o fa-fw"></i> {{LABEL}}<span class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="{{URLSITEADMIN}}{{NAME}}/listFold"><i class="fa fa-folder-open fa-fw"></i> Cartelle</a></li><li><a href="{{URLSITEADMIN}}{{NAME}}/listItem"><i class="fa fa-picture-o fa-fw"></i> Immagini</a></li></ul></li>', 2, 1, 1, 'Aiuto breve Immagini Sito', '<p>Aiuto Immagini Sito</p>'),
(6, 'site-files', 'Files sito', 'site-files', 'La gestione dei files del sito', '<li class="{{LICLASS}}"><a href="#"><i class="fa fa-file-o fa-fw"></i> {{LABEL}}<span class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="{{URLSITEADMIN}}{{NAME}}/listFold"><i class="fa fa-folder-open fa-fw"></i> Cartelle</a></li><li><a href="{{URLSITEADMIN}}{{NAME}}/listItem"><i class="fa fa-file-o fa-fw"></i> Files</a></li></ul></li>', 3, 1, 1, 'Aiuto breve File Sito', '<p>Aiuto File Sito</p>'),
(7, 'site-galleries', 'Gallerie sito', 'site-galleries', 'La gestione delle gallerie associabili a pagine del sito', '<li class="{{LICLASS}}"><a href="#"><i class="fa fa-picture-o fa-fw"></i> {{LABEL}}<span class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="{{URLSITEADMIN}}{{NAME}}/listCate"><i class="fa fa-folder-open fa-fw"></i> Cartelle</a></li><li><a href="{{URLSITEADMIN}}{{NAME}}/listItem"><i class="fa fa-picture-o fa-fw"></i> Immagini</a></li></ul></li>', 4, 1, 1, 'aiuto breve site galleries', '<p>Aiuto site galleries</p>'),
(8, 'site-blocks', 'Blocchi sito', 'site-blocks', 'La gestione di blocchi di contenuto da associare alle pagine', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-puzzle-piece fa-fw"></i> {{LABEL}}</a></li>', 5, 1, 1, 'aiuto breve site blocchi', '<p>aiuto site blocchi</p>'),
(9, 'site-filemanager', 'File Manager', 'filemanager', 'Modulo per la gestione files del sito', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-file fa-fw"></i> {{LABEL}}</a></li>', 6, 1, 1, '', ''),
(10, 'site-modules', 'Moduli', 'site-modules', 'Il modulo per installare e configurare i moduli del sito', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-cog fa-fw"></i> {{LABEL}}</a></li>', 3, 5, 1, 'Aiuto breve del modulo Moduli', '<p>Aiuto completo del modulo Moduli</p>'),
(11, 'site-templates', 'Template Pagine', 'site-templates', 'La gestione dei template delle pagine dinamiche', '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-desktop fa-fw"></i> {{LABEL}}</a></li>', 2, 5, 1, 'aiuto breve template', '<p>aiuto template</p>'),
(12, 'site-tools', 'Strumenti', 'site-tools', 'La sezione strumenti del sito', '<li class=""><a href="#"><i class="fa fa-cog fa-fw"></i> Strumenti<span class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="{{URLSITEADMIN}}site-tools/clearimagecachefolder"><i class="fa fa-picture-o fa-fw"></i> Pulisci Cache Immagini</a></li></ul></li>', 4, 5, 1, 'Aiuto breve strumenti', 'Aiuto strumenti');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tbl_site_modules`
--
ALTER TABLE `tbl_site_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active` (`active`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tbl_site_modules`
--
ALTER TABLE `tbl_site_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

