<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/password.php v.3.0.0. 04/11/2016
*/

/* variabili ambiente */
$App->codeVersion = ' 2.6.4.';
$App->pageTitle = 'Password';
$App->pageSubTitle = 'modifica la tua password';
$App->breadcrumb .= '<li class="active"><i class="icon-user"></i> Password</li>';
$App->templatePage = Core::$request->action.'.tpl.php';
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
$App->coreModule = true;

switch(Core::$request->method) {
	default:
		if ($App->id > 0) {			
			if ($_POST) {
				$password = (isset($_POST['password']) && $_POST['password'] != "") ? SanitizeStrings::stripMagic($_POST['password']) : '';
				$passwordCK = (isset($_POST['passwordCK']) && $_POST['passwordCK'] != "") ? SanitizeStrings::stripMagic($_POST['passwordCK']) : '';
				if ($password != '') {
					if ($password === $passwordCK) {
						$password = password_hash($password, PASSWORD_DEFAULT);
						} else {
							Core::$resultOp->error = 1;
							Core::$resultOp->message = 'Le due password non corrispondono! ';
							}				
					} else {
						Core::$resultOp->error = 1;
						Core::$resultOp->message = 'Riempi il campo password! ';			
						}
					
				if (Core::$resultOp->error == 0) {	
					/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
					Sql::initQuery(DB_TABLE_PREFIX.'site_users',array('password'),array($password,$App->id),"id = ?");	
					Sql::updateRecord();
					if(Core::$resultOp->error == 0) {
						Core::$resultOp->message = 'Password modificata correttamente! Sarà effettiva al prossimo login.';
						}							         	
					}			
				}	
	
			/* recupera i dati memorizzati */
			$App->item = new stdClass;	
			/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
			Sql::initQuery(Sql::getTablePrefix().'site_users',array('username','password'),array($App->id),"id = ?");	
			$App->item = Sql::getRecord();
			} else {
				ToolsStrings::redirect(URL_SITE_ADMIN."home");
				die();						
				}
	break;	
	}
	
$App->jscript[] = '<script src="'.URL_SITE_ADMIN.$App->pathApplicationCore.'password.js" type="text/javascript"></script>';
?>