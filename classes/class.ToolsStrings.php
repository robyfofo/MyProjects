<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/classes/class.ToolsStrings.php v.3.0.0. 04/11/2016
*/

class ToolsStrings extends Core {

	public function __construct() {
		parent::__construct();
		}
		
	public static function redirect($url) {
		$protocol = "http://";
		$server_name = $_SERVER["HTTP_HOST"];
		if ($server_name != '') {
			$protocol = "http://";
			if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on")) {
				$protocol = "https://";
				}
			if (preg_match("#^/#", $url)) {
				$url = $protocol.$server_name.$url;
				} else if (!preg_match("#^[a-z]+://#", $url)) {
					$script = KT_getPHP_SELF();
					if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '' && $_SERVER['PATH_INFO'] != $_SERVER['PHP_SELF']) {
						$script = substr($script, 0, strlen($script) - strlen($_SERVER['PATH_INFO']));
						}
					$url = $protocol.$server_name.(preg_replace("#/[^/]*$#", "/", $script)).$url;
					}
			$url = str_replace(" ","%20",$url);
			header("Location: ".$url);
			}
			exit;
		}
		
	public static function getAlias($oldalias,$alias,$value,$opz) {
		if ($alias == '') $alias = SanitizeStrings::getAliasString($value,array());
		$aliascheck = false;
		do {
			$check = self::checkIssetAlias($alias,$opz);
			if ($check == true) {
				if($oldalias != $alias) {
					$alias .= (string)rand(1,10);	
					Core::$resultOp->error = 2;
					Core::$resultOp->messages[] = "Alias cambiato perché GIA' esistente!";
					}			
				}
		} 
		while($aliascheck == true);
		if ($alias == '') $alias .= (string)time();
		return $alias;
		}
		
	public static function checkIssetAlias($alias,$opz) {
		$opzDef = array('idfield'=>'id','aliasfield'=>'alias');	
		$opz = array_merge($opzDef,$opz);
		$count = 0;
		Sql::initQuery($opz['table'],array($opz['idfield']),array($alias),$opz['aliasfield'].' = ?');
		$count = Sql::countRecord();
		if(Core::$resultOp->error == 0) {
			return ($count == 1 ? true : false);
			} else {
				return true;
				}
		}
		
	public static function getStringFromTotNumberChar($str,$opz){
		$opzDef = array('numchars'=>100,'suffix'=>'');	
		$opz = array_merge($opzDef,$opz);
		$str = strip_tags($str);
		if (strlen($str) > $opz['numchars']) $str = mb_strcut($str,0,$opz['numchars']).$opz['suffix'];
		return $str;
		}

	public static function setNewPassword($caratteri_disponibili,$lunghezza){
		$password = "";
		for($i = 0; $i<$lunghezza; $i++){
			$password = $password.substr($caratteri_disponibili,rand(0,strlen($caratteri_disponibili)-1),1);
			}
		return $password;
   	}


   /* SPECIFICHE ARRAY */
   
   public static function multiSearch(array $array, array $pairs){
		$found = array();
		foreach ($array as $aKey => $aVal) {
			$coincidences = 0;
			foreach ($pairs as $pKey => $pVal) {
				if (array_key_exists($pKey, $aVal) && $aVal[$pKey] == $pVal) {
					$coincidences++;
					}
				}
			if ($coincidences == count($pairs)) {
				$found[$aKey] = $aVal;
				}
			}
		return $found;
		}
		
	public static function arrayInsert(&$array, $position, $insert){
	    if (is_int($position)) {
	        array_splice($array, $position, 0, $insert);
		    } else {
		        $pos   = array_search($position, array_keys($array));
		        $array = array_merge(
		            array_slice($array, 0, $pos),
		            $insert,
		            array_slice($array, $pos)
		        );
		    }
		}
		
	public static function arrayDeleteByValue($array,$value){
		$key = array_search($value,$array);
		if($key!==false){
			unset($array[$key]);
			}
		return $array;
		}
		
	public static function  multi_array_key_exists($needle, $haystack) {
		foreach ($haystack as $key=>$value) {
			if ($needle===$key) {
				return $key;
				}
			if (is_array($value)) {
				if (multi_array_key_exists($needle, $value)) {
					return $key . ":" . multi_array_key_exists($needle, $value);
					}
				}
			}
		return false;
		}
		
	   /* OUTPUT HTML CONTENT */	

	public static function getHtmlContent($obj,$value,$opz) {
		$str = 'error object value';
		$opzDef = array();	
		$opz = array_merge($opzDef,$opz);		
		if (isset($obj->$value)) $str = $obj->$value;	
		$str = self::filterHtmlContent($str,$opz);
		return $str;	
		}

		
	public static function filterHtmlContent($str,$opz) {
		$opzDef = array('htmlout'=>false,'htmlawed'=>true,'parse'=>true,'striptags'=>false);
		$opz = array_merge($opzDef,$opz);		
		
		if ($opz['striptags'] == true) {
			$str = strip_tags($str);
			$opz['htmLawed'] = false;
			}
			
		if ($opz['htmlout'] == true) {
			$str = ToolsStrings::html_out($str);
			$opz['htmLawed'] = false;
			}	
			
		if (isset($opz['maxchar']) && $opz['maxchar'] > 0) {
			$str = ToolsStrings::getStringFromTotNumberChar($str,array('numchars'=>$opz['maxchar']));
			$opz['htmLawed'] = false;
			}		
		
		if ($opz['htmlawed'] == true) $str = htmLawed::hl($str);
		if ($opz['parse'] == true) $str = self::parseHtmlContent($str);
		return $str;	
		}

		
	public static function parseHtmlContent($str,$opz=array()) {		
		$opzDef = array('customtag'=>'','customtagvalue'=>'','parseuploads'=>false);
		$opz = array_merge($opzDef,$opz);
		if ($opz['parseuploads'] == true) {
			$str = preg_replace('/..\/uploads\//',UPLOAD_DIR,$str);
			$str = preg_replace('/uploads\//',UPLOAD_DIR,$str);
			}
		$str = preg_replace('/{{AZIENDAREFERENTE}}/',self::$globalSettings['azienda referente'],$str);
		$str = preg_replace('/{{AZIENDAINDIRIZZO}}/',self::$globalSettings['azienda indirizzo'],$str);
		$str = preg_replace('/{{AZIENDAPROVINCIA}}/',self::$globalSettings['azienda provincia'],$str);
		$str = preg_replace('/{{AZIENDAPROVINCIAABBREVIATA}}/',self::$globalSettings['azienda provincia abbreviata'],$str);
		$str = preg_replace('/{{AZIENDACAP}}/',self::$globalSettings['azienda cap'],$str);
		$str = preg_replace('/{{AZIENDACOMUNE}}/',self::$globalSettings['azienda comune'],$str);
		$str = preg_replace('/{{AZIENDASTATO}}/',self::$globalSettings['azienda stato'],$str);		
		$str = preg_replace('/{{AZIENDAEMAIL}}/',self::$globalSettings['azienda email'],$str);
		$str = preg_replace('/{{AZIENDATELEFONO}}/',self::$globalSettings['azienda telefono'],$str);
		$str = preg_replace('/{{AZIENDAFAX}}/',self::$globalSettings['azienda fax'],$str);
		$str = preg_replace('/{{AZIENDAMOBILE}}/',self::$globalSettings['azienda mobile'],$str);
		$str = preg_replace('/{{AZIENDACODICEFISCALE}}/',self::$globalSettings['azienda codice fiscale'],$str);
		$str = preg_replace('/{{AZIENDAPARTITAIVA}}/',self::$globalSettings['azienda partita iva'],$str);
		$str = preg_replace('/{{AZIENDALATITUDINE}}/',self::$globalSettings['azienda latitudine'],$str);
		$str = preg_replace('/{{AZIENDALONGITUDINA}}/',self::$globalSettings['azienda longitudine'],$str);
		
		$str = preg_replace('/{{URLSITE}}/',URL_SITE,$str);
		
		if ($opz['customtag'] != '') {
			if ($opz['customtagvalue'] != '') $str = preg_replace('/'.$opz['customtag'].'/',$opz['customtagvalue'],$str);
			}	

		return $str;	
		}	
		
	public static function encodeHtmlContent($str,$opz=array()) {
		$opzDef = array('customtag'=>'','customtagvalue'=>'');
		$opz = array_merge($opzDef,$opz);
		if ($opz['customtag'] != '') {
			if ($opz['customtagvalue'] != '') $str = preg_replace('/'.$opz['customtag'].'/',$opz['customtagvalue'],$str);
			}	
		return $str;	
		}		
	

	}
?>
