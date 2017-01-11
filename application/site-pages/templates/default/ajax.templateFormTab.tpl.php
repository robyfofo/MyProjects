<!-- admin/site-pages/formTemplatesData.tpl.php v.3.0.0. 29/10/2016 -->
<?php if (isset($App->userLoggedData->is_root) && $App->userLoggedData->is_root === 1): ?>	
	<fieldset>
		<div class="form-group">
			<label class="col-sm-2 control-label">ID pagina</label>
				<div class="col-sm-1">
					<?php if(isset($id_pagina)) echo $id_pagina; ?>
	 			</div>
		</div>
	</fieldset>
<?php endif; ?>	
<fieldset>
	<div class="form-group">
		<label for="id_templateID" class="col-sm-2 control-label">Template</label>
		<div class="col-sm-7">							
			<select name="id_template" id="id_templateID">								
				<?php if (is_array($templatesItem) && count($templatesItem) > 0): ?>
					<?php foreach($templatesItem AS $key=>$value): ?>		
						<option value="<?php echo $value->id; ?>"<?php if(isset($id_template) && $id_template == $value->id) echo ' selected="selected"'; ?>>&nbsp;<?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?>&nbsp;</option>													
					<?php endforeach; ?>
				<?php endif; ?>		
			</select>
					
    	</div>
	</div>
</fieldset>	
<fieldset>
	<div class="form-group">
		<div class="col-sm-6">
			<?php if(isset($_POST['comment']) && $_POST['comment'] != '') echo $_POST['comment']; ?>
		</div>
		<div class="col-sm-6">
			<?php if(isset($_POST['filename']) && $_POST['filename'] != ''): ?>
			<a href="<?php echo $App->templateUploadDir; ?><?php echo $_POST['filename']; ?>" rel="prettyPhoto[]" title="<?php echo $_POST['filename']; ?>">
				<img src="<?php echo $App->templateUploadDir; ?><?php echo $_POST['filename']; ?>" class="img-thumbnail" alt="<?php echo $_POST['filename']; ?>">
			</a>
			<?php else: ?>
				<img src="<?php echo $App->templateUploadDirDef; ?>default/image.png" class="img-thumbnail" alt="Immagine di default">
			<?php endif; ?>
		</div>
	</div>
</fieldset>					