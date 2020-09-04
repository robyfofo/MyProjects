<?php
/**
 * Framework App PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * core/error.php v.1.2.0. 13/08/2020
<<<<<<< HEAD
*/


/* variabili ambiente */
$App->pageTitle = 'Error';
$App->pageSubTitle = 'Error';
$App->templateApp = Core::$request->action.'.html';
$App->templateBase = 'struttura-error.html';
$App->coreModule = true;

switch(Core::$request->method) {
	
	case '404':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Error 404!'];
		$App->error_content = $_lang['testo errore 404'];
	break;
	
	case 'access':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Access Error!'];
		$App->error_content = $_lang['testo errore accesso'];
	break;
	
	case 'mail':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Mail Error!'];
		$App->error_content = $_lang['testo errore mail'];
	break;
	
	case 'db':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Database Error!'];
		$App->error_content = $_lang['testo errore database'];
		$App->error_contentAlt = (Core::$request->param != '' ? Core::$request->param : '');
	break;
	
	case 'module':
		$App->error_title = $_lang['Errore!'];		
		$App->error_subtitle = $_lang['Module Error!'];
		$module = (Core::$request->param != '' ? Core::$request->param : '');
		$App->error_content = preg_replace('/%MODULE%/',$module,$_lang['Errore nel modulo %MODULE%!']);
		$App->error_contentAlt = (Core::$request->params[0] != '' ? Core::$request->params[0] : '');
	break;
	
	default:
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Internal Server Error!'];
		$App->error_content = $_lang['testo errore generico'];
	break;
	
	}
=======
*/


/* variabili ambiente */
$App->pageTitle = 'Error';
$App->pageSubTitle = 'Error';
$App->templateApp = Core::$request->action.'.html';
$App->templateBase = 'struttura-error.html';
$App->coreModule = true;

switch(Core::$request->method) {
	
	case '404':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Error 404!'];
		$App->error_content = $_lang['testo errore 404'];
	break;
	
	case 'access':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Access Error!'];
		$App->error_content = $_lang['testo errore accesso'];
	break;
	
	case 'mail':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Mail Error!'];
		$App->error_content = $_lang['testo errore mail'];
	break;
	
	case 'db':
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Database Error!'];
		$App->error_content = $_lang['testo errore database'];
		$App->error_contentAlt = (Core::$request->param != '' ? Core::$request->param : '');
	break;
	
	case 'module':
		$App->error_title = $_lang['Errore!'];		
		$App->error_subtitle = $_lang['Module Error!'];
		$module = (Core::$request->param != '' ? Core::$request->param : '');
		$App->error_content = preg_replace('/%MODULE%/',$module,$_lang['Errore nel modulo %MODULE%!']);
		$App->error_contentAlt = (Core::$request->params[0] != '' ? Core::$request->params[0] : '');
	break;
	
	default:
		$App->error_title = $_lang['Errore!'];
		$App->error_subtitle = $_lang['Internal Server Error!'];
		$App->error_content = $_lang['testo errore generico'];
	break;
	
	}
>>>>>>> 2bf597720afe94b4b788364b4e0bad0a9b392a96
?>