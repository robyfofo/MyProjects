<!-- admin/site-files/formFolder.tpl.php v.3.0.0. 02/11/2016 -->
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
		</ul>		
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<!-- Tab panes -->
			<div class="tab-content">		
				<div class="tab-pane active" id="datibase-tab">
					<fieldset>
			<!-- sezione dati base dinamica lingue -->
						<?php foreach($this->globalSettings['languages'] AS $lang): 
							$titleField = 'title_'.$lang;
							$titleValue = (isset($this->App->item->$titleField) ? $this->App->item->$titleField : '');			?>		
							<div class="form-group">
								<label for="title_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo <?php echo ucfirst($lang); ?> </label>
								<div class="col-md-7">
									<input<?php if ($lang == 'it') echo ' required'; ?> type="text" class="form-control" name="title_<?php echo $lang; ?>" placeholder="Inserisci un titolo <?php echo ucfirst($lang); ?>" id="title_<?php echo $lang; ?>ID" rows="3" value="<?php echo htmlspecialchars($titleValue,ENT_QUOTES,'UTF-8'); ?>">
								</div>
							</div>
						<?php endforeach; ?>
			<!-- /sezione dati base dinamica lingue -->
					</fieldset>	
					<hr>					
					<fieldset>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">Attiva</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID" <?php if(isset($this->App->item->active) && $this->App->item->active == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>					
				</div>		
			</div>
			<!--/Tab panes -->	
			<hr>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="created" id="createdID" value="<?php if(isset($this->App->item->created)) echo $this->App->item->created; ?>">
					<input type="hidden" name="id" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
					<input type="hidden" name="method" value="<?php echo $this->App->methodForm; ?>">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
					<?php if ($this->App->id > 0): ?>
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">Applica</button>
					<?php endif; ?>
				</div>
				<div class="col-md-2">				
					<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listFold" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>
		</form>
	</div>
</div>