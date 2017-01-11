<!-- news/listItem.tpl.php v.2.6.2. 16/02/2016 -->
<div class="row">
	<div class="col-md-3 new">
 		<a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/newItem" title="Inserisci nuov<?php echo $this->appData->labels['item']['itemSex']; ?> <?php echo $this->appData->labels['item']['item']; ?>" class="btn btn-primary">Nuov<?php echo $this->appData->labels['item']['itemSex']; ?> <?php echo $this->appData->labels['item']['item']; ?></a>
	</div>
	<div class="col-md-7 help-small-list">
		<?php if (isset($this->appData->module_params->help_small) && $this->appData->module_params->help_small != '') echo ToolsStrings::xss($this->appData->module_params->help_small); ?>
	</div>
	<div class="col-md-2">
	</div>
</div>
<form role="form" action="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/listItem" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<div class="form-inline" role="grid">								
					<div class="row">
						<div class="col-md-6">
							<div class="">
								<div class="form-group">
									<label>
										<select class="form-control input-md" name="itemsforpage" onchange="this.form.submit();" >
											<option value="5"<?php if($this->appData->itemsForPage == 5) echo ' selected="selected"'; ?>>5</option>
											<option value="10"<?php if($this->appData->itemsForPage == 10) echo ' selected="selected"'; ?>>10</option>
											<option value="25"<?php if($this->appData->itemsForPage == 25) echo ' selected="selected"'; ?>>25</option>
											<option value="50"<?php if($this->appData->itemsForPage == 50) echo ' selected="selected"'; ?>>50</option>
											<option value="100"<?php if($this->appData->itemsForPage == 100) echo ' selected="selected"'; ?>>100</option>
										</select>
										Voci per pagina
									</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="table_filter text-right">
								<label>
									Search:
									<input name="searchFromTable" value="<?php if(isset($this->mySessionVars[$this->subAction]['srcTab']) && $this->mySessionVars[$this->subAction]['srcTab'] != '') echo  htmlspecialchars($this->mySessionVars[$this->subAction]['srcTab'],ENT_QUOTES,'UTF-8'); ?>" class="form-control input-sm" type="search" onchange="this.form.submit();">
								</label>
							</div>
						</div>
					</div>
				
					<table class="table table-striped table-bordered table-hover listData">
						<thead>
							<tr>
								<?php if ($this->mySessionVars['usr']['root'] === 1): ?>	
									<th>ID</th>								
								<?php endif; ?>	
							
								<th>Titolo</th>
													
								<th></th>
							</tr>
						</thead>
						<tbody>				
							<?php if (is_array($this->appData->items) && count($this->appData->items) > 0): ?>
								<?php foreach ($this->appData->items AS $key => $value): ?>
									<tr>
										<?php if ($this->mySessionVars['usr']['root'] === 1): ?>	
											<td><?php echo $value->id; ?></td>
										<?php endif; ?>
						
										<td><?php echo htmlspecialchars($value->title_it,ENT_QUOTES,'UTF-8'); ?></td>										
										<td class="actions">
											<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/<?php echo ($value->active == 1 ? 'disactive' : 'active'); ?>Item/<?php echo $value->id; ?>" title="<?php echo ($value->active == 1 ? 'Disattiva' : 'Attiva'); ?>"><i class="fa fa-<?php echo ($value->active == 1 ? 'unlock' : 'lock'); ?>"> </i> </a>			 
											<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/modifyItem/<?php echo $value->id; ?>" title="Modifica"><i class="fa fa-edit"> </i> </a>
											<a onclick="bootbox.confirm();" class="btn btn-default btn-circle confirm" href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/deleteItem/<?php echo $value->id; ?>" title="Cancella"><i class="fa fa-cut"> </i></a>
										</td>							
									</tr>	
								<?php endforeach; ?>
							<?php else: ?>
								<tr>
									<?php if ($this->mySessionVars['usr']['root'] === 1): ?>	<td></td><?php endif; ?>
									<td colspan="2">Nessuna voce trovata!</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
					
					<?php if ($this->appData->pagination->itemsTotal > 0): ?>
					<div class="row">
						<div class="col-md-6">
							<div class="dataTables_info" id="dataTables_info" role="alert" aria-live="polite" aria-relevant="all">
								Mostra da <?php echo $this->appData->pagination->firstPartItem ?> a <?php echo $this->appData->pagination->lastPartItem; ?> di <?php echo $this->appData->pagination->itemsTotal; ?> elementi
							</div>	
						</div>
						<div class="col-md-6">
							<div class="dataTables_paginate paging_simple_numbers" id="dataTables_paginate">
								<ul class="pagination">
									<li class="paginate_button previous<?php if ($this->appData->pagination->page == 1) echo ' disabled'; ?>">
										<a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/pageItem/<?php echo $this->appData->pagination->itemPrevious; ?>">Precedente</a>
									</li>
									
									<?php if (is_array($this->appData->pagination->pagePrevious)): ?>
										<?php foreach ($this->appData->pagination->pagePrevious AS $key => $value): ?>
											<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/pageItem/<?php echo $value; ?>"><?php echo $value; ?></a></li>
										<?php endforeach; ?>
									<?php endif; ?>
										
									<li class="active"><a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/pageItem/<?php echo $this->appData->pagination->page; ?>"><?php echo $this->appData->pagination->page; ?></a></li>
										
									<?php if (is_array($this->appData->pagination->pageNext)): ?>
										<?php foreach ($this->appData->pagination->pageNext AS $key => $value): ?>
											<li><a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/pageItem/<?php echo $value; ?>"><?php echo $value; ?></a></li>
										<?php endforeach; ?>
									<?php endif; ?>
									
									
									<li class="paginate_button next <?php if ($this->appData->pagination->page >= $this->appData->pagination->totalpage) echo ' disabled'; ?>">
										<a href="<?php echo URL_SITE_ADMIN; ?><?php echo $this->action; ?>/pageItem/<?php echo $this->appData->pagination->itemNext; ?>">Prossima</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php endif; ?>

				</div>	
				<!-- /.dataTables-example_wrapper		 -->
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.col-md-12 -->
	</div>
</form>