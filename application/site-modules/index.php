<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-modules/index.php v.3.0.0. 04/11/2016
*/

include_once(PATH.'application/'.Core::$request->action."/module.class.php");

//Core::setDebugMode(1);

/* prende i dati del modulo */
$App->params = new stdClass();
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('site-modules'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && is_object($obj)) $App->params = $obj;

/* variabili ambiente */
$App->sessionName = Core::$request->action;
$App->codeVersion = ' 3.0.0.';

$App->pageTitle = 'Moduli del sito';
$App->breadcrumb .= '<li class="active"><i class="icon-user"></i> Moduli</li>';


$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->params->labels['item'] =  array('item'=>'modulo','itemSex'=>'o','items'=>'moduli','itemsSex'=>'i','son'=>'','sonSex'=>'','sons'=>'','sonsSex'=>'','owner'=>'','ownerSex'=>'','owners'=>'','ownersSex'=>'');
$App->params->ordersType['item'] = 'ASC';
$App->params->tables['item'] = DB_TABLE_PREFIX.'site_modules';
$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'name'=>array('label'=>'Titolo','searchTable'=>true,'required'=>true,'type'=>'varchar'),
	'label'=>array('label'=>'Etichetta','searchTable'=>true,'type'=>'varchar'),
	'alias'=>array('label'=>'Alias','searchTable'=>true,'type'=>'varchar'),
	'comment'=>array('label'=>'Commento','searchTable'=>true,'type'=>'varchar'),
	'code_menu'=>array('label'=>'Codice menu','searchTable'=>true,'type'=>'text'),
	'ordering'=>array('label'=>'Ordine','searchTable'=>false,'type'=>'int'),
	'section'=>array('label'=>'Sezione','searchTable'=>false,'type'=>'int'),
	'help_small'=>array('label'=>'Aiuto Breve','searchTable'=>false,'type'=>'varchar'),
	'help'=>array('label'=>'Aiuto','searchTable'=>false,'type'=>'text'),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);

$Module = new Module($App->sessionName,$App->params->tables['item']);
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);

$App->formTabActive = 1;
$App->sections = $globalSettings['module sections'];

if(isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if(isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

switch(Core::$request->method) {	
	case 'moreOrdering':
		Utilities::increaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>true,'parentField'=>'section','sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>ucfirst($App->params->labels['item']['item'])));
		$App->viewMethod = 'list';	
	break;
	case 'lessOrdering':
		Utilities::decreaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>true,'parentField'=>'section','sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>ucfirst($App->params->labels['item']['item'])));
		$App->viewMethod = 'list';	
	break;

	case 'active':
	case 'disactive':
		Sql::manageFieldActive(Core::$request->method,$App->params->tables['item'],$App->id,ucfirst($App->params->labels['item']['item']),$App->params->labels['item']['itemSex']);
		$App->viewMethod = 'list';		
	break;
	
	case 'delete':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';			
				}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'new':			
		$App->pageSubTitle = 'Inserisci utente';
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insert':
		if ($_POST) {			
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if ($_POST['alias'] == '') $_POST['alias'] = $_POST['name'];
			if (!isset($_POST['ordering']) || (isset($_POST['ordering']) && $_POST['ordering'] == 0)) $_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','section = '.intval($_POST['section'])) + 1;		
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if (Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
				if (Core::$resultOp->error == 0) {
					$App->id = Sql::getLastInsertedIdVar(); /* preleva l'id della pagina */	   			
	   			}				
				}	
			} else {	
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error > 0) {
			$App->pageSubTitle = 'inserisci '.$App->params->labels['item']['item'];
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' inserit'.$App->params->labels['item']['itemSex'].'!';				
				}		
	break;

	case 'modify':				
		$App->pageSubTitle = 'modifica '.$App->params->labels['item']['item'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'update':
		if ($_POST) {
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if ($_POST['alias'] == '') $_POST['alias'] = $_POST['name'];
			if (!isset($_POST['ordering']) || (isset($_POST['ordering']) && $_POST['ordering'] == 0)) $_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','section = '.intval($_POST['section'])) + 1;			
			/* requpero i vecchi dati */
			$App->oldItem = new stdClass;
			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->oldItem = Sql::getRecord();
			if (Core::$resultOp->error == 0) {
				/* se cambia section aggiorna l'ordering */
	   		if ($_POST['section'] != $App->oldItem->section) {
					$_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','section = '.intval($_POST['section'])) + 1;  
					} 					
				/* controlla i campi obbligatori */
				Sql::checkRequireFields($App->params->fields['item']);
				if (Core::$resultOp->error == 0) {
					Sql::stripMagicFields($_POST);
					Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
					if (Core::$resultOp->error == 0) {						
						}		
					}	
				}
			} else {					
				Core::$resultOp->error = 1;
				}

		if (Core::$resultOp->error > 0) {
			$App->pageSubTitle = 'modifica '.$App->params->labels['item']['item'];
			$App->viewMethod = 'formMod';	
			} else {
				if (isset($_POST['submitForm'])) {	
					$App->viewMethod = 'list';
					Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' modificat'.$App->params->labels['item']['itemSex'].'!';								
					} else {						
						if (isset($_POST['id'])) {
							$App->id = $_POST['id'];
							$App->pageSubTitle = 'modifica '.$App->params->labels['item']['item'];
							$App->viewMethod = 'formMod';	
							Core::$resultOp->message = "Modifiche applicate!";
							} else {
								$App->viewMethod = 'formNew';	
								$App->pageSubTitle = 'inserisci '.$App->params->labels['item']['item'];
								}
						}				
				}		
	break;

	case 'page':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,Core::$request->action,'page',$App->id);
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
		$App->item->ordering = 0;
		$App->item->code_menu = '<li class="{{LICLASS}}"><a href="{{URLSITEADMIN}}{{NAME}}"><i class="fa fa-cog fa-fw"></i> {{LABEL}}</a></li>';				
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'form.tpl.php';
		$App->methodForm = 'insert';	
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'form.tpl.php';
		$App->methodForm = 'update';	
	break;

	case 'list':
		$App->item = new stdClass;						
		$App->itemsForPage = (isset($_MY_SESSION_VARS[Core::$request->action]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[Core::$request->action]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		$qryFields = array('*');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		if (isset($_MY_SESSION_VARS[Core::$request->action]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
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
		Sql::setOrder('section ASC, ordering '.$App->params->ordersType['item']);
		$App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = 'lista dei '.$App->params->labels['item']['items'].' del sito';
		$App->templatePage = 'list.tpl.php';	
	break;
	
	default:
	break;
	}	

/* imposta le variabili Savant */
$Tpl->globalSettings = $globalSettings;
$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/module.js"></script>';
?>