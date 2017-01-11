<!-- admin/site-files/listFolders.tpl.php v.3.0.0. 02/11/2016 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/newFold" title="Inserisci un nuov<?php echo $this->App->params->labels['fold']['itemSex']; ?> <?php echo $this->App->params->labels['fold']['item']; ?>" class="btn btn-primary">Nuov<?php echo $this->App->params->labels['fold']['itemSex']; ?> <?php echo $this->App->params->labels['fold']['item']; ?></a>
	</div>
	<div class="col-md-7 help-small-list">
		<?php if (isset($this->App->params->help_small) && $this->App->params->help_small != '') echo nl2br($this->App->params->help_small); ?>
	</div>
	<div class="col-md-2">
	</div>
</div>
<hr class="divider-top-module">
<form role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listFold" method="post" enctype="multipart/form-data">	
	<div class="row">
		<div class="col-md-12">			
			<div class="form-inline" role="grid">			
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>
								<select class="form-control input-md" name="itemsforpage" onchange="this.form.submit();" >
									<option value="5"<?php if($this->App->itemsForPage == 5) echo ' selected="selected"'; ?>>5</option>
									<option value="10"<?php if($this->App->itemsForPage == 10) echo ' selected="selected"'; ?>>10</option>
									<option value="25"<?php if($this->App->itemsForPage == 25) echo ' selected="selected"'; ?>>25</option>
									<option value="50"<?php if($this->App->itemsForPage == 50) echo ' selected="selected"'; ?>>50</option>
									<option value="100"<?php if($this->App->itemsForPage == 100) echo ' selected="selected"'; ?>>100</option>
								</select>
								Voci per pagina
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group pull-right">
							<label>
								Search:
								<input name="searchFromTable" value="<?php if(isset($this->mySessionVars[$this->App->sessionName]['srcTab']) && $this->mySessionVars[$this->App->sessionName]['srcTab'] != '') echo SanitizeStrings::cleanForFormInput($this->mySessionVars[$this->App->sessionName]['srcTab']); ?>" class="form-control input-md" type="search" onchange="this.form.submit();">
							</label>
						</div>
					</div>
				</div>
				<div class="table-responsive">				
					<table class="table table-striped table-bordered table-hover listData">
						<thead>
							<tr>
								<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>
									<th>ID</th>						
								<?php endif; ?>	
								<th>Titolo</th>
								<th>Cartella</th>		
								<th>Files</th>						
								<th></th>
							</tr>
						</thead>
						<tbody>				
							<?php if (is_array($this->App->items) && count($this->App->items) > 0): ?>
								<?php foreach ($this->App->items AS $key => $value): ?>
									<tr>										
										<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>
											<td><?php echo $value->id; ?></td>
										<?php endif; ?>	
										<td><?php echo SanitizeStrings::htmlout($value->title_it); ?></td>
										<td><?php echo SanitizeStrings::htmlout($value->folder_name); ?></td>
										<td><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listItem/<?php echo $value->id; ?>" title="Vai al contenuto della cartella"><i class="fa fa-file-o fa-fw"></i> - <?php echo $value->numitems; ?></a></td>									
										<td class="actions">
											<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($value->active == 1 ? 'disactive' : 'active'); ?>Fold/<?php echo $value->id; ?>" title="<?php echo ($value->active == 1 ? 'Disattiva' : 'Attiva'); ?>"><i class="fa fa-<?php echo ($value->active == 1 ? 'unlock' : 'lock'); ?>"> </i></a>			 
											<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/modifyFold/<?php echo $value->id; ?>" title="Modifica"><i class="fa fa-edit"> </i></a>
											<a onclick="bootbox.confirm();" class="btn btn-default btn-circle confirm" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/deleteFold/<?php echo $value->id; ?>" title="Cancella"><i class="fa fa-cut"> </i></a>
										</td>							
									</tr>	
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?><td></td><?php endif; ?>
									<td colspan="4">Nessuna voce trovata!</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
				<?php if ($this->App->pagination->itemsTotal > 0): ?>
				<div class="row">
					<div class="col-md-6">
						<div class="dataTables_info" id="dataTables_info" role="alert" aria-live="polite" aria-relevant="all">
							Mostra da <?php echo $this->App->pagination->firstPartItem ?> a <?php echo $this->App->pagination->lastPartItem; ?> di <?php echo $this->App->pagination->itemsTotal; ?> elementi
						</div>	
					</div>
					<div class="col-md-6">
						<div class="dataTables_paginate paging_simple_numbers" id="dataTables_paginate">
							<ul class="pagination">
								<li class="paginate_button previous<?php if ($this->App->pagination->page == 1) echo ' disabled'; ?>">
									<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageFold/<?php echo $this->App->pagination->itemPrevious; ?>">Precedente</a>
								</li>							
								<?php if (is_array($this->App->pagination->pagePrevious)): ?>
									<?php foreach ($this->App->pagination->pagePrevious AS $key => $value): ?>
										<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageFold/<?php echo $value; ?>"><?php echo $value; ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>									
								<li class="active"><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageFold/<?php echo $this->App->pagination->page; ?>"><?php echo $this->App->pagination->page; ?></a></li>									
								<?php if (is_array($this->App->pagination->pageNext)): ?>
									<?php foreach ($this->App->pagination->pageNext AS $key => $value): ?>
										<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageFold/<?php echo $value; ?>"><?php echo $value; ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>								
								<li class="paginate_button next <?php if ($this->App->pagination->page >= $this->App->pagination->totalpage) echo ' disabled'; ?>">
									<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageFold/<?php echo $this->App->pagination->itemNext; ?>">Prossima</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>	
			<!-- /.dataTables-example_wrapper -->			
		</div>
		<!-- /.col-md-12 -->
	</div>
</form>