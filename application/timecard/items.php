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
			
		/* controlla la data */			
		$dataObj = DateTime::createFromFormat('Y-m-d',$_POST['dataRif']);
		$errors = DateTime::getLastErrors();
	   if ($errors['error_count'] == 0 && $errors['warning_count'] == 0) {  
	     
	   	/* controlla l'ora iniziale */
	   	$dataObj = DateTime::createFromFormat('Y-m-d H:i',$_POST['dataRif'] .' '.$_POST['startHour']);
	   	$errors = DateTime::getLastErrors();   	
	   	 if ($errors['error_count'] == 0 && $errors['warning_count'] == 0) {	
	   	 
	   	 	$dataini = $dataObj->getTimestamp();
	   	    		
	   		/* controlla l'ora FINALE */
	   		$dataObj = DateTime::createFromFormat('Y-m-d H:i',$_POST['dataRif'] .' '.$_POST['endHour']);
	   		$errors = DateTime::getLastErrors();
	   	 	if ($errors['error_count'] == 0 && $errors['warning_count'] == 0) {	
	   	 	
	   	 		$dataend = $dataObj->getTimestamp();
	   	 		
	   	 		if($dataini <= $dataend) {
	
						$startTime = strtotime($_POST['startHour']);
		   			$endTime = strtotime($_POST['endHour']);
						$diff = $endTime - $startTime;
						$workHour = date('H:i', $diff);
						
						/*
		   	 		echo '<br>dataRif '.$_POST['dataRif'];
		   	 		echo '<br>startHour '.$_POST['startHour'];
		   			echo '<br>endHour '.$_POST['endHour'];
		   			echo '<br>progetto '.$_POST['progetto'];
		   			echo '<br>content '.$_POST['content'];	   			
		   			echo '<br>dataini '.$dataini;
		   			echo '<br>dataend '.$dataend;	   			
		   	 		echo '<br>workHour '.$workHour;
		   	 		*/
	   	 		
	   	 		$fields = array('id_project','datains','starthour','endhour','worktime','content');
	   	 		$fieldsValues = array($_POST['progetto'],$_POST['dataRif'],$_POST['startHour'],$_POST['endHour'],$workHour,$_POST['content']);
		  	  	 	Sql::initQuery($App->params->tables['item'],$fields,$fieldsValues,'');
 					Sql::insertRecord();
 					if(Core::$resultOp->error == 0) {
 						Core::$resultOp->message = 'Tempo inserito! ';	 
	 					} else {
		      			Core::$resultOp->message = 'La ora fine inserita non è valida! ';	 
		      			Core::$resultOp->error = 1;
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
			$totalWorkHour = '';
			
			/* memorizza le time card per ogni data /*/	
			Sql::initQuery($App->params->tables['item'],array('*'),array(),"datains = '".$dateV."'");
 			$obj = Sql::getRecords(); 			
 			/* calcola la durata */
			if (is_array($obj) && count($obj) > 0) {
				$totalTime =  strtotime('');
				foreach ($obj AS $key=>$value) {
					$worktime = strtotime($value->worktime);
					$totalTime = $totalTime - $worktime;
					$obj1 = $value;																				
					}
				$obj = $obj1;
				$totalWorkHour	= date('H:i', $totalTime);	
				}		
			$App->timecards[$dateV]['timecards'] = $obj;
			$App->timecards[$dateV]['totalWorkHour'] = $totalWorkHour;
    		}
    		
    		
    	//print_r($App->timecards);
    		
    	/* trova tutti i progetti */
    	$App->progetti = new stdClass;
		Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1 AND timecard = 1');
		$App->progetti = Sql::getRecords();
		
		$App->methodForm = 'insertItem';
		$App->templatePage = 'formItem.tpl.php';	
	break;
	}	
?>