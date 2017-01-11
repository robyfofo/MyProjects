<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/classes/class.DateFormat.php v.3.0.0. 15/10/2016
*/

class DateFormat extends Core  {
	private static $dataVars = array();
	private static $timeVars = array();
	private static $year = 2000;
	private static $month = 1;
	private static $day = 1;
	private static $hours = 0;
	private static $minutes = 0;
	private static $seconds = 0;
	
	public function __construct() {	
		parent::__construct();
		}

	public static function explodeDataTimeIso($datatime) {
		$d = explode(' ',$datatime);
		list($data,$time) = $d;
		self::$dataVars = explode('-',$data);
		self::$timeVars =  explode(':',$time);		
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		self::$hours = self::$timeVars[0];
		self::$minutes = self::$timeVars[1];	
		self::$seconds = self::$timeVars[2];
		}
		
	public static function explodeDataIso($data) {
		self::$dataVars = explode('-',$data);
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		}


	public static function convertDatatimeFromISOtoITA($value,$format='') {
		$d = explode(' ',$value);
		list($data,$time) = $d;
		self::$dataVars = explode('-',$data);
		self::$timeVars =  explode(':',$time);		
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];
		$str =  self::$day.'/'.self::$month.'/'.self::$year;	
		if ($time != '') $str .= ' '.$time;
		return $str;	
		}
		
	public static function convertDatatimeFromITAtoISO($value) {
		$d = explode(' ',$value);
		list($data,$time) = $d;
		self::$dataVars = explode('/',$data);
		self::$timeVars =  explode(':',$time);		
		self::$day = self::$dataVars[0];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[2];
		$str = self::$year.'-'.self::$month.'-'.self::$day;
		if ($time != '') $str .= ' '.$time;
		return $str;
		}
		
	public static function convertDataFromISOtoITA($value,$format='') {
		self::$dataVars = explode('-',$value);
		self::$day = self::$dataVars[2];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[0];	
		return self::$day.'/'.self::$month.'/'.self::$year;	
		}
		
	public static function convertDataFromITAtoISO($value) {
		self::$dataVars = explode('/',$value);
		self::$day = self::$dataVars[0];
		self::$month = self::$dataVars[1];	
		self::$year = self::$dataVars[2];	
		return self::$year.'-'.self::$month.'-'.self::$day;
		}


	public static function getDataIsoFormatString($dataIso='',$format='',$langMonts,$langDays) {
		if ($dataIso != '') self::explodeDataIso($dataIso);
		$s = '';
		$s = self::getDataString($format,$langMonts,$langDays);
		return $s;
		}

	public static function getDataTimeIsoFormatString($datatimeIso='',$format='',$langMonts,$langDays,$opz) {
		if ($datatimeIso != '') self::explodeDataTimeIso($datatimeIso);
		$s = self::getDataString($format,$langMonts,$langDays);
		return $s;
		}
		
	public static function getTimeFormatStringFromDataTimeIso($datatimeIso='',$format='') {
		if ($datatimeIso != '') self::explodeDataTimeIso($datatimeIso);
		$s = self::getTimeString($format);
		return $s;
		}


	public static function getTimeString($format) {
		if ($format == '') $format = 'HH:MM:SS';
		$s = '';
		switch ($format) {
			case 'HH:MM:SS':
					$s = self::$hours.':'.self::$minutes.':'.self::$seconds;
			break;
			}
		
		}
	public static function getDataString($format='',$langMonts,$langDays) {
		$s = '';
		$month = intval(self::$month);
		$day = intval(self::$day);

		$format = preg_replace('/{{DAY}}/',self::$day,$format);
		$format = preg_replace('/{{STRINGMONTH}}/',ucfirst($langMonts[$month]),$format);
		$format = preg_replace('/{{STRINGDATADAY}}/',self::getDayOfDate($langDays,array()),$format);
		$format = preg_replace('/{{MONTH}}/',self::$month,$format);
		$format = preg_replace('/{{YEAR}}/',self::$year,$format);
		$s = $format;
		
		switch ($format) {
			case 'dd StringMonth YYYY':
				$s = self::$day. ' '.ucfirst($langMonts[$month]).' '.self::$year;
			break;
			
			case 'StringDay StringMonth YYYY':
				$s = self::$day. ' '.ucfirst($langMonts[$month]).' '.self::$year;
			break;
			
			case 'StringMonth dd, YYYY':
				$s = ucfirst($langMonts[$month]).' '.self::$day. ', '.self::$year;
			break;
			
			case 'dd/mm/YYYY':
			/* dd/mm/YYYY */
				$s = self::$day.'/'.self::$month.'/'.self::$year;
			break;
			
			case 'hh:mm':
			/* dd/mm/YYYY */
				$s = self::$hours.':'.self::$minutes;
			break;
						
			case 'YYYY-mm-dd':
				$s = self::$year.'-'.self::$month.'-'.self::$day;
			break;

			}
		return $s;		
		}

	public static function getDay() {	
		return self::$day;		
		}
		
	public static function getMonth() {	
		return self::$month;		
		}
		
	public static function getMonthStrings($arrayMonths,$params='') {	
		$maxchar = (isset($params['maxchar']) ? $params['maxchar'] : '');
		$str = $arrayMonths[intval(self::$month)];
		if ($maxchar != '') {
			$str = ToolsStrings::getStringFromTotChar($str,$maxchar);
			$str = rtrim($str,'.');
			}

		return $str;		
		}
		
	public static function getYear() {	
		return self::$year;		
		}
		
	public static function getDayOfDate($langDays,$opz) {
		$opzDef = array();	
		$opz = array_merge($opzDef,$opz);
		$dt = self::$year.'-'.self::$month.'-'.self::$day;
		$date = DateTime::createFromFormat('Y-m-d',$dt);
		$errors = DateTime::getLastErrors();
		if ($errors['error_count'] > 0 && $errors['warning_count']) { 
			return 'n.d.';		
			} else {
				$d = $date->format('w');
				$ds = $langDays[$d];
				return $ds;
				}
	
		}

	}