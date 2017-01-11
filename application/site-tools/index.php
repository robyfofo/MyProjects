<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-tools/index.php v.3.0.0. 04/11/2016
*/

//Sql::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/config.inc.php");
include_once(PATH.'application/'.Core::$request->action."/module.class.php");

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
	
switch(Core::$request->method) {		
	case 'clearimagecachefolder':
		$App->sessionName = $App->sessionName.'-items';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));
		$Module = new Module($App->sessionName,'');
		include_once(PATH.'application/'.Core::$request->action."/clrimgfol.php");	
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/clrimgfol.js"></script>';		
	break;
	default:
	break;
	}

/* imposta le variabili Savant */
$Tpl->globalSettings = $globalSettings;
?>