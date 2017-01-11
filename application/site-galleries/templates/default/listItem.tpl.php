<!-- admin/site-galleries/listImages.tpl.php v.3.0.0. 03/11/2016 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/newItem" title="Inserisci un nuov<?php echo $this->App->params->labels['item']['itemSex']; ?> <?php echo $this->App->params->labels['item']['item']; ?>" class="btn btn-primary">Nuov<?php echo $this->App->params->labels['item']['itemSex']; ?> <?php echo $this->App->params->labels['item']['item']; ?></a>
	</div>
	<div class="col-md-7 help-small-list">
		<?php if (isset($this->App->params->help_small) && $this->App->params->help_small != '') echo nl2br($this->App->params->help_small); ?>
	</div>
	<div class="col-md-2">
	</div>
</div>
<hr class="divider-top-module">
<form role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/listImages" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">			
			<div class="form-inline" role="grid">				
				<div class="row">
					<div class="col-md-12">							
						<div class="form-group">
							<label>
								Cartella
							</label>								
							<select class="form-control input-md" name="id_cat" onchange="this.form.submit();" >
								<option value="0"<?php if($this->App->id_cat == 0) echo ' selected="selected"'; ?>>Tutte</option>
								<?php if (is_array($this->App->categoriesData) && count($this->App->categoriesData) > 0): ?>
									<?php foreach($this->App->categoriesData AS $key=>$value): ?>												
										<option value="<?php echo $value->id; ?>"<?php if(isset($this->App->id_cat) && $this->App->id_cat == $value->id) echo ' selected="selected"'; ?>><?php echo htmlspecialchars($value->title_it,ENT_QUOTES,'UTF-8'); ?></option>														
									<?php endforeach; ?>
								<?php endif; ?>	
							</select>								
						</div>
					</div>
				</div>					
				<hr>					
				<div class="row">
					<div class="col-md-6">						
						<div class="form-group">
							<label>
								<select class="form-control input-sm" name="itemsforpage" onchange="this.form.submit();" >
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
									<th>ID Cat</th>									
								<?php endif; ?>
								<th>Ord.</th>
								<th>Titolo</th>							
								<th>File</th>
								<th></th>
							</tr>
						</thead>
						<tbody>				
							<?php if (is_array($this->App->items) && count($this->App->items) > 0): ?>
								<?php 
								foreach ($this->App->items AS $key => $value):	
								?>
									<tr>
										<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>	
											<td><?php echo $value->id; ?></td>
											<td><?php echo $value->id_cat; ?></td>
										<?php endif; ?>
										<td class="ordering-admin">
											<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>	
											<span class="ordering"><?php echo $value->ordering; ?></span>
											<?php endif; ?>							
											<a class="" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($this->App->params->ordersType['item'] == 'ASC' ? 'less' : 'more'); ?>OrderingItem/<?php echo $value->id; ?>" title="Sposta sù"><i class="fa fa-long-arrow-up"> </i>&nbsp;</a>
											&nbsp;
											<a class="" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($this->App->params->ordersType['item'] == 'ASC' ? 'more' : 'less'); ?>OrderingItem/<?php echo $value->id; ?>" title="Sposta giu"><i class="fa fa-long-arrow-down"> </i>&nbsp;</a>
										</td>																								
										<td><?php echo SanitizeStrings::htmlout($value->title_it); ?></td>
										<td>	
											<a class="" href="<?php echo $this->App->params->uploadDirs['item']; ?><?php echo $value->folder_name; ?><?php echo $value->filename; ?>" rel="prettyPhoto[]" title="<?php echo $value->org_filename; ?>">
												<img  class="img-thumbnail"  src="<?php echo $this->App->params->uploadDirs['item']; ?><?php echo $value->folder_name; ?><?php echo $value->filename; ?>" alt="<?php echo $value->org_filename; ?>">
											</a>
										</td>	
										<td class="actions">
											<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($value->active == 1 ? 'disactive' : 'active'); ?>Item/<?php echo $value->id; ?>" title="<?php echo ($value->active == 1 ? 'Disattiva' : 'Attiva'); ?>"><i class="fa fa-<?php echo ($value->active == 1 ? 'unlock' : 'lock'); ?>"> </i></a>			 
											<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/modifyItem/<?php echo $value->id; ?>" title="Modifica"><i class="fa fa-edit"> </i></a>
											<a onclick="bootbox.confirm();" class="btn btn-default btn-circle confirm" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/deleteItem/<?php echo $value->id; ?>" title="Cancella"><i class="fa fa-cut"> </i></a>
										</td>							
									</tr>	
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?><td colspan="2"></td><?php endif; ?>
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
									<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageItem/<?php echo $this->App->pagination->itemPrevious; ?>">Precedente</a>
								</li>
								<?php if (is_array($this->App->pagination->pagePrevious)): ?>
									<?php foreach ($this->App->pagination->pagePrevious AS $key => $value): ?>
										<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageItem/<?php echo $value; ?>"><?php echo $value; ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>									
								<li class="active"><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageImages/<?php echo $this->App->pagination->page; ?>"><?php echo $this->App->pagination->page; ?></a></li>									
								<?php if (is_array($this->App->pagination->pageNext)): ?>
									<?php foreach ($this->App->pagination->pageNext AS $key => $value): ?>
										<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageItem/<?php echo $value; ?>"><?php echo $value; ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>								
								<li class="paginate_button next <?php if ($this->App->pagination->page >= $this->App->pagination->totalpage) echo ' disabled'; ?>">
									<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/pageItem/<?php echo $this->App->pagination->itemNext; ?>">Prossima</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>	
			<!-- /.form-inline wrapper -->
		</div>
		<!-- /.col-md-12 -->
	</div>
</form>