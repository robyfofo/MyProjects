<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-tools/config.inc.php v.3.0.0. 04/11/2016
*/

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(Sql::getTablePrefix().'site_modules',array('help_small','help'),array('site-tools'),'name = ? AND active = 1');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->codeVersion = ' 3.0.0.';
$App->params->pageTitle = 'Strumenti';
$App->params->breadcrumb = '<li class="active"><i class="icon-user"></i> Strumenti</li>';
?>