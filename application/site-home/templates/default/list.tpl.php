<!-- 	admin/site-home/list.tpl.php v.3.0.0. 02/11/2016 -->

<div class="row">
	<div class="col-lg-4 new">
		<h5>Ultimo accesso: <?php 
		echo DateFormat::convertDatatimeFromISOtoITA($this->App->lastLogin); 
		?></h5>
 	</div>
	<div class="col-md-7 help-small-list">
		<?php if (isset($this->App->params->help_small) && $this->App->params->help_small != '') echo SanitizeStrings::xss($this->App->params->help_small); ?>
	</div>
	<div class="col-md-1">
	</div>
</div>

<div class="row">
	<?php if (is_array($this->App->homeBlocks) && count($this->App->homeBlocks) > 0): ?>
		<?php foreach ($this->App->homeBlocks AS $key => $value): ?>
			<?php if ($value['items'] > 0): ?>
				<div class="col-lg-3 col-md-6">
					<div class="panel <?php echo $value['class']; ?>">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa <?php echo $value['icon panel']; ?> fa-4x"></i>
									Nuov<?php echo $value['sex suffix']; ?>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge"><?php echo $value['items']; ?></div>
									<div><?php echo $value['label']; ?></div>							
								</div>
							</div>
						</div>
						<a href="<?php echo $value['url'] ?>/">
							<div class="panel-footer">
								<span class="pull-left">Vedi Dettagli</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>

<div class="row">
	<?php if (is_array($this->App->homeTables) && count($this->App->homeTables) > 0): ?>
		<?php foreach ($this->App->homeTables AS $key => $value): ?>
			<?php if (is_array($value['itemdata']) && count($value['itemdata']) > 0): ?>
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa <?php echo $value['icon panel']; ?> fa-fw"></i> <?php echo $value['label']; ?>                           
						</div>		
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-bordered table-hover table-striped listDataHome">
											<thead>
												<tr>
													<th><small>Data<small></th>
													<th><small>ID</small></th>
													<?php if (is_array($value['fields']) && count($value['fields']) > 0): ?>
														<?php foreach ($value['fields'] AS $keyF => $valueF): ?>
															<th>
																<?php echo $valueF['label']; ?>
															</th>												
														<?php endforeach; ?>
													<?php endif; ?>	
												</tr>
											</thead>
											<tbody>
												<?php if (is_array($value['itemdata']) && count($value['itemdata']) > 0): ?>
													<?php foreach ($value['itemdata'] AS $keyItemData => $valueItemData): ?>
														<tr>
															<td class="data" style="width:60px;">
																<?php echo $valueItemData->datacreated; ?>
															</td>
															<td class="id" style="width:40px;">
																<?php echo $valueItemData->id; ?>
															</td>
															
															<?php if (is_array($value['fields']) && count($value['fields']) > 0): ?>															
																<?php foreach ($value['fields'] AS $keyF => $valueF): ?>														
																	<td>
																		<?php echo $valueItemData->$keyF; ?>
																	</td>
																<?php endforeach; ?>
															<?php endif; ?>														
														</tr>
													<?php endforeach; ?>
												<?php endif; ?>				
											</tbody>										
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /.panel-body -->			
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div>