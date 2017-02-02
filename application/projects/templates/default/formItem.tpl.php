<!-- admin/projects/formItem.tpl.php v.3.0.0. 28/01/2017 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		<?php if (isset($this->App->params->help_small) && $this->App->params->help_small != '') echo nl2br($this->App->params->help_small); ?>
	</div>
	<div class="col-md-2 help">
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">		
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">Opzioni <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="titleID" class="col-md-2 control-label">Titolo </label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="title" placeholder="Inserisci un titolo" id="titleID" value="<?php if(isset($this->App->item->title)) echo SanitizeStrings::cleanForFormInput($this->App->item->title); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="costo_orarioID" class="col-md-2 control-label">Costo Orario </label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="costo_orario" placeholder="Inserisci un costo_orario" id="costo_orarioID" value="<?php if(isset($this->App->item->costo_orario)) echo SanitizeStrings::cleanForFormInput($this->App->item->costo_orario); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="statusID" class="col-md-2 control-label">Stato</label>
							<div class="col-md-7">
								<select name="status" class="form-control chosen-select" data-placeholder="Scegli uno status">
									<?php if (is_array($this->App->params->status) && count($this->App->params->status) > 0): ?>
										<?php foreach($this->App->params->status AS $key=>$value): ?>		
											<option value="<?php echo $key; ?>"<?php if ($key == $this->App->item->status) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>														
										<?php endforeach; ?>
									<?php endif; ?>		
								</select>										
					    	</div>
						</div>
						<div class="form-group">
							<label for="completatoID" class="col-md-2 control-label">Completato</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="completato" placeholder="Inserisci una percentuale di completamento" id="completatoID" value="<?php if(isset($this->App->item->completato)) echo SanitizeStrings::cleanForFormInput($this->App->item->completato); ?>">
							</div>
						</div>
					</fieldset>				
				</div>

<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="contactID" class="col-md-2 control-label">Contatto</label>
							<div class="col-md-7">
								<select name="id_contact" class="form-control chosen-select" data-placeholder="Scegli un contatto">
									<option value="0">
									<?php if (is_array($this->App->contacts) && count($this->App->contacts) > 0): ?>
										<?php foreach($this->App->contacts AS $value): ?>		
											<option value="<?php echo $value->id; ?>"<?php if ($value->id == $this->App->item->id_contact) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->name); ?>, <?php echo SanitizeStrings::cleanForFormInput($value->surname); ?></option>														
										<?php endforeach; ?>
									<?php endif; ?>		
								</select>										
					    	</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="timecardID" class="col-md-2 control-label">Timecard</label>
							<div class="col-md-7">
								<input type="checkbox" name="timecard" id="activeID" <?php if(isset($this->App->item->timecard) && $this->App->item->timecard == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
				  		<div class="form-group">
							<label for="currentID" class="col-md-2 control-label">Corrente</label>
							<div class="col-md-7">
								<input type="checkbox" name="current" id="currentID" <?php if(isset($this->App->item->current) && $this->App->item->current == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>
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
					<input type="hidden" name="created" id="createdID" value="<?php if(isset($this->App->item->created)) echo $this->App->item->created; ?>">
					<input type="hidden" name="id" id="idID" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
					<input type="hidden" name="method" value="<?php echo $this->App->methodForm; ?>">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
					<?php if ($this->App->id > 0): ?>
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">Applica</button>
					<?php endif; ?>
				</div>
				<div class="col-md-2">				
					<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listItem" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>
		</form>
	</div>
</div>