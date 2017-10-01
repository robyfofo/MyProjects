<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * classes/class.Mails.php v.1.0.0. 28/09/2017
*/

class Mails extends Core {

	public function __construct() 	{
		parent::__construct();	
					
		}
		
			
	public static function sendMail($mode,$address,$subject,$content,$opz) {
		$opzDef = array('sendDebug'=>0,'sendDebugEmail'=>'','fromEmail'=>'n.d','fromLabel'=>'n.d');	
		$opz = array_merge($opzDef,$opz);		
		if ($mode == 1) {
			self::sendMailPHP($address,$subject,$content,$opz);
			} else {
				self::sendMailPHP($address,$subject,$content,$opz);
				//self::sendMailCLASS($address,$subject,$content,$opz);
				}
		}

	public static function sendMailCLASS($address,$subject,$content,$opz) {
		$opzDef = array('sendDebug'=>0,'sendDebugEmail'=>'','fromEmail'=>'n.d','fromLabel'=>'n.d');	
		$opz = array_merge($opzDef,$opz);		
		$mail = new PHPMailer(true); 
		try {
		
			$mail->setFrom($opz['fromEmail'],$opz['fromLabel']);
			$mail->addAddress($address);
			$mail->Subject = $subject;
			$mail->Body = $content;
			$mail->AltBody = SanitizeStrings::htmlout($content);
			$mail->isHTML(true);
		
			if ($opz['sendDebug'] == 1) {
				if ($opz['sendDebugEmail'] != '') $mail->addCC = $opz['sendDebugEmail'];
				}			
		
			$mail->send();
			Core::$resultOp->error = 0;
			} catch (Exception $e) {
				Core::$resultOp->error = 1;
  				Core::$resultOp->messages = $mail->ErrorInfo;
  				echo $mail->ErrorInfo;
  				die();
				}			
		}
		
	public static function sendMailPHP($address,$subject,$content,$opz) {
		$opzDef = array('sendDebug'=>0,'sendDebugEmail'=>'','fromEmail'=>'n.d','fromLabel'=>'n.d');	
		$opz = array_merge($opzDef,$opz);		
		$headers  = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		$headers .= "Return-Path: ".$opz['fromLabel']." <".$opz['fromEmail'].">\r\n";
		$headers .= "From: ".$opz['fromLabel']." <".$opz['fromEmail'].">\n";
		if ($opz['sendDebug'] == 1) {
			if ($opz['sendDebugEmail'] != '') $headers .= "Bcc: ".$opz['sendDebugEmail']."\r\n";
			}		
		$content .= "<br>\r\n";
		$content .= "<br>\r\n";
		$boundary = "==String_Boundary_x".md5(time())."x";
		$content .= "–".$boundary."–\n";
		
		$result = mail($address,$subject,$content,$headers);
		if(!$result) {   
    		//echo "Error";
    		Core::$resultOp->error = 1;  
			} else {
    			//echo "Success";
    			Core::$resultOp->error = 0;
				}
		}
		
	public static function parseMailContent($post,$content,$opz=array()) {
		$opzDef = array('customFields'=>array(),'customFieldsValue'=>array());	
		$opz = array_merge($opzDef,$opz);
		$content = preg_replace('/{{SITENAME}}/',SITE_NAME,$content);
		if (isset($post['urlconfirm'])) $content = preg_replace('/{{URLCONFIRM}}/',$post['urlconfirm'],$content);
		if (isset($post['hash'])) $content = preg_replace('/{{HASH}}/',$post['hash'],$content);
		if (isset($post['username'])) $content = preg_replace('/{{USERNAME}}/',$post['username'],$content);
		if (isset($post['name'])) $content = preg_replace('/{{NAME}}/',$post['name'],$content);
		if (isset($post['surname'])) $content = preg_replace('/{{SURNAME}}/',$post['surname'],$content);
		if (isset($post['email'])) $content = preg_replace('/{{EMAIL}}/',$post['email'],$content);
		if (isset($post['subject'])) $content = preg_replace('/{{SUBJECT}}/',$post['subject'],$content);	
		if (isset($post['message'])) $content = preg_replace('/{{MESSAGE}}/',$post['message'],$content);	
		if (
			(is_array($opz['customFields']) && count($opz['customFields'])) 
			&& (is_array($opz['customFieldsValue']) && count($opz['customFieldsValue'])) 
			&& (count($opz['customFields']) == count($opz['customFieldsValue']))
			) {			
			foreach ($opz['customFields'] AS $key=>$value) {
				$content = preg_replace('/'.$opz['customFields'][$key].'/',$opz['customFieldsValue'][$key],$content);
				}
			}
		return $content;
		}	

	}
?>