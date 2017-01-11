<?php
//-------------------------------------------// *** framework siti html-PHP-Mysql// copyright 2009 Roberto Mantovani// http://www.robertomantovani.vr;it// email: me@robertomantovani.vr.it// timecard/application.class.php v.1.0.0. 10/03/2016
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