<!-- site-modules/form.tpl.php v.2.6.4. 13/06/2016 -->
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
			<li><a href="#smallhelp-tab" data-toggle="tab">Aiuto Breve</a></li>
			<li><a href="#help-tab" data-toggle="tab">Aiuto Modulo</a></li>
		</ul>		
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">Nome</label>
							<div class="col-md-3">
								<input required type="text" name="name" class="form-control" id="nameID" placeholder="Nome modulo" value="<?php if(isset($this->App->item->name)) echo SanitizeStrings::cleanForFormInput($this->App->item->name); ?>">
					    	</div>
						</div>
						
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">Label</label>
							<div class="col-md-3">
								<input required type="text" name="label" class="form-control" id="labelID" placeholder="Etichetta modulo" value="<?php if(isset($this->App->item->label)) echo SanitizeStrings::cleanForFormInput($this->App->item->label); ?>">
					    	</div>
						</div>
						
						<div class="form-group">
							<label for="aliasID" class="col-md-2 control-label">Alias Sito<br><small>nome della pagina php che gestisce il modulo nel sito</small></label>
							<div class="col-md-3">
								<input type="text" name="alias" class="form-control" id="aliasID" placeholder="Alias delle pagine sito del modulo" value="<?php if(isset($this->App->item->alias)) echo SanitizeStrings::cleanForFormInput($this->App->item->alias); ?>">
					    	</div>
						</div>

					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label class="col-md-2 control-label">Sezione</label>	
							<div class="col-md-7">	
								<select class="form-control input-md" name="section">					
								<?php if (is_array($this->App->sections) && count($this->App->sections) > 0): ?>
									<?php foreach($this->App->sections AS $key=>$value): ?>						
										<option value="<?php echo $key; ?>"<?php if(isset($this->App->item->section) && $this->App->item->section == $key) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>														
									<?php endforeach; ?>
								<?php endif; ?>											
								</select>	
							</div>												
						</div>									
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="commentID" class="col-md-2 control-label">Commento</label>
							<div class="col-md-7">
								<textarea name="comment" class="form-control" id="commentID" rows="4"><?php if(isset($this->App->item->comment)) echo SanitizeStrings::cleanForFormInput($this->App->item->comment); ?></textarea>
							</div>
						</div>
					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label for="code_menuID" class="col-md-2 control-label">Codice Menu</label>
							<div class="col-md-6">
								<textarea name="code_menu" class="form-control" id="code_menuID" rows="4"><?php if(isset($this->App->item->code_menu)) echo $this->App->item->code_menu; ?></textarea>
							</div>
							<div class="col-md-4"><small><b>{{URLSITEADMIN}}</b> per URL dinamico</small></div>
						</div>
					</fieldset>							
					<!-- se e un utente root visualizza l'input altrimenti lo genera o mantiene automaticamente -->	
					<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>			
					<fieldset>
						<div class="form-group">
							<label for="orderingID" class="col-md-2 control-label">Ordine</label>
							<div class="col-md-1">
								<input type="text" name="ordering" placeholder="Inserisci un ordine" class="form-control" id="orderingID" value="<?php if(isset($this->App->item->ordering)) echo SanitizeStrings::cleanForFormInput($this->App->item->ordering); ?>">
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
	<!-- sezione datibase -->	  
				<div class="tab-pane" id="smallhelp-tab">
						<div class="form-group">
							<p>Questo è il contenuto BREVE dell'aiuto del modulo</p>
							<div class="col-md-12">
								<textarea name="help_small" class="form-control" id="help_smallID" rows="4"><?php if(isset($this->App->item->help_small)) echo SanitizeStrings::cleanForFormInput($this->App->item->help_small); ?></textarea>
							</div>
						</div>
				</div>
				<div class="tab-pane" id="help-tab">
					<p>Questo è il contenuto COMPLETO dell'aiuto del modulo</p>
						<div class="form-group">
							
							<div class="col-md-12">
								<textarea name="help" class="form-control editorHTML" id="helpID" rows="4" cols="40"><?php if(isset($this->App->item->help)) echo SanitizeStrings::cleanForFormInput($this->App->item->help); ?></textarea>
							</div>
						</div>
				</div>
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
</div>						<div class="form-group">