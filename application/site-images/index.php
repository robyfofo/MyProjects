<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-images/index.php v.3.0.0. 02/11/2016
*/

//Core::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/config.inc.php");
include_once(PATH.'application/'.Core::$request->action."/module.class.php");

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
	
switch(substr(Core::$request->method,-4,4)) {	
	case 'Fold':
		$App->sessionName = $App->sessionName.'-fold';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));
		$Module = new Module(Core::$request->action,$App->params->tables['fold']);
		include_once(PATH.'application/'.Core::$request->action."/folders.php");	
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/folders.js"></script>';		
	break;
	
	default:
		$App->sessionName = $App->sessionName.'-items';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));
		$Module = new Module(Core::$request->action,$App->params->tables['item']);
		include_once(PATH.'application/'.Core::$request->action."/items.php");	
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/items.js"></script>';		
	break;
	}
/* imposta le variabili Savant */
$Tpl->globalSettings = $globalSettings;
?>