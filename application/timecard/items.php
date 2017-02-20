<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/timecard/items.php v.1.0.0. 10/02/2017
*/

switch(Core::$request->method) {

	case 'modappData':
		if (isset($_POST['appdata'])) {
			$data = DateFormat::getDataFromDatepicker($_POST['appdata'],$App->nowDate);
			$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','data',$data);
			}	
		$App->viewMethod = 'list';
	break;

	case 'setappData':
		if (isset(Core::$request->param)) {
			$data = DateFormat::checkConvertDataIso(Core::$request->param,$App->nowDate);
			$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','data',$data);
			}	
		$App->viewMethod = 'list';
	break;

	case 'modappProj':
		if (isset($_POST['id_project'])) {
			$_MY_SESSION_VARS = $my_session->addSessionsModuleSingleVar($_MY_SESSION_VARS,'app','id_project',intval($_POST['id_project']));
			}	
		$App->viewMethod = 'list';
	break;

	case 'deleteTime':
		if ($App->id > 0) {
			Sql::initQuery($App->params->tables['item'],array('id'),array($App->id),'id = ?');
			Sql::deleteRecord();
			if (Core::$resultOp->error == 0) {
				Core::$resultOp->message = ucfirst($App->params->labels['item']['item']).' cancellat'.$App->params->labels['item']['itemSex'].'!';		
				}
				
			}		
		$App->viewMethod = 'list';
	break;
	
	case 'modifyTime':	
		$App->viewMethod = 'form';
	break;
	
	case 'insert1Time':
		if ($_POST) {	
			$datarif = DateFormat::checkConvertDataFromDatepicker($_POST['data1'],$_MY_SESSION_VARS['app']['data']);
			if (Core::$resultOp->error == 0) {
				/* trova la timecard */
				if (isset($_POST['timecard']) && $_POST['timecard'] != '') {
					
					$App->timecard = new stdClass;
					Sql::initQuery($App->params->tables['pite'],array('*'),array(intval($_POST['timecard'])),'id = ?');
					$App->timecard = Sql::getRecord();		
					if (Core::$resultOp->error == 0) {
						
						if ($App->timecard->id > 0) {
							
							if (isset($_POST['project1']) && $_POST['project1'] != '') {
								
								/* imposta l'ora di inizio */
								if (isset($_POST['usedata']) && $_POST['usedata'] == 1)	{
									$holdhour = 1;
									/* sceglie l'orario partenza del form */
									$starthour = $_POST['starthour1'].':00';	
																
									} else {
										$holdhour = 0;
										$starthour = $App->timecard->starthour;
										}
	
								/* controlla l'ora iniziale */
								DateFormat::checkDataTimeIso($datarif .' '.$starthour,$_MY_SESSION_VARS['app']['data']);
								if (Core::$resultOp->error == 0) {
									
									$endhour = $App->timecard->endhour;
									
									if ($holdhour == 1) {
										/* scompone il worktime in minuti seconti */
										$timeVars =  explode(':',$App->timecard->worktime);		
										$hours = $timeVars[0];
										$minutes = $timeVars[1];
										
										try {
											echo $t = $datarif.' '.$starthour;
    										$time = DateTime::createFromFormat('Y-m-d H:i:s',$t);    										
    										/* aggiungi le ore e minuti */
											$st = "PT".intval($hours)."H".intval($minutes)."M";
											$time->add(new DateInterval($st));
											$endhour = $time->format("H:i:s");
		
											} catch (Exception $e) {
												//echo $e;
												}
										
										}
		
										/* salva il tutto */
										$fields = array('id_project','datains','starthour','endhour','worktime','content');
					   	 			$fieldsValues = array($_POST['project1'],$datarif,$starthour,$endhour,$App->timecard->worktime,$App->timecard->content);
						  	  	 		Sql::initQuery($App->params->tables['item'],$fields,$fieldsValues,'');
				 						Sql::insertRecord();					
										if (Core::$resultOp->error == 0) {
				 								Core::$resultOp->message = 'Tempo inserito! ';	 
				 							}		
										


									} else {
						      		Core::$resultOp->message = 'La ora inizio inserita non è valida! ';	 
						      		Core::$resultOp->error = 1;
										}		


								} else {
					     			Core::$resultOp->message = 'Devi scegliere un progetto!';	 
					      		Core::$resultOp->error = 1;
									}				
					
					
							} else {
		     					Core::$resultOp->message = 'Timecard non selezionata!';	 
		      				Core::$resultOp->error = 1;
								}				
					
					
						}
				
					} else {
		     			Core::$resultOp->message = 'Devi scegliere una timecard!';	 
		      		Core::$resultOp->error = 1;
						}				
				
	
				} else {
		     		Core::$resultOp->message = 'La data inserita non è valida!';	 
		      	Core::$resultOp->error = 1;
					}
			} else {
				Core::$resultOp->error = 1;
				}
		$App->viewMethod = 'list';
	break;

	case 'insertTime':
		if ($_POST) {	
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
			} else {
				Core::$resultOp->error = 1;
				}
		$App->viewMethod = 'list';
	break;
	
	case 'updateTime':
		if ($_POST) {
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
		   	 			$fieldsValues = array($_POST['progetto'],$datarif,$_POST['startHour'],$_POST['endHour'],$workHour,$_POST['content'],intval($_POST['id']));
			  	  	 		Sql::initQuery($App->params->tables['item'],$fields,$fieldsValues,'id = ?');
	 						Sql::updateRecord();					
							if (Core::$resultOp->error == 0) {
	 								Core::$resultOp->message = 'Tempo modificato! ';	 
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
			} else {
				Core::$resultOp->error = 1;
				}	
		$App->viewMethod = 'list';
	break;

	default;
		$App->viewMethod = 'list';
	break;	
	}


/* SEZIONE SWITCH VISUALIZZAZIONE TEMPLATE (LIST, FORM, ECC) */

switch((string)$App->viewMethod) {
	case 'form':
		$App->item = new stdClass;
		Sql::initQuery($App->params->tables['item'],array('*'),array($App->id),'id = ?');
		$App->item = Sql::getRecord();		
		if (Core::$resultOp->error == 1) Utilities::setItemDataObjWithPost($App->item,$App->params->fields['item']);
		
		$App->defaultFormData = $App->item->datains;
		$App->timeIniTimecard = $App->item->starthour;
		$App->timeEndTimecard = $App->item->endhour;

		$App->methodForm = 'updateTime';
		$App->templateApp = 'formItem.tpl.php';	
	break;
	
	case 'list':
		/* sistemo ora inizio e fine */
		$time = DateTime::createFromFormat('H:i:s',$App->nowTime);
		$App->timeIniTimecard =  $time->format('H:i');
		$time->add(new DateInterval('PT1H'));
		$App->timeEndTimecard = $time->format('H:i<i></i>');	
		
		$App->defaultFormData = $_MY_SESSION_VARS['app']['data'];
		$App->methodForm = 'insertTime';
		$App->templateApp = 'formItem.tpl.php';
	break;
	
	default:
	break;
	}

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
		$nameday = $_lang['days'][$numberday];
		$nameabbday = ucfirst((strlen($nameday) > 3 ? mb_strcut($nameday,0,3) : $nameday));
		
		$App->dates_month[$i] = array('label'=>$dateL,'value'=>$dateV,'numberday'=>$numberday,'nameabbday'=>$nameabbday,'nameday'=>$nameday);	
		
		/* memorizza le time card per ogni data /*/	
		$where = "datains = '".$dateV."'";
		if ($_MY_SESSION_VARS['app']['id_project'] > 0) $where .= " AND id_project = '".intval($_MY_SESSION_VARS['app']['id_project'])."'";
		Sql::initQuery($App->params->tables['item'].' AS t LEFT JOIN '.$App->params->tables['prog'].' AS p ON (t.id_project = p.id)',array('t.*,p.title AS project'),array(),$where);
		Sql::setOrder('starthour ASC');
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
 		
 	/* trova tutti i progetti con timecard attivata */
 	$App->progetti = new stdClass;
	Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1 AND timecard = 1','current DESC');
	$App->progetti = Sql::getRecords();
	
	/* trova tutti i progetti */
 	$App->allprogetti = new stdClass;
	Sql::initQuery($App->params->tables['prog'],array('*'),array(),'active = 1','current DESC');
	$App->allprogetti = Sql::getRecords();
	
	/* trova tutte le timecard predefinite */
	$App->allpreftimecard = new stdClass;
	Sql::initQuery($App->params->tables['pite'],array('*'),array(),'active = 1');
	$App->allpreftimecard = Sql::getRecords();
	
	$App->methodForm1 = 'insert1Time';
	$App->defaultFormData1 = $_MY_SESSION_VARS['app']['data'];
	
?>