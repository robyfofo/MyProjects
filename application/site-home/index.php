<?php
/**
* Framework siti html-PHP-Mysql
* PHP Version 7
* @author Roberto Mantovani (<me@robertomantovani.vr.it>
* @copyright 2009 Roberto Mantovani
* @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
* admin/site-home/index.php v.3.0.0. 27/10/2016
*/

//Core::setDebugMode(1);


include_once(PATH.'application/'.Core::$request->action."/module.class.php");

$App->params = new stdClass();

/* prende i dati del modulo */
Sql::initQuery(DB_TABLE_PREFIX.'site_modules',array('help_small','help'),array('site-home'),'name = ?');
$obj = Sql::getRecord();
if (Core::$resultOp->error == 0 && isset($obj)) $App->params = $obj;

$tablesDb = Sql::getTablesDatabase($globalSettings['database'][DATABASE]['name']);

/* variabili ambiente */
$App->codeVersion = ' 3.0.0.';
$App->pageTitle = 'Home';
$App->pageSubTitle = 'la pagina Home';
$Module = new Module('','home');
$Tpl->Module = $Module;

$App->breadcrumb .= '<li class="active"><i class="icon-user"></i> Home</li>';
//Core::setDebugMode(1);
$App->countPanel = array();
$today = $App->nowDateTime;
$App->lastLogin = (isset($_MY_SESSION_VARS['lastLogin']) ? $_MY_SESSION_VARS['lastLogin'] : $today);
//$App->lastLogin = '2015-01-01 00:00:00';

