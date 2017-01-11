<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * include/configuration.inc.php v.3.0.0. 06/12/2016
*/

/* specifiche altervista */
//$_SERVER['DOCUMENT_ROOT'] = "/membri/phprojekt/";

/* Percorsi server */
define('FOLDER_SITE', 'My-Personal-Timecard/');
define('FOLDER_ADMIN', '');
define('SITE_NAME', 'www.My-Personal-Timecard.org');
define('SITE_HOST', '192.168.1.10/');
define('SERVER_SMTP','');
define('TIMEZONE','');

/* da non modificare */
define('URL_SITE', 'http://'.SITE_HOST.FOLDER_SITE);
define('URL_SITE_ADMIN', 'http://'.SITE_HOST.FOLDER_SITE.FOLDER_ADMIN);
define('URL_SITE_APPLICATION', 'http://'.SITE_HOST.FOLDER_SITE.FOLDER_ADMIN.'application/');
define('TMP_DIR', 'http://'.SITE_HOST.FOLDER_SITE.FOLDER_ADMIN.'tmp/');
define('PATH_DOCUMENT', $_SERVER['DOCUMENT_ROOT'].'/');
define('PATH_SITE', $_SERVER['DOCUMENT_ROOT'].'/'.FOLDER_SITE);
define('PATH_SITE_ADMIN', $_SERVER['DOCUMENT_ROOT'].'/'.FOLDER_SITE.FOLDER_ADMIN);

/* fine da non modificare */

/* Connessione database */
define('DATABASE', 'locale');
$globalSettings['database'] = array(
	'locale'=>array('user'=>'root','password'=>'fofofofo','host'=>'localhost','name'=>'mypersonaltimecard','tableprefix'=>'tbl_'),
	'remoto'=>array('user'=>'phprojekt','password'=>'robyfofo','host'=>'localhost','name'=>'my_phprojekt','tableprefix'=>'tbl_')
);

/* Sessioni */
define('SESSIONS_TABLE_NAME',$globalSettings['database'][DATABASE]['tableprefix'].'site_sessions');
define('SESSIONS_TIME',86400*10);
define('SESSIONS_GC_TIME',2592000);

define('SESSIONS_COOKIE_NAME','loc_mypersonaltimecard_id');
define('AD_SESSIONS_COOKIE_NAME','ad_loc_mypersonaltimecard_id');
define('DATA_SESSIONS_COOKIE_NAME','data_loc_mypersonaltimecard_id');

/* Gestione tema interfaccia */
define('TEMPLATE_DEFAULT','default');

define('UPLOAD_DIR', 'http://'.SITE_HOST.FOLDER_SITE.'uploads/');
define('PATH_UPLOAD_DIR', PATH_SITE.'uploads/');

/* indirizzo emial sito */
define('SITE_EMAIL', 'robymant66@vodafone.it');
define('SITE_EMAIL_LABEL', 'My-Personal-Timecard');

/* chiave hash */
define('SITE_CODE_KEY','123456789');

define('SITE_OWNER','Roberto Mantovani');
define('COPYRIGHT','&copy; 2016 Roberto Mantovani');
define('META_TITLE', 'Amministrazione del sito '.SITE_NAME);
define('META_KEYWORD', 'php, mysql, ammministrazione, sezione, amministrativa, sito, gestione, area, riservata');
define('META_DESCRIPTION', 'La sezione per amministrare il sito '.SITE_NAME);

define('CODE_VERSION','3.0.0.');

/* CONFIGURAZIONE ADMIN */

/* da non modificare */
$globalSettings['type pages'] = array('default'=>'Default','label'=>'Etichetta','url'=>'URL','module'=>'Link a modulo');
$globalSettings['link targets'] = array('_self','_blank','_parent','_top');
$globalSettings['languages'] = array('it','en');
$globalSettings['module sections'] = array('Gestione Utenti','Moduli Generali Sito','Moduli Personalizzati Sito','Moduli E-Commerce','Impostazioni Sito','Root');
/* fine da non modificare */

/* impostationi Request url */
$globalSettings['requestoption'] = array(
	'othermodules'=>array('home','404','errorpage','search','user','customer'),
	'templateuser'=>array('default'),
	'blankaction'=>'home',
	'managechangeaction'=>0,
	//'defaultaction'=>'blog',
	//'defaultactiontable'=>$globalSettings['database'][DATABASE]['tableprefix'].'blog',
	//'defaultactionfields'=>array('id'),
	//'defaultactionmethod'=>'dtb',
	//'actionforpage'=>'page'
);


$globalSettings['months'] = array('01' => 'Gennaio','02' => 'Febbraio','03' => 'Marzo','04' => 'Aprile','05' => 'Maggio','06' => 'Giugno','07' => 'Luglio','08' => 'Agosto','09' => 'Settembre','10' => 'Ottobre','11' => 'Novenbre','12' => 'Dicembre');

/* impostazioni emails */
$globalSettings['send copy email for debug'] = 1;
$globalSettings['email address for debug'] = 'me@robertomantovani.vr.it';
$globalSettings['use php mail'] = 1;

/* META */
$globalSettings['metaTitlePageIni'] = '';
$globalSettings['metaTitlePageEnd'] = 'Robyfofo.altervista.org';
$globalSettings['metaTitlePageSeparator'] = ' | ';


$globalSettings['metaDescriptionPage'] = 'Roberto Mantovani - demo di site e applicativi PHP/MySQL';
$globalSettings['metaKeywordsPage'] = 'PHP, MySQL, programmazione, codice, esempio, esempi, demo, demos,test, prova, prove';

