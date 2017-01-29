<!-- admin/projects/formItem.tpl.php v.3.0.0. 16/01/2017 -->
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
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<div class="tab-content">			
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
						<div class="form-group">
							<label for="titleID" class="col-md-3 control-label">Titolo </label>
							<div class="col-md-7">
								<input required type="text" class="form-control" name="title" placeholder="Inserisci un title" id="titleID" rows="3" value="<?php if(isset($this->App->item->title)) echo SanitizeStrings::cleanForFormInput($this->App->item->title); ?>">
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="startHourID" class="col-md-3 control-label">Partenza - Ore:Minuti</label>
							<div class="col-md-7">
								<input type="text" class="" name="starthour" placeholder="Inserisci ora partenza" id="starthourID" rows="1" value="">	
								<span class="glyphicon glyphicon-time"></span>				
					    	</div>
						</div>
						<div class="form-group">
							<label for="endhourID" class="col-md-3 control-label">Fine - Ore:Minuti</label>
							<div class="col-md-7">
								<input type="text" class="" name="endhour" placeholder="Inserisci ora fine" id="endhourID" rows="1" value="">	
								<span class="glyphicon glyphicon-time"></span>							
					    	</div>
						</div>
					</fieldset>			
					<fieldset>
						<div class="form-group">
							<label for="contentID" class="col-md-3 control-label">Contenuto</label>
							<div class="col-md-8">
								<textarea name="content" class="form-control" id="contentID" rows="5"><?php if (isset($this->App->item->content)) echo $this->App->item->content; ?></textarea>
							</div>
						</div>
					</fieldset>			
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
					<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listPite" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>
		</form>
	</div>
</div>