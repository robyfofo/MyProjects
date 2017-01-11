<?php
/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	timecard/index.php v.1.0.0. 10/03/2016
*/

Core::setDebugMode(1);
include_once(PATH.'application/'.$Tpl->action."/config.inc.php");
include_once(PATH.'application/'.$Tpl->action."/application.class.php");

$Tpl->pageTitle = 'Timecard';
$Tpl->appCodeVersion = $appData->module_params->codeVersion;
$Tpl->breadcrumb .= $appData->module_params->breadcrumb;

$appTableItem = $appData->module_params->appTableItem;

$Tpl->id = intval(Core::$request->param);
if (isset($_POST['id'])) $Tpl->id = intval($_POST['id']);

switch(substr(Core::$request->method,-4,4)) {	
	default:
		$Tpl->subAction = Core::$request->action.'-item';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$Tpl->subAction,array('data'=>$appData->nowDate));
		$Application = new Application(Core::$request->action,'');
		include_once(PATH.'application/'.Core::$request->action."/items.php");
		$Tpl->defaultJavascript = "defaultdate = '".$appData->data."';";
		$Tpl->defaultJavascript .= "defaultTimeIni = '".$appData->nowTime."';";
		//$Tpl->defaultJavascript .= "defaultTimeEnd = '".$appData->nowTime."';";
		$Tpl->defaultJavascript .= "defaultTimeEnd = '17:22:30';";
		$Tpl->appCss[] = '<link href="'.URL_SITE_ADMIN.'templates/'.$Tpl->templateUser.'/css/plugins/chosen/chosen.css" rel="stylesheet">';
		$Tpl->appCss[] = '<link href="'.URL_SITE_ADMIN.'templates/'.$Tpl->templateUser.'/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">';
		$Tpl->appJscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$Tpl->templateUser.'/js/plugins/chosen/chosen.jquery.js" type="text/javascript"></script>';
		$Tpl->appJscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$Tpl->templateUser.'/js/plugins/moment/moment-with-locales.min.js" type="text/javascript"></script>';
		$Tpl->appJscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$Tpl->templateUser.'/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>';	
		$Tpl->appJscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.$Tpl->action.'/items.js"></script>';
	break;
	}	
?>