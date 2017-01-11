<!-- admin/site-core/profile.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?>profile/NULL"  enctype="multipart/form-data" method="post">
			<div class="tab-content">
<!-- sezione dati base --> 	
				<div class="tab-pane active" id="datibase-tab">	
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-3 control-label">Nome</label>
							<div class="col-md-7">
								<input required type="text" name="name" class="form-control" id="nameID" placeholder="Nome" value="<?php if(isset($this->App->item->name)) echo SanitizeStrings::cleanForFormInput($this->App->item->name); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-3 control-label">Cognome</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="Cognome" value="<?php if(isset($this->App->item->surname)) echo SanitizeStrings::cleanForFormInput($this->App->item->surname); ?>">
					    	</div>
						</div>
					</fieldset>			
					<fieldset>
						<div class="form-group">
							<label for="streetID" class="col-md-3 control-label">Via</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="Via, numero" value="<?php if(isset($this->App->item->street)) echo SanitizeStrings::cleanForFormInput($this->App->item->street); ?>">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-3 control-label">Città</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="Città" value="<?php if(isset($this->App->item->city)) echo SanitizeStrings::cleanForFormInput($this->App->item->city); ?>">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-3 control-label">C.A.P.</label>
							<div class="col-md-7">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="CAP" value="<?php if(isset($this->App->item->zip_code)) echo SanitizeStrings::cleanForFormInput($this->App->item->zip_code); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-3 control-label">Provincia</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="Provincia" value="<?php if(isset($this->App->item->province)) echo SanitizeStrings::cleanForFormInput($this->App->item->province); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-3 control-label">Stato</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="State" value="<?php if(isset($this->App->item->state)) echo SanitizeStrings::cleanForFormInput($this->App->item->state); ?>">
					    	</div>
						</div>
					</fieldset>					
					<fieldset>
						<div class="form-group">
							<label for="emailID" class="col-md-3 control-label">Email</label>
							<div class="col-md-7">
								<input type="email" name="email" class="form-control" id="emailID" placeholder="Indirizzo email"  value="<?php if(isset($this->App->item->email)) echo SanitizeStrings::cleanForFormInput($this->App->item->email); ?>">
					    	</div>
						</div>
							<div class="form-group">
							<label for="telephoneID" class="col-md-3 control-label">Telefono</label>
							<div class="col-md-7">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="Numero Telefono"  value="<?php if(isset($this->App->item->telephone)) echo SanitizeStrings::cleanForFormInput($this->App->item->telephone); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-3 control-label">Cellulare</label>
							<div class="col-md-7">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="Numero Cellulare"  value="<?php if(isset($this->App->item->mobile)) echo SanitizeStrings::cleanForFormInput($this->App->item->mobile); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-3 control-label">Fax</label>
							<div class="col-md-7">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="Numero Fax"  value="<?php if(isset($this->App->item->fax)) echo SanitizeStrings::cleanForFormInput($this->App->item->fax); ?>">
					    	</div>
						</div>
						<div class="form-group">
							<label for="skypeID" class="col-md-3 control-label">Skype</label>
							<div class="col-md-7">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="Nome contatto Skype"  value="<?php if(isset($this->App->item->skype)) echo SanitizeStrings::cleanForFormInput($this->App->item->skype); ?>">
					    	</div>
						</div>
					</fieldset>					
					<fieldset>
						<div class="form-group">
							<label for="avatarID" class="col-md-3 control-label">Avatar</label>
							<div class="col-md-3">				
								<input type="file" name="avatar">				
					    	</div>
					    	<div class="col-md-4">
								<?php if(isset($this->App->item->avatar) && $this->App->item->avatar != ''): ?>
								
									<img src="<?php echo URL_SITE_ADMIN; ?>profile/renderAvatarDB/<?php echo $this->App->id; ?>" alt="" style="max-height: 240px;">					
				            <?php endif; ?>				
					    	</div>
						</div>
					<div class="form-group">
							<label for="templateID" class="col-md-3 control-label">Template</label>
							<div class="col-md-7">
								<?php if (is_array($this->App->templatesAvaiable) && count($this->App->templatesAvaiable) > 0): ?>
								<select name="template">
									<?php foreach($this->App->templatesAvaiable AS $key => $value): ?>
										<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->template) && $this->App->item->template == $value) echo ' selected="selected"'; ?>><?php echo $value; ?></option
										<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->template) && $this->App->item->template == $value) echo ' selected="selected"'; ?>><?php echo $value; ?></option>								
									<?php endforeach; ?>
								</select>
								<?php endif; ?>				
					    	</div>
						</div>	
					</fieldset>
				</div>
<!-- sezione dati base -->					
			</div>
<!--/Tab panes -->			
			<hr>
			<div class="form-group">
				<div class="col-md-offset-3 col-md-9">
				<input type="hidden" name="id" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
				<input type="hidden" name="method" value="update">
				<button type="submit" class="btn btn-primary">Invia</button>
				</div>
			</div>
		</form>
	</div>
</div>