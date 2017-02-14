<!-- site-users/formItem.tpl.php v.1.0.0. 13/02/2017 -->
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
	<div class="col-lg-12">		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="<?php if($this->App->formTabActive == 1) echo 'active'; ?>"><a href="#login-tab" data-toggle="tab">Login</a></li>
			<li class="<?php if($this->App->formTabActive == 2) echo 'active'; ?>"><a href="#anagrafica-tab" data-toggle="tab">Anagrafica</a></li>
			<li class="<?php if($this->App->formTabActive == 3) echo 'active'; ?>"><a href="#contacts-tab" data-toggle="tab">Contatti</a></li>
			<li class="<?php if($this->App->formTabActive == 4) echo 'active'; ?>"><a href="#images-tab" data-toggle="tab">Immagini</a></li>
			<li class="<?php if($this->App->formTabActive == 5) echo 'active'; ?>"><a href="#options-tab" data-toggle="tab">Opzioni</a></li>
		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane<?php if($this->App->formTabActive == 1) echo ' active'; ?>" id="login-tab">
					<fieldset>
						<div class="form-group">
							<label for="usernameID" class="col-md-2 control-label">Username</label>
							<div class="col-md-3">
								<input required type="text" name="username" class="form-control" id="usernameID" placeholder="Username" value="{{ App.item.username }}">
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
										<option value="{{ value.id }}"<?php if(isset($this->App->item->id_level) && $this->App->item->id_level == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>								
									{% endfor %}
								</select>
								{% endif %}				
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
							<label for="emailID" class="col-md-2 control-label">{{ App.lang['email']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="email" name="email" class="form-control" id="emailID" placeholder="Indirizzo email"  value="{{ App.item.email }}">
					    	</div>
					    	<div class="col-md-6" id="emailMessageID"></div>
						</div>
					</fieldset>
				</div>		
				<div class="tab-pane<?php if($this->App->formTabActive == 2) echo ' active'; ?>" id="anagrafica-tab">			
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-2 control-label">{{ App.lang['nome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="name" class="form-control" id="nameID" placeholder="Nome" value="{{ App.item.name }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="surnameID" class="col-md-2 control-label">{{ App.lang['cognome']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="surname" class="form-control" id="surnameID" placeholder="Cognome" value="{{ App.item.surname }}">
					    	</div>
						</div>
					</fieldset>					
					<fieldset>
						<div class="form-group">
							<label for="streetID" class="col-md-2 control-label">{{ App.lang['via']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="street" class="form-control" id="streetID" placeholder="Via, numero" value="{{ App.item.street }}">
					    	</div>
						</div>		
						<div class="form-group">
							<label for="cityID" class="col-md-2 control-label">{{ App.lang['città']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="city" class="form-control" id="cityID" placeholder="Città" value="{{ App.item.city }}">
					    	</div>
						</div>	
						<div class="form-group">
							<label for="zip_codeID" class="col-md-2 control-label">{{ App.lang['cap']|capitalize }}</label>
							<div class="col-md-2">
								<input type="text" name="zip_code" class="form-control" id="zip_codeID" placeholder="CAP" value="{{ App.item.zip_code }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ App.lang['provincia']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="province" class="form-control" id="provinceID" placeholder="Provincia" value="{{ App.item.province }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="provinceID" class="col-md-2 control-label">{{ App.lang['stato']|capitalize }}</label>
							<div class="col-md-7">
								<input type="text" name="state" class="form-control" id="stateID" placeholder="State" value="{{ App.item.state }}">
					    	</div>
						</div>
					</fieldset>					
				</div>
	<!-- sezione contacts --> 
				<div class="tab-pane<?php if($this->App->formTabActive == 3) echo ' active'; ?>" id="contacts-tab">			
					<fieldset>						
							<div class="form-group">
							<label for="telephoneID" class="col-md-2 control-label">{{ App.lang['telefono']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="telephone" class="form-control" id="telephoneID" placeholder="Numero Telefono"  value="{{ App.item.telephone }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="mobileID" class="col-md-2 control-label">{{ App.lang['cellulare']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="mobile" class="form-control" id="mobileID" placeholder="Numero Cellulare"  value="{{ App.item.mobile }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="emailID" class="col-md-2 control-label">{{ App.lang['fax']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="fax" class="form-control" id="faxID" placeholder="Numero Fax"  value="{{ App.item.fax }}">
					    	</div>
						</div>
						<div class="form-group">
							<label for="skypeID" class="col-md-2 control-label">{{ App.lang['skype']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="skype" class="form-control" id="skypeID" placeholder="Nome contatto Skype"  value="{{ App.item.skype }}">
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione contacts -->
	<!-- sezione immagini -->		  
				<div class="tab-pane<?php if($this->App->formTabActive == 4) echo ' active'; ?>" id="images-tab">
					<fieldset>
						<div class="form-group">
							<label for="avatarID" class="col-md-2 control-label">{{ App.lang['avatar']|capitalize }}</label>
							<div class="col-md-3">				
								<input type="file" name="avatar">				
					    	</div>
					    	<div class="col-md-4">
								<?php if(isset($this->App->item->avatar)): ?>
									<img src="{{ URLSITE }}site-users/renderAvatarDBItem/<?php echo $this->App->item->id; ?>" alt="" style="max-height:70px;">
				            {% endif %}				
					    	</div>
						</div>
					</fieldset>				
				</div>
	<!-- sezione immagini -->	
	<!-- sezione opzioni --> 
				<div class="tab-pane<?php if($this->App->formTabActive == 5) echo ' active'; ?>" id="options-tab">
					<fieldset>
						<div class="form-group">
							<label for="templateID" class="col-md-2 control-label">{{ App.lang['template']|capitalize }}</label>
							<div class="col-md-7">
								<?php if (is_array($this->App->templatesAvaiable) && count($this->App->templatesAvaiable) > 0): ?>
								<select name="template">
									<?php foreach($this->App->templatesAvaiable AS $key => $value): ?>
										<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->template) && $this->App->item->template == $value) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>								
									{% endfor %}
								</select>
								{% endif %}				
					    	</div>
						</div>	
					</fieldset>				
					<fieldset>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">{{ App.lang['attiva']|capitalize }}</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID"{% if App.item.active == 1 %} checked="checked" {% endif %}value="1">
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
					<input type="hidden" name="created" id="createdID" value="{{ App.item.created }}">
					<input type="hidden" name="id" id="idID" value="{{ App.id }}">
					<input type="hidden" name="method" value="{{ App.methodForm }}">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ App.lang['invia']|capitalize }}</button>
					{% if App.id > 0 %}
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">{{ App.lang['applica']|capitalize }}</button>
					{% endif %}
				</div>
				<div class="col-md-2">				
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listItem" title="{{ App.lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ App.lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>