<!-- admin/site-blocks/form.tpl.php v.3.0.0. 03/11/2016 -->
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
			<?php foreach($this->globalSettings['languages'] AS $value): ?>		
				<li class="<?php if($value == 'it') echo 'active'; ?>"><a href="#datibase<?php echo $value; ?>-tab" data-toggle="tab">Dati Base <?php echo ucfirst($value); ?> <i class="fa"></i></a></li>
			<?php endforeach; ?>
			<li><a href="#options-tab" data-toggle="tab">Opzioni <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">
			<div class="tab-content">		
<!-- sezione dati base dinamica lingue -->
			<?php foreach($this->globalSettings['languages'] AS $lang): 
				$titleField = 'title_'.$lang;
				$titleValue = (isset($this->App->item->$titleField) ? $this->App->item->$titleField : '');
				$contentField = 'content_'.$lang;
				$contentValue = (isset($this->App->item->$contentField) ? $this->App->item->$contentField : '');	
			?>		
				<div class="tab-pane<?php if($lang == 'it') echo ' active'; ?>" id="datibase<?php echo $lang; ?>-tab">
					<fieldset>
						<div class="form-group">
							<label for="title_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo <?php echo ucfirst($lang); ?> </label>
							<div class="col-md-7">
								<input<?php if ($lang == 'it') echo ' required'; ?> type="text" class="form-control" name="title_<?php echo $lang; ?>" placeholder="Inserisci un titolo <?php echo ucfirst($lang); ?>" id="title_<?php echo $lang; ?>ID" rows="3" value="<?php echo SanitizeStrings::cleanForFormInput($titleValue); ?>">
							</div>
						</div>
					</fieldset>				
					<fieldset>
						<div class="form-group">
							<label for="content_<?php echo $lang; ?>ID" class="col-md-2 control-label">Contenuto <?php echo ucfirst($lang); ?> </label>
							<div class="col-md-8">
								<textarea name="content_<?php echo $lang; ?>" class="form-control editorHTML" id="content_<?php echo $lang; ?>ID" rows="5"><?php echo $contentValue; ?></textarea>
							</div>
						</div>
					</fieldset>			
				</div>
			<?php endforeach; ?>
<!-- /sezione dati base dinamica lingue -->
<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">		
					<fieldset>
						<div class="form-group">
							<label for="aliasID" class="col-md-2 control-label">Alias</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="alias" placeholder="Inserisci un titolo alias" id="aliasID" rows="3" value="<?php if(isset($this->App->item->alias)) echo SanitizeStrings::cleanForFormInput($this->App->item->alias); ?>">
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
					<?php if($this->App->params->subcategories == 0 && $this->App->params->categories == 0): ?><input type="hidden" name="id_cat" id="id_catID" value="0"><?php endif; ?>
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