<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/todo/config.inc.php v.1.0.0. 20/02/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('todo'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = ucfirst($_lang['da fare']);
$App->params->breadcrumb = '<li class="active"><i class="fa fa-bookmark-o"></i> '.ucfirst($_lang['da fare']).'</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->params->tables['prog'] = DB_TABLE_PREFIX.'projects';

$App->params->status = $globalSettings['status to do'];

/* ITEMS */
$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'todo';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_project'=>array('label'=>ucfirst($_lang['progetto']),'required'=>false,'type'=>'int'),
	'title'=>array('label'=>ucfirst($_lang['titolo']),'searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'content'=>array('label'=>ucfirst($_lang['contenuto']),'searchTable'=>true,'required'=>true,'type'=>'text'),
	'status'=>array('label'=>$_lang['status'],'searchTable'=>true,'required'=>false,'type'=>'int'),
	'created'=>array('label'=>ucfirst($_lang['creazione']),'searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>ucfirst($_lang['attiva']),'required'=>false,'type'=>'int','defValue'=>0)
	);
?>