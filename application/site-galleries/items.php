<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-galleries/items.php v.3.0.0. 03/11/2016
*/

if(isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if(isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);
if(isset($_POST['id_cat'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'id_cat',$_POST['id_cat']);

if (Core::$request->method == 'listItem' && $App->id > 0) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'id_cat',$App->id);
if (Core::$request->method == 'listItem' && $App->id == -1) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'id_cat','');

/* gestione sessione -> id_cat */	
$App->id_cat = (isset($_MY_SESSION_VARS[$App->sessionName]['id_cat']) ? $_MY_SESSION_VARS[$App->sessionName]['id_cat'] : 0);

Sql::initQuery($App->params->tables['cate'],array('id','title_it'),array());
Sql::setOptions(array('fieldTokeyObj'=>'id'));
$App->categoriesData = Sql::getRecords();
if (Core::$resultOp->error > 0) {echo Core::$resultOp->message; die;}
if (!is_array($App->categoriesData) || (is_array($App->categoriesData) && count($App->categoriesData) == 0)) {
	ToolsStrings::redirect(URL_SITE_ADMIN.Core::$request->action.'/messageCate/2/'.urlencode('Devi creare o attivare almeno un'.$App->params->labels['item']['ownerSex'].' '.$App->params->labels['item']['owner'].'!'));
	die();
	}
		
switch(Core::$request->method) {
	
	case 'moreOrderingItem':
		Utilities::increaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>true,'parentField'=>'id_cat','sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>ucfirst($App->params->labels['item']['item'])));
		$App->viewMethod = 'list';	
	break;
	case 'lessOrderingItem':
		Utilities::decreaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>true,'parentField'=>'id_cat','sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>ucfirst($App->params->labels['item']['item'])));
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
			Sql::initQuery($App->params->tables['item'],array('id_cat','filename','folder_name'),array($App->id),'id = ?');
		   $App->itemOld = Sql::getRecord();
		   if (Core::$resultOp->error == 0) {		   
			   $folder_name = ($App->itemOld->folder_name != '' ? $App->itemOld->folder_name.'/' : ''); 
				Sql::initQuery($App->params->tables['item'],array(),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					/* cancella il file vero e proprio */
					if (file_exists($App->params->uploadPaths['item'].$folder_name.$App->itemOld->filename)) {			
						@unlink($App->params->uploadPaths['item'].$folder_name.$App->itemOld->filename);			
						} 			
					Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';	
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
	   	$App->itemCat = new stdClass;
	   	if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
	   	if (!isset($_POST['ordering']) || (isset($_POST['ordering']) && $_POST['ordering'] == 0)) $_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','id_cat = '.intval($_POST['id_cat'])) + 1;			   	   		   	
	   	/* preleva il filename dal form */	
	   	ToolsUpload::setFilenameFormat(array('jpg','png'));	   	
	   	ToolsUpload::getFilenameFromForm();	   	
	   	$_POST['filename'] = ToolsUpload::getFilenameMd5();
	   	$_POST['org_filename'] = ToolsUpload::getOrgFilename();
	   	if (Core::$resultOp->error == 0) {
		   	/* preleva il nome della cartella scelta */
		   	Sql::initQuery($App->params->tables['cate'],array('*'),array($_POST['id_cat']),'id = ?');
		   	$App->itemCat = Sql::getRecord();	   	
		   	if (Core::$resultOp->error == 0) {	
			   	$_POST['folder_name'] = ($App->itemCat->folder_name != '' ? $App->itemCat->folder_name.'/' : '');	   	
			   	/* controlla i campi obbligatori */
			   	Sql::checkRequireFields($App->params->fields['item']);
			   	if (Core::$resultOp->error == 0) {	   	 		
			   		Sql::stripMagicFields($_POST);
			   		/* memorizza nel db */
			   		Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
			   		if (Core::$resultOp->error == 0) {	   	 		
				   	   /* sposto il file */
				   		if ($_POST['filename'] != '') {
				   			move_uploaded_file(ToolsUpload::getTempFilename(),$App->params->uploadPaths['item'].$_POST['folder_name'].$_POST['filename']) or die('Errore caricamento file');
				   			}
				   		}
				   	}
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
			$App->item = new stdClass;
			$App->itemOld = new stdClass;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
	   	if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['ordering']) || (isset($_POST['ordering']) && $_POST['ordering'] == 0)) $_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','id_cat = '.intval($_POST['id_cat'])) + 1;
	   	/* preleva filename vecchio */
	   	Sql::initQuery($App->params->tables['item'],array('filename','org_filename','folder_name'),array($App->id),'id = ?');	
	   	$App->itemOld = Sql::getRecord(); 
	   	if (Core::$resultOp->error == 0) {
		   	$oldCateer_name = ($App->itemOld->folder_name != '' ? (string)$App->itemOld->folder_name : '');	   	  		   	
		   	/* preleva il filename dal form */
		   	ToolsUpload::setFilenameFormat(array('jpg','png'));	
		   	ToolsUpload::getFilenameFromForm();	   	
		   	if (Core::$resultOp->error == 0) {   	
		   		$_POST['filename'] = ToolsUpload::getFilenameMd5();
		   		$_POST['org_filename'] = ToolsUpload::getOrgFilename();
			   	$uploadFilename = $_POST['filename'];		   	
			   	/* preleva il nuovo foldername dalla categoria scelta */
			   	$_POST['folder_name'] = '';
			   	if (isset($_POST['id_cat'])) {
			   		Sql::initQuery($App->params->tables['cate'],array('folder_name'),array($_POST['id_cat']),'id = ?');	
			   		$App->item = Sql::getRecord();
			   		if (Core::$resultOp->error == 0) { 
			   			$_POST['folder_name'] = $App->item->folder_name.'/';
			   			}
			   		}
				   if (Core::$resultOp->error == 0) {		   	
				   	/* imposta il nomefile precedente se non si è caricata un file (serve per far passare il controllo campo file presente)*/
				   	if($_POST['filename'] == '' && $App->itemOld->filename != '') $_POST['filename'] = $App->itemOld->filename;
				   	if($_POST['org_filename'] == '' && $App->itemOld->org_filename != '') $_POST['org_filename'] = $App->itemOld->org_filename;     	
				   	/* controlla i campi obbligatori */
				   	Sql::checkRequireFields($App->params->fields['item']);
				   	if (Core::$resultOp->error == 0) {
				   		Sql::stripMagicFields($_POST);
				   		/* memorizza nel db */
				   		Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
				   		if (Core::$resultOp->error == 0) {	   	
						   	if ($uploadFilename != '') {
					   			move_uploaded_file(ToolsUpload::getTempFilename(),$App->params->uploadPaths['item'].$_POST['folder_name'].$uploadFilename) or die('Errore caricamento file');   			
					   			/* cancella l'immagine vecchia */
									if (file_exists($App->params->uploadPaths['item'].$oldCateer_name.$App->itemOld->filename)) {			
										@unlink($App->params->uploadPaths['item'].$oldCateer_name.$App->itemOld->filename);			
										}	   			
						   		}	   	
						   	/* nel caso che si è cambiata SOLO la cartella di destinazione */		   	
						   	if ($uploadFilename == '' && $_POST['folder_name'] != $oldCateer_name && $App->itemOld->filename != '') {
						   		/* copia il file da una cartella all'altra */
						   		if (file_exists($App->params->uploadPaths['item'].$oldCateer_name.$App->itemOld->filename)) copy($App->params->uploadPaths['item'].$oldCateer_name.$App->itemOld->filename,$App->params->uploadPaths['item'].$_POST['folder_name'].$App->itemOld->filename) or die('Errore spostamento file');  			
					   			/* cancella l'immagine vecchia */
									if (file_exists($App->params->uploadPaths['item'].$oldCateer_name.$App->itemOld->filename)) {			
										@unlink($App->params->uploadPaths['item'].$oldCateer_name.$App->itemOld->filename);			
										}	   			
						   		}
			   				}
			   			}		
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

	case 'pageItem':
		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'page',$App->id);
		$App->viewMethod = 'list';
	break;
	
	case 'messageItem':
		$App->error = $App->id;
		Core::$resultOp->message = urldecode($Core->request->params[0]);
		$App->viewMethod = 'list';
	break;
	
	case 'listItem':
		$App->viewMethod = 'list';
	break;
	
	default;		
		$App->viewMethod = 'list';
	break;	
	}


switch((string)$App->viewMethod){
	
	case 'formNew':	
		$App->id_cat = Categories::checkIfCatExistsInObjectOrGetOne($App->categoriesData,$App->id_cat);
		$App->item = new stdClass;	
		$App->item->created = $App->nowDateTime;	
		$App->item->active = 1;
		$App->item->ordering = 0;
		$App->item->filenameRequired = true;
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';
	break;
	
	case 'formMod':
		$App->item = new stdClass;	
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error > 0) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		$App->item->filenameRequired = (isset($App->item->filename) && $App->item->filename != '' ? false : true);
		$App->id_cat = $App->item->id_cat;
		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';
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
		if ($App->id_cat > 0) {
			$clause .= "id_cat = ?";
			$qryFieldsValues[] = $App->id_cat;
			$and = ' AND ';
			}	
		if (isset($sessClause) && $sessClause != '') $clause .= $and.'('.$sessClause.')';
		if (is_array($qryFieldsValuesClause) && count($qryFieldsValuesClause) > 0) {
			$qryFieldsValues = array_merge($qryFieldsValues,$qryFieldsValuesClause);	
			}
		Sql::initQuery($App->params->tables['item'],$qryFields,$qryFieldsValues,$clause);
		Sql::setItemsForPage($App->itemsForPage);	
		Sql::setPage($App->page);	
		Sql::setOrder('ordering '.$App->params->ordersType['item']);	
		Sql::setResultPaged(true);
		if (Core::$resultOp->error == 0)$App->items = Sql::getRecords();
		$App->pagination = Utilities::getPagination($App->page,Sql::getTotalsItems(),$App->itemsForPage);			
		$App->pageSubTitle = 'lista delle '.$App->params->labels['item']['items'].' presenti nell'.$App->params->labels['item']['ownerSex'].' '.$App->params->labels['item']['owner'];				
		$App->templatePage = 'listItem.tpl.php';			
	break;		
	
	default;	
	break;
	}
?>