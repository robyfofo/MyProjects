<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-files/config.inc.php v.3.0.0. 02/11/2016
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('site-files'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->subcategories = 0;
$App->params->categories = 0;

$App->params->codeVersion = ' 3.0.0.';
$App->params->pageTitle = 'Files Sito';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Files Sito</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* ITEMS */
$App->params->labels['item'] =  array('item'=>'file','itemSex'=>'o','items'=>'files','itemsSex'=>'i','son'=>'','sonSex'=>'','sons'=>'','sonsSex'=>'','owner'=>'cartella','ownerSex'=>'a','owners'=>'cartelle','ownersSex'=>'e');
$App->params->ordersType['item'] = 'DESC';
$App->params->uploadPaths['item'] = PATH_UPLOAD_DIR."site-media/files/";
$App->params->uploadDirs['item'] = UPLOAD_DIR."site-media/files/";
$App->params->tables['item'] = DB_TABLE_PREFIX.'site_files';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_folder'=>array('label'=>'IDFolder','required'=>false,'searchTable'=>false,'type'=>'int'),
	'folder_name'=>array('label'=>'Cartella','required'=>false,'searchTable'=>false,'type'=>'varchar'),
	'filename'=>array('label'=>'File','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'org_filename'=>array('label'=>'Nome Originale','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'extension'=>array('label'=>'Ext','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'size'=>array('label'=>'Dimensione','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'type'=>array('label'=>'Tipo','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);	
foreach($globalSettings['languages'] AS $lang) {
	$required = ($lang == 'it' ? true : false);
	$App->params->fields['item']['title_'.$lang] = array('label'=>'Titolo '.$lang,'searchTable'=>true,'required'=>$required,'type'=>'varchar');
	}
	
/* FOLDERS */
$App->params->labels['fold'] = array('item'=>'cartella','itemSex'=>'a','items'=>'cartelle','itemsSex'=>'e','son'=>$App->params->labels['item']['item'],'sonSex'=>$App->params->labels['item']['itemSex'],'sons'=>$App->params->labels['item']['items'],'sonsSex'=>$App->params->labels['item']['itemsSex'],'owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->ordersType['fold'] = 'DESC';
$App->params->tables['fold'] = DB_TABLE_PREFIX.'site_files_folders';
$App->params->fields['fold'] = array(
		'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),		
		'folder_name'=>array('label'=>'Nome Cartella','searchTable'=>false,'required'=>false,'type'=>'varchar'),
		'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
		'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
		);
foreach($globalSettings['languages'] AS $lang) {
	$required = ($lang == 'it' ? true : false);
	$App->params->fields['fold']['title_'.$lang] = array('label'=>'Titolo '.$lang,'searchTable'=>true,'required'=>$required,'type'=>'varchar');
	}
?>