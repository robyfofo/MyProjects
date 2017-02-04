<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/contacts/config.inc.php v.3.0.0. 11/01/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('contacts'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 1.0.0.';
$App->params->pageTitle = 'Contatti';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Contatti</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* ITEMS */
$App->params->labels['item'] = array('item'=>'contatto','itemSex'=>'o','items'=>'contatti','itemsSex'=>'i','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->ordersType['item'] = 'DESC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'contacts';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'name'=>array('label'=>'Nome','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'surname'=>array('label'=>'Cognome','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'street'=>array('label'=>'Via','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'zip_code'=>array('label'=>'CAP','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'city'=>array('label'=>'Città','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'country'=>array('label'=>'Provincia','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'state'=>array('label'=>'Stato','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'telephone'=>array('label'=>'Telefono','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'mobile'=>array('label'=>'Mobile','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'fax'=>array('label'=>'Fax','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'email'=>array('label'=>'Email','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'codice_fiscale'=>array('label'=>'Codice Fiscale','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'partita_iva'=>array('label'=>'Partita IVA','searchTable'=>true,'required'=>false,'type'=>'varchar'),
	'created'=>array('label'=>'Creazione','searchTable'=>false,'required'=>false,'type'=>'datatime'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);
?>