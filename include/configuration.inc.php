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
define('FOLDER_SITE', 'myprojects/');
define('FOLDER_ADMIN', '');
define('SITE_NAME', 'Myprojects');
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
	'locale'=>array('user'=>'root','password'=>'fofofofo','host'=>'localhost','name'=>'myprojects','tableprefix'=>'tmc_'),
	'remoto'=>array('user'=>'phprojekt','password'=>'robyfofo','host'=>'localhost','name'=>'my_phprojekt','tableprefix'=>'tmc_')
);

/* Sessioni */
define('SESSIONS_TABLE_NAME',$globalSettings['database'][DATABASE]['tableprefix'].'site_sessions');
define('SESSIONS_TIME',86400*10);
define('SESSIONS_GC_TIME',2592000);

define('SESSIONS_COOKIE_NAME','loc_myprojects_id');
define('AD_SESSIONS_COOKIE_NAME','ad_loc_myprojects_id');
define('DATA_SESSIONS_COOKIE_NAME','data_loc_myprojects_id');

/* Gestione tema interfaccia */
define('TEMPLATE_DEFAULT','default');

define('UPLOAD_DIR', 'http://'.SITE_HOST.FOLDER_SITE.'uploads/');
define('PATH_UPLOAD_DIR', PATH_SITE.'uploads/');

/* indirizzo emial sito */
define('SITE_EMAIL', 'robymant66@vodafone.it');
define('SITE_EMAIL_LABEL', 'Myprojects');

/* chiave hash */
define('SITE_CODE_KEY','123456789');

define('SITE_OWNER','Roberto Mantovani');
define('COPYRIGHT','&copy; 2016 Roberto Mantovani');
define('META_TITLE', 'Myprojects');
define('META_KEYWORD', 'php, mysql, ammministrazione, sezione, amministrativa, sito, gestione, progetti, timecard, tempo, lavoro');
define('META_DESCRIPTION', 'Myprojects - gestione progetti personali e il tempo lavoro ad essi associato');

define('CODE_VERSION','1.0.0.');

/* CONFIGURAZIONE ADMIN */

/* da non modificare */
$globalSettings['type pages'] = array('default'=>'Default','label'=>'Etichetta','url'=>'URL','module'=>'Link a modulo');
$globalSettings['link targets'] = array('_self','_blank','_parent','_top');
$globalSettings['languages'] = array('it','en');
$globalSettings['module sections'] = array('Gestione Utenti','Moduli Generali Sito','Moduli Personalizzati Sito','Moduli E-Commerce','Impostazioni Sito','Root');

/* impostationi Request url */
$globalSettings['requestoption'] = array(
	'othermodules'=>array('home','404','errorpage','search','user','customer'),
	'templateuser'=>array('default'),
	'blankaction'=>'home',
	'managechangeaction'=>0,
);
/* fine da non modificare */

$globalSettings['months'] = array('01' => 'Gennaio','02' => 'Febbraio','03' => 'Marzo','04' => 'Aprile','05' => 'Maggio','06' => 'Giugno','07' => 'Luglio','08' => 'Agosto','09' => 'Settembre','10' => 'Ottobre','11' => 'Novenbre','12' => 'Dicembre');
$globalSettings['days'] = array('0' => 'domenica','1' => 'lunedì','2' => 'martedì','3' => 'mercoledì','4' => 'giovedi','5' => 'venerdì','6' => 'sabato');
?>