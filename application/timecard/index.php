<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/index.php v.1.0.1. 27/09/2017
*/

//Core::setDebugMode(1);

include_once(PATH.'application/'.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.'application/'.Core::$request->action."/config.inc.php");
include_once(PATH.'application/'.Core::$request->action."/class.module.php");

$App->sessionName = Core::$request->action;
$App->codeVersion = $App->params->codeVersion;
$App->breadcrumb .= $App->params->breadcrumb;
$App->pageTitle = $App->params->pageTitle;

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);



/* trova tutti i progetti */
$App->progetti = new stdClass;
Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1','current DESC');
$App->progetti = Sql::getRecords();

/* trova il progetto corrente */
$App->currentProject = new stdClass;
Sql::initQuery($App->params->tables['prog'],array('*'),array(),'current = 1');
$App->currentProject = Sql::getRecord();

$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,'app',array('data'=>$App->nowDate,'id_project'=>$App->currentProject->id));

switch(substr(Core::$request->method,-4,4)) {
	case 'Pite':
		$App->sessionName = $App->sessionName.'-pite';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));
		$Module = new Module($App->sessionName,$App->params->tables['item']);
		include_once(PATH.'application/'.Core::$request->action."/pitems.php");
		$App->defaultJavascript = "defaultTimeIni = '".$App->timeIniTimecard."';";
		$App->defaultJavascript .= "defaultTimeEnd = '".$App->timeEndTimecard."';";
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">';
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/pitems.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/pitems.js"></script>';
	
	break;
	default:
		$App->sessionName = $App->sessionName;
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$App->sessionName,array('page'=>1,'ifp'=>'10'));		
		if (!isset($_MY_SESSION_VARS['app']['data-timecard'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','data-timecard',$App->nowDate);
		$Module = new Module($App->sessionName,$App->params->tables['item']);
		include_once(PATH.'application/'.Core::$request->action."/items.php");	
		$App->defaultJavascript = "defaultappdata = '".$_MY_SESSION_VARS['app']['data-timecard']."';";
		$App->defaultJavascript .= "defaultdata = '".$App->defaultFormData."';";
		$App->defaultJavascript .= "defaultdata1 = '".$App->defaultFormData1."';";
		$App->defaultJavascript .= "defaultTimeIni = '".$App->timeIniTimecard."';";
		$App->defaultJavascript .= "defaultTimeEnd = '".$App->timeEndTimecard."';";
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">';
		$App->css[] = '<link href="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$App->css[] = '<link href="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/css/items.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE.'templates/'.$App->templateUser.'/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';	
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/items.js"></script>';
	break;
	}	
?>