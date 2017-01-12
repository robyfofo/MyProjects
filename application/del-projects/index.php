<?php
/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	progetti/index.php v.2.6.2. 22/02/2016
*/

//Core::setDebugMode(1);
include_once(PATH.'application/'.$Tpl->action."/config.inc.php");
include_once(PATH.'application/'.$Tpl->action."/application.class.php");

$Tpl->appCodeVersion = $appData->module_params->codeVersion;
$Tpl->breadcrumb .= $appData->module_params->breadcrumb;
$Tpl->pageTitle = $appData->module_params->pageTitle;
$appTableItem = $appData->module_params->appTableItem;
$fieldsItem = $appData->module_params->fieldsItem;
$appData->orderingType =  $appData->module_params->orderingType;
$appData->labels =  $appData->module_params->labels;

$Tpl->id = intval(Core::$request->param);
if (isset($_POST['id'])) $Tpl->id = intval($_POST['id']);

switch(substr(Core::$request->method,-4,4)) {	
	default:
		$Tpl->subAction = $Tpl->action.'-item';
		$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,$Tpl->subAction,array('page'=>1,'ifp'=>'10'));
		$Application = new Application($Tpl->action,$appTableItem);
		include_once(PATH.'application/'.$Tpl->action."/items.php");	
		$Tpl->globalSettings = $globalSettings;		
		$Tpl->appJscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.$Tpl->action.'/items.js"></script>';
	break;
	}	
?>