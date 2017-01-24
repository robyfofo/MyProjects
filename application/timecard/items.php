<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/items.php v.3.0.0. 20/10/2016
*/

switch(Core::$request->method) {

	case 'modappdata':
		if (isset($_POST['appdata'])) {
			$data = DateFormat::getDataFromDatepicker($_POST['appdata'],$App->nowDate);
			$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','data',$data);
			}	
		$App->viewMethod = 'list';
	break;

	case 'setappdata':
		if (isset(Core::$request->param)) {
			$data = DateFormat::checkConvertDataIso(Core::$request->param,$App->nowDate);
			$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','data',$data);
			}	
		$App->viewMethod = 'list';
	break;

	case 'modappproject':
		if (isset($_POST['id_project'])) {
			$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','id_project',intval($_POST['id_project']));
			}	
		$App->viewMethod = 'list';
	break;

	case 'deleteTime':
		if ($App->id > 0) {
			$App->itemOld = new stdClass;
				Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
				Sql::deleteRecord();
				if (Core::$resultOp->error == 0) {
					Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';		
					}
				
			}		
		$App->viewMethod = 'list';
	break;

	case 'addtime':
		//print_r($_POST);
		//$_POST['dataRif'] = '2000-02-31';	
		//$_POST['startHour'] = '23:15';
		
		$datarif = DateFormat::checkConvertDataFromDatepicker($_POST['data'],$_MY_SESSION_VARS['app']['data']);
		if (Core::$resultOp->error == 0) {
			
			/* controlla l'ora iniziale */
			DateFormat::checkDataTimeIso($datarif .' '.$_POST['startHour'],$_MY_SESSION_VARS['app']['data']);
			if (Core::$resultOp->error == 0) {
				
				
				
				/* controlla l'ora FINALE */
				DateFormat::checkDataTimeIso($datarif .' '.$_POST['endHour'],$_MY_SESSION_VARS['app']['data']);
				if (Core::$resultOp->error == 0) {
					
				
					/* controlla l'intervallo */
					$datatimeisoini = $datarif .' '.$_POST['startHour'].':00';
					$datatimeisoend = $datarif .' '.$_POST['endHour'].':00';
					DateFormat::checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$_MY_SESSION_VARS['app']['data']);
					if (Core::$resultOp->error == 0) {
						
						$startTime = strtotime($_POST['startHour']);
		   			$endTime = strtotime($_POST['endHour']);
						$diff = $endTime - $startTime;
						$workHour = date('H:i', $diff);
						
						$fields = array('id_project','datains','starthour','endhour','worktime','content');
	   	 			$fieldsValues = array($_POST['progetto'],$datarif,$_POST['startHour'],$_POST['endHour'],$workHour,$_POST['content']);
		  	  	 		Sql::initQuery($App->params->tables['item'],$fields,$fieldsValues,'');
 						Sql::insertRecord();
					
						if (Core::$resultOp->error == 0) {
 								Core::$resultOp->message = 'Tempo inserito! ';	 
 							}
					
					
						} else {
	      				Core::$resultOp->message = 'La ora inizio deve essere prima della ora fine! ';	 
	      				Core::$resultOp->error = 1;
							}			   		
					} else {
	      			Core::$resultOp->message = 'La ora fine inserita non è valida! ';	 
	      			Core::$resultOp->error = 1;
						}				
				} else {
	      		Core::$resultOp->message = 'La ora inizio inserita non è valida! ';	 
	      		Core::$resultOp->error = 1;
					}		
			} else {
	     		Core::$resultOp->message = 'La data inserita non è valida! ';	 
	      	Core::$resultOp->error = 1;
				}
		$App->viewMethod = 'form';
	break;

	default;	
		$App->viewMethod = 'form';	
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	default:
	case 'form':
	

		/* trova tutti i giorni del mese corrente */
		$data = DateTime::createFromFormat('Y-m-d',$_MY_SESSION_VARS['app']['data']);
		$month = $data->format('m');
		$year = $data->format('Y');	
		$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    	$App->dates_month = array();
    	$tottimes = array();
		for ($i = 1; $i <= $num; $i++) {
			
			$data1 = DateTime::createFromFormat('Y-m-d',$year.'-'.$month.'-'.$i);
			
			//$mktime = mktime(0, 0, 0, $month, $i, $year);
			$dateL = $data1->format('d/m/Y');
			$dateV = $data1->format('Y-m-d');
			$numberday = $data1->format('w');
			$nameday = $globalSettings['days'][$numberday];
			$nameabbday = ucfirst((strlen($nameday) > 3 ? mb_strcut($nameday,0,3) : $nameday));
			
			$App->dates_month[$i] = array('label'=>$dateL,'value'=>$dateV,'numberday'=>$numberday,'nameabbday'=>$nameabbday,'nameday'=>$nameday);	
			
			/* memorizza le time card per ogni data /*/	
			$where = "datains = '".$dateV."'";
			if ($_MY_SESSION_VARS['app']['id_project'] > 0) $where .= " AND id_project = '".intval($_MY_SESSION_VARS['app']['id_project'])."'";
			Sql::initQuery($App->params->tables['item'].' AS t LEFT JOIN '.$App->params->tables['prog'].' AS p ON (t.id_project = p.id)',array('t.*,p.title AS project'),array(),$where);
 			$obj = Sql::getRecords();
 			$times = array();
 			if (is_array($obj) && count($obj) > 0) {
				foreach ($obj AS $key=>$value) {	
					$tottimes[] = $value->worktime;
					$times[] = $value->worktime;							
					}
				}				
			$App->timecards[$dateV]['timecards'] = $obj;
			$App->timecards_total[$dateV] = DateFormat::sum_the_time($times);
    		}

		$App->timecards_total_time = DateFormat::sum_the_time($tottimes);
    		
    	/* trova tutti i progetti */
    	$App->progetti = new stdClass;
		Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1 AND timecard = 1');
		$App->progetti = Sql::getRecords();
		
		/* trova tutti i progetti */
    	$App->allprogetti = new stdClass;
		Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1');
		$App->allprogetti = Sql::getRecords();
	
		$App->methodForm = 'insertItem';
		$App->templatePage = 'formItem.tpl.php';	
	break;
	}	
?>