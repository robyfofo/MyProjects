<?php
/*
	framework siti html-PHP-Mysql
	copyright 2011 Roberto Mantovani
	http://www.robertomantovani.vr;it
	email: me@robertomantovani.vr.it
	news/items.php v.2.6.2. 16/02/2016
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$Tpl->subAction,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$Tpl->subAction,'srcTab',$_POST['searchFromTable']);

$appData->id_cat = 0;

switch(Core::$request->method) {
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr($Tpl->method,0,-4),$appTableItem,$Tpl->id,ucfirst($appData->labels['item']['item']),$appData->labels['item']['itemSex']);
		$appData->viewMethod = 'list';
	break;
	
	case 'deleteItem':
		if ($Tpl->id > 0) {
			$appData->itemOld = new stdClass;
				Sql::initQuery($appTableItem,array('id'),array($Tpl->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($appData->labels['item']['item']).' cancellat'.$appData->labels['item']['itemSex'].'!';		
					}
				
			}		
		$appData->viewMethod = 'list';
	break;
	
	case 'newItem':
		$Tpl->pageSubTitle = 'inserisci '.$appData->labels['item']['item'];
		$appData->viewMethod = 'formNew';	
	break;
	
	case 'insertItem':
		if ($_POST) {	
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['created'])) $_POST['created'] = $appData->nowDateTime;		   	
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($fieldsItem);
			if (Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::insertRawlyPost($fieldsItem,$appTableItem);
				if (Core::$resultOp->error == 0) {
		   		}
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error == 1) {
			$Tpl->pageSubTitle = 'inserisci '.$appData->labels['item']['item'];
			$appData->viewMethod = 'formNew';
			} else {
				$appData->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($appData->labels['item']['item']).' inserit'.$appData->labels['item']['itemSex'].'!';				
				}		
	break;

	case 'modifyItem':				
		$Tpl->pageSubTitle = 'modifica '.$appData->labels['item']['item'];
		$appData->viewMethod = 'formMod';
	break;
	
	case 'updateItem':
		if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $appData->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
	   	
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($fieldsItem);
			if (Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::updateRawlyPost($fieldsItem,$appTableItem,'id',$Tpl->id);
				if(Core::$resultOp->error == 0) {
			   	}					
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error == 1) {
			$Tpl->pageSubTitle = 'modifica '.$appData->labels['item']['item'];
			$appData->viewMethod = 'formMod';				
			} else {
				if (isset($_POST['submitForm'])) {	
					$appData->viewMethod = 'list';
					Core::$resultOp->message = ucfirst($appData->labels['item']['item']).' modificat'.$appData->labels['item']['itemSex'].'!';								
					} else {						
						if (isset($_POST['id'])) {
							$Tpl->id = $_POST['id'];
							$Tpl->pageSubTitle = 'modifica '.$appData->labels['item']['item'];
							$appData->viewMethod = 'formMod';	
							Core::$resultOp->message = "Modifiche applicate!";
							} else {
								$appData->viewMethod = 'formNew';	
								echo $Tpl->pageSubTitle = 'inserisci '.$appData->labels['item']['item'];
								}
						}				
				}		
	break;
	
	case 'pageItem':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$Tpl->subAction,'page',$Tpl->id);
		$appData->viewMethod = 'list';	
	break;

	case 'messageItem':
		Core::$resultOp->error = $Tpl->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$appData->viewMethod = 'list';
	break;

	case 'listItem':
		$appData->viewMethod = 'list';		
	break;

	default;	
		$appData->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$appData->viewMethod) {
	case 'formNew':
		$appData->item = new stdClass;		
		$appData->item->active = 1;
		$appData->item->created = $appData->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($appData->item,$fieldsItem);
		$appData->templatePage = 'formItem.tpl.php';
		$appData->methodForm = 'insertItem';
	break;
	
	case 'formMod':
		$appData->item = new stdClass;
		Sql::initQuery($appTableItem,array('*'),array($Tpl->id),'id = ?');
		$appData->item = Sql::getRecord();		
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($appData->item,$fieldsItem);
		$appData->templatePage = 'formItem.tpl.php';
		$appData->methodForm = 'updateItem';	
	break;

	case 'list':
		$appData->items = new stdClass;			
		$appData->itemsForPage = (isset($_MY_SESSION_VARS[$Tpl->subAction]['ifp']) ? $_MY_SESSION_VARS[$Tpl->subAction]['ifp'] : 5);
		$appData->page = (isset($_MY_SESSION_VARS[$Tpl->subAction]['page']) ? $_MY_SESSION_VARS[$Tpl->subAction]['page'] : 1);				
		$qryFields = array('*');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		if (isset($_MY_SESSION_VARS[$Tpl->subAction]['srcTab']) && $_MY_SESSION_VARS[$Tpl->subAction]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$Tpl->subAction]['srcTab'],$fieldsItem,'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .= $sessClause;
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($appTableItem,$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($appData->itemsForPage);	
		Sql::setPage($appData->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $appData->items = Sql::getRecords();
		$appData->pagination = Utilities::getPagination($appData->page,Sql::getTotalsItems(),$appData->itemsForPage);
		$Tpl->pageSubTitle = 'lista delle '.$appData->labels['item']['items'];
		$appData->templatePage = 'listItem.tpl.php';	
	break;	
	
	default:
	break;
	}	
?>