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
	
	case 'addtime':
		//print_r($_POST);
		//$_POST['dataRif'] = '2000-02-31';	
		//$_POST['startHour'] = '23:15';
		
		$datarif = DateFormat::checkDataIso($_POST['dataRif'],$App->nowDate);
		if (Core::$resultOp->error == 0) {
			
			/* controlla l'ora iniziale */
			DateFormat::checkDataTimeIso($datarif .' '.$_POST['startHour'],$App->nowDateTime);
			if (Core::$resultOp->error == 0) {
				
				
				
				/* controlla l'ora FINALE */
				DateFormat::checkDataTimeIso($datarif .' '.$_POST['endHour'],$App->nowDateTime);
				if (Core::$resultOp->error == 0) {
					
				
					/* controlla l'intervallo */
					echo $datatimeisoini = $datarif .' '.$_POST['startHour'].':00';
					echo $datatimeisoend = $datarif .' '.$_POST['endHour'].':00';
					DateFormat::checkDataTimeIsoIniEndInterval($datatimeisoini,$datatimeisoend,$App->nowDateTime);
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
	
		$App->data = $App->nowDate;		
		$dataForm = '';
		if (isset($_POST['data'])) echo $dataForm = $_POST['data'];
		if (Core::$request->method == 'setData' && Core::$request->param != '') $dataForm = Core::$request->param;		
		if($dataForm != '') {		
			//echo $dataForm;
			/* controlla la data */			
			$dataObj = DateTime::createFromFormat('Y-m-d',$dataForm);
			$errors = DateTime::getLastErrors();
	   	if ($errors['error_count'] > 0 || $errors['warning_count'] > 0) {
	      	Core::$resultOp->message = 'La data inserita non è valida! ';	 
	      	Core::$resultOp->error = 1;
	      	} else {
	      		$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,$App->sessionName,'data', $dataObj->format('Y-m-d'));
	         	}		
			}

		if (isset($_MY_SESSION_VARS[$App->sessionName]['data'])) $App->data = $_MY_SESSION_VARS[$App->sessionName]['data'];

		/* trova tutti i giorni del mese corrente */
		$data = DateTime::createFromFormat('Y-m-d',$App->data);
		$month = $data->format('m');
		$year = $data->format('Y');	
		$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    	$App->dates_month = array();
		for ($i = 1; $i <= $num; $i++) {
			$mktime = mktime(0, 0, 0, $month, $i, $year);
			$dateL = date("d/m/Y", $mktime);
			$dateV = date("Y-m-d", $mktime);
			$App->dates_month[$i] = array('label'=>$dateL,'value'=>$dateV);	
			
					
			//$totalWorkHour = '';
			
			/* memorizza le time card per ogni data /*/	
			Sql::initQuery($App->params->tables['item'],array('*'),array(),"datains = '".$dateV."'");
 			$obj = Sql::getRecords(); 
 			if (is_array($obj) && count($obj) > 0) {
 			
 				//print_r($obj);
 		
 				/* calcola la durata */
			
				//$totalTime =  '';
				//foreach ($obj AS $key=>$value) {					
					//$worktime = strtotime($value->worktime);
					//$totalTime = $totalTime + $worktime;
					//$obj1 = $value;																				
					//}
					
				
				
				//$obj = $obj1;
				//$totalTime = intval($totalTime);
				//$totalWorkHour = gmdate("H:i", $totalTime);

///echo 'totalWorkHour'.$totalWorkHour;				
				
				
				}	
				
					
			$App->timecards[$dateV]['timecards'] = $obj;
			//$App->timecards[$dateV]['totalWorkHour'] = $totalWorkHour;
    		}
    		
print_r($App->timecards);
    		
    	/* trova tutti i progetti */
    	$App->progetti = new stdClass;
		Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1 AND timecard = 1');
		$App->progetti = Sql::getRecords();
		
		$App->methodForm = 'insertItem';
		$App->templatePage = 'formItem.tpl.php';	
	break;
	}	
?>