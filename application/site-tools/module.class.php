<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/ite-tools/module.class.php v.3.0.0. 04/11/2016
*/

class Module {
	private $action;
	public $error;
	public $message;
	public $messages;
	
	public function __construct($action,$table) 	{
		$this->action = $action;
		$this->table = $table;
		$this->error = 0;	
		$this->message ='';
		$this->messages = array();	
		}
		
	public function deleteImageCached($dir) {
		$date = new DateTime(date('Y-m-d H:i:s'));
		$date->modify('-30 days');
		$dateDeleting = $date->format('Y-m-d H:i:s');		
		
    	$odir = opendir($dir); # This is the directory it will count from
    	$i = 0;
	    # While false is not equal to the filedirectory
	    while (false !== ($file = readdir($odir))) { 
	        if (!in_array($file, array('.', '..')) && !is_dir($file)) {
				if (file_exists($dir.$file)) {
					$dataRif = date("Y-m-d H:i:s.",filemtime($dir.$file));
					if ($dataRif <= $dateDeleting) {
					 	//echo "<br>Cancello: ".$dir.$file; 
					 	@unlink($dir.$file);	
					 	$i++;		
						}    				
					}
	        	}
	    	}
		return $i;
		}
		
	public function folderSize($dir){
    	$size = 0;
    	foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
			$size += is_file($each) ? filesize($each) : $this->folderSize($each);
    		}
		return $size;
		}
		
	public function countFileFolder($dir){
    	$dir = opendir($dir); # This is the directory it will count from
    	$i = 0; # Integer starts at 0 before counting
	    # While false is not equal to the filedirectory
	    while (false !== ($file = readdir($dir))) { 
	        if (!in_array($file, array('.', '..')) && !is_dir($file)) {
	        	$i++;
	        	}
	    	}
		return $i;
		}
	}
?>