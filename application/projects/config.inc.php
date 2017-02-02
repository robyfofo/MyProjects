<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/projects/config.inc.php v.3.0.0. 28/01/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('projects'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 3.0.0.';
$App->params->pageTitle = 'Progetti';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Progetti</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->params->tables['cont'] = DB_TABLE_PREFIX.'contacts';
$App->params->tables['time'] = DB_TABLE_PREFIX.'timecard';

$App->params->status = array('preventivato'=>'Preventivato','inlavorazione'=>'In lavorazione','sospeso'=>'Sospeso','cancellato'=>'Cancellato','rifiutato'=>'Rifiutato','finito'=>'Finito');

/* ITEMS */
$App->params->labels['item'] = array('item'=>'progetto','itemSex'=>'o','items'=>'progetti','itemsSex'=>'i','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'projects';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'id_contact'=>array('label'=>'Contatto','searchTable'=>false,'required'=>false,'type'=>'int'),
	'title'=>array('label'=>'Titolo','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'current'=>array('label'=>'Corrente','searchTable'=>false,'required'=>false,'type'=>'int'),
	'timecard'=>array('label'=>'Timecard','searchTable'=>false,'required'=>false,'type'=>'int'),
	'status'=>array('label'=>'Status','searchTable'=>true,'required'=>false,'type'=>'int'),
	'costo_orario'=>array('label'=>'Costo Ora','searchTable'=>true,'required'=>false,'type'=>'int'),
	'completato'=>array('label'=>'Completato','searchTable'=>true,'required'=>false,'type'=>'int'),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);
?>