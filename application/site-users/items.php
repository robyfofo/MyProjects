<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-users/items.php v.3.0.0. 04/10/2016
*/

if(isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if(isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

switch(Core::$request->method) {
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
			$_POST['is_root'] = 0;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;						
			/* controllo password */
			$checkPassword = true;
			$_POST['password'] = $Module->checkPassword(0);
			if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
			Core::$resultOp->type =  $Module->errorType;
			Core::$resultOp->error =  $Module->error;
			if ($Module->error == 1) $Tpl->formTabActive = 1;
				
			/* controllo nome utente */
			$_POST['username'] = $Module->checkUsername(0);
			if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
			Core::$resultOp->type =  $Module->errorType;
			Core::$resultOp->error =  $Module->error;
			if ($Module->error == 1) $Tpl->formTabActive = 1;
			
			/* recupero dati avatar */
			list($_POST['avatar'],$_POST['avatar_info']) = $Module->getAvatarData(0);
			if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
			Core::$resultOp->type =  $Module->errorType;
			Core::$resultOp->error =  $Module->error;
			if ($Module->error == 1) $Tpl->formTabActive = 4;
			
			/* controllo email univoca */
			$_POST['email'] = $Module->checkEmail(0);
			if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
			Core::$resultOp->type =  $Module->errorType;
			Core::$resultOp->error =  $Module->error;
			if ($Module->error == 1) $Tpl->formTabActive = 1;
			
			if(Core::$resultOp->error == 0) {
				/* controlla i campi obbligatori */
				Sql::checkRequireFields($App->params->fields['item']);
				if(Core::$resultOp->error == 0) {
					if ($checkPassword == true) {
						Sql::stripMagicFields($_POST);
						$_POST['hash'] = password_hash(SITE_CODE_KEY.$_POST['username'].$_POST['email'],PASSWORD_DEFAULT);
						$_POST['hash'] = SanitizeStrings::base64url_encode($_POST['hash']);
						Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
						if(Core::$resultOp->error == 0) {
							$App->id = Sql::getLastInsertedIdVar(); /* preleva l'id della pagina */	   			
			   			}
						} else {		
							Core::$resultOp->error = 1;			
							Core::$resultOp->messages[] = 'Inserisci o controlla la password!';
							}				
					}
				}	
			} else {
				Core::$resultOp->error = 1;
				}			
		if(Core::$resultOp->error == 1) {
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
			$_POST['is_root'] = 0;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			
			/* requpero i vecchi dati */
			$App->oldItem = new stdClass;
			Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->oldItem = Sql::getRecord();
			if (Core::$resultOp->error == 0) {		
				/* controllo password */
				$_POST['password'] = $Module->checkPassword($_POST['id']);
				if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
				Core::$resultOp->type =  $Module->errorType;
				Core::$resultOp->error =  $Module->error;
				if ($Module->error == 1) $Tpl->formTabActive = 1;
			
				/* controllo nome utente */
				if($_POST['username'] != $App->oldItem->username) {
					$_POST['username'] = $Module->checkUsername($_POST['id']);
					if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
					Core::$resultOp->type =  $Module->errorType;
					Core::$resultOp->error =  $Module->error;
					if ($Module->error == 1) $Tpl->formTabActive = 1;
					}
					
				/* recupero dati avatar */
				list($_POST['avatar'],$_POST['avatar_info']) = $Module->getAvatarData($_POST['id']);
				if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
				Core::$resultOp->type =  $Module->errorType;
				Core::$resultOp->error =  $Module->error;
				if($Module->error == 1) $Tpl->formTabActive = 4;
					
				/* controllo email univoca */
				if($_POST['email'] != $App->oldItem->email) {
					$_POST['email'] = $Module->checkEmail($_POST['id']);
					if ($Module->message != '') Core::$resultOp->messages[] = $Module->message;
					Core::$resultOp->type =  $Module->errorType;
					Core::$resultOp->error =  $Module->error;
					if ($Module->error == 1) $Tpl->formTabActive = 1;
					}
							
				if (Core::$resultOp->error == 0) {				
					/* controlla i campi obbligatori */
					Sql::checkRequireFields($App->params->fields['item']);
					if(Core::$resultOp->error == 0) {
						Sql::stripMagicFields($_POST);
						$_POST['hash'] = password_hash(SITE_CODE_KEY.$_POST['username'].$_POST['email'],PASSWORD_DEFAULT);
						$_POST['hash'] = SanitizeStrings::base64url_encode($_POST['hash']);
						Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
						if(Core::$resultOp->error == 0) {					   						
							}	
						}
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
	
	case 'checkUserAjaxItem':
		$count = $Module->checkUsernameAjax($_POST['id'],$_POST['username']);
		if($count > 0) {
			echo '<span style="color:red;">L\'username <strong>'.$_POST['username'].'</strong> risulta già presente nel nostro database!</span>';
			} else {
				echo '<span style="color:green;">L\'username <strong>'.$_POST['username'].'</strong> è libero!</span>';
				}
		$renderTpl = false;
		die();
	break;
	
	case 'checkEmailAjaxItem':
		$count = $Module->checkEmailAjax($_POST['id'],$_POST['email']);
		if($count > 0) {
			echo '<span style="color:red;">L\'indirizzo email <strong>'.$_POST['email'].'</strong> risulta già presente nel nostro database!</span>';
			} else {
				echo '<span style="color:green;">L\'indirizzo email <strong>'.$_POST['email'].'</strong> è libero!</span>';
				}
		$renderTpl = false;
		die();
	break;

	case 'renderAvatarDBItem':
		list($img,$imgInfo) = $Module->renderAvatarData($App->id);
		echo $img;
		$renderTpl = false;
		die();
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
		$App->item->created = $App->nowDateTime;		
		$App->item->active = 1;
		$App->item->id_level = 0;		
		$App->templatesAvaiable = $Module->getUserTemplatesArray();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';	
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		$App->templatesAvaiable = $Module->getUserTemplatesArray();
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templateApp = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';	
	break;

	case 'list':
		$App->item = new stdClass;						
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		$qryFields = array('*');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = 'is_root = 0';
		$and = " AND ";
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['item'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .=  $and.'('.$sessClause.')';
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['item'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = $_lang['pagesubtitle'];
		$App->templateApp = 'listItem.tpl.php';	
	break;
	
	default:
	break;
	}	
?>