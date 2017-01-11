<!-- news/formItem.tpl.php v.2.6.2. 16/02/2016 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		<?php if (isset($this->appData->module_params->help_small) && $this->appData->module_params->help_small != '') echo ToolsStrings::xss($this->appData->module_params->help_small); ?>
	</div>
	<div class="col-md-2 help">
	</div>
</div>

<div class="row">
	<div class="col-md-12">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base <i class="fa"></i></a></li>
			<li><a href="#options-tab" data-toggle="tab">Opzioni <i class="fa"></i></a></li>
  		</ul>

		<form id="applicationForm" method="post" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/<?php echo $this->appData->methodForm; ?>"  enctype="multipart/form-data" method="post">

			<div class="tab-content">	
				<div class="tab-pane active" id="datibase-tab">	

<!-- sezione dati base dinamica lingue -->
			<?php foreach($this->globalSettings['languages'] AS $lang): 
				$titleField = 'title_'.$lang;
				$titleValue = (isset($this->appData->item->$titleField) ? htmlspecialchars($this->appData->item->$titleField,ENT_QUOTES,'UTF-8') : '');
			?>		
					<fieldset>
						<div class="form-group">
							<label for="title_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo <?php echo ucfirst($lang); ?> </label>
							<div class="col-md-7">
								<input<?php if ($lang == 'it') echo ' required'; ?> type="text" class="form-control" name="title_<?php echo $lang; ?>" placeholder="Inserisci un titolo <?php echo ucfirst($lang); ?>" id="title_<?php echo $lang; ?>ID" rows="3" value="<?php echo $titleValue; ?>">
							</div>
						</div>
					</fieldset>
									
				
			<?php endforeach; ?>
<!-- /sezione dati base dinamica lingue -->
				</div>



<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">			
					<fieldset>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">Attiva</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID" <?php if(isset($this->appData->item->active) && $this->appData->item->active == 1) echo 'checked="checked"'; ?> value="1">
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
					<input type="hidden" name="created" id="createdID" value="<?php if(isset($this->appData->item->created)) echo $this->appData->item->created; ?>">
					<input type="hidden" name="id" id="idID" value="<?php if(isset($this->id)) echo $this->id; ?>">
					<?php if($this->appData->module_params->multicategories == 0): ?><input type="hidden" name="id_cat" id="id_catID" value="0"><?php endif; ?>
					<input type="hidden" name="method" value="<?php echo $this->appData->methodForm; ?>">
					<button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
					<?php if ($this->id > 0): ?>
						<button type="submit" name="applyForm" value="apply" class="btn btn-primary">Applica</button>
					<?php endif; ?>
				</div>
				<div class="col-md-2">				
					<a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/listItem" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>

		</form>
	</div>
</div>
