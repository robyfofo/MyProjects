<!-- admin/site-levels/form.tpl.php v.1.0.0. 13/02/2017 -->
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
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ App.lang['dati base']|title }}</a></li>
			<li class=""><a href="#modules-tab" data-toggle="tab">Moduli</a></li>
			<li class=""><a href="#options-tab" data-toggle="tab">Opzioni</a></li>
		</ul>	
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URLSITE; ?>{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="datibase-tab">			
					<fieldset>
						<div class="form-group">
							<label for="title_itID" class="col-md-2 control-label">{{ App.lang['titolo']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="text" class="form-control" name="title_it" placeholder="{{ App.lang['inserisci un titolo']|capitalize }}" id="title_itID" value="{{ App.item.title_it }}">
					    	</div>
						</div>
					</fieldset>
				</div>
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="modules-tab">	
				  <strong>{{ App.lang['moduli disponibili']|capitalize }}</strong>			 
					<fieldset>							
						{% for sectionKey,sectionModule in App.site_modules[2] %}
							{% for module in sectionModules %}				
								<div class="form-groupm">
									<label class="col-md-2 control-label">{{ module.label }}</label>
									<div class="col-md-3">
										<input type="checkbox" name="modules[{{ module.name }}]"{% if module.name in App.item.modules %} checked="checked" {% endif %}value="{{ module.nam }}">
						    		</div>
									<div class="col-md-6">
										{{ module.comment }}
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
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/list" title="{{ App.lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ App.lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>