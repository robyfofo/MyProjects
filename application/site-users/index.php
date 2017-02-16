<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-users/index.php v.1.0.0. 13/02/2017
*/

//Core::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.'application/'.Core::$request->action."/config.inc.php");
include_once(PATH.'application/'.Core::$request->action."/class.module.php");

$App->sessionName = 'am-'.Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);

$App->formTabActive = 1;
	
switch(substr(Core::$request->method,-4,4)) {		
	default:
		$App->sessionName .= '-items';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));
		$Module = new Module($App->sessionName,$App->params->tables['item']);
		include_once(PATH.'application/'.Core::$request->action."/items.php");	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/items.js"></script>';
		$App->defaultJavascript = "messages['Le due password non corrispondono!'] = '".addslashes($_lang['Le due password non corrispondono!'])."';";
	break;
	}

/* imposta le variabili Savant */
$App->globalSettings = $globalSettings;
?>