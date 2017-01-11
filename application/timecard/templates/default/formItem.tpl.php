<!-- news/formItem.tpl.php v.2.6.2. 16/02/2016 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		<?php if (isset($this->appData->module_params->help_small) && $this->appData->module_params->help_small != '') echo ToolsStrings::xss($this->appData->module_params->help_small); ?>
	</div>
	<div class="col-md-2 help">
	</div>
</div>

<div class="row">
	<div class="col-md-4">

		<ul class="list-unstyled">
			<?php if (is_array($this->appData->dates_month) && count($this->appData->dates_month) > 0): ?>
				<?php foreach ($this->appData->dates_month AS $day): 
			
				?>
					<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/setData/<?php echo $day['value']; ?>" title="vai a questa data"><?php echo $day['label']; ?></a></li>
				<?php endforeach; ?>
			<?php endif; ?>		
		</ul>
		
	</div>
	
	<div class="col-md-8">
	
		<form id="applicationForm" class="form-inline" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="dataID" class="col-md-2 control-label">Data</label>
			
			    		<input type="text" name="data" class="form-control" placeholder="Inserisci una data" id="dataDPID" value="">
						<span class="glyphicon glyphicon-calendar"></span>
			  </div>
			
		  	<button type="submit" class="btn btn-primary">Invia</button>
		  	</fieldset>
		</form>

		<hr>
	
		<form id="applicationForm" method="post" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/addtime"  enctype="multipart/form-data" method="post">

			<fieldset>
				<div class="form-group">
					<label for="progettoID" class="col-md-2 control-label">Progetto</label>
					<div class="col-md-7">
						<select name="progetto" class="form-control chosen-select" data-placeholder="Scegli un progetto">
							<?php if (is_array($this->appData->progetti) && count($this->appData->progetti) > 0): ?>
								<?php foreach($this->appData->progetti AS $value): ?>		
									<option value="<?php echo $value->id; ?>"><?php echo htmlspecialchars($value->title_it,ENT_QUOTES,'UTF-8'); ?></option>														
								<?php endforeach; ?>
							<?php endif; ?>		
						</select>										
			    	</div>
				</div>
			</fieldset>
			
			<hr>
			
			<fieldset>
				<div class="form-group">
					<label for="startHourID" class="col-md-2 control-label">Partenza - Ore:Minuti</label>
					<div class="col-md-7">
						<input type="text" class="" name="startHour" placeholder="Inserisci ora partenza" id="startHourID" rows="1" value="">	
						<span class="glyphicon glyphicon-time"></span>				
			    	</div>
				</div>
				<div class="form-group">
					<label for="endHourID" class="col-md-2 control-label">Fine - Ore:Minuti</label>
					<div class="col-md-7">
						<input type="text" class="" name="endHour" placeholder="Inserisci ora fine" id="endHourID" rows="1" value="">	
						<span class="glyphicon glyphicon-time"></span>							
			    	</div>
				</div>
			</fieldset>

			
			<hr>
			
			<fieldset>
				<div class="form-group">
					<label for="contentID" class="col-md-2 control-label">Contenuto</label>
					<div class="col-md-8">
						<textarea name="content" class="form-control" id="contentID" rows="5"></textarea>
					</div>
				</div>
			</fieldset>	

			
			
			<div class="form-group">
				<input type="hidden" class="" name="dataRif" id="dataRifID" value="<?php if(isset($this->appData->data)) echo $this->appData->data; ?>">	
				<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
			<div>
		</form>
		
	</div>
	
</div>