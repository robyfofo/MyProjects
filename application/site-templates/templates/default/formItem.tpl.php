<!-- admin/site-templates/form.tpl.php v.3.0.0. 03/11/2016 -->
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
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base</a></li>
			<li><a href="#contents-tab" data-toggle="tab">Contenuti</a></li>	
			<li><a href="#others-tab" data-toggle="tab">Altri dati</a></li>			
			<li><a href="#options-tab" data-toggle="tab">Opzioni</a></li>
			<li><a href="#advanced-tab" data-toggle="tab">Avanzate <i class="fa"></i></a></li>
		</ul>	
		<form id="applicationForm" method="post" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">	
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="title_itID" class="col-md-2 control-label">Titolo</label>
							<div class="col-md-7">
								<input required type="text" name="title_it" class="form-control" placeholder="Inserisci un titolo" id="title_itID" rows="3" value="<?php if(isset($this->App->item->title_it)) echo SanitizeStrings::cleanForFormInput($this->App->item->title_it); ?>">
					    	</div>
						</div>
					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label for="comment_itID" class="col-md-2 control-label">Commento Ita</label>
							<div class="col-md-7">
								<textarea name="comment_it" class="form-control" id="comment_itID" rows="4"><?php if(isset($this->App->item->comment_it)) echo htmlspecialchars($this->App->item->comment_it,ENT_QUOTES,'UTF-8'); ?></textarea>
							</div>
						</div>
					</fieldset>				
					<fieldset>
						<div class="form-group">
							<label for="templateID" class="col-md-2 control-label">Template</label>
							<div class="col-md-7">
								<input required type="text" name="template" class="form-control" placeholder="Inserisci un template" id="templateID" value="<?php if(isset($this->App->item->template)) echo SanitizeStrings::cleanForFormInput($this->App->item->template); ?>">
					    	</div>
						</div>
					</fieldset>			
				</div>		
				<div class="tab-pane" id="contents-tab">
					<fieldset>
						<div class="form-group">
							<label for="contents_htmlID" class="col-md-2 control-label">Contenuti HTML</label>
							<div class="col-md-8">
								<input type="text" name="contents_html" class="form-control" placeholder="Numero contenuti HTML" id="contents_htmlID" rows="1" value="<?php if(isset($this->App->item->contents_html)) echo $this->App->item->contents_html; ?>">
							</div>				
						</div>
						<div class="form-group">
							<label for="uploadsID" class="col-md-2 control-label">Uploads da filemanager</label>
							<div class="col-md-8">
								<input type="text" name="uploads" class="form-control" placeholder="Numero uploads associabili" id="uploadsID" rows="1" value="<?php if(isset($this->App->item->uploads)) echo $this->App->item->uploads; ?>">
							</div>				
						</div>
						<div class="form-group">
							<label for="imagesID" class="col-md-2 control-label">Immagini</label>
							<div class="col-md-8">
								<input type="text" name="images" class="form-control" placeholder="Numero immagini associabili" id="imagesID" rows="1" value="<?php if(isset($this->App->item->images)) echo $this->App->item->images; ?>">
							</div>				
						</div>
						<div class="form-group">
							<label for="fileID" class="col-md-2 control-label">Files</label>
							<div class="col-md-8">
								<input type="text" name="files" class="form-control" placeholder="Numero file associabili" id="fileID" rows="1" value="<?php if(isset($this->App->item->files)) echo $this->App->item->files; ?>">
							</div>				
						</div>
						<div class="form-group">
							<label for="galleriesID" class="col-md-2 control-label">Gallerie</label>
							<div class="col-md-8">
								<input type="text" name="galleries" class="form-control" placeholder="Numero gallerie associabili" id="galleriesID" rows="1" value="<?php if(isset($this->App->item->galleries)) echo $this->App->item->galleries; ?>">
							</div>				
						</div>
						<div class="form-group">
							<label for="blocksID" class="col-md-2 control-label">Blocchi di contenuto</label>
							<div class="col-md-8">
								<input type="text" name="blocks" class="form-control" placeholder="Blocchi di contenuto associabili" id="blocksID" rows="1" value="<?php if(isset($this->App->item->blocks)) echo $this->App->item->blocks; ?>">
							</div>				
						</div>
					</fieldset>
				</div>		
			
				<div class="tab-pane" id="others-tab">
					<fieldset>
						<div class="form-group">
							<label for="filenameID" class="col-md-2 control-label">Immagine template</label>
							<div class="col-md-8">
								<input<?php if ($this->App->item->filenameRequired == true) echo ' required'; ?> type="file" name="filename" id="filenameID"  placeholder="Indica un file da caricare">
							</div>			
						</div>
						<div class="form-group">
							<label for="filenameID" class="col-md-2 control-label">Anteprima</label>
							<div class="col-md-7">												
								<?php if(isset($this->App->item->filename) && $this->App->item->filename != ''): ?>
									<a class="" href="<?php echo $this->App->params->uploadDirs['item']; ?><?php echo $this->App->item->filename; ?>" rel="prettyPhoto[]" title="<?php echo $this->App->item->filename; ?>">
										<img src="<?php echo $this->App->params->uploadDirs['item']; ?><?php echo $this->App->item->filename; ?>" class="img-thumbnail" alt="<?php echo $this->App->item->filename; ?>">
									</a>		
								<?php else: ?>		
									<a class="" href="<?php echo $this->App->params->defUploadDir['item']; ?>default/image.png" rel="prettyPhoto[]" title="Immagine di default">
										<img src="<?php echo $this->App->params->defUploadDir['item']; ?>default/image.png" class="img-thumbnail" alt="Immagine di default">
									</a>			
								<?php endif; ?>		
							</div>			
						</div>
						<?php if (isset($this->App->item->filename) && $this->App->item->filename != ''): ?>
						<div class="form-group">
							<label for="deleteImageID" class="col-md-2 control-label">Cancella immagine</label>						
							<div class="col-md-5">							
								<input type="checkbox" name="deleteImage" id="deleteImageID" value="1">						
							</div>					
						</div>
						<?php endif; ?>
					</fieldset>
				</div>		
				<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">		
					<!-- se e un utente root visualizza l'input altrimenti lo genera o mantiene automaticamente -->	
					<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>		
					<fieldset>
						<div class="form-group">
							<label for="orderingID" class="col-md-3 control-label">Ordine</label>
							<div class="col-md-1">
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
							<label for="activeID" class="col-md-3 control-label">Attiva</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID" <?php if(isset($this->App->item->active) && $this->App->item->active == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>
				</div>
				<!-- sezione opzioni -->	
