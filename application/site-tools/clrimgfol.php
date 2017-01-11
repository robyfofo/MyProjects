<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-tools/clrimgfol.php v.3.0.0. 04/11/2016
*/

$App->folder = PATH_UPLOAD_DIR."cache/";	
$App->clearStatus = false;

$App->OLDfolderSize = $Module->folderSize($App->folder);
$App->OLDnumFilesfolder = $Module->countFileFolder($App->folder);

switch (Core::$request->param) {
	case 'clear':
		$App->filesDeleted = $Module->deleteImageCached($App->folder);
		$App->clearStatus = true;
	default;	
		$App->folderSizeN = $Module->folderSize($App->folder);
		$App->numFilesfolderN = $Module->countFileFolder($App->folder);	
		$App->viewMethod = 'list';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'list':
		$App->pageSubTitle = 'Pulisci la cartella cache dalle immagini più vecchie di 30 giorni';
		$App->templatePage = 'listClrimgfol.tpl.php';
	break;	
	
	default:
	break;
	}	
?>