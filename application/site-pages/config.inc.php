<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-pages/config.inc.php v.3.0.0. 04/11/2016
*/

/* prende i dati del modulo template dal file conf */
include_once(PATH."application/site-templates/config.inc.php");

$App->templateUploadDir = $App->params->uploadDirs['item'];
$App->templateUploadDirDef = $App->params->defUploadDir['item'];

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('site-pages'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->subcategories = 0;
$App->params->categories = 0;
$App->params->item_images = 0;
$App->params->item_files = 0;
$App->params->item_tags = 0;

$App->params->codeVersion = ' 3.0.0.';
$App->params->pageTitle = 'Pagine';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Pagine Sito</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* ITEMS */
$App->params->tables['item rif'] = 'site_pages';
$App->params->labels['item'] = array('item'=>'pagina','itemSex'=>'a','items'=>'pagine','itemsSex'=>'e','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->uploadPaths['item'] = PATH_UPLOAD_DIR."site-".$App->params->tables['item rif']."/files/";
$App->params->uploadDirs['item'] = UPLOAD_DIR."site-".$App->params->tables['item rif']."/files/";
$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'site_pages';
$App->params->fields['item']  = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'parent'=>array('label'=>'Parent','searchTable'=>false,'required'=>false,'type'=>'varchar','defValue'=>0),
	'id_template'=>array('label'=>'Template','searchTable'=>false,'required'=>false,'type'=>'int'),
	'type'=>array('label'=>'Tipo','searchTable'=>false,'required'=>false,'type'=>'varchar'),
	'ordering'=>array('label'=>'Ordinamento','searchTable'=>false,'required'=>false,'type'=>'int'),
	'menu'=>array('label'=>'In menu?','searchTable'=>false,'required'=>false,'type'=>'int'),
	'alias'=>array('label'=>'Alias','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'url'=>array('URL'=>'Alias','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'target'=>array('label'=>'Target','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'jscript_init_code'=>array('label'=>'Codice Javascript inizio BODY','required'=>false,'type'=>'varchar','defValue'=>''),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);
foreach($globalSettings['languages'] AS $lang) {
	$searchTable = true;
	$required = ($lang == 'it' ? true : false);
	$App->params->fields['item'] ['title_meta_'.$lang] = array('label'=>'Titolo META '.$lang,'searchTable'=>$searchTable,'required'=>false,'type'=>'varchar');
	$App->params->fields['item'] ['title_seo_'.$lang] = array('label'=>'Titolo SEO '.$lang,'searchTable'=>$searchTable,'required'=>false,'type'=>'varchar');
	$App->params->fields['item'] ['title_'.$lang] = array('label'=>'Titolo '.$lang,'searchTable'=>$searchTable,'required'=>$required,'type'=>'varchar');
	}
?>