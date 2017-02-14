<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/contacts/items.php v.3.0.0. 16/01/2017
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);


switch(Core::$request->method) {
	case 'activePite':
	case 'disactivePite':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['pite'],$App->id,ucfirst($App->params->labels['pite']['item']),$App->params->labels['pite']['itemSex']);
		$App->viewMethod = 'list';
	break;
	
	case 'deletePite':
		if ($App->id > 0) {
			$App->itemOld = new stdClass;
				Sql::initQuery($App->params->tables['pite'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($App->params->labels['pite']['item']).' cancellat'.$App->params->labels['pite']['itemSex'].'!';		
					}
				
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'newPite':
		$Tpl->pageSubTitle = 'inserisci '.$App->params->labels['pite']['item'];
		$App->viewMethod = 'formNew';	
	break;
	
	case 'insertPite':
		if ($_POST) {	
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			
			/* controlla l'ora iniziale */
			DateFormat::checkDataTimeIso($App->nowDate .' '.$_POST['starthour'],$App->nowDate);
			if (Core::$resultOp->error == 0) {				
				/* controlla l'ora FINALE */
				DateFormat::checkDataTimeIso($App->nowDate .' '.$_POST['endhour'],$App->nowDate);
				if (Core::$resultOp->error == 0) {									
					/* controlla l'intervallo */
					$datatimeisoini = $App->nowDate .' '.$_POST['starthour'].':00';
					$datatimeisoend = $App->nowDate .' '.$_POST['endhour'].':00';
					DateFormat::checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$App->nowDate);
					if (Core::$resultOp->error == 0) {						
						$startTime = strtotime($_POST['starthour']);
		   			$endTime = strtotime($_POST['endhour']);
						$diff = $endTime - $startTime;
						$_POST['worktime'] = date('H:i', $diff);
   	
						/* controlla i campi obbligatori */
						Sql::checkRequireFields($App->params->fields['pite']);
						if (Core::$resultOp->error == 0) {
							Sql::stripMagicFields($_POST);
							Sql::insertRawlyPost($App->params->fields['pite'],$App->params->tables['pite']);
							if (Core::$resultOp->error == 0) {
					   		}
					   	}
	   	
	   				} else {
	      				Core::$resultOp->message = 'La ora inizio deve essere prima della ora fine! ';	 
	      				Core::$resultOp->error = 1;
							}			   		
					} else {
	      			Core::$resultOp->message = 'La ora fine inserita non è valida! ';	 
	      			Core::$resultOp->error = 1;
						}				
				} else {
	      		Core::$resultOp->message = 'La ora inizio inserita non è valida! ';	 
	      		Core::$resultOp->error = 1;
					}
				
			} else {
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error == 1) {
			$Tpl->pageSubTitle = 'inserisci '.$App->params->labels['pite']['item'];
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($App->params->labels['pite']['item']).' inserit'.$App->params->labels['pite']['itemSex'].'!';				
				}		
	break;

	case 'modifyPite':				
		$Tpl->pageSubTitle = 'modifica '.$App->params->labels['pite']['item'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updatePite':
		if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			
			/* controlla l'ora iniziale */
			DateFormat::checkDataTimeIso($App->nowDate .' '.$_POST['starthour'],$App->nowDate);
			if (Core::$resultOp->error == 0) {				
				/* controlla l'ora FINALE */
				DateFormat::checkDataTimeIso($App->nowDate .' '.$_POST['endhour'],$App->nowDate);
				if (Core::$resultOp->error == 0) {									
					/* controlla l'intervallo */
					$datatimeisoini = $App->nowDate .' '.$_POST['starthour'].':00';
					$datatimeisoend = $App->nowDate .' '.$_POST['endhour'].':00';
					DateFormat::checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$App->nowDate);
					if (Core::$resultOp->error == 0) {						
						$startTime = strtotime($_POST['starthour']);
		   			$endTime = strtotime($_POST['endhour']);
						$diff = $endTime - $startTime;
						$_POST['worktime'] = date('H:i', $diff);

	   	
						/* controlla i campi obbligatori */
						Sql::checkRequireFields($App->params->fields['pite']);
						if (Core::$resultOp->error == 0) {
							Sql::stripMagicFields($_POST);
							Sql::updateRawlyPost($App->params->fields['pite'],$App->params->tables['pite'],'id',$App->id);
							if(Core::$resultOp->error == 0) {
						   	}					
							}

						} else {
	      				Core::$resultOp->message = 'La ora inizio deve essere prima della ora fine! ';	 
	      				Core::$resultOp->error = 1;
							}			   		
					} else {
	      			Core::$resultOp->message = 'La ora fine inserita non è valida! ';	 
	      			Core::$resultOp->error = 1;
						}				
				} else {
	      		Core::$resultOp->message = 'La ora inizio inserita non è valida! ';	 
	      		Core::$resultOp->error = 1;
					}

			} else {
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error == 1) {
			$Tpl->pageSubTitle = 'modifica '.$App->params->labels['pite']['item'];
			$App->viewMethod = 'formMod';				
			} else {
				if (isset($_POST['submitForm'])) {	
					$App->viewMethod = 'list';
					Core::$resultOp->message = ucfirst($App->params->labels['pite']['item']).' modificat'.$App->params->labels['pite']['itemSex'].'!';								
					} else {						
						if (isset($_POST['id'])) {
							$App->id = $_POST['id'];
							$Tpl->pageSubTitle = 'modifica '.$App->params->labels['pite']['item'];
							$App->viewMethod = 'formMod';	
							Core::$resultOp->message = "Modifiche applicate!";
							} else {
								$App->viewMethod = 'formNew';	
								echo $Tpl->pageSubTitle = 'inserisci '.$App->params->labels['pite']['item'];
								}
						}				
				}		
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
		
		$App->timeIniTimecard = $App->item->starthour;
		$App->timeEndTimecard = $App->item->endhour;

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
		$App->pageSubTitle = 'lista dei '.$App->params->labels['pite']['items'];
		$App->templateApp = 'listPite.tpl.php';	
	break;	
	
	default:
	break;
	}	
?>