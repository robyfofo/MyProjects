<!-- admin/timecard/formItem.tpl.php v.3.0.0. 16/01/2017 -->
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
	<div class="col-md-4">

		<table class="table table-striped table-bordered table-hover table-condensed timecards">
			<?php if (is_array($this->App->dates_month) && count($this->App->dates_month) > 0): ?>
				<tbody>
				<?php foreach ($this->App->dates_month AS $day): ?>
					<tr>
						<td>
							<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/setData/<?php echo $day['value']; ?>" title="vai a questa data"><?php echo $day['label']; ?></a>
						</td>
						<td>			
							<?php if (is_array($this->App->timecards[$day['value']]['timecards']) && count($this->App->timecards[$day['value']]['timecards']) > 0): ?>
								<table class="table table-striped table-bordered table-hover table-condensed subtimecards">
									<tbody>
										<?php foreach ($this->App->timecards[$day['value']]['timecards'] AS $value): ?>
											<tr>
												<td><?php echo $value->project; ?></td>
												<td><?php echo $value->content; ?></td>
												<td class="text-right"><?php echo $value->worktime;?></td>
											</tr>
										<?php endforeach; ?>										
										<tr>
											<td colspan="2">&nbsp;</td>
											<td class="text-right"><?php echo $this->App->timecards_total[$day['value']]; ?></td>
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
									<td class="text-right"><?php echo $this->App->timecards_total_time;?></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			<?php endif; ?>		
		</table>
	</div>
	
	<div class="col-md-8">	
		<form id="applicationForm" class="form-inline form-daydata bg-info" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="dataID" class="">Data</label>			
					<input type="text" name="data" class="form-control" placeholder="Inserisci una data" id="dataDPID" value="">
					<span class="glyphicon glyphicon-calendar"></span>
			  </div>
		  	<button type="submit" class="btn btn-primary">Invia</button>
		  	</fieldset>
		</form>
		<hr>
		<form id="applicationForm" method="post" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/addtime"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="progettoID" class="col-md-3 control-label">Progetto</label>
					<div class="col-md-7">
						<select name="progetto" class="form-control chosen-select" data-placeholder="Scegli un progetto">
							<?php if (is_array($this->App->progetti) && count($this->App->progetti) > 0): ?>
								<?php foreach($this->App->progetti AS $value): ?>		
									<option value="<?php echo $value->id; ?>"><?php echo SanitizeStrings::cleanForFormInput($value->title); ?></option>														
								<?php endforeach; ?>
							<?php endif; ?>		
						</select>										
			    	</div>
				</div>
			</fieldset>			
			<hr>		
			<fieldset>
				<div class="form-group">
					<label for="startHourID" class="col-md-3 control-label">Partenza - Ore:Minuti</label>
					<div class="col-md-7">
						<input type="text" class="" name="startHour" placeholder="Inserisci ora partenza" id="startHourID" rows="1" value="">	
						<span class="glyphicon glyphicon-time"></span>				
			    	</div>
				</div>
				<div class="form-group">
					<label for="endHourID" class="col-md-3 control-label">Fine - Ore:Minuti</label>
					<div class="col-md-7">
						<input type="text" class="" name="endHour" placeholder="Inserisci ora fine" id="endHourID" rows="1" value="">	
						<span class="glyphicon glyphicon-time"></span>							
			    	</div>
				</div>
			</fieldset>		
			<hr>		
			<fieldset>
				<div class="form-group">
					<label for="contentID" class="col-md-3 control-label">Contenuto</label>
					<div class="col-md-8">
						<textarea name="content" class="form-control" id="contentID" rows="5"></textarea>
					</div>
				</div>
			</fieldset>			
			<div class="form-group text-center">
				<input type="hidden" class="" name="dataRif" id="dataRifID" value="<?php if(isset($this->App->data)) echo $this->App->data; ?>">	
				<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
			<div>
		</form>
		
	</div>
	
</div>