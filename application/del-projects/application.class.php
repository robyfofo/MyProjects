<?php
//-------------------------------------------// *** framework siti html-PHP-Mysql// copyright 2009 Roberto Mantovani// http://www.robertomantovani.vr;it// email: me@robertomantovani.vr.it// news/application.class.php v.2.6.2. 01/02/2016
class Application {
	private $action;
	public $error;
	public $message;
	public $messages;

	public function __construct($action,$appTable) 	{
		$this->action = $action;
		$this->appTable = $appTable;
		$this->error = 0;	
		$this->message ='';
		$this->messages = array();	
		}

	}
?>