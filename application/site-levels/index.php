<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-levels/index.php v.1.0.0. 13/02/2017
*/

include_once(PATH.'application/'.Core::$request->action."/lang/".$_lang['user'].".inc.php");
include_once(PATH.'application/'.Core::$request->action."/class.module.php");

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('site-levels'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

/* variabili ambiente */
$App->sessionName = Core::$request->action;
$App->codeVersion = ' 1.0.0.';
$App->pageTitle = ucfirst($_lang['livelli utente']);
$App->breadcrumb .= '<li class="active"><i class="icon-user"></i> '.ucfirst($_lang['livelli utente']).'</li>';

$App->params->tables['item'] = DB_TABLE_PREFIX.'site_levels';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'title_it'=>array('label'=>'Titolo','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'modules'=>array('label'=>'Moduli','searchTable'=>false,'type'=>'varchar'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);

$Module = new Module(Core::$request->action,$App->params->tables['item']);


$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);


if(isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if(isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);


//print_r($App->site_modules);

switch(Core::$request->method) {

	case 'active':
	case 'disactive':
		Sql::manageFieldActiveInLang(Core::$request->method,$App->params->tables['item'],$App->id,$_lang);
		$App->viewMethod = 'list';		
	break;
	
	case 'delete':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if(Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($_lang['voce cancellata']).'!';	
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'new':			
		$App->pageSubTitle = $_lang['inserisci voce'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insert':
		if ($_POST) {			
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['modules'])) $_POST['modules'] = '';
			
			if (isset($_POST['modules']) && is_array($_POST['modules'])) {
				$_POST['modules'] = implode($_POST['modules'],',');
				 } else {
				 	$_POST['modules'] = '';
				 	}
		
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {			
				Sql::stripMagicFields($_POST);
				Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
				if(Core::$resultOp->error == 0) {
					$App->id = Sql::getLastInsertedIdVar(); /* preleva l'id della pagina */	   			
	   			}				
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error == 1) {
			$App->pageSubTitle = $_lang['inserisci voce'];
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($_lang['voce inserita']).'!';				
				}		
	break;

	case 'modify':				
		$App->pageSubTitle = $_lang['modifica voce'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'update':
		if ($_POST) {
			if (!isset($_POST['active'])) $_POST['active'] = 0;	
			
			if (isset($_POST['modules']) && is_array($_POST['modules'])) {
				$_POST['modules'] = implode($_POST['modules'],',');
				 } else {
				 	$_POST['modules'] = '';
				 	}
				 		
			/* requpero i vecchi dati */
			$App->oldItem = new stdClass;
			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->oldItem = Sql::getRecord();
			if (Core::$resultOp->error == 0) {
				/* controlla i campi obbligatori */
				Sql::checkRequireFields($App->params->fields['item']);
				if(Core::$resultOp->error == 0) {					
					Sql::stripMagicFields($_POST);
					Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
					if(Core::$resultOp->error == 0){			
					   						
						}
					}
				}
			} else {					
				Core::$resultOp->error = 1;
				}
		if (Core::$resultOp->error == 1) {
			$App->pageSubTitle = ucfirst($_lang['modifica voce']);
			$App->viewMethod = 'formMod';				
			} else {
				if (isset($_POST['submitForm'])) {	
					$App->viewMethod = 'list';
					Core::$resultOp->message = ucfirst($_lang['voce modificata']).'!';								
					} else {						
						if (isset($_POST['id'])) {
							$App->id = $_POST['id'];
							$App->pageSubTitle = $_lang['modifica voce'];
							$App->viewMethod = 'formMod';	
							Core::$resultOp->message = ucfirst($_lang['modifiche effettuate']).'!';
							} else {
								$App->viewMethod = 'formNew';	
								$App->pageSubTitle = $_lang['inserisci voce'];
								}
						}				
				}	
	break;

	case 'page':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'message':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;

	case 'list':
		$App->viewMethod = 'list';		
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$App->item = new stdClass;		
		$App->item->active = 1;
		$App->item->modules = array();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'form.tpl.php';
		$App->methodForm = 'insert';	
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->item->modules = explode(',', $App->item->modules);
		$App->templateApp = 'form.tpl.php';
		$App->methodForm = 'update';	
	break;

	case 'list':
		$App->item = new stdClass;						
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		$qryFields = array('*');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['item'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .= $sessClause;
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['item'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'list.tpl.php';	
	break;
	
	default:
	break;
	}	


/* imposta le variabili Savant */
$App->globalSettings = $globalSettings;
$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/module.js"></script>';