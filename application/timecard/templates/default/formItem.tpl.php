<!-- admin/timecard/formItem.tpl.php v.1.0.0. 10/02/2017 -->

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
	<div class="col-md-6 col-xs-12">
		<form id="applicationForm" class="form-horizontal form-daydata bg-info" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/modappData"  enctype="multipart/form-data" method="post">
			<div class="form-group">
				<div class="col-md-10">	
					<input type="text" name="appdata" class="" placeholder="{{ App.lang['inserisci una data globale']|capitalize }}" id="appdataDPID" value="">
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">{{ App.lang['invia']|capitalize }}</button>
				</div>
			</div>	
		</form>
		<form id="applicationForm" class="form-horizontal form-daydata bg-info" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/modappProj"  enctype="multipart/form-data" method="post">
			<div class="form-group">
				<div class="col-md-10">		
					<select name="id_project" class="form-control chosen-select" id="id_projectID" data-placeholder="{{ App.lang['seleziona un progetto']|capitalize }}">
						<option value="0"{% if MySessionVars['app']['id_project'] == 0 %} selected="selected"{% endif %}>{{ App.lang['tutti']|capitalize }}</option>
						{% if App.allprogetti is iterable %}
							{% for value in App.allprogetti %}		
								<option value="{{ value.id }}"{% if value.id == MySessionVars['app']['id_project'] %} selected="selected" {% endif %}>{{ value.title }}</option>														
							{% endfor %}
						{% endif %}		
					</select>										
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-sm btn-primary">{{ App.lang['invia']|capitalize }}</button>
				</div>
			</div>
		</form>
		<hr>
		<div class="timecards" id="accordion">
		{% if App.dates_month is iterable %}
			{% for key,day in App.dates_month %}

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="changedata" href="{{ URLSITE }}{{ CoreRequest.action }}/setappData/{{ day['value'] }}" title="{{ App.lang['vai a questa data']|capitalize }}"><span class="glyphicon glyphicon-calendar"></span></a>
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ loop.index }}">
							{{ day['label'] }}&nbsp;-&nbsp;{{ day['nameday']|capitalize }}{% if day['value'] == MySessionVars['app']['data'] %}&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-circle"></span>{% endif %}
							</a>
 						
 						{% if App.timecards_total[day['value']] > 0  %}<span class="pull-right">{{ App.timecards_total[day['value']]|slice(0, 5) }}</span>{% endif %}
 						</h4>
					</div>
					<div id="collapse{{ loop.index }}" class="panel-collapse collapse{% if day['value'] == MySessionVars['app']['data'] %} in{% else %} out{% endif %}">
						<div class="panel-body{% if day['value'] == MySessionVars['app']['data'] %} current{% endif %}">
							{% if App.timecards[day['value']]['timecards'] is iterable and App.timecards[day['value']]['timecards']|length > 0  %}
								<table class="table table-condensed table-bordered subtimecards tooltip-proj">
									<tbody>
										{% for day in App.timecards[day['value']]['timecards'] %}
											<tr>																						
												<td data-toggle="tooltip" data-placement="top" title="{{ day.project }}">{{ day.project }}</td>
												<td data-toggle="tooltip" data-placement="top" title="{{ day.content }}">{{ day.content }}</td>
												<td class="hours">{{ day.starthour|slice(0, 5) }}-{{ day.endhour|slice(0, 5) }}</td>
												<td class="tothours text-right">
													<a class="" href="{{ URLSITE }}{{ CoreRequest.action }}/modifyTime/{{ day.id }}" title="{{ App.lang['modifica']|capitalize }}">{{ day.worktime|slice(0, 5) }}</a>
												</td>
											</tr>
										{% endfor %}										
										<tr class="">
											<td colspan="3">&nbsp;</td>
											<td class="hours text-right success">{{ App.timecards_total[day['value']]|slice(0, 5) }}</td>
										</tr>
									</tbody>
								</table>
							{% endif %}
 						</div>
					</div>
				</div>					
					
			{% endfor %}		
		{% endif %}
			<div class="ore-totali">
				<div class="text pull-left">{{ App.lang['ore totali']|capitalize }}</div>	
				<div class="value pull-right">{{ App.timecards_total_time|slice(0, 5) }}</div>
			</div>
		</div>
		
	</div>
	
	<div class="col-md-6 col-xs-12">	
		<form id="applicationForm" method="post" class="form-horizontal bg-info form-timecard" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm }}"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="dataID" class="col-md-3 control-label">{{ App.lang['data']|capitalize }}</label>
					<div class="col-md-5">	
						<input type="text" name="data" class="" placeholder="{{ App.lang['inserisci una data']|capitalize }}" id="dataDPID" value="">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
			</fieldset>		
			<fieldset>
				<div class="form-group">
					<label for="progettoID" class="col-md-3 control-label">{{ App.lang['progetto']|capitalize }}</label>
					<div class="col-md-7">
						<select name="progetto" class="form-control chosen-select" data-placeholder="{{ App.lang['seleziona un progetto']|capitalize }}">
							{% if App.progetti is iterable %}
								{% for value in App.progetti %}
									<option value="{{ value.id }}"{% if (App.item.id_project is defined) and (App.item.id_project == value.id)  %} selected="selected" {% endif %}>{{ value.title }}</option>														
								{% endfor %}
							{% endif %}		
						</select>										
			    	</div>
				</div>
			</fieldset>				
			<fieldset>
				<div class="form-group">
					<label for="startHourID" class="col-md-5 control-label">{{ App.lang['inizio']|capitalize }} - {{ App.lang['ore:minuti'] }}</label>
					<div class="col-md-7">
						<input type="text" class="" name="startHour" placeholder="{{ App.lang['inserisci ora inizio']|capitalize }}" id="startHourID" value="">	
						<span class="glyphicon glyphicon-time"></span>				
			    	</div>
				</div>
				<div class="form-group">
					<label for="endHourID" class="col-md-5 control-label">{{ App.lang['fine']|capitalize }} - {{ App.lang['ore:minuti'] }}</label>
					<div class="col-md-7">
						<input type="text" class="" name="endHour" placeholder="{{ App.lang['inserisci ora fine']|capitalize }}" id="endHourID" value="">	
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
			<div class="form-group">
				{% if (App.methodForm == 'updateTime' and App.item.id is defined and App.item.id > 0) %}
					<div class="col-md-6 text-center">
						<input type="hidden" name="id" value="{{ App.item.id }}">					
						<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ App.lang['modifica']|capitalize }}</button>
					</div>
					<div class="col-md-6 text-right">
						<button class="btn btn-danger timedelconfirm" href="{{ URLSITE }}{{ CoreRequest.action }}/deleteTime/{{ App.item.id }}" title="{{ App.lang['cancella']|capitalize }}">{{ App.lang['cancella']|capitalize }}</a>
					</div>
				{% else %}
				<div class="col-md-12 text-center">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ App.lang['invia']|capitalize }}</button>
				</div>
				{% endif %}					
			</div>
		</form>

		<hr class="divider-top-module">
		
		<div class="row">
			<div class="col-md-8"><big><strong>{{ App.lang['inserisci una timecard predefinita']|capitalize }}</strong></big>
			</div>
			<div class="col-md-4">
		 		<a class="btn btn-primary" href="{{ URLSITE }}{{ CoreRequest.action }}/listPite" title="{{ App.lang['gestisci le timecard predefinite']|capitalize }}">{{ App.lang['gestisci']|capitalize }}</a>
			</div>
		</div>

		<form id="applicationForm" method="post" class="form-horizontal bg-info form-timecard-pre" role="form" action="{{ URLSITE }}{{ CoreRequest.action }}/{{ App.methodForm1 }}"  enctype="multipart/form-data" method="post">
			<fieldset>
				<div class="form-group">
					<label for="dataID" class="col-md-3 control-label">{{ App.lang['data']|capitalize }}</label>
					<div class="col-md-5">	
						<input type="text" name="data1" class="" placeholder="{{ App.lang['inserisci una data']|capitalize }}" id="data1DPID" value="">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="project1ID" class="col-md-3 control-label">{{ App.lang['progetto']|capitalize }}</label>
					<div class="col-md-7">
						<select name="project1" class="form-control chosen-select" data-placeholder="{{ App.lang['seleziona un progetto']|capitalize }}">
							{% if App.progetti is iterable %}
								{% for value in App.progetti %}	
									<option value="{{ value.id }}"{% if (App.item.id_project is defined) and (App.item.id_project == value.id) %} selected="selected" {% endif %}>{{ value.title }}</option>														
								{% endfor %}
							{% endif %}		
						</select>										
			    	</div>
				</div>
				<div class="form-group">
					<label for="starthour1ID" class="col-md-4 control-label">{{ App.lang['inizio']|capitalize }} - {{ App.lang['ore:minuti']|title }}</label>
					<div class="col-md-5">
						<input type="text" class="" name="starthour1" placeholder="{{ App.lang['inserisci ora inizio']|capitalize }}" id="starthour1ID" value="">	
						<span class="glyphicon glyphicon-time"></span>				
			    	</div>
				</div>

				<div class="form-group">
			    	<label class="col-md-3 control-label">{{ App.lang['usa questo inizio']|capitalize }}</label>
					<div class="col-md-1">
						<input type="checkbox" name="usedata" id="usedataID" value="1">	
			    	</div>
				</div>
				
							
				<div class="form-group">
					<label for="timecardID" class="col-md-3 control-label">{{ App.lang['timecard']|capitalize }}</label>
					<div class="col-md-7">
						<select name="timecard" id="timecardID" class="form-control chosen-select" data-placeholder="{{ App.lang['seleziona una timecard']|capitalize }}">
							{% if App.allpreftimecard is iterable %}
								{% for value in App.allpreftimecard %}	
									<option value="{{ value.id }}">{{ value.title }} ({{ value.worktime }} {{ App.lang['hours'] }})</option>														
								{% endfor %}
							{% endif %}		
						</select>										
			    	</div>
				</div>
			</fieldset>
			<div class="form-group text-center">
				<button type="submit" name="submitForm" value="submit" class="btn btn-primary">{{ App.lang['invia']|capitalize }}</button>			
			</div>
		</form>
	</div>
</div>