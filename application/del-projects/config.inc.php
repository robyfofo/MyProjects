<?php
/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	progetti/config.inc.php v.1.0.0. 10/03/2016
*/

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('progetti'),'name = ?');
$appData->module_params = Sql::getRecord();

$appData->module_params->multicategories = 0;

$appData->module_params->codeVersion = ' 1.0.0.';
$appData->module_params->pageTitle = 'Progetti';
$appData->module_params->breadcrumb = '<li class="active"><i class="icon-user"></i> Progetti</li>';
$appData->module_params->orderingType = 'DESC';
$appData->module_params->labels['item'] = array('item'=>'progetto','itemSex'=>'o','items'=>'progetti','itemsSex'=>'i','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$appData->module_params->appTableItem = DB_TABLE_PREFIX.'projects';
$appData->module_params->fieldsItem = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);		
foreach($globalSettings['languages'] AS $lang) {
	$required = ($lang == 'it' ? true : false);
	$appData->module_params->fieldsItem['title_'.$lang] = array('label'=>'Titolo '.$lang,'searchTable'=>true,'required'=>$required,'type'=>'varchar');
	}
?>