$App->templatePage = 'list.tpl.php';
$numCountPanel = 0;
switch(Core::$request->method) {
	default;	
		$App->moduleHome = array();


		$App->homeBlocks = array();
		$App->homeTables = array();
		
		/* 
		colori disponibili
		.panel-primary (blue)
		.panel-default (grigio)
		.panel-success (verde)
		.panel-info (turchese)
		.panel-warning
		.panel-danger
		.panel-green 
		.panel-red 
		.panel-yellow
		
		
		*/
		 
		$App->panels = array(
			'info'=>array('panel-primary','panel-default','panel-info','panel-green','panel-red','panel-yellow'),
			'alert'=>array('panel-warning'),
			'danger'=>array('panel-danger'),
			'success'=>array('panel-success')	
		);	
		
		$App->panelsInfo = count($App->panels['info']);
		$App->panelsAlert = count($App->panels['alert']);
		$App->panelsDanger = count($App->panels['danger']);
		$App->panelsSuccess = count($App->panels['success']);
			 
/* SITE IMAGES */
if (in_array(DB_TABLE_PREFIX.'site_images',$tablesDb) && file_exists(PATH."application/site-images/index.php") && Permissions::checkAccessUserModule('site-images',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['site-images'] = array( 'table'=>DB_TABLE_PREFIX.'site_images', 'icon panel'=>'fa-picture-o', 'label'=>'Immagini sito', 'sex suffix'=>'e', 'type'=>'info', 'url'=>true, 'url item'=>array ( 'string'=>'{{URLSITEADMIN}}site-images/listItem/-1', 'opz'=>array() ) );	
	$App->homeTables['site-images'] = array( 'table'=>DB_TABLE_PREFIX.'site_images', 'icon panel'=>'fa-picture-o', 'label'=>'Ultime immagini sito', 'fields'=>array( 'title_it'=>array( 'type'=>'varchar', 'label'=>'Titolo', 'url'=>true, 'url item'=>array( 'string'=>'{{URLSITEADMIN}}site-images/listItem', 'opz'=>array('fieldItemRif'=>'id_folder' ) ) ), 'filename'=>array( 'label'=>'Immagine', 'type'=>'imagefolder', 'path'=>UPLOAD_DIR.'site-media/images/')));
	}
	
/* SITE FILES */
if (in_array(DB_TABLE_PREFIX.'site_files',$tablesDb) && file_exists(PATH."application/site-files/index.php") && Permissions::checkAccessUserModule('site-files',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['site-files'] = array( 'table'=>DB_TABLE_PREFIX.'site_files', 'icon panel'=>'fa-file-o', 'label'=>'Files sito', 'sex suffix'=>'i', 'type'=>'info', 'url'=>true, 'url item'=>array ( 'string'=>'{{URLSITEADMIN}}site-files/listItem/-1', 'opz'=>array() ) );	
	$App->homeTables['site-files'] = array( 'table'=>DB_TABLE_PREFIX.'site_files', 'icon panel'=>'fa-file-o', 'label'=>'Ultimi files sito', 'fields'=>array( 'title_it'=>array( 'type'=>'varchar', 'label'=>'Titolo', 'url'=>true, 'url item'=>array( 'string'=>'{{URLSITEADMIN}}site-files/listItem', 'opz'=>array('fieldItemRif'=>'id_folder' ) ) ), 'filename'=>array( 'label'=>'File', 'type'=>'file', 'url'=>true, 'url item'=>array( 'string'=>'{{URLSITEADMIN}}site-files/downloadItem', 'opz'=>array('fieldItemRif'=>'id' )))));	
	}
	
/* SITE GALLERIES */
if (in_array(DB_TABLE_PREFIX.'site_galleries',$tablesDb) && file_exists(PATH."application/site-galleries/index.php") && Permissions::checkAccessUserModule('site-galleries',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['site-galleries'] = array(
		'table'=>DB_TABLE_PREFIX.'site_galleries',
		'icon panel'=>'fa-picture-o',
		'label'=>'Immagini Gallerie sito',
		'sex suffix'=>'e',
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>'{{URLSITEADMIN}}site-galleries/listItem/-1',
			'opz'=>array()
			)
		);	
	$App->homeTables['site-galleries'] = array(
		'table'=>DB_TABLE_PREFIX.'site_galleries',
		'icon panel'=>'fa-picture-o',
		'label'=>'Ultime immagini gallerie sito',
		'fields'=>array(
			'title_it'=>array(
				'type'=>'varchar',
				'label'=>'Titolo',
				'url'=>true,
				'url item'=>array(
					'string'=>'{{URLSITEADMIN}}site-galleries/listItem',
					'opz'=>array('fieldItemRif'=>'id_cat'
						)
					)
				),
			'filename'=>array(
				'label'=>'Immagine',
				'type'=>'imagefolder',
				'path'=>UPLOAD_DIR.'site-media/galleries/'
				)
			)				
		);
		
	}

/* SITE BLOCKS */
if (in_array(DB_TABLE_PREFIX.'site_blocks',$tablesDb) && file_exists(PATH."application/site-blocks/index.php") && Permissions::checkAccessUserModule('site-blocks',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['site_blocks'] = array('table'=>DB_TABLE_PREFIX.'site_blocks','icon panel'=>'fa-puzzle-piece','label'=>'Blocchi sito','sex suffix'=>'i','type'=>'info','url'=>true,'url item'=>array('string'=>'{{URLSITEADMIN}}site-blocks','opz'=>array()));			
	$App->homeTables['site_blocks'] = array('table'=>DB_TABLE_PREFIX.'site_blocks','icon panel' =>'fa-puzzle-piece','label'=>'Ultimi blocchi sito','fields'=>array('title_it'=>array('type'=>'varchar','label'=>'Titolo'),'content_it'=>array('type'=>'text','label'=>'Contenuto','url'=>true,'url item'=>array('string'=>'{{URLSITEADMIN}}site-blocks','opz'=>array()))));	
	}

/* BLOG */
if (in_array(DB_TABLE_PREFIX.'blog',$tablesDb) && file_exists(PATH."application/blog/index.php") && Permissions::checkAccessUserModule('blog',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {	
	$App->homeBlocks['blog'] = array('table'=>DB_TABLE_PREFIX.'blog','icon panel'=>'fa-comment-o','label'=>'Post','sex suffix'=>'i','type'=>'info',);
	$App->homeTables['blog'] = array('table'=>DB_TABLE_PREFIX.'blog','icon panel'=>'fa-comment-o','label'=>'Ultimi post','fields'=>array('title_it'=>array('type'=>'varchar','label'=>'Titolo','url'=>true,'url item'=>'',)));
	$App->homeBlocks['blog_comment'] = array('table'=>DB_TABLE_PREFIX.'blog_comments','icon panel'=>'fa-comments-o','label'=>'Commenti','sex suffix'=>'i','type'=>'info','url'=>true,'url item'=>array ('string'=>'{{URLSITEADMIN}}blog/listIcom','opz'=>array()));			
	$App->homeBlocks['blog_comment 1'] = array( 'module'=>'blog_comment', 'table'=>DB_TABLE_PREFIX.'blog_comments', 'whereclause'=>'active = 0', 'icon panel'=>'fa-comments-o', 'label'=>'Commenti da verificare', 'sex suffix'=>'i', 'type'=>'alert', 'url'=>true, 'url item'=>array ( 'string'=>'{{URLSITEADMIN}}blog/listIcom', 'opz'=>array( 'fieldItemRif'=>'id_owner' ) ) );
	$App->homeTables['blog-comments'] = array( 'table'=>DB_TABLE_PREFIX.'blog_comments', 'icon panel'=>'fa-comments-o', 'label'=>'Ultimi commenti', 'fields'=>array( 'name'=>array( 'type'=>'text', 'label'=>'Nome', ), 'content_it'=>array( 'type'=>'text', 'label'=>'Contenuto', 'url'=>true, 'url item'=>array( 'string'=>'{{URLSITEADMIN}}blog/listIcom', 'opz'=>array( 'fieldItemRif'=>'id_owner' ) ) )	 ) );
	}		

/* LINK */
if (in_array(DB_TABLE_PREFIX.'useful_links',$tablesDb) && file_exists(PATH."application/links/index.php") && Permissions::checkAccessUserModule('links',$App->userLoggedData,$App->user_modules_active,$App->modulesCore) == true) {
	$App->homeBlocks['links'] = array(
		'table'=>DB_TABLE_PREFIX.'useful_links',
		'icon panel'=>'fa-link',
		'label'=>'Link utili',
		'sex suffix'=>'i',
		'type'=>'info',
		'url'=>true,
		'url item'=>array (
			'string'=>'{{URLSITEADMIN}}links',
			'opz'=>array()
			)
		);	
		
	$App->homeTables['links'] = array(
		'table'=>DB_TABLE_PREFIX.'useful_links',
		'icon panel'=>'fa-link',
		'label'=>'Ultimi link utili',
		'fields'=>array(
			'title_it'=>array(
				'type'=>'varchar',
				'label'=>'Titolo',
				'url'=>true,
				'url item'=>array(
					'string'=>'{{URLSITEADMIN}}links',
					'opz'=>array(
						)
					)
				)
			)
		);
		
	}
	
	if (file_exists(PATH."application/site-home/custom.php")) include_once(PATH."application/site-home/custom.php");
			
	break;	
}

//print_r($App->homeBlocks);

/* sistemo i dati */
$arr = array();
if (is_array($App->homeBlocks) && count($App->homeBlocks) > 0) {
	$panelsinfo = 0;
	$panelsalert = 0;
	$panelsdanger = 0;
	$panelssuccess = 0;
	
	foreach ($App->homeBlocks AS $key => $value) {
		$module = (isset($value['module']) && $value['module'] != '' ? $value['module'] : $key);
		$whereclause = (isset($value['whereclause']) && $value['whereclause'] != '' ? $value['whereclause'] : '');
		$value['class'] = (isset($value['class']) ? $value['class'] :'');
		$value['type'] = (isset($value['type']) ? $value['type'] :'');
		
		$where = 'created > ?';
		if ($whereclause != '') $where .= ' AND '.$whereclause;	
		Sql::initQuery($value['table'],array('id'),array($App->lastLogin),$where,'','',false);		
		$items = Sql::countRecord();
		$value['items'] =  $items;
	
		
		if ($value['class'] == '') {
			switch($value['type']) {
				case 'alert':
					$value['class'] = $App->panels['alert'][$panelsalert];
					$panelsalert = $panelsalert + 1;
					if ($panelsalert > ($App->panelsAlert - 1)) $panelsalert = 0;
				break;					
				case 'danger':
					$value['class'] = $App->panels['danger'][$panelsdanger];
					$panelsalert = $panelsdanger + 1;
					if ($panelsdanger > ($App->panelsDanger - 1)) $panelsdanger = 0;
				break;
				case 'success':
					$value['class'] = $App->panels['success'][$panelssuccess];
					$panelssuccess = $panelssuccess + 1;
					if ($panelssuccess > ($App->panelsSuccess - 1)) $panelssuccess = 0;
				break;
										
				default:
				case 'info':
					$value['class'] = $App->panels['info'][$panelsinfo];
					$panelsinfo = $panelsinfo + 1;
					if ($panelsinfo > ($App->panelsInfo - 1)) $panelsinfo = 0;
				break;				
				}
			
			/* aggiungi url */
			if (isset($value['url']) && $value['url'] == true) {
				$value['url'] = $Module->getItemBlockUrl($value,$App->lastLogin);
				} else {
					$value['url'] = URL_SITE_ADMIN.$module;
					}							
			}
		$arr[] = $value;
		}
	}
$App->homeBlocks = $arr;					

/* sistemo i dati */
$arr = array();
if (is_array($App->homeTables) && count($App->homeTables) > 0) {
	foreach ($App->homeTables AS $key => $value) {	
		/* aggiunge i campi */
		Sql::initQuery($value['table'],array('*'),array(),'','created DESC',' LIMIT 5 OFFSET 0','',false);
		$value['itemdata'] = Sql::getRecords();

		/* sistemo i dati */
		$arr1 = array();
		if (is_array($value['itemdata']) && count($value['itemdata']) > 0) {
			foreach ($value['itemdata'] AS $key1 => $value1) {
				/* data */
				$data = DateTime::createFromFormat('Y-m-d H:i:s',$value1->created);				
				$value1->datacreated = '<a href="'.URL_SITE_ADMIN.$key.'" title="Creata il '.$data->format('d/m/Y').' '.$data->format('H:i:s').'"><i class="fa fa-clock-o" aria-hidden="true"> </i></a>';
				/* genera url */
				$value1->url = URL_SITE_ADMIN.$key;				
				if (is_array($value['fields']) && count($value['fields']) > 0) {
					foreach ($value['fields'] AS $keyF => $valueF) {
						/* creo output del del campo */	
						$str = '';						
						if ($keyF != '') {
							//echo $keyF;
							$type = (isset($value['fields'][$keyF]['type']) && $value['fields'][$keyF]['type'] != '' ? $value['fields'][$keyF]['type'] : '');
							switch($type) {									
								case 'text':
									if (isset($value1->$keyF)) $output = strip_tags($value1->$keyF);
								break;
								case 'image':																
									$path = (isset($value['fields'][$keyF]['path']) ? $value['fields'][$keyF]['path'] :  UPLOAD_DIR.'/');	
									$pathdef = (isset($value['fields'][$keyF]['path def']) ? $value['fields'][$keyF]['path def'] :  '');	
									if ($pathdef == '')	$pathdef = $path;																																
									if ($value1->$keyF != ''){
										$output = '<a class="" href="'.$path.$value1->$keyF.'" rel="prettyPhoto[]" title="Zoom immagine"><img class="img-thumbnail"  src="'.$path.$value1->$keyF.'" alt=""></a>';
										} else {
											$output = '<img class="img-thumbnail"  src="'.$pathdef.$value1->$keyF.'default/image.png" alt="immagine di default">';
											}
								break;							
								case 'imagefolder':		
									$folderField = (isset($value['fields'][$keyF]['folderField']) ? $value['fields'][$keyF]['folderField'] : 'folder_name');														
									$path = (isset($value['fields'][$keyF]['path']) ? $value['fields'][$keyF]['path'] :  UPLOAD_DIR.'/');
									$path =	$path.$value1->$folderField;																		
									if ($value1->$keyF != ''){
										$output = '<a class="" href="'.$path.$value1->$keyF.'" rel="prettyPhoto[]" title="Zoom immagine"><img class="img-thumbnail"  src="'.$path.$value1->$keyF.'" alt=""></a>';
										}
								break;																
								case 'file':															
									if ($value1->$keyF != ''){
										$u = $Module->getItemUrl($value1,$value['fields'][$keyF]['url item']);
										$output = '<a class="" href="'.$u.'" title="Scarica il file">'.$value1->$keyF.'</a>';
										}
								break;

								
								default:
									$output = $value1->$keyF;
								break;
								
								}
								
							/* aggiungi url */
							if (isset($value['fields'][$keyF]['url']) && $value['fields'][$keyF]['url'] == true) {
								if (isset($value['fields'][$keyF]['url item']) && is_array($value['fields'][$keyF]['url item']) && count($value['fields'][$keyF]['url item']) > 0) {
									$u = $Module->getItemUrl($value1,$value['fields'][$keyF]['url item']);
									$output = '<a href="'.$u.'" title="Vai alla lista">'.$output.'</a>';								
									} else {
										$output = '<a href="'.URL_SITE_ADMIN.$key.'" title="Vai alla lista">'.$output.'</a>';										
										}							
								}							
							$value1->$keyF = $output;							
							}							
						}
					}				
				$arr1[] = $value1;
				}
			}		
		$value['itemdata'] =  $arr1;		
		$value['icon panel'] = (isset($value['icon panel']) ? $value['icon panel'] : 'fa-newspaper-o');
		$arr[] = $value;
		}
	}
$App->homeTables = $arr;					


$App->jscript[] = '<script src="'.URL_SITE_ADMIN.'application/'.Core::$request->action.'/module.js"></script>';	
?>