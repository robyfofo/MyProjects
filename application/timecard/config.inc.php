<?php
/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	timecard/config.inc.php v.1.0.0. 10/03/2016
*/

/* prende i dati del modulo template dal file conf */
include_once(PATH."application/progetti/config.inc.php");

$progettiTable = $appData->module_params->appTableItem;
$progettiFields = $appData->module_params->fieldsItem;

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('progetti'),'name = ?');
$appData->module_params = Sql::getRecord();

$appData->module_params->codeVersion = ' 1.0.0.';
$appData->module_params->pageTitle = 'Timecard';
$appData->module_params->breadcrumb = '<li class="active"><i class="icon-user"></i> Timecard</li>';

$appData->module_params->appTableItem = DB_TABLE_PREFIX.'timecard';
?>