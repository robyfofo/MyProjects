<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/index.php v.3.0.0. 20/10/2016
*/

ini_set('display_errors',-1);

define('PATH','');
define('MAXPATH', str_replace("includes","",dirname(__FILE__)).'');
if(!ini_get('date.timezone')) date_default_timezone_set('GMT');
setlocale(LC_TIME, 'ita', 'it_IT');
		
include_once(PATH."include/configuration.inc.php");
include_once(PATH."classes/class.Config.php");
include_once(PATH."classes/class.Core.php");
include_once(PATH."classes/class.Sessions.php");
include_once(PATH."classes/Savant/Savant3.php");
include_once(PATH."classes/class.Permissions.php");
include_once(PATH."classes/class.ToolsStrings.php");
include_once(PATH."classes/class.SanitizeStrings.php");
include_once(PATH."classes/class.htmLawed.php");
include_once(PATH."classes/class.ToolsUpload.php");
include_once(PATH."classes/class.Sql.php");
include_once(PATH."classes/class.Utilities.php");
include_once(PATH."classes/class.DateFormat.php");
include_once(PATH."classes/class.Categories.php");
include_once(PATH."classes/class.Mails.php");

$Config = new Config();
Config::setGlobalSettings($globalSettings);
$Core = new Core();
$Tpl = new Savant3();
$ToolsStrings = new ToolsStrings();
$SanitizeStrings = new SanitizeStrings();
$Sql = new Sql($globalSettings);
$Utilities = new Utilities();
$ToolsUpload = new ToolsUpload();
$DateFormat = new DateFormat();
$Permissions = new Permissions();
$Categories = new Categories();

//Sql::setDebugMode(1);

/* avvio sessione */
$my_session = new my_session(SESSIONS_TIME, SESSIONS_GC_TIME,AD_SESSIONS_COOKIE_NAME);
$my_session->my_session_start();
$_MY_SESSION_VARS = array();
$_MY_SESSION_VARS = $my_session->my_session_read();


/* variabili globali */
$pageMainContent = '';
$renderTpl = true;
$renderAjax = false;
$App = new stdClass();

$App->pageTitle = 'Sitodemo responsive';
$App->pageSubTitle = '';
$App->breadcrumb = '';
$App->methodForm = '';
$App->templatePath = 'templates/';
$App->templateUser = TEMPLATE_DEFAULT;
$App->optionalTplPage = '';
$App->pathApplication = 'application/';
$App->pathApplicationCore = 'application/site-core/';
$App->mainTemplatePage = 'site.tpl.php';
$App->actionTemplatePage = '';

define('DB_TABLE_PREFIX',Sql::getTablePrefix());

/* date sito */
setlocale(LC_TIME, 'ita', 'it_IT');
$App->nowDate = date('Y-m-d');
$App->nowDateTime = date('Y-m-d H:i:s');
$App->nowTime = date('H:i:s');
$App->nowDateIta = date('d/m/Y');
$App->nowDateTimeIta = date('d/m/Y H:i:s');
$App->nowTimeIta = date('H:i:s');

$App->coreModule = false;
$App->modulesCore = array('login','logout','account','password','profile','nopassword','nousername');

/* gestisce la richiesta http parametri get */
$globalSettings['requestoption']['othemodules'] = array_merge(array('site-users','site-filemanager','site-makeconfig'),$App->modulesCore);
Core::getRequest($globalSettings['requestoption']);

$App->userLoggedData = new stdClass();

if (!isset($_MY_SESSION_VARS['ad-user']['id'])){
	if (Core::$request->action != "nopassword" && Core::$request->action != "nousername") Core::$request->action = 'login';
	} else {
		/* carica dati utente loggato */		
		Sql::initQuery(DB_TABLE_PREFIX.'site_users',array('*'),array($_MY_SESSION_VARS['ad-user']['id']),'active = 1 AND id = ?','');
		$App->userLoggedData = Sql::getRecord();
		$App->userLoggedData->is_root = intval($App->userLoggedData->is_root);
		}	

//print_r($App->userLoggedData);

