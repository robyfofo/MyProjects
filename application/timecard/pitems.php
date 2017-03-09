<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/pitems.php v.1.0.0. 02/03/2017
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);


switch(Core::$request->method) {
	case 'activePite':
	case 'disactivePite':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['pite'],$App->id,$_lang);
		$App->viewMethod = 'list';
	break;
	
	case 'deletePite':
		if ($App->id > 0) {
			$App->itemOld = new stdClass;
				Sql::initQuery($App->params->tables['pite'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($_lang['voce cancellata']).'!';
					}
				
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newPite':
		$App->pageSubTitle = $_lang['inserisci voce'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertPite':
		if ($_POST) {
			if (!isset($_POST['id_owner'])) $_POST['id_owner'] = $App->userLoggedData->id;	
				if (Core::$resultOp->error == 0) {		
				/* cerca i campi richiesti */
				Form::checkRequirePostByFields($App->params->fields['pite'],$_lang,array());
				if (Core::$resultOp->error == 0) {				
					/* parsa i post in base ai campi */
					Form::parsePostByFields($App->params->fields['pite'],$_lang,array());
					if (Core::$resultOp->error == 0) {						
						/* controlla l'intervallo */
						$datatimeisoini = $App->nowDate .' '.$_POST['starttime'].':00';
						$datatimeisoend = $App->nowDate .' '.$_POST['endtime'].':00';
						DateFormat::checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$App->nowDate);
						if (Core::$resultOp->error == 0) {
							$dteStart = new DateTime($datatimeisoini);
   						$dteEnd   = new DateTime($datatimeisoend); 
   						$dteDiff  = $dteStart->diff($dteEnd);
   						$_POST['worktime'] = $dteDiff->format("%H:%I");
							} else {
	      					Core::$resultOp->message = $_lang['La ora inizio deve essere prima della ora fine!'];	 
								}						
						if (Core::$resultOp->error == 0) {
							Sql::insertRawlyPost($App->params->fields['pite'],$App->params->tables['pite']);
							if (Core::$resultOp->error == 0) {
			   				}			   			
			   			}
			   		}
					}
				}			$date = DateTime::createFromFormat('Y-m-d H:i:s',$datatimeiso);
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getInsertRecordFromPostResults(0,Core::$resultOp,$_lang,array());
	break;

	case 'modifyPite':				
		$App->pageSubTitle = $_lang['modifica voce'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updatePite':
		if ($_POST) {	
			if (!isset($_POST['id_owner'])) $_POST['id_owner'] = $App->userLoggedData->id;
			/* cerca i campi richiesti */
			Form::checkRequirePostByFields($App->params->fields['pite'],$_lang,array());
			if (Core::$resultOp->error == 0) {				
				/* parsa i post in base ai campi */ 	
				Form::parsePostByFields($App->params->fields['pite'],$_lang,array());
				if (Core::$resultOp->error == 0) {
					/* controlla l'intervallo */
					$datatimeisoini = $App->nowDate .' '.$_POST['starttime'].':00';
					$datatimeisoend = $App->nowDate .' '.$_POST['endtime'].':00';
					DateFormat::checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$App->nowDate);
					if (Core::$resultOp->error == 0) {						
						$dteStart = new DateTime($datatimeisoini);
   					$dteEnd   = new DateTime($datatimeisoend); 
   					$dteDiff  = $dteStart->diff($dteEnd);
   					$_POST['worktime'] = $dteDiff->format("%H:%I");
						} else {
	      				Core::$resultOp->message = $_lang['La ora inizio deve essere prima della ora fine!'];	 
							}
					if (Core::$resultOp->error == 0) {		
						Sql::updateRawlyPost($App->params->fields['pite'],$App->params->tables['pite'],'id',$App->id);
						if(Core::$resultOp->error == 0) {
					   	}				   					
						}
					}					
				}
			} else {
				Core::$resultOp->error = 1;
				}			
		list($id,$App->viewMethod,$App->pageSubTitle,Core::$resultOp->message) = Form::getUpdateRecordFromPostResults($App->id,Core::$resultOp,$_lang,array());	
	break;	
		
	case 'pagePite':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';	
	break;

	case 'messagePite':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;

	case 'listPite':
		$App->viewMethod = 'list';		
	break;

	default;	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$time = DateTime::createFromFormat('H:i:s',$App->nowTime);
		$App->timeIniTimecard =  $time->format('H:i');
		$time->add(new DateInterval('PT1H'));
		$App->timeEndTimecard = $time->format('H:i<i></i>');	
		
		$App->item = new stdClass;		
		$App->item->active = 1;
		$App->item->id_contact = 0;
		$App->item->created = $App->nowDateTime;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['pite']);
		$App->templateApp = 'formPite.tpl.php';
		$App->methodForm = 'insertPite';
	break;
	
	case 'formMod':		
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['pite'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();		
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['pite']);
		
		$App->timeIniTimecard = $App->item->starttime;
		$App->timeEndTimecard = $App->item->endtime;

		$App->templateApp = 'formPite.tpl.php';
		$App->methodForm = 'updatePite';	
	break;

	case 'list':
		$time = DateTime::createFromFormat('H:i:s',$App->nowTime);
		$App->timeIniTimecard =  $time->format('H:i');
		$time->add(new DateInterval('PT1H'));
		$App->timeEndTimecard = $time->format('H:i<i></i>');	
				
		$App->items = new stdClass;			
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);				
		$qryFields = array('*');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['pite'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .= $sessClause;
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['pite'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['lista delle voci custom'];
		$App->templateApp = 'listPite.tpl.php';	
	break;	
	
	default:
	break;
	}	
?>