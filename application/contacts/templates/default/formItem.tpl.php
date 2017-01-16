<!-- admin/contacts/formItem.tpl.php v.3.0.0. 13/01/2017 -->
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
			<li><a href="#contacts-tab" data-toggle="tab">Contatti <i class="fa"></i></a></li>
			<li><a href="#fiscale-tab" data-toggle="tab">Fiscale <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">Opzioni <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">Nome</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="name" placeholder="Inserisci un nome" id="nameID" value="<?php if(isset($this->App->item->name)) echo SanitizeStrings::cleanForFormInput($this->App->item->name); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">Cognome</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="surname" placeholder="Inserisci un cognome" id="surnameID" value="<?php if(isset($this->App->item->surname)) echo SanitizeStrings::cleanForFormInput($this->App->item->surname); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">Via</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="street" placeholder="Inserisci un indirizzo" id="streetID" value="<?php if(isset($this->App->item->street)) echo SanitizeStrings::cleanForFormInput($this->App->item->street); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">Città</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="city" placeholder="Inserisci una città" id="cityID" value="<?php if(isset($this->App->item->city)) echo SanitizeStrings::cleanForFormInput($this->App->item->city); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">C.A.P.</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="zip_code" placeholder="Inserisci un c.a.p." id="zip_codeID" value="<?php if(isset($this->App->item->zip_code)) echo SanitizeStrings::cleanForFormInput($this->App->item->zip_code); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="countryID" class="col-md-2 control-label">Provincia</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="country" placeholder="Inserisci una provincia" id="countryID" value="<?php if(isset($this->App->item->country)) echo SanitizeStrings::cleanForFormInput($this->App->item->country); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="stateID" class="col-md-2 control-label">Stato</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="state" placeholder="Inserisci uno stato" id="stateID" value="<?php if(isset($this->App->item->state)) echo SanitizeStrings::cleanForFormInput($this->App->item->state); ?>">
							</div>
						</div>
					</fieldset>				
				</div>
<!-- sezione contatti --> 
				<div class="tab-pane" id="contacts-tab">
					<fieldset>
						<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">Telefono</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="telephone" placeholder="Inserisci un telefono" id="telephoneID" value="<?php if(isset($this->App->item->telephone)) echo SanitizeStrings::cleanForFormInput($this->App->item->telephone); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">Mobile</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="mobile" placeholder="Inserisci un numero mobile" id="mobileID" value="<?php if(isset($this->App->item->mobile)) echo SanitizeStrings::cleanForFormInput($this->App->item->mobile); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="faxID" class="col-md-2 control-label">Fax</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="fax" placeholder="Inserisci un numero fax" id="faxID" value="<?php if(isset($this->App->item->fax)) echo SanitizeStrings::cleanForFormInput($this->App->item->fax); ?>">
							</div>
						</div>
					</fieldset>	
					<fieldset>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">Email</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="email" placeholder="Inserisci una email" id="emailID" value="<?php if(isset($this->App->item->email)) echo SanitizeStrings::cleanForFormInput($this->App->item->email); ?>">
							</div>
						</div>
					</fieldset>
				</div>
<!-- sezione contatti -->
<!-- sezione fiscale --> 
				<div class="tab-pane" id="fiscale-tab">
					<fieldset>
						<div class="form-group">
							<label for="codice_fiscaleID" class="col-md-2 control-label">Codice Fiscale</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="codice_fiscale" placeholder="Inserisci un codice fiscale" id="codice_fiscaleID" value="<?php if(isset($this->App->item->codice_fiscale)) echo SanitizeStrings::cleanForFormInput($this->App->item->codice_fiscale); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="partita_ivaID" class="col-md-2 control-label">Partita IVA</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="partita_iva" placeholder="Inserisci una partita iva" id="partita_ivaID" value="<?php if(isset($this->App->item->partita_iva)) echo SanitizeStrings::cleanForFormInput($this->App->item->partita_iva); ?>">
							</div>
						</div>
					</fieldset>					
				</div>
<!-- sezione fiscale -->

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