<!-- admin/site-pages/formItem.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-3 new">
 	</div>
	<div class="col-md-7 help-small-form">
		<?php if (isset($this->App->params->help_small) && $this->App->params->help_small != '') echo SanitizeStrings::xss($this->App->params->help_small); ?>
	</div>
	<div class="col-md-2 help">
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#template-tab" data-toggle="tab">Template</a></li>
			<li><a href="#options-tab" data-toggle="tab">Opzioni</a></li>
			<?php foreach($this->globalSettings['languages'] AS $value): ?>		
				<li><a href="#datibase<?php echo $value; ?>-tab" data-toggle="tab">Dati Base <?php echo ucfirst($value); ?> <i class="fa"></i></a></li>
			<?php endforeach; ?>			
			<?php if ($this->App->templateItem->images > 0 ): ?>
			<li><a href="#pageImages-tab" data-toggle="tab">Immagini</a></li>
			<?php endif; ?>			
			<?php if ($this->App->templateItem->files > 0 ): ?>
			<li><a href="#pageFile-tab" data-toggle="tab">File</a></li>
			<?php endif; ?>			
			<?php if ($this->App->templateItem->galleries > 0 ): ?>
			<li><a href="#pageGalleries-tab" data-toggle="tab">Gallerie</a></li>
			<?php endif; ?>
			<?php if ($this->App->templateItem->blocks > 0 ): ?>
			<li><a href="#pageBlocks-tab" data-toggle="tab">Blocchi Contenuto</a></li>
			<?php endif; ?>
			<li><a href="#advanced-tab" data-toggle="tab">Avanzate <i class="fa"></i></a></li>			
		</ul>
		<!--/Nav tabs -->	
		<form id="applicationForm" class="form-horizontal" id="pagesFormID" role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo $this->App->methodForm; ?>"  enctype="multipart/form-data" method="post">		
			<!-- Tab panes -->
			<div class="tab-content">
				
<!--  template --> 
				<div class="tab-pane active" id="template-tab">
				
					<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>		
					<fieldset>
						<div class="form-group">
							<label class="col-md-2 control-label">ID pagina</label>
							<div class="col-md-1">
								<?php if(isset($this->App->item->id)) echo $this->App->item->id; ?>
					    	</div>
						</div>
					</fieldset>
					<?php endif; ?>
					
					<fieldset>
						<div class="form-group">
							<label for="id_templateID" class="col-md-2 control-label">Template</label>
							<div class="col-md-7">							
								<select name="id_template" id="id_templateID">								
									<?php if (is_array($this->App->templatesItem) && count($this->App->templatesItem) > 0): ?>
										<?php foreach($this->App->templatesItem AS $key=>$value): ?>		
											<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->templateItem->id) && $this->App->templateItem->id == $value->id) echo ' selected="selected"'; ?>>&nbsp;<?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?>&nbsp;</option>													
										<?php endforeach; ?>
									<?php endif; ?>		
								</select>
										
					    	</div>
						</div>
					</fieldset>	
						
					<fieldset id="templateDataID">			
						<div class="form-group">
							<div class="col-md-6">
								<?php echo $this->App->templateItem->comment_it; ?>
							</div>
							<div class="col-md-6">
								<?php if($this->App->templateItem->filename != ''): ?>
								<a href="<?php echo $this->App->templateUploadDir; ?><?php echo $this->App->templateItem->filename; ?>" rel="prettyPhoto[]" title="<?php echo $this->App->templateItem->filename; ?>">
									<img src="<?php echo $this->App->templateUploadDir; ?><?php echo $this->App->templateItem->filename; ?>" class="img-thumbnail" alt="<?php echo $this->App->templateItem->filename; ?>">
								</a>
								<?php else: ?>
									<img src="<?php echo $this->App->templateUploadDirDef; ?>default/image.png" class="img-thumbnail" alt="Immagine di default">
								<?php endif; ?>
							</div>
						</div>
					</fieldset>
						
				</div>
	<!--/template -->	
	
	<!-- sezione opzioni --> 
				<div class="tab-pane" id="options-tab">
				
					<fieldset>
						<div class="form-group">
							<label for="parentID" class="col-md-2 control-label">Genitore</label>
							<div class="col-md-7">							
								<select name="parent">
									<option value="0"></option>
									<?php if (is_array($this->App->subCategories) && count($this->App->subCategories) > 0): ?>
										<?php foreach($this->App->subCategories AS $value): ?>		
											<?php
											unset($value->breadcrumbs[count($value->breadcrumbs) - 1]);			
											$s = '';												
											foreach ($value->breadcrumbs AS $key1 => $value1) {
												if ( $value1['title_it'] != '') $s .= $value1['title_it'].'->';
												}										
											$s = $s.$value->title_it;									
											?>
											<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->parent) && $this->App->item->parent == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($s); ?></option>														
										<?php endforeach; ?>
									<?php endif; ?>		
								</select>									
					    	</div>
						</div>
					</fieldset>	
					
					<fieldset>
						<div class="form-group">
							<label for="aliasID" class="col-md-2 control-label">Alias</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="alias" placeholder="Inserisci un titolo alias" id="aliasID" rows="3" value="<?php if(isset($this->App->item->alias)) echo SanitizeStrings::cleanForFormInput($this->App->item->alias); ?>">
							</div>
						</div>
					</fieldset>			

