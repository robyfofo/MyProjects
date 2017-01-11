<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-templates/config.inc.php v.3.0.0. 03/11/2016
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('site-templates'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;


$App->params->codeVersion = ' 3.0.0.';
$App->params->pageTitle = 'Templates';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Templates</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* ITEMS */
$App->params->labels['item'] = array('item'=>'template','itemSex'=>'o','items'=>'templates','itemsSex'=>'i','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->ordersType['item'] = 'DESC';
$App->params->uploadPaths['item'] = PATH_UPLOAD_DIR."site-media/templates/";
$App->params->uploadDirs['item'] = UPLOAD_DIR."site-media/templates/";
$App->params->defUploadDir['item'] = UPLOAD_DIR."site-media/";
$App->params->tables['item'] = DB_TABLE_PREFIX.'site_templates';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'title_it'=>array('label'=>'Titolo','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'comment_it'=>array('label'=>'Commento','searchTable'=>true,'required'=>false,'type'=>'text'),
	'template'=>array('label'=>'Template','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'filename'=>array('label'=>'Immagine','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'ordering'=>array('label'=>'Ordine','searchTable'=>false,'required'=>false,'type'=>'int'),
	'predefinito'=>array('label'=>'Predefinito','required'=>false,'type'=>'int','defValue'=>0),
	'contents_html'=>array('label'=>'Contenuti HTML','required'=>false,'type'=>'int','defValue'=>1),
	'uploads'=>array('label'=>'uploads','required'=>false,'type'=>'int','defValue'=>1),
	'images'=>array('label'=>'Immagini','required'=>false,'type'=>'int','defValue'=>1),
	'files'=>array('label'=>'Files','required'=>false,'type'=>'int','defValue'=>10),
	'galleries'=>array('label'=>'Gallerie','required'=>false,'type'=>'int','defValue'=>1),
	'blocks'=>array('label'=>'Blocchi Contenuto','required'=>false,'type'=>'varchar','defValue'=>''),
	'css_plugin'=>array('label'=>'Css Plugin link','required'=>false,'type'=>'text','defValue'=>''),
	'css_page'=>array('label'=>'Css Page link','required'=>false,'type'=>'text','defValue'=>''),
	'jscript_ini_code'=>array('label'=>'Codice Javascript inizio BODY','required'=>false,'type'=>'varchar','defValue'=>''),
	'jscript_plugin'=>array('label'=>'Javascrip Plugin link','required'=>false,'type'=>'varchar','defValue'=>''),
	'jscript_page'=>array('label'=>'Javascrip Page links','required'=>false,'type'=>'text','defValue'=>''),
	'jscript_end_code'=>array('label'=>'Codice Javascript fine BODY','required'=>false,'type'=>'varchar','defValue'=>''),
	'base_tpl_page'=>array('label'=>'Template di base','required'=>false,'type'=>'int','defValue'=>''),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);	
?>