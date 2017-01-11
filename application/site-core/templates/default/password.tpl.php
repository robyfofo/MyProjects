<!-- admin/site-core/password.tpl.php v.3.0.0. 04/11/2016 -->

<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="<?php echo URL_SITE_ADMIN; ?>password/NULL"  enctype="multipart/form-data" method="post">
			<div class="tab-content">
<!-- sezione dati base --> 	
				<div class="tab-pane active" id="datibase-tab">	
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-3 control-label">Username</label>
							<div class="col-md-3">
								<input type="text" name="username" class="form-control" id="usernameID" placeholder="Nome" value="<?php if(isset($this->App->item->username)) echo $this->App->item->username; ?>" readonly>
					    	</div>
						</div>			
						<div class="form-group">
							<label for="passwordID" class="col-md-3 control-label">Password</label>
							<div class="col-md-3">
								<input required type="password" required name="password" class="form-control" id="passwordID" placeholder="Password"  value="">
					    	</div>
						</div>				
						<div class="form-group">
							<label for="passwordCKID" class="col-md-3 control-label">Password di controllo</label>
							<div class="col-md-3">
								<input required type="password" required name="passwordCK" class="form-control" id="passwordCKID" placeholder="Password di controllo"  value="">
					    	</div>
						</div>
					</fieldset>
				</div>
<!-- sezione dati base -->					
			</div>
<!--/Tab panes -->			
		  <div class="form-group">
		    <div class="col-md-offset-3 col-md-9">
		    	<input type="hidden" name="id" value="<?php if(isset($this->App->id)) echo $this->App->id; ?>">
		    	<input type="hidden" name="method" value="update">
		      <button type="submit" class="btn btn-primary">Invia</button>
		    </div>
		  </div>
		</form>
	</div>
</div>