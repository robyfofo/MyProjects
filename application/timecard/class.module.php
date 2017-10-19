<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/module.class.php v.3.0.0. 11/01/2017
*/
class Module {
	private $action;
	
	public function __construct($action,$appTable) 	{
		$this->action = $action;
		$this->appTable = $appTable;
		}
		
	public function checkTimeInterval($userid,$id_progetto,$data,$starttime,$endtime,$opt) {
		$optDef = array('id_timecard'=>0);	
		$opt = array_merge($optDef,$opt);
		$item = new stdClass();				
		$valueRif = array($userid,$id_progetto,$data,$starttime,$endtime,$starttime,$endtime,$starttime,$endtime);										
		$clauseRif = 'id_owner = ? AND id_project = ? AND datains = ? AND (? BETWEEN starttime AND endtime OR ? BETWEEN starttime AND endtime OR starttime BETWEEN ? AND ? OR endtime BETWEEN ? AND ?)';
		if ($opt['id_timecard'] > 0) {
			$clauseRif = $clauseRif.' AND id <> ?';
			$valueRif[] = $opt['id_timecard'];
			}				
		Sql::initQuery($this->appTable,array('*'),$valueRif,'id_owner = ? AND id_project = ? AND datains = ? AND (? BETWEEN starttime AND endtime OR ? BETWEEN starttime AND endtime OR starttime BETWEEN ? AND ? OR endtime BETWEEN ? AND ?)');
		$item = Sql::getRecord();
		$count = Sql::getFoundRows();	
		if ($count  > 0) {
			Core::$resultOp->error = 1;
			$match = 1;
			if ($starttime == $item->endtime && $endtime > $item->endtime) {
				$match = 0;
				}
		if ($endtime == $item->starttime && $endtime < $item->endtime) {
				$match = 0;
				}
			if ($match == 0) {
				Core::$resultOp->error = 0;
				}
			}
		}
	}
?>