<hr>
					
					<fieldset>					
						<div class="form-group">
							<label for="type" class="col-md-2 control-label">Tipo</label>
							<div class="col-md-7">							
								<select name="type">								
									<?php if (is_array($this->globalSettings['type pages']) && count($this->globalSettings['type pages']) > 0): ?>
										<?php foreach($this->globalSettings['type pages'] AS $key=>$value): ?>		
											<option value="<?php echo $key; ?>"<?php if(isset($this->App->item->type) && $this->App->item->type == $key) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value,ENT_QUOTES); ?></option>													
										<?php endforeach; ?>
									<?php endif; ?>		
								</select>									
					    	</div>
						</div>				

						<fieldset>
							<div class="form-group">
								<label for="urlID" class="col-md-2 control-label">URL<br>
								<small>{{URLSITE}} per url dinamico</small></label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="url" placeholder="Inserisci un URL {{URLSITE}} per url dinamico" id="urlID" rows="3" value="<?php if(isset($this->App->item->url)) echo SanitizeStrings::cleanForFormInput($this->App->item->url); ?>">
								</div>								
						
								<label for="targetID" class="col-md-1 control-label">Target</label>
								<div class="col-md-2">							
									<select class="form-control input-sm" name="target">	
									<option></option>			
										<?php if (is_array($this->globalSettings['link targets']) && count($this->globalSettings['link targets']) > 0): ?>
											<?php foreach($this->globalSettings['link targets'] AS $value): ?>												
												<option value="<?php echo $value; ?>"<?php if(isset($this->App->item->target) && $this->App->item->target == $value) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value); ?></option>														
											<?php endforeach; ?>
										<?php endif; ?>	
									</select>							
						    	</div>
							</div>
						</fieldset>	
					
						<fieldset>					
							<div class="form-group">
								<label for="moduleID" class="col-md-2 control-label">Link a modulo</label>
								<div class="col-md-7">							
									<select class="form-control input-sm col-md-3" name="module">	
									<option></option>			
										<?php if (is_array($this->App->modules) && count($this->App->modules) > 0): ?>
											<?php foreach($this->App->modules AS $value): ?>												
												<option value="<?php echo $value->alias; ?>"<?php if(isset($this->App->item->url) && $this->App->item->url == $value->alias) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->alias); ?></option>														
											<?php endforeach; ?>
										<?php endif; ?>	
									</select>							
						    	</div>
							</div>
						</fieldset>	
							
					</fieldset>
					<hr>		
					<fieldset>				
						<div class="form-group">
							<label for="menuID" class="col-md-2 control-label">In Menu</label>
							<div class="col-md-7">
								<input type="checkbox" name="menu" id="menuID" <?php if(isset($this->App->item->menu) && $this->App->item->menu == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>		

					<!-- se e un utente root visualizza l'input altrimenti lo genera o mantiene automaticamente -->	
					<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>		
					<fieldset>
						<div class="form-group">
							<label for="orderingID" class="col-md-2 control-label">Ordine</label>
							<div class="col-md-1">
								<input type="text" name="ordering" placeholder="Inserisci un ordine" class="form-control" id="orderingID" value="<?php if(isset($this->App->item->ordering)) echo $this->App->item->ordering; ?>">
					    	</div>
						</div>
					</fieldset>
					<?php else: ?>
						<input type="hidden" name="ordering" value="<?php if(isset($this->App->item->ordering)) echo $this->App->item->ordering; ?>">		
					<?php endif; ?>
					<!-- fine se root -->	
	
					<fieldset>
						<div class="form-group">
							<label for="activeID" class="col-md-2 control-label">Attiva</label>
							<div class="col-md-7">
								<input type="checkbox" name="active" id="activeID" <?php if(isset($this->App->item->active) && $this->App->item->active == 1) echo 'checked="checked"'; ?> value="1">
				    		</div>
				  		</div>
					</fieldset>		
				</div>
	<!--/sezione opzioni -->




<!--sezione generazione automatica tab dati base e contenuti in base alla lingua -->


<?php 
foreach($this->globalSettings['languages'] AS $lang): 
	$titleMETAField = 'title_meta_'.$lang;
	$titleMETAValue = (isset($this->App->item->$titleMETAField) ? $this->App->item->$titleMETAField : '');
	$titleSEOField = 'title_seo_'.$lang;
	$titleSEOValue = (isset($this->App->item->$titleSEOField) ? $this->App->item->$titleSEOField : '');
	$titleField = 'title_'.$lang;
	$titleValue = (isset($this->App->item->$titleField) ? $this->App->item->$titleField : '');

?>	

	<div class="tab-pane" id="datibase<?php echo $lang; 1?>-tab">	

		<fieldset>
			<div class="form-group">
				<label for="title_meta_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo META <?php echo ucfirst($lang); ?> </label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="title_meta_<?php echo $lang; ?>" placeholder="Inserisci un titolo META <?php echo ucfirst($lang); ?>" id="title_meta_<?php echo $lang; ?>ID" rows="3" value="<?php echo SanitizeStrings::cleanForFormInput($titleMETAValue); ?>">
				</div>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<label for="title_seo_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo SEO <?php echo ucfirst($lang); ?> </label>
				<div class="col-md-7">
					<input type="text" class="form-control" name="title_seo_<?php echo $lang; ?>" placeholder="Inserisci un titolo SEO <?php echo ucfirst($lang); ?>" id="title_seo_<?php echo $lang; ?>ID" rows="3" value="<?php echo SanitizeStrings::cleanForFormInput($titleSEOValue); ?>">
				</div>
			</div>
		</fieldset>

		<fieldset>
			<div class="form-group">
				<label for="title_<?php echo $lang; ?>ID" class="col-md-2 control-label">Titolo <?php echo ucfirst($lang); ?> </label>
				<div class="col-md-7">
					<input type="text"<?php if ($lang == 'it') echo ' required'; ?> class="form-control" name="title_<?php echo $lang; ?>" placeholder="Inserisci un titolo <?php echo ucfirst($lang); ?>" id="title_<?php echo $lang; ?>ID" rows="3" value="<?php echo SanitizeStrings::cleanForFormInput($titleValue); ?>">
				</div>
			</div>
		</fieldset>

				<?php if ($this->App->templateItem->contents_html > 0 ): ?>	
					<?php for ($x=1;$x<=$this->App->templateItem->contents_html;$x++){ ?>						
						<div class="form-group">
							<label for="content_html_<?php echo $lang; ?>_<?php echo $x; ?>ID" class="col-md-2 control-label">Contenuto HTML <?php echo $x; ?> <?php echo $lang; ?></label>
							<div class="col-md-7">
								<?php 
								$s = '';
								$arr = (array)$this->App->item->pageContents;
								if(is_array($arr) && array_key_exists('content_'.$lang.'_'.$x,$arr)){								
									$s = $arr['content_'.$lang.'_'.$x];
									}	
								?>
								<textarea name="content_html_<?php echo $lang; ?>_<?php echo $x; ?>" class="form-control editorHTML" id="content_html_<?php echo $lang; ?>_<?php echo $x; ?>ID" rows="15"><?php echo $s; ?></textarea>
					    	</div>
						</div>
					<?php } ?>		
				<?php endif; ?>
	</div>
<?php 
endforeach; 
?>
<!--/sezione generazione automatica tab dati base e contenuti in base alla lingua -->

	<!-- images	 -->
				<?php if ($this->App->templateItem->images > 0): ?>
				<div class="tab-pane" id="pageImages-tab">
					<h5>Immagini associate</h5>
					<fieldset>				
						<?php for ($x=1;$x<=$this->App->templateItem->images;$x++): ?>
						<div class="form-group">
							<label for="image_<?php echo $x; ?>ID" class="col-md-3 control-label">Immagine <?php echo $x; ?></label>						
							<select name="image[<?php echo $x; ?>]" id="image_<?php echo $x; ?>ID">		
								<option value=""></option>				
								<?php if (is_array($this->App->selectPageImages) && count($this->App->selectPageImages) > 0): ?>
									<?php foreach($this->App->selectPageImages AS $key=>$value): ?>		
										<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->pageImages[$x]->id_image) && $this->App->item->pageImages[$x]->id_image == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>	
							</select>		
						</div>													
						<?php endfor; ?>	
						
					</fieldset>			
				</div>
				<?php endif; ?>	
	
	<!--/images -->	
	
	<!-- file	 -->
				<?php if($this->App->templateItem->files > 0): ?>
				<div class="tab-pane" id="pageFile-tab">
					<h5>File associati</h5>
					<fieldset>				
						<?php for ($x=1;$x<=$this->App->templateItem->files;$x++): ?>
						<div class="form-group">
							<label for="file_<?php echo $x; ?>ID" class="col-md-3 control-label">File <?php echo $x; ?></label>						
							<select name="file[<?php echo $x; ?>]" id="file_<?php echo $x; ?>ID">		
								<option value=""></option>				
								<?php if (is_array($this->App->selectPageFiles) && count($this->App->selectPageFiles) > 0): ?>
									<?php foreach($this->App->selectPageFiles AS $key=>$value): ?>		
										<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->pageFiles[$x]->id_file) && $this->App->item->pageFiles[$x]->id_file == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>	
							</select>		
						</div>													
						<?php endfor; ?>		
					
					</fieldset>			
				</div>
				<?php endif; ?>	
	
	<!--/file -->
	
	<!-- gallerie	 -->
				<?php if($this->App->templateItem->galleries > 0): ?>
				<div class="tab-pane" id="pageGalleries-tab">
					<h5>Gallerie associate</h5>
					<fieldset>				
						<?php for ($x=1;$x<=$this->App->templateItem->galleries;$x++): ?>
						<div class="form-group">
							<label for="gallery_<?php echo $x; ?>ID" class="col-md-3 control-label">Galleria <?php echo $x; ?></label>						
							<select name="gallery[<?php echo $x; ?>]" id="file_<?php echo $x; ?>ID">		
								<option value=""></option>				
								<?php if (is_array($this->App->selectPageGalleries) && count($this->App->selectPageGalleries) > 0): ?>
									<?php foreach($this->App->selectPageGalleries AS $key=>$value): ?>		
										<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->pageGalleries[$x]->id_gallery) && $this->App->item->pageGalleries[$x]->id_gallery == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>	
							</select>		
						</div>													
						<?php endfor; ?>		
					
					</fieldset>			
				</div>
				<?php endif; ?>	
	
	<!--/gallerie -->		
	
	<!-- blocchi	 -->
				<?php if($this->App->templateItem->blocks > 0): ?>
				<div class="tab-pane" id="pageBlocks-tab">
					<h5>Blocchi associati</h5>
					<fieldset>				
						<?php for ($x=1;$x<=$this->App->templateItem->blocks;$x++): ?>
						<div class="form-group">
							<label for="block_<?php echo $x; ?>ID" class="col-md-3 control-label">Blocco <?php echo $x; ?></label>						
							<select name="block[<?php echo $x; ?>]" id="block_<?php echo $x; ?>ID">		
								<option value=""></option>				
								<?php if (is_array($this->App->selectPageBloks) && count($this->App->selectPageBloks) > 0): ?>
									<?php foreach($this->App->selectPageBloks AS $key=>$value): ?>		
										<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->item->pageBlocks[$x]->id_block) && $this->App->item->pageBlocks[$x]->id_block == $value->id) echo ' selected="selected"'; ?>><?php echo SanitizeStrings::cleanForFormInput($value->title_it); ?></option>
									<?php endforeach; ?>
								<?php endif; ?>	
							</select>		
						</div>													
						<?php endfor; ?>		
					
					</fieldset>			
				</div>
				<?php endif; ?>	
	<!--/blocchi -->	