/* GESTIONE TEMPLATE */
$App->templateUser = (isset($_MY_SESSION_VARS['ad-user']['tpl']) && $_MY_SESSION_VARS['ad-user']['tpl'] != '' ? $_MY_SESSION_VARS['ad-user']['tpl'] : TEMPLATE_DEFAULT);

/* controlla la cartella */
if (!is_dir('templates/'.$App->templateUser)) $App->templateUser = TEMPLATE_DEFAULT;

/* carica i livelli del sito */
$App->user_levels = Permissions::getUserLevels();
if (Core::$resultOp->error == 1) die('Errore db livello utenti!');

/* carica i dati dei moduli */
foreach($globalSettings['module sections'] AS $key=>$value) {
	Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('*'),array($key),'active = 1 AND section = ?','ordering ASC');
	$App->site_modules[$key] = Sql::getRecords();
	if (Core::$resultOp->error == 1) die('Errore db livello utenti!');
	}



/* carica i moduli disponibili per l'utente corrente */
$App->user_modules_active = array();
$App->user_first_module_active = 'site-home';
if(isset($App->userLoggedData->id_level) && $App->userLoggedData->id_level > 0) {
	$obj = new stdClass();
	Sql::initQuery(DB_TABLE_PREFIX.'site_levels',array('*'),array($App->userLoggedData->id_level),'active = 1 AND id = ?');
	$obj = Sql::getRecord();	
	$App->user_modules_active = explode(',', $obj->modules);	
	$App->user_first_module_active = $App->user_modules_active[0];
	}
/* integra con i core */
$App->user_modules_active = array_merge($App->user_modules_active, $App->modulesCore);


/* controlla permessi */
/* se non si è connessi */

if (Permissions::checkAccessUserModule(Core::$request->action,$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == false) Core::$request->action = $App->user_first_module_active;
			
if(in_array(Core::$request->action,$App->modulesCore) == true) $App->coreModule = true;


$pathApplication = $App->pathApplication;
$action = Core::$request->action;
$index = '/index.php';

if($App->coreModule == true) {
	$pathApplication = $App->pathApplicationCore;
	$action = '';
	$index = Core::$request->action.'.php';
	}

//echo '<br>'.PATH.$pathApplication.$action.$index;
//echo '<br>'.PATH.$pathApplication.$App->user_first_module_active."/index.php";
	
if (file_exists(PATH.$pathApplication.$action.$index)) {
	$_MY_SESSION_VARS = $my_session->addSessionsModuleVars($_MY_SESSION_VARS,Core::$request->action,array('page'=>1,'ifp'=>'10'));
	include_once(PATH.$pathApplication.$action.$index);
	} else {
		Core::$request->action = $App->user_first_module_active;
		include_once(PATH.$pathApplication.$App->user_first_module_active."/index.php");
		}	


/* imposta le variabili Savant */
$Tpl->mySessionVars = $_MY_SESSION_VARS;
$Tpl->globalSettings = $globalSettings;
$Tpl->App = $App;

//echo '<br>'.PATH.$pathApplication.$action."/templates/".$App->templateUser."/".$App->templatePage;
//echo '<br>'.PATH."templates/".$App->templateUser."/".$App->mainTemplatePage;

/* renderizza il template */
if ($renderTpl == true){	
	if (file_exists(PATH.$pathApplication.$action."/templates/".$App->templateUser."/".$App->templatePage)) {
		$pageMainContent = $Tpl->fetch(PATH.$pathApplication.$action."/templates/".$App->templateUser."/".$App->templatePage);
		} else {
			$pageMainContent = $Tpl->fetch(PATH.$pathApplication."site-home/templates/".$App->templateUser."/list.tpl.php");			
			}	
	$Tpl->pageMainContent = $pageMainContent;
	if (file_exists(PATH."templates/".$App->templateUser."/".$App->mainTemplatePage)) {
		$Tpl->display(PATH."templates/".$App->templateUser."/".$App->mainTemplatePage);
		}
	}	

if ($renderAjax == true){
	if (file_exists(PATH.$pathApplication.$action."/templates/".$App->templateUser."/".$App->templatePage)) {
		include_once(PATH.$pathApplication.$action."/templates/".$App->templateUser."/".$App->templatePage);	
		}
	}
die();
?>