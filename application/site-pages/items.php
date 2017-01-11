<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-pages/items.php v.3.0.0. 04/11/2016
*/

if(isset($_POST['itemsforpage'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'ifp',$_POST['itemsforpage']);
if(isset($_POST['searchFromTable'])) $_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'srcTab',$_POST['searchFromTable']);

/* preleva i link moduli (alias) */

Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('id','alias'),array(),"alias <> ''");
Sql::setOrder('ordering DESC'); 
$App->modules = Sql::getRecords();
if (Core::$resultOp->error == 1) die('Errore database tabella moduli');


switch(Core::$request->method) {
	case 'moreOrderingItem':
		$Utilities::increaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>true,'sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>$App->params->labels['item']['item']));
		$App->viewMethod = 'list';	
	break;
	case 'lessOrderingItem':
		$Utilities::decreaseFieldOrdering($App->id,array('table'=>$App->params->tables['item'],'orderingType'=>$App->params->ordersType['item'],'parent'=>true,'sexSuffix'=>$App->params->labels['item']['itemSex'],'labelItem'=>$App->params->labels['item']['item']));
		$App->viewMethod = 'list';	
	break;
	
	case 'activeItem':
	case 'disactiveItem':
		Sql::manageFieldActive(substr(Core::$request->method,0,-4),$App->params->tables['item'],$App->id,$App->params->labels['item']['item'],$App->params->labels['item']['itemSex']);
		$App->viewMethod = 'list';		
	break;

	case 'deleteItem':		
		if ($App->id > 0) {
			$Module->deletePage($App->params->tables['item rif'],$App->id);
			if ($Module->error == 0) {
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';
				} else {
					Core::$resultOp->message = $Module->message;
					Core::$resultOp->error = 1;
					}
				}		
		$App->viewMethod = 'list';	
	break;

	case 'modifyItem':			
		$App->pageSubTitle = 'modifica '.$App->params->labels['item']['item'];
		$App->viewMethod = 'formMod';	
	break;
	
	case 'newItem':			
		$App->pageSubTitle = 'inserisci '.$App->params->labels['item']['item'];
		$App->viewMethod = 'formNew';		
	break;
	
	case 'insertItem':
		if ($_POST) {
			$App->templateItem = new stdClass;
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['menu'])) $_POST['menu'] = 0;
			if (!isset($_POST['title_it']) || $_POST['title_it'] == '') {
				$_POST['title_it'] = 'Pagina Vuota';
				$_POST['active'] = 0;
				}
			foreach ($globalSettings['languages'] AS $lang){
				if ($_POST['title_seo_'.$lang] == '') $_POST['title_seo_'.$lang] = SanitizeStrings::urlslug($_POST['title_'.$lang],array('delimiter' => '-'));
				if ($_POST['title_meta_'.$lang] == '') $_POST['title_meta_'.$lang] = SanitizeStrings::urlslug($_POST['title_'.$lang],array('delimiter' => '-'));
				}	
			
			/* gestione automatica dell'ordering de in input = 0 */
	   	$_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','parent = '.intval($_POST['parent'])) + 1;
	   	
	   	/* imposta alias */
			$_POST['alias'] = ToolsStrings::getAlias('',$_POST['alias'],$_POST['title_it'],array('table'=>$App->params->tables['item']));
			
			/* imposta url se presente */
			switch($_POST['type']) {
				case 'module':
					if ($_POST['module'] != '') {
						$_POST['url'] = $_POST['module'];
						$_POST['alias'] = $_POST['module'];
						}
				break;
				default:
				break;
				}

			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::insertRawlyPost($App->params->fields['item'],$App->params->tables['item']);
				$App->id = Sql::getLastInsertedIdVar();
				if(Core::$resultOp->error == 0) {
					$App->id = Sql::getLastInsertedIdVar(); /* preleva l'id della pagina */	
					/* prende le opzioni template */
					$App->templateItem = $Module->getTemplatePredefinito($_POST['id_template']);
					/* modifica i contenuti associati */
					if ($App->templateItem->contents_html > 0) $Module->updatePageContents($App->params->tables['item rif'],$App->id,$App->templateItem->contents_html,$globalSettings['languages']);	
					/* images */
					if ($App->templateItem->images > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageImages');
					/* file */
					if ($App->templateItem->files > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageFiles');
					/* gallerie */
					if ($App->templateItem->galleries > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageGalleries');
					/* blocks */
					if ($App->templateItem->blocks > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageBlocks');	   			
					}
				}	
			} else {					
				Core::$resultOp->error = 1;
				} 		
		if (Core::$resultOp->error == 1) {
			$App->pageSubTitle = 'inserisci '.$App->params->labels['item']['item'];
			$App->viewMethod = 'formNew';
			} else {
				$App->viewMethod = 'list';
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' inserit'.$App->params->labels['item']['itemSex'].'!';
				}		
	break;
	
	case 'updateItem':
		$App->templateItem = new stdClass;
		$App->itemOld = new stdClass;
		if ($_POST) {
			if (!isset($_POST['created'])) $_POST['created'] = $App->nowDateTime;
			if (!isset($_POST['active'])) $_POST['active'] = 0;
			if (!isset($_POST['menu'])) $_POST['menu'] = 0;
			if (!isset($_POST['title_it']) || $_POST['title_it'] == '') {
				$_POST['title_it'] = 'Pagina Vuota';
				$_POST['active'] = 0;
				}
			foreach ($globalSettings['languages'] AS $lang){
				if ($_POST['title_seo_'.$lang] == '') $_POST['title_seo_'.$lang] = SanitizeStrings::urlslug($_POST['title_'.$lang],array('delimiter' => '-'));
				if ($_POST['title_meta_'.$lang] == '') $_POST['title_meta_'.$lang] = SanitizeStrings::urlslug($_POST['title_'.$lang],array('delimiter' => '-'));
				}		
				
			/* preleva dati vecchio */
			Sql::initQuery($App->params->tables['item'],array('alias,parent'),array($App->id),'id = ?');
			$App->itemOld = Sql::getRecord();
			
			/* imposta alias */
			$_POST['alias'] = ToolsStrings::getAlias($App->itemOld->alias,$_POST['alias'],$_POST['title_it'],array('table'=>$App->params->tables['item']));
			
			/* imposta url se presente */
			switch($_POST['type']) {
				case 'module':
					if ($_POST['module'] != '') {
						$_POST['url'] = $_POST['module'];
						$_POST['alias'] = $_POST['module'];
						}
				break;
				default:
				break;
				}
				
			/* se cambia parent aggiorna l'ordering */
	   		if ($_POST['parent'] != $App->itemOld->parent) {
				$_POST['ordering'] = Sql::getMaxValueOfField($App->params->tables['item'],'ordering','parent = '.intval($_POST['parent'])) + 1;  
				} 	
				
			/* controlla i campi obbligatori */
			Sql::checkRequireFields($App->params->fields['item']);
			if(Core::$resultOp->error == 0) {
				Sql::stripMagicFields($_POST);
				Sql::updateRawlyPost($App->params->fields['item'],$App->params->tables['item'],'id',$App->id);
				if(Core::$resultOp->error == 0) {					
					/* sistema i parent se ne è stata selezionato uno diverso */
					if ($_POST['parent'] != $_POST['bk_parent']) $Module->manageParentField();					
					/* prende le opzioni template */
					$App->templateItem = $Module->getTemplatePredefinito($_POST['id_template']);
					/* modifica i contenuti associati */
					if ($App->templateItem->contents_html > 0) $Module->updatePageContents($App->params->tables['item rif'],$App->id,$App->templateItem->contents_html,$globalSettings['languages']);
					/* images */
					if ($App->templateItem->images > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageImages');
					/* file */
					if ($App->templateItem->files > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageFiles');
					/* gallerie */
					if ($App->templateItem->galleries > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageGalleries');
					/* blocks */
					if ($App->templateItem->blocks > 0) $Module->updatePageItems($App->params->tables['item rif'],$App->id,'pageBlocks');													
					}		
				}	
			} else {					
				$App->error = 1;
				}			
		if (Core::$resultOp->error == 1) {
			if (isset($_POST['id'])) $App->id = $_POST['id'];
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

	default;	
		$App->viewMethod = 'list';	
	break;	


	case 'messageItem':
		Core::$resultOp->error = $App->id;
		Core::$resultOp->message = urldecode(Core::$request->params[0]);
		$App->viewMethod = 'list';	
	break;
	}

/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'formNew':
		$App->item = new stdClass();
		$App->item->created = $App->nowDateTime;
		$App->templateItem = new stdClass();
		$App->subCategories = new stdClass();
		
		/* select per parent */
		$opz = array('tableCat'=>$App->params->tables['item']);
		$App->subCategories = $Categories->getObjFromSubCategories($opz);
		
		/* carica i dati del template */
		$App->templateItem = $Module->getTemplatePredefinito(0);		
		if (!isset($App->templateItem->id) || (isset($App->templateItem->id) && (int)$App->templateItem->id == 0)) {	
			ToolsStrings::redirect(URL_SITE_ADMIN.Core::$request->action.'/message/1/'.urlencode('Devi creare od attivare almeno un template!'));			
			}
				
		/* select per i template */
		$App->templatesItem = $Module->getTemplatesPage();	
		$App->item->active = 1;
		$App->item->menu = 1;
		$App->item->alias = "";
		$App->item->parent = 0;	
		$App->item->ordering = 0;
		
		/* prende i dati associati pagina->template */		
		/* contenuti */
		
		
		if ($App->templateItem->contents_html > 0) {
			$App->item->pageContents =  $Module->getEmptyPageContents($App->templateItem->contents_html,'content_it',$globalSettings['languages']);
			}
	
		/* file */
		if ($App->templateItem->files > 0) {
			$App->selectPageFiles = $Module->getSelectPageItems('pageFiles');	
			$App->item->pageFiles = array();
			}

		/* images */	
		if ($App->templateItem->images > 0) {
			if (!isset($App->selectPageImages)) $App->selectPageImages = new stdClass();
			$App->selectPageImages = $Module->getSelectPageItems('pageImages');			
			$App->item->pageImages = array();
			}
		
		/* galleries */	
		if ($App->templateItem->galleries > 0) {
			$App->selectPageGalleries = $Module->getSelectPageItems('pageGalleries');	
			$App->item->pageGalleries = array();
			}
		
		/* blocks */	
		if ($App->templateItem->blocks > 0) {
			$App->selectPageBloks = $Module->getSelectPageItems('pageBlocks');	
			$App->item->pageBlocks = array(); 
			}
		
		if ($Module->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);

		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'insertItem';
		$App->defaultJavascript = "var moduleName = '".Core::$request->action."';";
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/itemsForm.js" type="text/javascript"></script>';

	break;
	
	case 'formMod':	
		$App->item = new stdClass();
		$App->templateItem = new stdClass();
		$App->subCategories = new stdClass();
		
		/* select per parent */
		$opz = array(
			'tableCat'=>$App->params->tables['item'],
			'hideId'=>true,
			'hideSons'=>true,
			'rifId'=>'id',
			'rifIdValue'=>$App->id
			);
		$App->subCategories = $Categories->getObjFromSubCategories($opz);		

		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);

		/* carica i dati del template */

		$App->templateItem = $Module->getTemplatePredefinito($App->item->id_template);		
		if (!isset($App->templateItem->id) || (isset($App->templateItem->id) && (int)$App->templateItem->id == 0)) {	
			ToolsStrings::redirect(URL_SITE_ADMIN.Core::$request->action.'/message/1/'.urlencode('Devi creare od attivare almeno un template!'));			
			}
	
		/* select per i template */
		$App->templatesItem = $Module->getTemplatesPage();	

		/* prende i dati associati pagina->template */
		if ($App->templateItem->contents_html > 0) {
			$App->item->pageContents = $Module->getPageContents($App->params->tables['item rif'],$App->id,$App->templateItem->contents_html,'content_html_it','content_it',$globalSettings['languages']); /* id pagina,numero voci,nome input form,nome campo db */								
			}

		/* file */
		if ($App->templateItem->files > 0) {
			if (!isset($App->selectPageFiles)) $App->selectPageFiles = new stdClass();
			$App->item->pageFiles = new stdClass(); 
			$App->selectPageFiles = $Module->getSelectPageItems('pageFiles');	
			$App->item->pageFiles = $Module->getPageItems($App->params->tables['item rif'],$App->id,'pageFiles'); 
			}

		/* images */	
		if ($App->templateItem->images > 0) {
			if (!isset($App->selectPageImages)) $App->selectPageImages = new stdClass();
			$App->item->pageImages = new stdClass(); 
			$App->selectPageImages = $Module->getSelectPageItems('pageImages');	
			$App->item->pageImages = $Module->getPageItems($App->params->tables['item rif'],$App->id,'pageImages'); 
			}

		/* galleries */	
		if ($App->templateItem->galleries > 0) {
			if (!isset($App->selectPageGalleries)) $App->selectPageGalleries = new stdClass();
			$App->item->pageGalleries = new stdClass(); 
			$App->selectPageGalleries = $Module->getSelectPageItems('pageGalleries');	
			$App->item->pageGalleries = $Module->getPageItems($App->params->tables['item rif'],$App->id,'pageGalleries'); 
			}

		/* blocks */	
		if ($App->templateItem->blocks > 0) {
			if (!isset($App->selectPageBloks)) $App->selectPageBloks = new stdClass();
			$App->item->pageBloks = new stdClass(); 
			$App->selectPageBloks = $Module->getSelectPageItems('pageBlocks');	
			$App->item->pageBlocks = $Module->getPageItems($App->params->tables['item rif'],$App->id,'pageBlocks'); 
			}
	
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);

		$App->templatePage = 'formItem.tpl.php';
		$App->methodForm = 'updateItem';
		$App->defaultJavascript = "var moduleName = '".Core::$request->action."';";
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/itemsForm.js" type="text/javascript"></script>';
	break;
	
	case 'list':
		$App->itemsForPage = (isset($_MY_SESSION_VARS[$App->sessionName]['ifp']) ? $_MY_SESSION_VARS[$App->sessionName]['ifp'] : 10);
		$App->page = (isset($_MY_SESSION_VARS[$App->sessionName]['page']) ? $_MY_SESSION_VARS[$App->sessionName]['page'] : 1);
		Sql::setItemsForPage($App->itemsForPage);
		$Module->setMySessionApp($_MY_SESSION_VARS[$App->sessionName]);
		$Module->listMainData($App->params->fields['item'],$App->page,$App->itemsForPage,$globalSettings['languages']);
		$App->items = $Module->getMainData();
		$App->pagination = $Module->getPagination();	
		$App->pageSubTitle = 'lista delle '.$App->params->labels['item']['items'].' dinamiche del sito';	
		$App->templatePage = 'listItem.tpl.php';
		$App->css[] = '<link href="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/assets/plugins/jquery.treegrid/jquery.treegrid.css" rel="stylesheet">';
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/assets/plugins/jquery.cookie/jquery.cookie.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/assets/plugins/jquery.treegrid/jquery.treegrid.min.js" type="text/javascript"></script>';
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'templates/'.$App->templateUser.'/assets/plugins/jquery.treegrid/jquery.treegrid.bootstrap3.js" type="text/javascript"></script>';		
		$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/itemsList.js" type="text/javascript"></script>';		
	default:
	break;
	}
?>
