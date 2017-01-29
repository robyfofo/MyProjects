<!-- admin/timecard/formItem.tpl.php v.3.0.0. 16/01/2017 -->

<?php
//echo '<br>global data: '.$this->mySessionVars['app']['data'];
//echo '<br>global data ITA: '.DateFormat::convertDataFromISOtoITA($this->mySessionVars['app']['data'],'');
//echo '<br>gid_project ITA: '.$this->mySessionVars['app']['id_project'];
//echo '<br>defaultFormData: '.$this->App->defaultFormData;
?>
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		<?php if (isset($this->App->module_params->help_small) && $this->App->module_params->help_small != '') echo ToolsStrings::xss($this->App->module_params->help_small); ?>
	</div>
	<div class="col-md-2 help">
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<form id="applicationForm" class="form-horizontal form-daydata bg-info" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/modappData"  enctype="multipart/form-data" method="post">
			<div class="form-group">
				<div class="col-md-10">	
					<input type="text" name="appdata" class="" placeholder="Inserisci una data globale" id="appdataDPID" value="">
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">Invia</button>
				</div>
			</div>	
		</form>
		<form id="applicationForm" class="form-horizontal form-daydata bg-info" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/modappProj"  enctype="multipart/form-data" method="post">
			<div class="form-group">
				<div class="col-md-10">		
					<select name="id_project" class="form-control chosen-select" id="id_projectID" data-placeholder="Scegli un progetto">
						<option value="0"<?php if ($this->mySessionVars['app']['id_project'] == 0) echo ' selected="selected"'; ?>>Tutti</option>
						<?php if (is_array($this->App->allprogetti) && count($this->App->allprogetti) > 0): ?>
							<?php foreach($this->App->allprogetti AS $value): ?>		
								<option value="<?php echo $value->id; ?>"<?php if ($value->id == $this->mySessionVars['app']['id_project']) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title); ?></option>														
							<?php endforeach; ?>
						<?php endif; ?>		
					</select>										
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">Invia</button>
				</div>
			</div>
		</form>
		<hr>

		<table class="table table-striped table-bordered table-hover table-condensed timecards">
			<?php if (is_array($this->App->dates_month) && count($this->App->dates_month) > 0): ?>
				<tbody>
				<?php foreach ($this->App->dates_month AS $day): ?>
					<tr class="<?php if ($day['value'] == $this->mySessionVars['app']['data']) echo 'info'; ?>">
						<td class="datarif">
							<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/setappData/<?php echo $day['value']; ?>" title="vai a questa data"><?php echo $day['label']; ?></a>
							&nbsp;<?php echo $day['nameabbday']; ?>
			
						</td>
						<td>			
							<?php if (is_array($this->App->timecards[$day['value']]['timecards']) && count($this->App->timecards[$day['value']]['timecards']) > 0): ?>
								<table class="table table-striped table-condensed subtimecards">
									<tbody>
										<?php foreach ($this->App->timecards[$day['value']]['timecards'] AS $value): ?>
											<tr>
												<!-- <td><?php echo $value->project; ?></td> -->
												<td data-toggle="tooltip" data-placement="top" title="<?php echo $value->project; ?>"><?php echo $value->content; ?></td>
												<td class="hours text-right"><?php echo substr($value->worktime,0,5);?></td>
												<td class="text-right" style="width:50px;">
													<a class="btn btn-default btn-circle btn-circle-timecard-mod" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/modifyTime/<?php echo $value->id; ?>" title="Modifica">M</a>
													<a onclick="bootbox.confirm();" class="btn btn-default btn-circle btn-circle-timecard-del confirm" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/deleteTime/<?php echo $value->id; ?>" title="Cancella">X</a>
												</td>
											</tr>
										<?php endforeach; ?>										
										<tr>
											<td colspan="1">&nbsp;</td>
											<td class="hours text-right success"><?php echo substr($this->App->timecards_total[$day['value']],0,5); ?></td>
											<td>&nbsp;</td>
										</tr>
									</tbody>
								</table>
							<?php endif; ?>	
						</td>						
					</tr>
				<?php endforeach; ?>
				<tr>
					<td></td>
					<td>
						<table class="table table-condensed subtimecards">
							<tbody>
								<tr>
									<td>Ore totali</td>							
									<td class="hours text-right success"><?php echo substr($this->App->timecards_total_time,0,5);?></td>
									<td style="width:45px;">&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			<?php endif; ?>		
		</table>
	</div>
	
	<div class="col-md-6">	
		<form id="applicationForm" method="post" class="form-horizontal bg-info form-timecard" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="dataID" class="col-md-3 control-label">Data</label>
					<div class="col-md-5">	
						<input type="text" name="data" class="" placeholder="Inserisci una data" id="dataDPID" value="">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
			</fieldset>		
			<fieldset>
				<div class="form-group">
					<label for="progettoID" class="col-md-3 control-label">Progetto</label>
					<div class="col-md-7">
						<select name="progetto" class="form-control chosen-select" data-placeholder="Scegli un progetto">
							<?php if (is_array($this->App->progetti) && count($this->App->progetti) > 0): ?>
								<?php foreach($this->App->progetti AS $value): ?>		
									<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->id_project) && $this->App->item->id_project == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title); ?></option>														
								<?php endforeach; ?>col-md-3
							<?php endif; ?>		
						</select>										
			    	</div>
				</div>
			</fieldset>				
			<fieldset>
				<div class="form-group">
					<label for="startHourID" class="col-md-3 control-label">Partenza - Ore:Minuti</label>
					<div class="col-md-7">
						<input type="text" class="" name="startHour" placeholder="Inserisci ora partenza" id="startHourID" value="">	
						<span class="glyphicon glyphicon-time"></span>				
			    	</div>
				</div>
				<div class="form-group">
					<label for="endHourID" class="col-md-3 control-label">Fine - Ore:Minuti</label>
					<div class="col-md-7">
						<input type="text" class="" name="endHour" placeholder="Inserisci ora fine" id="endHourID" value="">	
						<span class="glyphicon glyphicon-time"></span>							
			    	</div>
				</div>
			</fieldset>			
			<fieldset>
				<div class="form-group">
					<label for="contentID" class="col-md-3 control-label">Contenuto</label>
					<div class="col-md-8">
						<textarea name="content" class="form-control" id="contentID" rows="5"><?php if (isset($this->App->item->content)) echo $this->App->item->content; ?></textarea>
					</div>
				</div>
			</fieldset>			
			<div class="form-group text-center">
				<?php if($this->App->methodForm == 'updateTime' && (isset($this->App->item->id) && $this->App->item->id > 0)): ?>
					<input type="hidden" name="id" value="<?php echo $this->App->item->id ?>">					
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Modifica</button>
				<?php else: ?>
				<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
				<?php endif; ?>				
			</div>
		</form>

