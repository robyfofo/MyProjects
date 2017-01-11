<!-- site-users/formItem.tpl.php v.3.0.0. 04/10/2016 -->
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
	<div class="col-lg-12">		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="<?php if($this->App->formTabActive == 1) echo 'active'; ?>"><a href="#login-tab" data-toggle="tab">Login</a></li>
			<li class="<?php if($this->App->formTabActive == 2) echo 'active'; ?>"><a href="#anagrafica-tab" data-toggle="tab">Anagrafica</a></li>
			<li class="<?php if($this->App->formTabActive == 3) echo 'active'; ?>"><a href="#contacts-tab" data-toggle="tab">Contatti</a></li>
			<li class="<?php if($this->App->formTabActive == 4) echo 'active'; ?>"><a href="#images-tab" data-toggle="tab">Immagini</a></li>
			<li class="<?php if($this->App->formTabActive == 5) echo 'active'; ?>"><a href="#options-tab" data-toggle="tab">Opzioni</a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane<?php if($this->App->formTabActive == 1) echo ' active'; ?>" id="login-tab">
					<fieldset>
						<div class="form-group">
							<label for="usernameID" class="col-md-2 control-label">Username</label>
							<div class="col-md-3">
								<input required type="text" name="username" class="form-control" id="usernameID" placeholder="Username" value="<?php if(isset($this->App->item->username)) echo SanitizeStrings::cleanForFormInput($this->App->item->username); ?>">
					    	</div>
					    	<div class="col-md-6" id="usernameMessageID"></div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="levelID" class="col-md-2 control-label">Livello</label>
							<div class="col-md-7">
								<?php if (is_array($this->App->user_levels) && count($this->App->user_levels) > 0): ?>
								<select name="id_level">	
									<?php foreach($this->App->user_levels AS $value): ?>
										<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->id_level) && $this->App->item->id_level == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>								
									<?php endforeach; ?>
								</select>
								<?php endif; ?>				
					    	</div>
						</div>
					</fieldset>			 	
					<fieldset>
						<div class="form-group">
							<label for="passwordID" class="col-md-2 control-label">Password</label>
							<div class="col-md-2">
								<input type="password" name="password" class="form-control" id="passwordID" placeholder="Password" value="">
					    	</div>
						</div>
						<div class="form-group">
							<label for="passwordCFID" class="col-md-2 control-label">Password di conferma</label>
							<div class="col-md-2">
								<input type="password" name="passwordCF" class="form-control" id="passwordCFID" placeholder="Password di conferma" value="">
					    	</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">Email</label>
							<div class="col-md-3">
								<input required type="email" name="email" class="form-control" id="emailID" placeholder="Indirizzo email"  value="<?php if(isset($this->App->item->email)) echo SanitizeStrings::cleanForFormInput($this->App->item->email); ?>">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
					</fieldset>
				</div>		
				<div class="tab-pane<?php if($this->App->formTabActive == 2) echo ' active'; ?>" id="anagrafica-tab">			
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">Nome</label>
							<div class="col-md-7">
								<input type="text" name="name" class="form-control" id="nameID" placeholder="Nome" value="<?php if(isset($this->App->item->name)) echo SanitizeStrings::cleanForFormInput($this->App->item->name); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">Cognome</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="Cognome" value="<?php if(isset($this->App->item->surname)) echo SanitizeStrings::cleanForFormInput($this->App->item->surname); ?>">
					    	</div>
						</div>
					</fieldset>					
					<fieldset>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">Via</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="Via, numero" value="<?php if(isset($this->App->item->street)) echo SanitizeStrings::cleanForFormInput($this->App->item->street); ?>">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">Città</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="Città" value="<?php if(isset($this->App->item->city)) echo SanitizeStrings::cleanForFormInput($this->App->item->city); ?>">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">C.A.P.</label>
							<div class="col-md-2">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="CAP" value="<?php if(isset($this->App->item->zip_code)) echo SanitizeStrings::cleanForFormInput($this->App->item->zip_code); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">Provincia</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="Provincia" value="<?php if(isset($this->App->item->province)) echo SanitizeStrings::cleanForFormInput($this->App->item->province); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">Stato</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="State" value="<?php if(isset($this->App->item->state)) echo SanitizeStrings::cleanForFormInput($this->App->item->state); ?>">
					    	</div>
						</div>
					</fieldset>					
				</div>
	<!-- sezione contacts --> 
				<div class="tab-pane<?php if($this->App->formTabActive == 3) echo ' active'; ?>" id="contacts-tab">			
					<fieldset>						
							<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">Telefono</label>
							<div class="col-md-3">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="Numero Telefono"  value="<?php if(isset($this->App->item->telephone)) echo SanitizeStrings::cleanForFormInput($this->App->item->telephone); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">Cellulare</label>
							<div class="col-md-3">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="Numero Cellulare"  value="<?php if(isset($this->App->item->mobile)) echo SanitizeStrings::cleanForFormInput($this->App->item->mobile); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">Fax</label>
							<div class="col-md-3">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="Numero Fax"  value="<?php if(isset($this->App->item->fax)) echo SanitizeStrings::cleanForFormInput($this->App->item->fax); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="skypeID" class="col-md-2 control-label">Skype</label>
							<div class="col-md-3">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="Nome contatto Skype"  value="<?php if(isset($this->App->item->skype)) echo SanitizeStrings::cleanForFormInput($this->App->item->skype); ?>">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione immagini -->		  
				<div class="tab-pane<?php if($this->App->formTabActive == 4) echo ' active'; ?>" id="images-tab">
					<fieldset>
						<div class="form-group">
							<label for="avatarID" class="col-md-2 control-label">Avatar</label>
							<div class="col-md-3">				
								<input type="file" name="avatar">				
					    	</div>
					    	<div class="col-md-4">
								<?php if(isset($this->App->item->avatar)): ?>
									<img src="<?php echo URL_SITE_ADMIN; ?>site-users/renderAvatarDBItem/<?php echo $this->App->item->id; ?>" alt="" style="max-height:70px;">
				            <?php endif; ?>				
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione immagini -->	
	<!-- sezione opzioni --> 
				<div class="tab-pane<?php if($this->App->formTabActive == 5) echo ' active'; ?>" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="templateID" class="col-md-2 control-label">Template</label>
							<div class="col-md-7">
								<?php if (is_array($this->App->templatesAvaiable) && count($this->App->templatesAvaiable) > 0): ?>
								<select name="template">
									<?php foreach($this->App->templatesAvaiable AS $key => $value): ?>
										<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->template) && $this->App->item->template == $value) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>								
									<?php endforeach; ?>
								</select>
								<?php endif; ?>				
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