<!-- sezione avanzate -->	
				<div class="tab-pane" id="advanced-tab">	
					<fieldset>
						<div class="form-group">
							<label for="css_linksID" class="col-md-2 control-label">Css Plugin link</label>
							<div class="col-md-7">
								<textarea name="css_plugin" class="form-control" id="css_pluginID" rows="4"><?php if(isset($this->App->item->css_plugin)) echo $this->App->item->css_plugin; ?></textarea>
							</div>
				  		</div>
						<div class="form-group">
							<label for="css_pageID" class="col-md-2 control-label">Css Page link</label>
							<div class="col-md-7">
								<textarea name="css_page" class="form-control" id="css_pageID" rows="4"><?php if(isset($this->App->item->css_page)) echo $this->App->item->css_page; ?></textarea>
							</div>
				  		</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="jscript_ini_codeID" class="col-md-2 control-label">Codice Javascript inizio BODY</label>
							<div class="col-md-7">
								<textarea name="jscript_ini_code" class="form-control" id="jscript_ini_codeID" rows="4"><?php if(isset($this->App->item->jscript_ini_code)) echo $this->App->item->jscript_ini_code; ?></textarea>
							</div>
				  		</div>
					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label for="jscript_pluginID" class="col-md-2 control-label">Javascript Plugin link</label>
							<div class="col-md-7">
								<textarea name="jscript_plugin" class="form-control" id="jscript_pluginID" rows="4"><?php if(isset($this->App->item->jscript_plugin)) echo $this->App->item->jscript_plugin; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="jscript_pageID" class="col-md-2 control-label">Javascript Page link</label>
							<div class="col-md-7">
								<textarea name="jscript_page" class="form-control" id="jscript_pageID" rows="4"><?php if(isset($this->App->item->jscript_page)) echo $this->App->item->jscript_page; ?></textarea>
							</div>
						</div>
					</fieldset>						
					<fieldset>					
						<div class="form-group">
							<label for="jscript_end_codeID" class="col-md-2 control-label">Codice Javascript fine BODY</label>
							<div class="col-md-7">
								<textarea name="jscript_end_code" class="form-control" id="jscript_end_codeID" rows="4"><?php if(isset($this->App->item->jscript_end_code)) echo $this->App->item->jscript_end_code; ?></textarea>
							</div>
						</div>
					</fieldset>				

					<fieldset>
						<div class="form-group">
							<label for="base_tpl_pageID" class="col-md-2 control-label">File del Template di base</label>
							<div class="col-md-7">
								<input type="input" name="base_tpl_page" id="base_tpl_pageID" placeholder="Inserisci un pagina template base" class="form-control" value="<?php if (isset($this->App->item->base_tpl_page)) echo htmlspecialchars($this->App->item->base_tpl_page,ENT_QUOTES,'UTF-8'); ?>">
				    		</div>
				  		</div>
					</fieldset>				
				</div>
<!--/sezione avanzate -->			
			</div><!--./tab-content	 -->	
			<hr>		
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="id" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
					<input type="hidden" name="predefinito" value="<?php if(isset($this->App->item->predefinito)) echo $this->App->item->predefinito; ?>">
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