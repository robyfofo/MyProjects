<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-filemanager/items.php v.3.0.0. 04/11/2016
*/

$App->sessionName = Core::$request->action;
$App->codeVersion = ' 3.0.0.';
$App->pageTitle = 'Filemanager';
$App->pageSubTitle = 'gestisci i files del sito';
$App->templatePage = 'frame.tpl.php';
$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/module.js" type="text/javascript"></script>';
?>