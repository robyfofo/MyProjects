<?php 
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 *	admin/classes/class.Form.php v.1.0.0. 03/03/2017
*/

class Form extends Core {	

	public function __construct() {
		parent::__construct();
		}
		
	public static function getUpdateRecordFromPostResults($id,$resultOp,$_lang,$opz) {
		$opzDef = array();	
		$opz = array_merge($opzDef,$opz);
		$viewMethod = '';
		$pageSubTitle = '';
		$message = $resultOp->message;
		if ($resultOp->error == 1) {			
			$pageSubTitle = ucfirst($_lang['modifica voce']);
			$viewMethod = 'formMod';				
			} else {
				if (isset($_POST['submitForm'])) {	
					$viewMethod = 'list';
					$message = ucfirst($_lang['voce modificata']).'!';								
					} else {						
						if (isset($_POST['id'])) {
							$id = $_POST['id'];
							$pageSubTitle = $_lang['modifica voce'];
							$viewMethod = 'formMod';	
							$message = ucfirst($_lang['modifiche effettuate']).'!';
							} else {
								$viewMethod = 'formNew';	
								$pageSubTitle = $_lang['inserisci voce'];
								}
						}				
				}
		return array($id,$viewMethod,$pageSubTitle,$message);	
		}

	public static function getInsertRecordFromPostResults($id,$resultOp,$_lang,$opz) {
		$opzDef = array();	
		$opz = array_merge($opzDef,$opz);
		$viewMethod = '';
		$pageSubTitle = '';
		$message = $resultOp->message;
		if ($resultOp->error == 1) {
			$pageSubTitle = $_lang['inserisci voce'];
			$viewMethod = 'formNew';
			} else {
				$viewMethod = 'list';
				$message = ucfirst($_lang['voce inserita']).'!';	
				}		
		return array($id,$viewMethod,$pageSubTitle,$message);	
		}
		
	public static function checkRequirePostByFields($fields,$_lang,$opz) {
		$opzDef = array();	
		$opz = array_merge($opzDef,$opz);
		if (is_array($fields) && count($fields) > 0) {
			foreach($fields AS $key=>$value) {
				$namefield = $key;
				if (isset($value['required']) && $value['required'] == true && (!isset($_POST[$namefield]) || (isset($_POST[$namefield]) && $_POST[$namefield] == ''))) {		
					self::$resultOp->error = 1;
					self::$resultOp->message = preg_replace('/%FIELD%/',$value['label'],$_lang['Devi inserire il campo %FIELD%!']).'<br>';			
					}
				}
			}
		}

	public static function parsePostByFields($fields,$_lang,$opz) {
		$opzDef = array('stripmagicfields'=>true);	
		$opz = array_merge($opzDef,$opz);
		if (is_array($fields) && count($fields) > 0){
			foreach($fields AS $key=>$value) {
				$namefield = $key;
				$labelField = (isset($value['label']) ? $value['label'] : '');
				
				/* aggiorna con il default se vuoti o niente */
				if (!isset($_POST[$namefield]) || (isset($_POST[$namefield]) && $_POST[$namefield] == '')) {	
					if (isset($value['defValue'])) $_POST[$namefield] = $value['defValue'];
					}
							
				if (isset($value['validate'])) {	
					switch ($value['validate']) {
						case 'int':						
							self::validateInt($_POST[$namefield]);	
						break;
					
						case 'float':						
							self::validateFloat($_POST[$namefield]);	
						break;								
						
						case 'minmax':
							$minvalue = (isset($value['valuesRif']['min']) && $value['valuesRif']['min'] != '' ? $value['valuesRif']['min'] : 0);
							$maxvalue = (isset($value['valuesRif']['max']) && $value['valuesRif']['max'] != '' ? $value['valuesRif']['max'] : 0);
							self::validateMinMaxValues($_POST[$namefield],$labelField,$_lang,$minvalue,$maxvalue);		
						break;	
						
						case 'time':
							self::validateTime($_POST[$namefield],$labelField,$_lang);
						break;	
						
						case 'timeofcal':
							self::validateTime($_POST[$namefield].':00',$labelField,$_lang);
						break;					
						
						case 'explodearray':
							$opz1 = (isset($value['opz']) ? $value['opz'] : array());
							$_POST[$namefield] = self::validateExplodearray($_POST[$namefield],$opz1);
						break;	
						}
					}

						
				/* aggiunge gli slashes */
				if ($opz['stripmagicfields'] == true) $_POST[$namefield] = SanitizeStrings::stripMagic($_POST[$namefield]);
						

				}
			}		
		}
		
/* VALITAZIONE CAMPI */

	public static function validateExplodearray($array,$opz) {
		$opzDef = array('delimiter'=>',');	
		$opz = array_merge($opzDef,$opz);
		if (is_array($array)) {
			$array = implode($array,$opz['delimiter']);
			}
		return $array;
		}

	public static function validateTime($value,$labelField,$_lang) {
		$time = date('Y-m-d').' '.$value;
		$res = DateFormat::checkDataTimeIso($time);
		if ($res == false) {
			$s = $_lang['La data %FIELD% inserita non è valida!'];
			$s = preg_replace('/%FIELD%/',$labelField,$s);	
			self::$resultOp->messages[] = $s;				
			}
		
		}

	public static function validateInt($value) {
		return intval($value);
		}

	public static function validateFloat($value) {
		if (filter_var($value, FILTER_VALIDATE_FLOAT) == false) $value = floatval($value);
		return $value;
		}
		
	public static function validateMinMaxValues($valuesrif,$labelField,$_lang,$minvalue,$maxvalue) {
		if ($valuesrif < $minvalue || $valuesrif > $maxvalue) {
			self::$resultOp->error = 1;
			$s = $_lang['Il campo %FIELD% deve avere un valore superiore o uguale a %MIN% e inferiore o uguale a %MAX%!'];
			$s = preg_replace('/%MIN%/',$minvalue,$s);
			$s = preg_replace('/%MAX%/',$maxvalue,$s);
			$s = preg_replace('/%FIELD%/',$labelField,$s);	
			self::$resultOp->messages[] = $s;									
			}
		
		}

	}
?>