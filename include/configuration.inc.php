<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * app/include/configuration.inc.php v.1.0.0. 07/02/2017
*/

/* specifiche altervista */
//$_SERVER['DOCUMENT_ROOT'] = "/membri/phprojekt/";

/* SERVER */
$globalSettings['site name'] = "MyProjects";
$globalSettings['code version'] = '1.0.0.';

define('FOLDER_SITE', 'myprojects/');
define('SITE_HOST', '192.168.1.10/');
define('SERVER_SMTP','');
define('TIMEZONE','');

/* HTTP/S */
$http = 'http://';
if (isset($_SERVER['HTTPS'])) $http = 'https://';
define('URL_SITE', $http.SITE_HOST.FOLDER_SITE);
define('URL_SITE_APPLICATION', $http.SITE_HOST.FOLDER_SITE.'application/');
define('TMP_DIR', $http.SITE_HOST.FOLDER_SITE.'tmp/');
define('PATH_DOCUMENT', $_SERVER['DOCUMENT_ROOT'].'/');
define('PATH_SITE', $_SERVER['DOCUMENT_ROOT'].'/'.FOLDER_SITE);
/* PATHS */
define('UPLOAD_DIR', $http.SITE_HOST.FOLDER_SITE.'uploads/');
define('PATH_UPLOAD_DIR', PATH_SITE.'uploads/');

/* DATABASE */
define('DATABASE', 'locale');
$globalSettings['database'] = array(
	'locale'=>array('user'=>'root','password'=>'fofofofo','host'=>'localhost','name'=>'myprojects','tableprefix'=>'tmc_'),
	'remoto'=>array('user'=>'','password'=>'','host'=>'','name'=>'','tableprefix'=>'')
);

/* SESSIONS */
define('SESSIONS_TABLE_NAME',$globalSettings['database'][DATABASE]['tableprefix'].'site_sessions');
define('SESSIONS_TIME',86400*10);
define('SESSIONS_GC_TIME',2592000);

/* COOKIES */
define('SESSIONS_COOKIE_NAME','loc_myprojects_id');
define('AD_SESSIONS_COOKIE_NAME','ad_loc_myprojects_id');
define('DATA_SESSIONS_COOKIE_NAME','data_loc_myprojects_id');

/* MAIL */
/* indirizzo emial sito */
define('SITE_EMAIL', 'robymant66@vodafone.it');
define('SITE_EMAIL_LABEL', 'Myprojects');
/* configurazioni server */
$globalSettings['use php mail class'] = 0;
/* if use php class */
$globalSettings['mail server'] = 'SMTP'; /* values = 'SMTP' or 'SENDMAIL' */
$globalSettings['sendmail path'] = '/usr/sbin/sendmail -t -i';

$globalSettings['SMTP server'] = 'localhost';
$globalSettings['SMTP port'] = 25;
$globalSettings['SMTP username'] = '';
$globalSettings['SMTP password'] = '';

/* chiave hash */
define('SITE_CODE_KEY','123456789');

define('SITE_OWNER','Roberto Mantovani');
define('COPYRIGHT','&copy; 2017 Roberto Mantovani');
define('META_TITLE', 'MyProjects');
define('META_KEYWORD', 'php, mysql, ammministrazione, sezione, amministrativa, sito, gestione, progetti, timecard, tempo, lavoro');
define('META_DESCRIPTION', 'Myprojects - gestione progetti personali e il tempo lavoro ad essi associato');

$globalSettings['status to do'] = array('','visto','in lavorazione','sospeso','cancellato','rifiutato','finito');
$globalSettings['status project'] = array('','preventivato','in lavorazione','sospeso','cancellato','rifiutato','finito');

/* variabili lingua di default */
$globalSettings['defaul language'] = 'en';

/* CONFIGURAZIONE ADMIN */

/* da non modificare */
$globalSettings['type pages'] = array('default'=>'Default','label'=>'Etichetta','url'=>'URL','module'=>'Link a modulo');
$globalSettings['link targets'] = array('_self','_blank','_parent','_top');
$globalSettings['languages'] = array('it','en');
$globalSettings['module sections'] = array('Gestione Utenti','Moduli Generali Sito','Moduli Personalizzati Sito','Moduli E-Commerce','Impostazioni Sito','Root');

/* impostationi Request url */
$globalSettings['requestoption'] = array('templateuser'=>array('default'),'managechangeaction'=>0,'defaultaction'=>'');
/* fine da non modificare */

define('SITE_NAME', $globalSettings['site name']);
define('CODE_VERSION',$globalSettings['code version']);
?>