$globalSettings['mesi'] = array('','Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre');
$globalSettings['anno creazione'] = '2016';
$globalSettings['azienda referente'] = 'Roberto Mantovani';
$globalSettings['azienda sito'] = 'Roberto Mantovani';
$globalSettings['azienda indirizzo'] = "Via Garofoli, 302";
$globalSettings['azienda comune'] = 'San Giovanni Lupatoto';
$globalSettings['azienda cap'] = '37057';
$globalSettings['azienda provincia'] = 'Verona';
$globalSettings['azienda provincia abbreviata'] = 'Vr';
$globalSettings['azienda stato'] = 'Italia';
$globalSettings['azienda email'] = 'me@robertomantovani.vr.it';
$globalSettings['azienda telefono'] = '045548841';
$globalSettings['azienda fax'] = '0452589600';
$globalSettings['azienda mobile'] = '3291566132';
$globalSettings['azienda codice fiscale'] = 'MNTRRT66P01L781T';
$globalSettings['azienda partita iva'] = '03781010230';
$globalSettings['azienda latitudine'] = '45.39731968';
$globalSettings['azienda longitudine'] = '11.02548289';

$globalSettings['sito credits'] = 'Roberto Mantovani';
$globalSettings['sito credits url'] = 'http://www.robertomantovani.vr.it';

$globalSettings['sito chiave codifica'] = '123456789';

$globalSettings['facebook link'] = 'https://www.facebook.com/roberto.mantovani2';
$globalSettings['linkedin link'] = 'https://www.linkedin.com/hp/?dnr=S_EKmr8SJEt3BFePb7xBgorS35mmBkHCHXY';
$globalSettings['twitter link'] = 'https://twitter.com/robyfofo66';
$globalSettings['google-plus link'] = 'https://plus.google.com/110055784638476878179/posts';

/* gestione utenti */
$globalSettings['to user site email address'] = 'robymant66@vodafone.it';
$globalSettings['to user site email label'] = 'Robyfofo Blog - Utenti';
$globalSettings['reg user notice email address'] = 'robymant66@vodafone.it';
$globalSettings['reg user notice email label'] = 'Phprojekt Demo - Gestione Utenti';

$globalSettings['to user registration email subject'] = "conf - Email inviata dalla registrazione utenti del sito {{SITENAME}}";
$globalSettings['to user registration email content'] = "conf - Hai inviato una richiesta di iscrizione al sito {{SITENAME}} con username: <strong>{{USERNAME}}</strong> e indirizzo email: <strong>{{EMAIL}}</strong>.<br>Sei pregato di confermare l'iscrizione cliccando <a href=\"{{URLCONFIRM}}\">qui</a>.";
$globalSettings['to user registration url confirm'] = URL_SITE."user/confirm/{{HASH}}";

$globalSettings['to site notify user registration email subject'] = "conf - Email di notifica registrazione utente dal sito {{SITENAME}}";
$globalSettings['to site notify user registration email content'] = "conf - Abbiamo ricevuto una richiesta di iscrizione al sito {{SITENAME}} da parte di  <strong>{{USERNAME}}</strong> con indirizzo email <strong>{{EMAIL}}</strong>.";

$globalSettings['to user lost password email subject'] = "conf - Email di richiesta password dal sito {{SITENAME}}";
$globalSettings['to user lost password email content'] = "conf - Come richiesto le inviamo la nuova password generata dal sistema.<br>Nuova password: {{NEWPASSWORD}}<br>La invitiamo di accedere al sistema e modificarla a suo piacimento.";

$globalSettings['to user lost username email subject'] = "conf - Email di richiesta username dal sito {{SITENAME}}";
$globalSettings['to user lost username email content'] = "conf - Come richiesto le inviamo l'username associato all'indirizzo email <strong>{{EMAIL}}</strong>.<br>Username: {{USERNAME}}.";

/* gestione clienti */
$globalSettings['to customer shop email address'] = 'robymant66@vodafone.it';
$globalSettings['to customer site email label'] = 'Phprojekt Demo - Clienti';
$globalSettings['reg customer notice email address'] = 'robymant66@vodafone.it';
$globalSettings['reg customer notice email label'] = 'Phprojekt Demo - Gestione Clienti';

$globalSettings['to customer registration email subject'] = "conf - Email inviata dalla registrazione clienti dello shop {{SITENAME}}";
$globalSettings['to customer registration email content'] = "conf - Hai inviato una richiesta di iscrizione allo shop {{SITENAME}} con username: <strong>{{USERNAME}}</strong> e indirizzo email: <strong>{{EMAIL}}</strong>.<br>Sei pregato di confermare l'iscrizione cliccando <a href=\"{{URLCONFIRM}}\">qui</a>.";
$globalSettings['to customer registration url confirm'] = URL_SITE."customer/confirm/{{HASH}}";

$globalSettings['to shop notify user registration email subject'] = "conf - Email di notifica registrazione cliente dello shop {{SITENAME}}";
$globalSettings['to shop notify user registration email content'] = "conf - Abbiamo ricevuto una richiesta di iscrizione allo shop {{SITENAME}} da parte di  <strong>{{USERNAME}}</strong> con indirizzo email <strong>{{EMAIL}}</strong>.";

$globalSettings['to customer lost password email subject'] = "conf - Email di richiesta password dello shop {{SITENAME}}";
$globalSettings['to customer lost password email content'] = "conf - Come richiesto le inviamo la nuova password generata dal sistema.<br>Nuova password: {{NEWPASSWORD}}<br>La invitiamo di accedere al sistema e modificarla a suo piacimento.";

$globalSettings['to customer lost username email subject'] = "conf - Email di richiesta username dello shop {{SITENAME}}";
$globalSettings['to customer lost username email content'] = "conf - Come richiesto le inviamo l'username associato all'indirizzo email <strong>{{EMAIL}}</strong>.<br>Username: {{USERNAME}}.";
?>