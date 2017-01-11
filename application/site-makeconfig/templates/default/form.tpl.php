<!-- admin/site-makeconfig/form.tpl.php v.3.0.0. 20/10/2016 -->
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base <i class="fa"></i></a></li>
			<li><a href="#contents-tab" data-toggle="tab">Descrizione <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">Opzioni <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" method="post" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<div class="tab-content">
<!-- sezione data --> 	
				<div class="tab-pane active" id="datibase-tab">		
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">Nome parametro (codice php)</label>
							<div class="col-md-5 input-group">
								<input required type="text" name="name" class="form-control" placeholder="Inserisci un nome parametro" id="nameID" value="<?php if(isset($this->App->item->name)) echo SanitizeStrings::cleanForFormInput($this->App->item->name); ?>">
					    	</div>
						</div>
					</fieldset>						
					<fieldset>
					<?php foreach($this->globalSettings['languages'] AS $lang): 
					$valueField = 'value_'.$lang;
					$valueValue = (isset($this->App->item->$valueField) ? $this->App->item->$valueField : '');					
					$label = '';
					$requiredIt = 'true';
					$requiredLang = 'false';
					if(isset($this->App->item->multilanguage) && $this->App->item->multilanguage == 1) {
						$label = ' <span style="color:red;">*</span>';
						$requiredLang = 'true';						
						}	
					$required = ($lang != 'it' ? $requiredLang : $requiredIt);
					?>							
						<div class="form-group">
							<label for="value_<?php echo $lang; ?>ID" class="col-md-2 control-label">Value <?php echo ucfirst($lang); ?> <?php echo ucfirst($label); ?></label>
							<div class="col-md-5">
								<textarea <?php if($required == true) echo ' required'; ?> class="form-control" name="value_<?php echo $lang; ?>" id="value_<?php echo $lang; ?>ID" rows="5"><?php echo SanitizeStrings::cleanForFormInput($valueValue); ?></textarea>
							</div>
						</div>							
					<?php endforeach; ?>				
					</fieldset>	
				</div>
<!-- /sezione data -->
<!-- sezione dati base dinamica lingue -->
				<div class="tab-pane" id="contents-tab">
					<?php foreach($this->globalSettings['languages'] AS $lang): 
						$contentField = 'content_'.$lang;
						$contentValue = (isset($this->App->item->$contentField) ? $this->App->item->$contentField : '');		
						$label = '';
						$required = 'true';
						$requiredLang = 'false';
						if(isset($this->App->item->multilanguage) && $this->App->item->multilanguage == 1) {
							$label = ' <span style="color:red;">*</span>';
							$requiredLang = 'true';						
							}			
					?>
						<fieldset>
							<div class="form-group">
								<label for="content_<?php echo $lang; ?>ID" class="col-md-2 control-label">Contenuto <?php echo ucfirst($lang); ?> <?php echo ucfirst($label); ?></label>
								<div class="col-md-8">
									<textarea name="content_<?php echo $lang; ?>" class="form-control" id="content_<?php echo $lang; ?>ID" rows="5"><?php echo SanitizeStrings::cleanForFormInput($contentValue); ?></textarea>
								</div>
							</div>
						</fieldset>			
					<?php endforeach; ?>
				</div>
<!-- /sezione dati base dinamica lingue -->
<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="typeID" class="col-md-2 control-label">Tipo</label>
							<div class="col-md-7">
								<select name="type" id="typeID">
									<?php foreach($this->App->types AS $value): ?>
										<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->type) && $this->App->item->type == $value) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>
									<?php endforeach; ?>								
								</select>								
					  		</div>
				  		</div>
				  		<div class="form-group">
							<label for="lengthID" class="col-md-2 control-label">Lunghezza</label>
							<div class="col-md-7">
								<select name="length" id="lengthID">
									<?php foreach($this->App->lengths AS $value): ?>
										<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->length) && $this->App->item->length == $value) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>
									<?php endforeach; ?>								
								</select>								
					  		</div>
				  		</div>
				  	</fieldset>
				  	<fieldset>
						<div class="form-group">
							<label for="multilanguageID" class="col-md-2 control-label">Multilingua</label>
							<div class="col-md-7">
								<input type="checkbox" name="multilanguage" id="multilanguageID" <?php if(isset($this->App->item->multilanguage) && $this->App->item->multilanguage == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>	
					<!-- se e un utente root visualizza l'input altrimenti lo genera o mantiene automaticamente -->	
					<?php if($this->App->userLoggedData->is_root === 1): ?>		
					<fieldset>
						<div class="form-group">
							<label for="orderingID" class="col-md-2 control-label">Ordine</label>
							<div class="col-md-2">
								<input type="text" name="ordering" placeholder="Inserisci un ordine" class="form-control" id="orderingID" value="<?php if(isset($this->App->item->ordering)) echo $this->App->item->ordering; ?>">
					    	</div>
						</div>
					</fieldset>
					<?php else: ?>
						<input type="hidden" name="ordering" value="<?php if(isset($this->App->item->ordering)) echo $this->App->item->ordering; ?>">		
					<?php endif; ?>
					<!-- fine se root -->
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
					<input type="hidden" name="method" value="<?php echo $this->App->methodForm; ?>">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
					<?php if ($this->App->id > 0): ?>
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">Applica</button>
					<?php endif; ?>
				</div>
				<div class="col-md-2">				
					<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/list" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>
		</form>
	</div>
</div>