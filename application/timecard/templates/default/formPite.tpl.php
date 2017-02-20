<!-- admin/projects/formItem.tpl.php v.1.0.0. 17/02/2017 -->
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
		<ul class="nav nav-tabs">		
			<li class="active"><a href="#datibase-tab" data-toggle="tab">{{ App.lang['dati base']|title }} <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="titleID" class="col-md-3 control-label">{{ App.lang['titolo']|capitalize }}</label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="title" placeholder="{{ App.lang['inserisci un titolo']|capitalize }}" id="titleID" value="{{ App.item.title }}">
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="startHourID" class="col-md-3 control-label">Partenza - Ore:Minuti</label>
							<div class="col-md-7">
								<input type="text" class="" name="starthour" placeholder="{{ App.lang['inserisci ora inizio']|capitalize }}" id="starthourID" rows="1" value="">	
								<span class="glyphicon glyphicon-time"></span>				
					    	</div>
						</div>
						<div class="form-group">
							<label for="endhourID" class="col-md-3 control-label">Fine - Ore:Minuti</label>
							<div class="col-md-7">
								<input type="text" class="" name="endhour" placeholder="{{ App.lang['inserisci ora fine']|capitalize }}" id="endhourID" rows="1" value="">	
								<span class="glyphicon glyphicon-time"></span>							
					    	</div>
						</div>
					</fieldset>			
					<fieldset>
						<div class="form-group">
							<label for="contentID" class="col-md-3 control-label">{{ App.lang['contenuto']|capitalize }}</label>
							<div class="col-md-8">
								<textarea name="content" class="form-control" id="contentID" rows="5">{{ App.item.content }}</textarea>
							</div>
						</div>
					</fieldset>			
					<fieldset>
						<div class="form-group">Pite
							<label for="activeID" class="col-md-3 control-label">{{ App.lang['attiva']|capitalize }}</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID"{% if App.item.active == 1 %} checked="checked"{% endif %} value="1">
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
					<a href="{{ URLSITE }}{{ CoreRequest.action }}/listPite" title="{{ App.lang['torna alla lista']|capitalize }}" class="btn btn-success">{{ App.lang['indietro']|capitalize }}</a>
				</div>
			</div>
		</form>
	</div>
</div>