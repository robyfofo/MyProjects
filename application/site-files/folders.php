<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-files/folders.php v.3.0.0. 02/11/2016
*/

if (isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if (isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);
	
switch(Core::$request->method) {
	
	case 'activeFold':
	case 'disactiveFold':
		Sql::manageFieldActive(str_replace('Fold','', Core::$request->method),$App->params->tables['fold'],$App->id,ucfirst($App->params->labels['fold']['item']),$App->params->labels['fold']['itemSex']);	
		$App->viewMethod = 'list';		
	break;
	
	case 'deleteFold':
		if ($App->id > 0) {
			$delete = true;
			/* controlla se ha immagini associate */
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id_folder = ?');
			$count = Sql::countRecord();
			if($count > 0) {
				Core::$resultOp->error = 2;
				Core::$resultOp->message = 'Errore! La '.$App->params->labels['fold']['item'].' ha ancora '.$App->params->labels['fold']['sons'].' associat'.$App->params->labels['fold']['sonsSex'].'!';
				$delete = false;	
				}
			
			if ($delete == true && Core::$resultOp->error == 0) {
				/* preleva il titolo_it per cancellare la cartella */
				Sql::initQuery($App->params->tables['fold'],array('*'),array($App->id),'id = ?');
				$App->itemOld = Sql::getRecord();	
				if (Core::$resultOp->error == 0) { 		
					Sql::initQuery($App->params->tables['fold'],array('*'),array($App->id),'id = ?');
					Sql::deleteRecord();
					if (Core::$resultOp->error == 0) {
						/* cancella la cartella galleria */
			   		if (isset($App->itemOld->filename) && $App->itemOld->folder_name != '' && file_exists($App->params->uploadPaths['item'].$App->itemOld->folder_name)) rmdir($App->params->uploadPaths['item'].$App->itemOld->folder_name) or die('impossibile cancellare la cartella'.$App->params->uploadPaths['item'].$App->itemOld->folder_name);
							Core::$resultOp->message = ucfirst($App->params->labels['fold']['item']).' cancellat'.$App->params->labels['fold']['itemSex'].'!';	
							}					
						}
					}
			}		
		$App->viewMethod = 'list';	
	break;
	
	case 'newFold':			
		$App->pageSubTitle = 'inserisci '.$App->params->labels['fold']['item'];
		$App->viewMethod = 'formNew';	
	break;

	case 'insertFold':
	   if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
	   	/* crea il folder name */
		   $folder_name = SanitizeStrings::urlslug($_POST['title_it'],array('delimiter' => '-'));	   	
	   	/* controlla se esiste già una cartella con lo stesso nome */
	   	Sql::initQuery($App->params->tables['fold'],array('id'),array($folder_name),'folder_name = ?');
			$count = Sql::countRecord();
			if (Core::$resultOp->error == 0) { 	
		   	if ($count == 0) {
			   	if (!isset($_POST['active'])) $_POST['active'] = 1;		   	
			   	$_POST['folder_name'] = $folder_name;		   	
			   	/* controlla i campi obbligatori */
			   	Sql::checkRequireFields($App->params->fields['fold']);
			   	if (Core::$resultOp->error == 0) { 	
			   		Sql::stripMagicFields($_POST);
			   		/* memorizza nel db */
			   		Sql::insertRawlyPost($App->params->fields['fold'],$App->params->tables['fold']);
			   		if (Core::$resultOp->error == 0) {
			   			/* crea la cartella galleria */		   			
			   			if(!file_exists ($App->params->uploadPaths['item'].$folder_name)) mkdir($App->params->uploadPaths['item'].$folder_name) or die('impossibile creare la cartella'.$App->params->uploadPaths['item'].$folder_name);
			   			chmod($App->params->uploadPaths['item'].$folder_name, 0755);
			   			}
			   		}
					} else {
						Core::$resultOp->message = 'Esiste già una '.$App->params->labels['fold']['item'].' con lo stesso nome!';	
						Core::$resultOp->error = 2;		
						} 
				}
			} else {	
				Core::$resultOp->error = 1;
				}			
		if (Core::$resultOp->error > 0) {
			$App->pageSubTitle = 'inserisci '.$App->params->labels['fold']['item'];
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($App->params->labels['fold']['item']).' inserit'.$App->params->labels['fold']['itemSex'].'!';				
				}		
	break;
	
	case 'modifyFold':			
		$App->pageSubTitle = 'modifica '.$App->params->labels['fold']['item'];
		$App->viewMethod = 'formMod';	
	break;

	case 'updateFold':
		if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			$App->itemOld = new stdClass;
			/* crea il folder name */
		   $newFold_name = SanitizeStrings::urlslug($_POST['title_it'],array('delimiter' => '-'));
			/* preleva il folder name del categoria memorizzato prima */	
			Sql::initQuery($App->params->tables['fold'],array('*'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
			if (Core::$resultOp->error == 0) {		
				$oldFold_name = $App->itemOld->folder_name;					
				/* controlla se esiste già una cartella con lo stesso nome */
				Sql::initQuery($App->params->tables['fold'],array('id'),array($newFold_name),'folder_name = ?');
				$count = Sql::countRecord();	
				if (Core::$resultOp->error == 0) {	
		   		if ($oldFold_name == $newFold_name || ($oldFold_name != $newFold_name && $count == 0)) {
						if (!isset($_POST['active'])) $_POST['active'] = 0;
						$_POST['folder_name'] = $newFold_name;							
			   		/* controlla i campi obbligatori */
			   		Sql::checkRequireFields($App->params->fields['fold']);
			   		if (Core::$resultOp->error == 0) {   	
			   			Sql::stripMagicFields($_POST);
			   			/* memorizza nel db */
			   			Sql::updateRawlyPost($App->params->fields['fold'],$App->params->tables['fold'],'id',$App->id);
			   			if (Core::$resultOp->error == 0) {		   			
			   				/* rinomina la cartella */		
			   				if ($oldFold_name != '') {
			   					if($oldFold_name != '' && file_exists ($App->params->uploadPaths['item'].$oldFold_name)) rename($App->params->uploadPaths['item'].$oldFold_name,$App->params->uploadPaths['item'].$newFold_name) or die('impossibile rinominare la cartella');
			   					} 	
			   				/* se cambia il folder name lo cambia nelle immagini associate */
				   			if ($oldFold_name != $newFold_name) {
				   				$oldfolder = $oldFold_name.'/';
				   				$newfolder = $newFold_name.'/';
				   				Sql::initQuery($App->params->tables['item'],array('folder_name'),array($newfolder,$oldfolder),'folder_name = ?');
				   				Sql::updateRecord();
				   				if (Core::$resultOp->error == 0) {
				   					Core::$resultOp->messages[] = 'Ho cambiato il folder name agli '.$App->params->labels['fold']['sons'].' associat'.$App->params->labels['fold']['sonsSex'].'!';	
										}				   					
				   				}   			
								}	
			   			}
			   		} else {
			   			Core::$resultOp->message = 'Esiste già una '.$App->params->labels['fold']['item'].' con lo stesso nome!';	
							Core::$resultOp->error = 2;
							}
					}		  	
				}							
			} else {					
				Core::$resultOp->error = 1;
				}

		if (Core::$resultOp->error > 0) {
			$App->pageSubTitle = 'modifica '.$App->params->labels['fold']['item'];
			$App->viewMethod = 'formMod';	
			} else {
				if (isset($_POST['submitForm'])) {	
					$App->viewMethod = 'list';
					Core::$resultOp->message = ucfirst($App->params->labels['fold']['item']).' modificat'.$App->params->labels['fold']['itemSex'].'!';								
					} else {						
						if (isset($_POST['id'])) {
							$App->id = $_POST['id'];
							$App->pageSubTitle = 'modifica '.$App->params->labels['fold']['item'];
							$App->viewMethod = 'formMod';	
							Core::$resultOp->message = "Modifiche applicate!";
							} else {
								$App->viewMethod = 'formNew';	
								$App->pageSubTitle = 'inserisci '.$App->params->labels['fold']['item'];
								}
						}				
				}		
	break;

	case 'pageFold':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';
	break;
	
	case 'messageFold':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';
	break;
	
	case 'listFold':
		$App->viewMethod = 'list';
	break;

	default;	
		$App->viewMethod = 'list';	
	break;		
	}


switch((string)$App->viewMethod) {

	case 'formNew':
		$App->item = new stdClass;
		$App->item->created = $App->nowDateTime;		
		$App->item->active = 1;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['fold']);
		$App->templatePage = 'formFolders.tpl.php';
		$App->methodForm = 'insertFold';
	break;
	
	case 'formMod':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['fold'],array('*'),array($App->id),'id = ?');
		if (Core::$resultOp->error == 0) $App->item = Sql::getRecord();
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['fold']);
		$App->templatePage = 'formFolders.tpl.php';
		$App->methodForm = 'updateFold';	
	break;
		
	case 'list':
		$App->items = new stdClass;
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 5);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);	
		$qryFields = array('c.*','(SELECT COUNT(i.id) FROM '.$App->params->tables['item'].' AS i WHERE i.id_folder = c.id) AS numitems');
		$qryFieldsValues = array();
		$qryFieldsValuesClause = array();
		$clause = '';
		if (isset($_MY_SESSION_VARS[$App->sessionName]['srcTab']) && $_MY_SESSION_VARS[$App->sessionName]['srcTab'] != '') {
			list($sessClause,$qryFieldsValuesClause) = Sql::getClauseVarsFromAppSession($_MY_SESSION_VARS[$App->sessionName]['srcTab'],$App->params->fields['fold'],'');
			}		
		if (isset($sessClause) && $sessClause != '') $clause .= $sessClause;
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['fold'].' AS c',$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);		
		Sql::setResultPaged(true);
		if (Core::$resultOp->error <> 1) $App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);
		$App->pageSubTitle = 'lista delle '.$App->params->labels['fold']['items'].' del sito';
		$App->templatePage = 'listFolders.tpl.php';
	break;	
	
	default;	
	break;
	}
?>