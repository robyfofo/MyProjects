<?php 
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 *	admin/classes/class.Form.php v.2.6.4. 29/07/2016
*/

class Form extends Core {	

	public function __construct() {
		parent::__construct();
		}
		
	public static function checkEmptyPost($fields) {
		if(is_array($fields) && count($fields) > 0) {
			foreach($fields AS $key=>$value) {				
				if (isset($_POST[$key]) && $_POST[$key] == "") {
					self::$resultOp->error = 1;
					self::$resultOp->messages[] = $value['message'];
					}
					
				}
			}		
		}
		
	public static function checkPostFields($fields,$opz) {
		if(is_array($fields) && count($fields) > 0) {
			foreach($fields AS $key=>$value) {
				$field = $key;
				if(isset($value['field']) && $value['field'] != '') $field = $value['field'];
				if(isset($value['message']) && $value['message'] != '') $message = $value['message'];
				if(isset($value['messages']) && $value['messages'] != '') $messages = $value['messages'];
				/* controlla se il campo e una var form */
				

				 if (isset($_POST[$field])) {
						
					switch($value['type']) {
						case 'validatecaptcha':				
							if (isset($opz['captchaSession'])) {
								if (!isset($_POST[$field]) || (isset($_POST[$field]) && $_POST[$field] == "")) {
									self::$resultOp->error = 1;
									self::$resultOp->messages[] = $messages['confirm'];
									} else {
										if ($_POST[$key] !== $opz['captchaSession']) {
											self::$resultOp->error = 1;
											self::$resultOp->messages[] = $messages['match'];
											}
										}
								} else {
									self::$resultOp->error = 1;
									self::$resultOp->messages[] = $messages['confirm'];
									}
						break;									
						case 'validateemail':
							if (isset($_POST[$key]) && $_POST[$field] == "") {
								self::$resultOp->error = 1;
								self::$resultOp->messages[] = $value['message'];
								} else {
									if (isset($_POST[$key]) && $_POST[$field] != "" && SanitizeStrings::validateEmail($_POST[$field]) == false) {
										self::$resultOp->error = 1;
										self::$resultOp->messages[] = $value['message'];
										}
									}
						break;
						case 'isstrvalue':
							$valuerif = (isset($value['value']) ? $value['value'] : '');
							if (!isset($_POST[$key]) || (isset($_POST[$key]) && $_POST[$field] != $valuerif)) {
								self::$resultOp->error = 1;
								self::$resultOp->messages[] = $value['message'];
								}
						break;
						case 'isintvalue':
							$valuerif = (isset($value['value']) ? intval($value['value']) : 0);
							if (!isset($_POST[$key]) || (isset($_POST[$key]) && $_POST[$field] <> $valuerif)) {
								self::$resultOp->error = 1;
								self::$resultOp->messages[] = $value['message'].' aaaaa';
								}
						break;
						case 'passwordmatch':
							if (!isset($_POST[$field]) || (isset($_POST[$field]) && $_POST[$field] == "")) {
								self::$resultOp->error = 1;
								self::$resultOp->messages[] = $messages['empty'];
								}
							if (!isset($_POST[$value['fieldCK']]) || (isset($_POST[$value['fieldCK']]) && $_POST[$value['fieldCK']] == "")) {
								self::$resultOp->error = 1;
								self::$resultOp->messages[] = $messages['emptyCK'];
								} else {
									if ($_POST[$field] != $_POST[$value['fieldCK']]) {
										self::$resultOp->error = 1;
										self::$resultOp->messages[] = $messages['nomatch'];
										}									
									}
						break;
						
						case 'checkexistdb':
							
							$valuematch = '';
							if (isset($value['valuematch'])) {
								$valuematch = $value['valuematch'];
								} else if (isset($_POST[$field])) {
									$valuematch = $_POST[$field];
									}
							Sql::initQuery($value['table'],array('id'),array($valuematch),$field.' = ?');
							$obj = Sql::getRecord();
							if (Sql::getFoundRows() > 0) {
								Core::$resultOp->error = 1;
								self::$resultOp->messages[] = $messages['exist'];
								}					
						break;
						
						case 'empty':
							if (isset($_POST[$key]) && $_POST[$field] == "") {
								self::$resultOp->error = 1;
								self::$resultOp->messages[] = $value['message'];
								}
						break;
						}
					
					} else {
						self::$resultOp->error = 1;
						if (isset($message)) {
							self::$resultOp->messages[] = $message;
							} else {
								self::$resultOp->messages[] = 'Campo '.$field.' non presente!';
								}						
						}					
				}
			}		
		}

	}
?>