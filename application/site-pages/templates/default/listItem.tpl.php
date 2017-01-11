<!-- admin/site-pages/listItem.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-3 new">
  		<a href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/newItem" title="Inserisci un nuov<?php echo $this->App->params->labels['item']['itemSex']; ?> <?php echo$this->App->params->labels['item']['item']; ?>" class="btn btn-primary">Nuov<?php echo$this->App->params->labels['item']['itemSex']; ?> <?php echo$this->App->params->labels['item']['item']; ?></a>
	</div>
	<div class="col-md-7 help-small-list">
		<?php if (isset($this->App->params->help_small) && $this->App->params->help_small != '') echo SanitizeStrings::xss($this->App->params->help_small); ?>
	</div>
	<div class="col-md-2">
	</div>
</div>
<hr class="divider-top-module">
<div class="row">
	<div class="col-md-12">			
		<div class="table-responsive">									
			<table class="table table-striped table-bordered table-hover listData tree">
				<thead>
					<tr>		
						<th>Titolo</th>
						<th>Alias</th>				
						<?php if ($this->App->userLoggedData->is_root === 2): ?>	
							<th>ID</th>						
						<?php endif; ?>						
						<th>Ord</th>									
						<th>Template</th>
						<th>Tipo</th>								
						<th></th>						
					</tr>
				</thead>
				<tbody>
					<?php if (is_array($this->App->items) && count($this->App->items) > 0): ?>
						<?php foreach ($this->App->items AS $key => $value): ?>
							<tr class="treegrid-<?php echo $value->id; ?><?php if ($value->parent > 0) echo ' treegrid-parent-'.$value->parent; ?>">
								<td><?php	echo SanitizeStrings::htmlout($value->title_it); ?></td>
								<td><?php	echo $value->alias; ?></td>
								<?php if ($this->App->userLoggedData->is_root === 2): ?>	
									<td>
									<?php echo $value->id; ?>-<?php echo $value->parent; ?>
									</td>
								<?php endif; ?>						
								<td class="ordering">
									<?php if (isset($this->App->userLoggedData->is_root) && $this->App->userLoggedData->is_root === 1): ?>
										<span class="ordering"><?php echo $value->ordering; ?></span>
									<?php endif; ?>							
									<a class="" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($this->App->params->ordersType['item'] == 'DESC' ? 'less' : 'more'); ?>OrderingItem/<?php echo $value->id; ?>" title="Sposta sù"><i class="fa fa-long-arrow-up"> </i>&nbsp;</a>
									&nbsp;
									<a class="" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($this->App->params->ordersType['item'] == 'DESC' ? 'more' : 'less'); ?>OrderingItem/<?php echo $value->id; ?>" title="Sposta giu"><i class="fa fa-long-arrow-down"> </i>&nbsp;</a>
								</td>											
								<td><?php echo SanitizeStrings::htmlout($value->template_name); ?></td>	
								<td><?php echo SanitizeStrings::htmlout($value->type); ?></td>										
								<td class="actions">
									<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo ($value->active == 1 ? 'disactive' : 'active'); ?>Item/<?php echo $value->id; ?>" title="<?php echo ($value->active == 1 ? 'Disattiva' : 'Attiva'); ?>"><i class="fa fa-<?php echo ($value->active == 1 ? 'unlock' : 'lock'); ?>"> </i></a>			 
									<a class="btn btn-default btn-circle" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/modifyItem/<?php echo $value->id; ?>" title="Modifica"><i class="fa fa-edit"> </i></a>
									<a onclick="bootbox.confirm();" class="btn btn-default btn-circle confirm" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/deleteItem/<?php echo $value->id; ?>" title="Cancella"><i class="fa fa-cut"> </i></a>
								</td>
     						</tr> 
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<?php if (is_array($this->App->items) && count($this->App->items) > 0): ?><td colspan="2"></td><?php endif; ?>
							<td colspan="6">Nessuna voce trovata!</td>
						</tr>
					<?php endif; ?>
				</tbody>       
			</table>				
		</div>
		<!-- /.table-responsive -->
	</div>
	<!-- /.col-md-12 -->
</div>
<!-- /.row -->