<!-- admin/site-galleries/formItem.tpl.php v.3.0.0. 03/11/2016 -->
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
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base</a></li>
		</ul>		
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">					
					<fieldset>
						<div class="form-group">
							<label for="id_catID" class="col-md-2 control-label">Cartella</label>
							<div class="col-md-7">								
								<select class="form-control input-md" name="id_cat">									
									<?php if (is_array($this->App->categoriesData) && count($this->App->categoriesData) > 0): ?>
										<?php foreach($this->App->categoriesData AS $key=>$value): ?>												
											<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->id_cat) && $this->App->id_cat == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>														
										<?php endforeach; ?>
									<?php endif; ?>	
								</select>							
					    	</div>
						</div>
					</fieldset>
					<fieldset>
					<!-- sezione dati base dinamica lingue -->
								<?php foreach($this->globalSettings['languages'] AS $lang): 
									$titleField = 'title_'.$lang;
									$titleValue = (isset($this->App->item->$titleField) ? $this->App->item->$titleField : '');			?>		
									<div class="form-group">
										<label for="title_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo <?php echo ucfirst($lang); ?> </label>
										<div class="col-md-7">
											<input<?php if ($lang == 'it') echo ' required'; ?> type="text" class="form-control" name="title_<?php echo $lang; ?>" placeholder="Inserisci un titolo <?php echo ucfirst($lang); ?>" id="title_<?php echo $lang; ?>ID" rows="3" value="<?php echo SanitizeStrings::cleanForFormInput($titleValue); ?>">
										</div>
									</div>
								<?php endforeach; ?>
					<!-- /sezione dati base dinamica lingue -->
					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label for="filenameID" class="col-md-2 control-label">File</label>
							<div class="col-md-4">
								<input<?php if ($this->App->item->filenameRequired == true) echo ' required'; ?> type="file" name="filename" id="filenameID"  placeholder="Indica un file da caricare">							
							</div>
						</div>
						<div class="form-group">
							<label for="filenameID" class="col-md-2 control-label">Anteprima</label>
							<div class="col-md-7">
								<?php if(isset($this->App->item->filename) && $this->App->item->filename != ''): ?>
									<a class="" href="<?php echo $this->App->params->uploadDirs['item']; ?><?php echo $this->App->item->folder_name; ?><?php echo $this->App->item->filename; ?>" rel="prettyPhoto[]" title="<?php echo $this->App->item->org_filename; ?>">
									<img src="<?php echo $this->App->params->uploadDirs['item']; ?><?php echo $this->App->item->folder_name; ?><?php echo $this->App->item->filename; ?>" class="img-thumbnail" alt="<?php echo $this->App->item->org_filename; ?>">
									</a>					
								<?php endif; ?>		
							</div>			
						</div>
					</fieldset>		
					<!-- se e un utente root visualizza l'input altrimenti lo genera o mantiene automaticamente -->	
					<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>			
					<fieldset>
						<div class="form-group">
							<label for="orderingID" class="col-md-2 control-label">Ordine</label>
							<div class="col-md-1">
								<input type="text" name="ordering" placeholder="Inserisci un ordine" class="form-control" id="orderingID" value="<?php if(isset($this->App->item->ordering)) echo intval($this->App->item->ordering); ?>">
					    	</div>
						</div>
					</fieldset>
					<?php else: ?>
						<input type="hidden" name="ordering" value="<?php if(isset($this->App->item->ordering)) echo intval($this->App->item->ordering); ?>">		
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
			</div>
			<!--/Tab panes -->	
			<hr>		
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="created" id="createdID" value="<?php if(isset($this->App->item->created)) echo $this->App->item->created; ?>">
					<input type="hidden" name="id" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
					<input type="hidden" name="folder_name" value="<?php if(isset($this->App->item->folder_name)) echo $this->App->item->folder_name; ?>">
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