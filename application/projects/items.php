<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/projects/items.php v.1.0.0. 28/01/2017
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

$App->id_cat = 0;

/* legge la tabella contatti */
$App->contacts = new stdClass;
Sql::initQuery($App->params->tables['cont'],array('id,name,surname'),array(),'active = 1');
$App->contacts = Sql::getRecords();


switch(Core::$request->method) {
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActiveInLang(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,$_lang);
		$App->viewMethod = 'list';
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			$App->itemOld = new stdClass;
				Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					/* cancella le timecard con il progetto associato */
					Sql::initQuery($App->params->tables['time'],array('id'),array($App->id),'id_project = ?');
					Sql::deleteRecord();
					if (Core::$resultOp->error == 0) {
						Core::$resultOp->message = ucfirst($_lang['voce cancellata']).'!';
						}						
					}			
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'currentItem':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('current'),array('0'));
			Sql::updateRecord();
			if (Core::$resultOp->error == 0) {
				Sql::initQuery($App->params->tables['item'],array('current'),array('1',$App->id),'id = ?');
				Sql::updateRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['voce corrente']).'!';		
					}
				}
			}
		$App->viewMethod = 'list';	
	break;
	
	case 'timecardItem':
		if ($App->id > 0) {
			Sql::switchFieldOnOffInLang($App->params->tables['item'],'timecard','id',$App->id,'timecard',$_lang);	
			}		
		$App->viewMethod = 'list';	
	break;
	
	case 'newItem':
		$App->pageSubTitle = $_lang['inserisci voce'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertItem':
		if ($_POST) {	
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			
			if (!isset($_POST['current'])) $_POST['current'] = 0;
			if (!isset($_POST['timecard'])) $_POST['timecard'] = 0;
			
			if (!isset($_POST['costo_orario'])) $_POST['costo_orario'] = '0.00';
			if (!isset($_POST['status'])) $_POST['timecard'] = 0;
			if (!isset($_POST['completato'])) $_POST['completato'] = 0;
			
			/* se current uguale 1 azzerra tutti gli altri */
			if ($_POST['current'] == 1) {
				Sql::initQuery($App->params->tables['item'],array('current'),array('0'));
				Sql::updateRecord();
				}

			if (Core::$resultOp->error == 0) {		   	
				/* controlla i campi obbligatori */
				Sql::checkRequireFields($App->params->fields['item']);
				if (Core::$resultOp->error == 0) {
					Sql::stripMagicFields($_POST);
					Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
					if (Core::$resultOp->error == 0) {
			   		}
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

	case 'modifyItem':				
		$App->pageSubTitle = $_lang['modifica voce'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItem':
		if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			
			if (!isset($_POST['current'])) $_POST['current'] = 0;
			if (!isset($_POST['timecard'])) $_POST['timecard'] = 0;
			if (!isset($_POST['costo_orario'])) $_POST['costo_orario'] = '0.00';
			if (!isset($_POST['status'])) $_POST['timecard'] = 0;
			if (!isset($_POST['completato'])) $_POST['completato'] = 0;
			

			
			/* se current uguale 1 azzerra tutti gli altri */
			if ($_POST['current'] == 1) {
				Sql::initQuery($App->params->tables['item'],array('current'),array('0'));
				Sql::updateRecord();
				}
				
			if (Core::$resultOp->error == 0) {
	   	
				/* controlla i campi obbligatori */
				Sql::checkRequireFields($App->params->fields['item']);
				if (Core::$resultOp->error == 0) {
					Sql::stripMagicFields($_POST);
					Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
					if(Core::$resultOp->error == 0) {
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
		$App->item->id_contact = 0;
		$App->item->created = $App->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/items-form.js"></script>';
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();		
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/items-form.js"></script>';
	break;

	case 'list':
		$App->items = new stdClass;			
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
		if (Core::$resultOp->error <> 1) $obj = Sql::getRecords();
		
		/* sistemo dati */		
		$arr = array();
		if (is_array($obj) && count($obj) > 0) {
			foreach ($obj AS $key=>$value) {
				$arr[] = $value;
				}
			}
		$App->items = $arr;

		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['lista delle voci'];
		$App->templateApp = 'listItem.tpl.php';	
				
		$App->jscript[] = '<script src="'.URL_SITE.'application/'.Core::$request->action.'/templates/'.$App->templateUser.'/js/items-list.js"></script>';	
	break;	
	
	default:
	break;
	}	
?>