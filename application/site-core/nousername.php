<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-core/nousername.php v.1.0.0. 13/02/2017
*/

//Core::setDebugMode(1);

$App->pageTitle = 'Richiesta Username';
$App->pageSubTitle = 'Richiedi lo Username dimenticato';
$App->templateApp = Core::$request->action.'.tpl.php';
$App->item = new stdClass;
$App->id = intval(Core::$request->param);
if (isset($_POST['id'])) $App->id = intval($_POST['id']);
$App->templateBase = 'login.tpl.php';

if (isset($_POST['submit'])) {
	if ($_POST['email'] == "") {
			Core::$resultOp->error = 1;
			Core::$resultOp->message = "Non hai inserito l'indirizzo email!";
			} else {
				$email = SanitizeStrings::stripMagic(strip_tags($_POST['email']));
				Core::$resultOp->error = 0;
				}
			
	if (Core::$resultOp->error == 0) {	
		/* legge username dalla email */	
		/* (tabella,campi(array),valori campi(array),where clause, limit, order, option , pagination(default false)) */
		Sql::initQuery(DB_TABLE_PREFIX.'site_users',array('id','username'),array($email),"email = ? AND active = 1");
		$App->item = Sql::getRecord();
		if(Core::$resultOp->error == 0) {		
			if (Sql::getFoundRows() > 0) {
				/* crea l'email */
				$subject = 'Invio username dimenticato dal sito '.SITE_NAME;
				$content = "<p>Come da richiesta le inviamo il nome utente iscritto al sito <b>".SITE_NAME."</b> che è associato all'indirizzo email: <b>".$email."</b></p>";
				$content .= "Nome Utente (username): <b>".$App->item->username."</b><br>";
				$address = $email;	
				Mails::sendMail($globalSettings['use php mail'],$address,$subject,$content,array('fromEmail'=>SITE_EMAIL,'fromLabel'=>SITE_EMAIL_LABEL));								
				if (Core::$resultOp->error == 0) {					
					Core::$resultOp->message = 'Email inviata correttamente! Nel testo troverete il nuovo username!';	
					} else {
						Core::$resultOp->message = "Errore nell'invio della email!";
						}					
				} else {	
					Core::$resultOp->error = 1;
					Core::$resultOp->message = "L'indirizzo email inserito non esiste! Vi invitiamo a ripetere la procedura o contattare l'amministratore del sistema.";
					}
			}			
		}
	}
$App->jscript[] = '<script src="'.URL_SITE.$App->pathApplicationCore.'/templates/'.$App->templateUser.'/js/nousername.js" type="text/javascript"></script>';
?>