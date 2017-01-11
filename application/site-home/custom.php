<?php
	
	

		
		/* 
		MODELLO 

		if(file_exists(PATH."application/modello/index.php") && Permissions::checkAccessUserModule('modello',$_MY_SESSION_VARS['usr'],$App->user_modules_active) == true) {
			--- crea la query ---
			Sql::initQuery(Sql::getTablePrefix().'modello',array('*'),array(),$clause='',$order='created DESC',$limit=' LIMIT 5 OFFSET 0',$options='',false);
			$App->items = Sql::getRecords();
			Sql::initQuery(Sql::getTablePrefix().'modello',array('id'),array($Tpl->lastLogin),'created > ?','','','',false);		
			$numItems = Sql::countRecord();	

			--- configurazione ---

			$App->moduleHome['faq'] = array(
				'label'=>'Ultime F.A.Q.',
				'fieldsData'=>$App->items,
				'fields'=>array(
					'title_it'=>array(
						'label'=>'Titolo','url'=>true
						),					
					),		
				'countnew'=>true,
				'label count'=>'Nuove  F.A.Q.',
				'icon count'=>'fa-question',
				'class count'=>'panel-red',
				'numItems'=>$numItems

				);
			}
*/		
?>