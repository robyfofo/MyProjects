<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-templates/items.php v.3.0.0. 03/11/2016
*/

if(isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if(isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

switch(Core::$request->method) {
	
	case 'moreOrderingItem':
		$Utilities::increaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>false,'sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>ucfirst($App->params->labels['item']['item'])));
		$App->viewMethod = 'list';	
	break;
	case 'lessOrderingItem':
		$Utilities::decreaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>false,'sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>ucfirst($App->params->labels['item']['item'])));
		$App->viewMethod = 'list';	
	break;

	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,ucfirst($App->params->labels['item']['item']),$App->params->labels['item']['itemSex']);
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteItem':
		if ($App->id > 0) {
			if (!isset($App->itemOld)) $App->itemOld = new stdClass;
			Sql::initQuery($App->params->tables['item'],array('filename'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
			if (Core::$resultOp->error == 0) {
				Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					/* cancella il file vero e proprio */
					if (file_exists($App->params->uploadPaths['item'].$App->itemOld->filename)) {			
						@unlink($App->params->uploadPaths['item'].$App->itemOld->filename);			
						}
					Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';				
					}
				}
			}			
		$App->viewMethod = 'list';
	break;
	
	case 'predefinitoItem':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('predefinito'),array('0'));
			Sql::updateRecord();
			if (Core::$resultOp->error == 0) {
				Sql::initQuery($App->params->tables['item'],array('predefinito'),array('1',$App->id),'id = ?');
				Sql::updateRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' predefinit'.$App->params->labels['item']['itemSex'].'!';			
					}
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
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['predefinito'])) $_POST['predefinito'] = 1;
		   if (!isset($_POST['contents_html']))$_POST['contents_html'] = 1;
		   if (!isset($_POST['uploads'])) $_POST['uploads'] = 0;	
 			if (!isset($_POST['images'])) $_POST['images'] = 0;		   
		   if (!isset($_POST['files'])) $_POST['files'] = 0;
		   if (!isset($_POST['galleries'])) $_POST['galleries'] = 0;
		   if (!isset($_POST['blocks'])) $_POST['blocks'] = 0;
			if (!isset($_POST['ordering'])) $_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','') + 1;	
			
			/* preleva il filename dal form */	   	
	   	ToolsUpload::getFilenameFromForm();	   	
	   	$_POST['filename'] = ToolsUpload::getFilename();	
	   		
			/* controlla i campi obbligatori */
	   	Sql::checkRequireFields($App->params->fields['item']);
	   	if (Core::$resultOp->error == 0) {
	   		/* sposto il file */
	   		if ($_POST['filename'] != '') {
	   			move_uploaded_file(ToolsUpload::getTempFilename(),$App->params->uploadPaths['item'].$_POST['filename']) or die('Errore caricamento file');
	   			}		  	   			
	   		Sql::stripMagicFields($_POST);
	   		/* memorizza nel db */
	   		Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
	   		if (Core::$resultOp->error == 0) {
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
	
	case 'modifyItem':	
		$App->pageSubTitle = 'modifica '.$App->params->labels['item']['item'];
		$App->viewMethod = 'formMod';
	break;
	
	case 'updateItem':
		if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;			
			/* preleva filename vecchio */
			if (!isset($App->itemOld)) $App->itemOld = new stdClass;
	   	Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
	   	/* preleva il filename dal form */	   	
	   	ToolsUpload::getFilenameFromForm();	   	
	   	$_POST['filename'] = ToolsUpload::getFilenameMd5();
	   	$uploadFilename = $_POST['filename'];	   	
	   	/* imposta il nomefile precedente se non si è caricata un immagine (serve per far passare il controolo campo immagine presente)*/	   	
	   	if ($_POST['filename'] == '' && $App->itemOld->filename != '') $_POST['filename'] = $App->itemOld->filename;	   	
			/* opzione cancella immagine */
	   	if (isset($_POST['deleteImage']) && $_POST['deleteImage'] == 1) {
	   		if (file_exists($App->params->uploadPaths['item'].$App->itemOld->filename)) {			
					@unlink($App->params->uploadPaths['item'].$App->itemOld->filename);							
					}
				$_POST['filename'] = '';
	   		$_POST['org_filename'] = '';	
	   		}	   	
			/* controlla i campi obbligatori */
	   	Sql::checkRequireFields($App->params->fields['item']);
	   	if (Core::$resultOp->error == 0) {	   		
	   		if ($uploadFilename != '') {
	   			move_uploaded_file(ToolsUpload::getTempFilename(),$App->params->uploadPaths['item'].$uploadFilename) or die('Errore caricamento file');   			
	   			/* cancella l'immagine vecchia */
					if (file_exists($App->params->uploadPaths['item'].$App->itemOld->filename)) {			
						@unlink($App->params->uploadPaths['item'].$App->itemOld->filename);			
						}	   			
		   		}
	   		Sql::stripMagicFields($_POST);
	   		/* memorizza nel db */
	   		Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
	   		if (Core::$resultOp->error == 0) {		
					}		
				}		
			} else {					
				Core::$resultOp->error = 1;
				}
		if (Core::$resultOp->error > 0) {
			$App->pageSubTitle = 'modifica '.$Tpl->labelItem;
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
		$App->item->created = $App->nowDateTime;
		$App->item->active = 1;
		$App->item->predefinito = 0;
		$App->item->contents_html = 1;
		$App->item->uploads = 0;	
		$App->item->images = 0;
		$App->item->files = 0;
		$App->item->galleries = 0;
		$App->item->blocks = 0;
		$App->item->ordering = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','') + 1;
		$App->item->filenameRequired = false;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';	
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->item->filenameRequired = (isset($App->item->filename) && $App->item->filename != '' ? false : false);
		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';	
	break;

	default;			
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
		Sql::setOrder('ordering '.$App->params->ordersType['item']);	
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = 'lista dei '.$App->params->labels['item']['items'].' disponibili per le pagine dinamiche';		
		$App->templatePage = 'listItem.tpl.php';			
	break;	
	}
?>