<!-- sezione avanzate -->	
				<div class="tab-pane" id="advanced-tab">	
					<fieldset>
						<div class="form-group">
							<label for="Jscript_init_codeID" class="col-md-2 control-label">Codice Javascript inizio BODY</label>
							<div class="col-md-7">
								<textarea name="jscript_init_code" class="form-control" id="jscript_init_codeID" rows="4"><?php if(isset($this->App->item->jscript_init_code)) echo $this->App->item->jscript_init_code; ?></textarea>
							</div>
				  		</div>
					</fieldset>				
				</div>
<!--/sezione avanzate -->	

			</div>
			<!--/Tab panes -->	
				
			<hr>	
			
			<div class="form-group">
				<div class="col-md-offset-2 col-md-7">
					<input type="hidden" name="created" id="createdID" value="<?php if(isset($this->App->item->created)) echo $this->App->item->created; ?>">
			    	<input type="hidden" name="id" value="<?php if(isset($this->App->item->id)) echo $this->App->item->id; ?>">
			    	<input type="hidden" name="method" value="<?php echo $this->App->methodForm; ?>">		    	
			    	<input type="hidden" name="bk_parent" value="<?php if(isset($this->App->item->parent)) echo $this->App->item->parent; ?>">
			      <button type="submit" name="submitForm" value="submit" class="btn btn-primary">Invia</button>
			      <button type="submit" name="applyForm" value="apply" class="btn btn-primary">Applica</button>
			      <input type="hidden" name="id_pagina" id="id_paginaID" value="<?php echo (isset($this->App->item->id) ? $this->App->item->id : 0); ?>">
				</div>
	 			<div class="col-md-2">				
					<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listItem" title="Torna alla lista" class="btn btn-success">Indietro</a>
				</div>
			</div>

		</form>
	</div>
</div>