<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-blocks/items.php v.3.0.0. 03/11/2016
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->id_cat = 0;

switch (Core::$request->method) {
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,ucfirst($App->params->labels['item']['item']),$App->params->labels['item']['itemSex']);
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if(Core::$resultOp->error == 0) { 
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';
				} else {					
					}
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newItem':			
		$App->pageSubTitle = 'inserisci '.$App->params->labels['item']['item'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItem':
		if ($_POST) {			
			if (!isset($_POST['active'])) $_POST['active'] = 0; 
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			
			/* imposta alias */
			$_POST['alias'] = ToolsStrings::getAlias('',$_POST['alias'],$_POST['title_it'],array('table'=>$App->params->tables['item']));

			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
				if(Core::$resultOp->error == 0) {					
		   		}
				}	
			} else {
				Core::$resultOp->error = 1;
				}			
		if($Core::$resultOp->error == 1) {
			$App->pageSubTitle = 'inserisci '.$App->params->labels['item']['item'];
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' inserit'.$App->params->labels['item']['itemSex'].'!';
				}		
	break;

	case 'modifyItem':				
		$App->pageSubTitle = 'modifica '.$App->params->labels['item']['item'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItem':
		if ($_POST) {
			if (!isset($App->itemOld)) $App->itemOld = new stdClass;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			
			/* preleva dati vecchio */
			Sql::initQuery($App->params->tables['item'],array('alias'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
			
			/* imposta alias */
			$_POST['alias'] = ToolsStrings::getAlias($App->itemOld->alias,$_POST['alias'],$_POST['title_it'],array('table'=>$App->params->tables['item']));

			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
				if(Core::$resultOp->error == 0) {
					}	
				}
			} else {					
				Core::$resultOp->error = 1;
				}
		if (Core::$resultOp->error == 1) {
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
	
	case 'pageItem':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;
	
	case 'messageItem':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';		
	break;

	case 'listItem':
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
		$App->item->created = $App->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';	
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';	
	break;

	case 'list':
		$App->items = new stdClass;
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
		$App->pageSubTitle = 'lista dei '.$App->params->labels['item']['items'];
		$App->templatePage = 'listItem.tpl.php';
	break;	
	
	default:
	break;
	}	
?>