<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/nopassword.php v.1.0.0. 13/02/2017
*/

include_once(PATH.'classes/class.phpmailer.php');

//Core::setDebugMode(1);

$App->pageTitle = 'Richiesta Password';
$App->pageSubTitle = 'Richiedi la Password dimenticata';
$App->templateApp = Core::$request->action.'.tpl.php';
$App->item = new stdClass;
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);

$App->templateBase = 'login.tpl.php';

if (isset($_POST['submit'])) {
	
	if ($_POST['username'] == "") {
		Core::$resultOp->error = 1;
		Core::$resultOp->message = "Non hai inserito l'username!";
		} else {
			$username = SanitizeStrings::stripMagic(strip_tags($_POST['username']));
			}

	if (Core::$resultOp->error == 0) {	
		/* legge username dalla email */
		/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
		Sql::initQuery(DB_TABLE_PREFIX.'site_users',array('id','username','email'),array($username),"username = ? AND active = 1");
		$App->item = Sql::getRecord();		
		if(Core::$resultOp->error == 0) {
			if (Sql::getFoundRows() > 0) {
				/* crea la nuova password */	
				$passw = $ToolsStrings->setNewPassword('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890',8);
				$criptPassw = password_hash($passw, PASSWORD_DEFAULT);			
				/* aggiorno la password nel db */						
				/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
				Sql::initQuery(Sql::getTablePrefix().'site_users',array('password'),array($criptPassw,$App->item->id),"id = ?");
				Sql::updateRecord();
				if (Core::$resultOp->error == 0) {	
					$subject = 'Invio password dimenticata dal sito '.SITE_NAME;
					$content = "<p>Come da richiesta le inviamo la nuova password associata all'utente <b>".$App->item->username."</b> iscritto al sito <b>".SITE_NAME."</b></p>";
					$content .= "Password: <b>".$passw."</b><br>"; 	
					$address = $App->item->email;			
					Mails::sendMail($globalSettings['use php mail'],$address,$subject,$content,array('fromEmail'=>SITE_EMAIL,'fromLabel'=>SITE_EMAIL_LABEL));								
					if (Core::$resultOp->error == 0) {					
						Core::$resultOp->message = "La nuova password vi è stata inviata con un'email all'indirizzo associato ed è stata memorizzata nel sistema!";
						} else {
							Core::$resultOp->message = "Errore nell'invio della email! Vi invitiamo a ripetere la procedura o contattare l'amministratore del sistema."; 
							}		
					} else { 
						Core::$resultOp->message = "Errore database! La nuova password NON è stata memorizzata nel sistema! Vi invitiamo a ripetere la procedura o contattare l'amministratore del sistema.";							
						}
										
				}	else {	
					Core::$resultOp->error = 1;
					Core::$resultOp->message = "L'username inserito non esiste! ";
					}
			}
		}	
	}
$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplicationCore.'/templates/'.$App->templateUser.'/js/nopassword.js" type="text/javascript"></script>';
?>