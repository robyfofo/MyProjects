<!-- admin/site-core/password.tpl.php v.1.0.0. 14/02/2017 -->

<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#datibase-tab" data-toggle="tab">Dati Base <i class="fa"></i></a></li>
  		</ul>
		<form id="applicationForm" class="form-horizontal" role="form" action="{{ URLSITE }}password/NULL"  enctype="multipart/form-data" method="post">
			<div class="tab-content">
<!-- sezione dati base --> 	
				<div class="tab-pane active" id="datibase-tab">	
					<fieldset>
						<div class="form-group">
							<label for="nameID" class="col-md-3 control-label">{{ App.lang['username']|capitalize }}</label>
							<div class="col-md-3">
								<input type="text" name="username" class="form-control" id="usernameID" placeholder="{{ App.lang['inserisci un username']|capitalize }}" value="{{ App.item.username }}" readonly>
					    	</div>
						</div>			
						<div class="form-group">
							<label for="passwordID" class="col-md-3 control-label">{{ App.lang['password']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="password" required name="password" class="form-control" id="passwordID" placeholder="{{ App.lang['inserisci una password']|capitalize }}"  value="">
					    	</div>
						</div>				
						<div class="form-group">
							<label for="passwordCKID" class="col-md-3 control-label">{{ App.lang['password di controllo']|capitalize }}</label>
							<div class="col-md-3">
								<input required type="password" required name="passwordCK" class="form-control" id="passwordCKID" placeholder="{{ App.lang['inserisci una password di controllo']|capitalize }}"  value="">
					    	</div>
						</div>
					</fieldset>
				</div>
<!-- sezione dati base -->					
			</div>
<!--/Tab panes -->			
		  <div class="form-group">
		    <div class="col-md-offset-3 col-md-9">
		    	<input type="hidden" name="id" value="{{ App.id }}">
		    	<input type="hidden" name="method" value="update">
		      <button type="submit" class="btn btn-primary">{{ App.lang['invia']|capitalize }}</button>
		    </div>
		  </div>
		</form>
	</div>
</div>