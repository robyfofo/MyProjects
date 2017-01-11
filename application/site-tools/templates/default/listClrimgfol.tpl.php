<!-- site-tools/listCrlimgfol.tpl.php v.2.6.4. 17/05/2016 -->
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
	<p><big>Cancella i files di cache delle immagini del sito più vecchi di <b>30</b> giorni.</big></p>
	Cartella: <b><big><?php echo $this->App->folder; ?></big></b>
	<br>	
	<?php if($this->App->clearStatus == false): ?>
		Dimensioni: <?php echo $this->App->OLDfolderSize; ?> Byte
		<br>
		Files: <?php echo $this->App->OLDnumFilesfolder; ?>
		<br>
		<br>
		<br>
		<button id="deleteID" class="btn btn-warning" href="<?php echo URL_SITE_ADMIN; ?><?php echo Core::$request->action; ?>/<?php echo Core::$request->method; ?>/clear">Cancella!</button>
	<?php endif; ?>	
	<?php if($this->App->clearStatus == true): ?>
		Dimensioni: <?php echo $this->App->OLDfolderSize; ?> Byte
		<br>
		Files: <?php echo $this->App->OLDnumFilesfolder; ?>
		<hr>
		Sono stati cancellati <b><big><?php echo $this->App->filesDeleted; ?></big></b> files!
		<hr>
		<b>NUOVE</b> Dimensioni: <?php echo $this->App->folderSizeN; ?> Byte
		<br>
		<b>NUOVI</b> Files: <?php echo $this->App->numFilesfolderN; ?>
	<?php endif; ?>
	</div>
</div>

