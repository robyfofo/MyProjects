<?php
//-------------------------------------------// *** framework siti html-PHP-Mysql// copyright 2009 Roberto Mantovani// http://www.robertomantovani.vr;it// email: me@robertomantovani.vr.it// home/module.class.php v.2.6.3. 01/04/2016

class Module {
	private $action;
	public $error;
	public $message;
	public $messages;
	
	public function __construct($action,$table) 	{
		$this->action = $action;
		$this->appTable = $table;
		$this->error = 0;	
		$this->message ='';
		$this->messages = array();	
		}
		
	public function getItemBlockUrl($arr,$lastLogin) {
		/* preleva i dati del lla prima voce */
		$whereclause = (isset($arr['whereclause']) && $arr['whereclause'] != '' ? $arr['whereclause'] : '');		
		$where = 'created > ?';
		if ($whereclause != '') $where .= ' AND '.$whereclause;	
		Sql::initQuery($arr['table'],array('*'),array($lastLogin),$where,'','',false);		
		$itemData = Sql::getRecord();		
		$str = $arr['url item']['string'];
		$opz = $arr['url item']['opz'];
		$str = preg_replace('/{{URLSITEADMIN}}/',URL_SITE_ADMIN,$str);	
		/* aggoinge parametri */
		if (isset($opz) && is_array($opz) && count($opz) > 0) {
			$str.= '/';
			foreach ($opz As $key=>$value) {
				switch($key) {
					case 'fieldItemRif':
						if (isset($itemData->$value)) $str.= $itemData->$value;
					break;
					}
				}
			rtrim($str,'/');
			}
			
		return $str;
		}
	
			
	public function getItemUrl($itemData,$arr) {
		//print_r($itemData);
		$str = $arr['string'];
		$opz = $arr['opz'];
		$str = preg_replace('/{{URLSITEADMIN}}/',URL_SITE_ADMIN,$str);	
		/* aggoinge parametri */
		if (isset($opz) && is_array($opz) && count($opz) > 0) {
			$str.= '/';
			foreach ($opz As $key=>$value) {
				switch($key) {
					case 'fieldItemRif':
						if (isset($itemData->$value)) $str.= $itemData->$value;
					break;
					}
				}
			rtrim($str,'/');
			}
			
		return $str;
		}
	}
?>