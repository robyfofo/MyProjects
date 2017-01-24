<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/config.inc.php v.3.0.0. 11/01/2017
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('timecard'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 3.0.0.';
$App->params->pageTitle = 'Timecard';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Timecard</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->params->tables['prog'] = DB_TABLE_PREFIX.'projects';
$App->params->tables['item'] = DB_TABLE_PREFIX.'timecard';

$App->params->labels['item'] = array('item'=>'timecard','itemSex'=>'a','items'=>'timecard','itemsSex'=>'e','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
?>