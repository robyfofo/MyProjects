<!-- admin/site-levels/list.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-3 new">
  		<a href="{{ URLSITE }}{{ CoreRequest.action }}/new" title="Inserisci nuov<?php echo $this->App->params->labels['itemSex']; ?> <?php echo $this->App->params->labels['item']; ?>" class="btn btn-primary">Nuov<?php echo $this->App->params->labels['itemSex']; ?> <?php echo $this->App->params->labels['item']; ?></a>
	</div>
	<div class="col-md-7 help-small-list">
		{% if App.params.help_small is defined %}{{ App.params.help_small }}{% endif %}
	</div>
	<div class="col-md-2">
	</div>
</div>
<hr class="divider-top-module">
<form role="form" action="{{ URLSITE }}{{ CoreRequest.action }}" method="post" enctype="multipart/form-data">
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
								<input name="searchFromTable" value="<?php if(isset($this->mySessionVars[Core::$request->action]['srcTab']) && $this->mySessionVars[Core::$request->action]['srcTab'] != '') echo SanitizeStrings::cleanForFormInput($this->mySessionVars[Core::$request->action]['srcTab']); ?>" class="form-control input-md" type="search" onchange="this.form.submit();">
							</label>
						</div>
					</div>
				</div>
				<div class="table-responsive">				
					<table class="table table-striped table-bordered table-hover listData">
						<thead>
							<tr>
								{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}
									<th>ID</th>								
								{{ endif }}	
								<th>Titolo</th>
								<th>Moduli attivi</th>												
								<th></th>
							</tr>
						</thead>
						<tbody>				
							{% if App.items is iterable %}
								<?php foreach ($this->App->items AS $key => $value): ?>
									<tr>
										{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}
											<td>{{ value.id }}</td>
										{{ endif }}
										<td>{{ value.title_it); ?></td>									
										<td>{{ value.modules); ?></td>																								
										<td class="actions">
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/<?php echo ($value->active == 1 ? 'disactive' : 'active'); ?>/{{ value.id }}" title="<?php echo ($value->active == 1 ? 'Disattiva' : 'Attiva'); ?>"><i class="fa fa-<?php echo ($value->active == 1 ? 'unlock' : 'lock'); ?>"> </i></a>			 
											<a class="btn btn-default btn-circle" href="{{ URLSITE }}{{ CoreRequest.action }}/modify/{{ value.id }}" title="Modifica"><i class="fa fa-edit"> </i></a>
											<a onclick="bootbox.confirm();" class="btn btn-default btn-circle confirm" href="{{ URLSITE }}{{ CoreRequest.action }}/delete/{{ value.id }}" title="Cancella"><i class="fa fa-cut"> </i></a>
										</td>							
									</tr>	
								{% endfor %}
							{% else %}
								<tr>
									{% if (App.userLoggedData.is_root is defined) and (App.userLoggedData.is_root is same as(1)) %}<td></td>{{ endif }}
									<td colspan="3">Nessuna voce trovata!</td>
								</tr>
							{{ endif }}
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
									<a href="{{ URLSITE }}{{ CoreRequest.action }}/page/<?php echo $this->App->pagination->itemPrevious; ?>">Precedente</a>
								</li>								
								<?php if (is_array($this->App->pagination->pagePrevious)): ?>
									<?php foreach ($this->App->pagination->pagePrevious AS $key => $value): ?>
										<li><a href="{{ URLSITE }}{{ CoreRequest.action }}/page/<?php echo $value; ?>"><?php echo $value; ?></a></li>
									{% endfor %}
								{{ endif }}									
								<li class="active"><a href="{{ URLSITE }}{{ CoreRequest.action }}/page/<?php echo $this->App->pagination->page; ?>"><?php echo $this->App->pagination->page; ?></a></li>
								<?php if (is_array($this->App->pagination->pageNext)): ?>
									<?php foreach ($this->App->pagination->pageNext AS $key => $value): ?>
										<li><a href="{{ URLSITE }}{{ CoreRequest.action }}/page/<?php echo $value; ?>"><?php echo $value; ?></a></li>
									{% endfor %}
								{{ endif }}
								<li class="paginate_button next <?php if ($this->App->pagination->page >= $this->App->pagination->totalpage) echo ' disabled'; ?>">
									<a href="{{ URLSITE }}{{ CoreRequest.action }}/page/<?php echo $this->App->pagination->itemNext; ?>">Prossima</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				{{ endif }}
			</div>	
			<!-- /.form-inline wrapper -->
		</div>
		<!-- /.col-md-12 -->
	</div>
</form>