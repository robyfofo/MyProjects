<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/index.php v.3.0.0. 11/01/2017
*/

Core::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/config.inc.php");
include_once(PATH.'application/'.Core::$request->action."/module.class.php");

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);

switch(substr(Core::$request->method,-4,4)) {	
	default:
		$App->sessionName = $App->sessionName.'-items';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));
		$Module = new Module($App->sessionName,$App->params->tables['item']);
		include_once(PATH.'application/'.Core::$request->action."/items.php");	
		$App->defaultJavascript = "defaultdate = '".$App->nowData."';";
		$App->defaultJavascript .= "defaultTimeIni = '".$App->nowTime."';";
		//$Tpl->defaultJavascript .= "defaultTimeEnd = '".$appData->nowTime."';";
		$App->defaultJavascript .= "defaultTimeEnd = '17:22:30';";
		$App->appCss[] = '<link href="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/css/plugins/chosen/chosen.css" rel="stylesheet">';
		$App->appCss[] = '<link href="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->appJscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/js/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>';
		$App->appJscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/js/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->appJscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';	
		$App->appJscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/items.js"></script>';
	break;
	}	
?>