<hr class="divider-top-module">

		<form id="applicationForm" method="post" class="form-horizontal bg-info form-timecard" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm1; ?>"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="dataID" class="col-md-3 control-label">Data</label>
					<div class="col-md-5">	
						<input type="text" name="data1" class="" placeholder="Inserisci una data" id="data1DPID" value="">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="project1ID" class="col-md-3 control-label">Progetto</label>
					<div class="col-md-7">
						<select name="project1" class="form-control chosen-select" data-placeholder="Scegli un progetto">
							<?php if (is_array($this->App->progetti) && count($this->App->progetti) > 0): ?>
								<?php foreach($this->App->progetti AS $value): ?>		
									<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->id_project) && $this->App->item->id_project == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title); ?></option>														
								<?php endforeach; ?>col-md-3
							<?php endif; ?>		
						</select>										
			    	</div>
				</div>
				<div class="form-group">
					<label for="starthour1ID" class="col-md-3 control-label">Partenza - Ore:Minuti</label>
					<div class="col-md-5">
						<input type="text" class="" name="starthour1" placeholder="Inserisci ora partenza" id="starthour1ID" value="">	
						<span class="glyphicon glyphicon-time"></span>				
			    	</div>
			    	<label class="col-md-3 control-label">Usa questa partenza </label>
					<div class="col-md-1">
						<input type="checkbox" name="usedata" id="usedataID" value="1">	
			    	</div>
				</div>
				<div class="form-group">
					<label for="progettoID" class="col-md-3 control-label">Ore lavoro</label>
					<div class="col-md-7">
						<select name="timecard" class="form-control chosen-select" data-placeholder="Scegli una timecard">
							<?php if (is_array($this->App->allpreftimecard) && count($this->App->allpreftimecard) > 0): ?>
								<?php foreach($this->App->allpreftimecard AS $value): ?>		
									<option value="<?php echo $value->id; ?>"><?php echo SanitizeStrings::cleanForFormInput($value->title); ?> (<?php echo SanitizeStrings::cleanForFormInput($value->worktime); ?> ore)</option>														
								<?php endforeach; ?>
							<?php endif; ?>		
						</select>										
			    	</div>
				</div>
			</fieldset>
			<div class="form-group text-center">
				<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>			
			</div>
		</form>
	</div>
</div>