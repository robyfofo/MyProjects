<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-makeconfig/index.php v.3.0.0. 20/10/2016
*/

$App->params = new stdClass();

include_once(PATH.'application/'.Core::$request->action."/module.class.php");
$Application = new Module(Core::$request->action);

//Sql::setDebugMode(1);

/* variabili ambiente */
$App->sessionName = Core::$request->action;
$App->codeVersion = ' 3.0.0.';
$App->pageTitle = 'Site Makeconfig';
$App->breadcrumb .= '<li class="active"><i class="icon-user"></i> Site Makeconfig</li>';

$App->params->tables = array();
$App->params->fields = array();
$App->params->uploadDirs = array();
$App->params->uploadPaths = array();
$App->params->ordersType = array();
$App->params->labels = array();

$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);

$App->params->ordersType['item'] = 'ASC';

$App->params->fields['item'] = array(
	'id'=>array('label'=>'ID','required'=>false,'type'=>'autoinc','primary'=>true),
	'name'=>array('label'=>'Nome','searchTable'=>true,'type'=>'varchar'),
	'type'=>array('label'=>'Tipo','searchTable'=>true,'type'=>'varchar'),
	'length'=>array('label'=>'Lung.','searchTable'=>false,'type'=>'varchar'),
	'ordering'=>array('label'=>'Ord.','required'=>false,'type'=>'int','defValue'=>1),
	'multilanguage'=>array('label'=>'Multilingua','required'=>false,'type'=>'int','defValue'=>1),
	'active'=>array('label'=>'Attiva','required'=>false,'type'=>'int','defValue'=>0)
	);
foreach($globalSettings['languages'] AS $lang) {
	$App->params->fields['item']['value_'.$lang] = array('label'=>'Valore '.$lang,'searchTable'=>true,'required'=>true,'type'=>'varchar');
	$App->params->fields['item']['content_'.$lang] = array('label'=>'Contenuto extra '.$lang,'searchTable'=>true,'required'=>false,'type'=>'varchar');
	}
	
$App->types = array('input','label');
$App->lengths  = array('int','varchar','text','flag');

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);
if(isset($_POST['appTable']) && $_POST['appTable'] != '') $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'appTable',$_POST['appTable']);

$App->params->tables['item'] = (isset($_MY_SESSION_VARS[$App->sessionName]['appTable']) ? $_MY_SESSION_VARS[$App->sessionName]['appTable'] : '');

switch(Core::$request->method) {
	
	case 'moreOrdering':
		$Utilities::increaseFieldOrdering($App->id,array('table'=>Sql::getTablePrefix().$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>false,'sexSuffix'=>'o','labelItem'=>'Parametro'));
		$App->viewMethod = 'list';	
	break;
	case 'lessOrdering':
		$Utilities::decreaseFieldOrdering($App->id,array('table'=>Sql::getTablePrefix().$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>false,'sexSuffix'=>'o','labelItem'=>'Parametro'));
		$App->viewMethod = 'list';	
	break;

	case 'active':
	case 'disactive':
		Sql::manageFieldActive($App->method,Sql::getTablePrefix().$App->params->tables['item'],$App->id,'Parametro','o');
		$App->viewMethod = 'list';		
	break;
	
	case 'delete':
		if ($App->id > 0) {			
			Sql::initQuery(Sql::getTablePrefix().$App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if(Core::$resultOp->error == 0) { 				
				Core::$resultOp->message = ucfirst($App->labelItem).' cancellat'.$App->labelItemSex.'!';				
				}	
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'new':			
		$App->pageSubTitle = 'inserisci parametro';
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insert':
		if ($_POST) {			
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['multilanguage'])) $_POST['multilanguage'] = 0;				
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::insertRawlyPost($App->params->fields['item'],Sql::getTablePrefix().$App->params->tables['item']);
				if(Core::$resultOp->error == 0) {
					
		   		}
				}	
			} else {
				$App->error = 1;
				}			
		if(Core::$resultOp->error == 1) {
			$App->pageSubTitle = 'inserisci parametro';
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = 'Parametro inserito!';				
				}		
	break;

	case 'modify':				
		$App->pageSubTitle = 'modifica parametro';
		$App->viewMethod = 'formMod';
	break;
	
	case 'update':
		if ($_POST) {
			if (!isset($App->itemOld)) $App->itemOld = new stdClass;
			if (!isset($_POST['active'])) $_POST['active'] = 0;	
			if (!isset($_POST['multilanguage'])) $_POST['multilanguage'] = 0;			
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::updateRawlyPost($App->params->fields['item'],Sql::getTablePrefix().$App->params->tables['item'],'id',$App->id);
				if(Core::$resultOp->error == 0) {					
		   		}
			   }					

			} else {					
				Core::$resultOp->error = 1;
				}
		if (Core::$resultOp->error == 1) {
			$App->pageSubTitle = 'modifica parametro';
			$App->viewMethod = 'formMod';					
			} else {
				if (isset($_POST['submitForm'])) {	
					$App->viewMethod = 'list';
					Core::$resultOp->message = 'Parametro  modificato!';								
					} else {						
						if (isset($_POST['id'])) {
							$App->id = $_POST['id'];
							$App->pageSubTitle = 'modifica parametro';
							$App->viewMethod = 'formMod';	
							Core::$resultOp->message = "Modifiche applicate!";
							} else {
								$App->viewMethod = 'formNew';	
								$App->pageSubTitle = 'inserisci parametro';
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
		$App->item->multilanguage = 0;
		$App->item->ordering = Sql::getMaxValueOfField(Sql::getTablePrefix().$App->params->tables['item'],'ordering','') + 1;
		$App->item->filenameRequired = false;	
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'form.tpl.php';
		$App->methodForm = 'insert';	
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery(DB_TABLE_PREFIX.$App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();		
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->item->filenameRequired = (isset($App->item->filename) && $App->item->filename != '' ? false : false);
		$App->templatePage = 'form.tpl.php';
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
		Sql::initQuery(DB_TABLE_PREFIX.$App->params->tables['item'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		Sql::setOrder('ordering '.$App->params->ordersType['item']);
		$App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = 'lista delle voci di configurazione';
		$App->templatePage = 'list.tpl.php';	
	break;	
	
	default:
	break;
	}
	
/* imposta le variabili Savant */
$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/module.js"></script>';
?>