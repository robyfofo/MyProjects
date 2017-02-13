<!-- admin/site-levels/form.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2 help">
	</div>
</div>
<div class="row">
	<div class="col-md-12">		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base</a></li>
			<li class=""><a href="#modules-tab" data-toggle="tab">Moduli</a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">Opzioni</a></li>
		</ul>	
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URLSITE; ?>{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="datibase-tab">			
					<fieldset>
						<div class="form-group">
							<label for="title_itID" class="col-md-2 control-label">Titolo</label>
							<div class="col-md-3">
								<input required type="text" name="title_it" class="form-control" id="title_it" placeholder="Titolo" value="<?php if(isset($this->App->item->title_it)) echo SanitizeStrings::cleanForFormInput($this->App->item->title_it); ?>">
					    	</div>
						</div>
					</fieldset>
				</div>
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="modules-tab">	
				  <strong>Moduli disponibili</strong>			 
					<fieldset>							
						<?php foreach($this->App->site_modules AS $sectionKey=>$sectionModules): ?>
							<?php foreach($sectionModules AS $module): ?>								
								<div class="form-group">
									<label class="col-md-2 control-label"><?php echo $module->label; ?></label>
									<div class="col-md-3">
										<input type="checkbox" name="modules[<?php echo $module->name; ?>]" <?php if(in_array($module->name,$this->App->item->modules)) echo 'checked="checked"'; ?> value="<?php echo SanitizeStrings::cleanForFormInput($module->name); ?>">
						    		</div>
									<div class="col-md-6">
										<?php echo $module->comment; ?>
						    		</div>
								</div>						
							{% endfor %}
						{% endfor %}									
					</fieldset>
				</div>
	<!-- sezione opzioni -->	  
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">				
					<fieldset>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">Attiva</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID" <?php if(isset($this->App->item->active) && $this->App->item->active == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>					
				</div>
	<!-- sezione opzioni -->			 
			</div>
			<!--/Tab panes -->			
			<hr>			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="id" id="idID" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
					<?php if ($this->App->id > 0): ?>
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">Applica</button>
					{{ endif }}
				</div>
				<div class="col-md-2">				
					<a href="<?php echo URLSITE; ?>{{ CoreRequest.action }}/list" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>	
		</form>
	</div>
</div>