<!-- admin/site-core/login.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Inserisci username e password</h3>
			</div>
			<div class="panel-body">
				<form id="no-applicationForm" class="form-signin" role="form" action="<?php echo URL_SITE_ADMIN; ?>login" method="post" autocomplete="off">
					<fieldset>
						<div class="form-group">
							<input required class="form-control" placeholder="Username" name="username" type="text" autocomplete="off">
						</div>
						<div class="form-group">
							<input required class="form-control" placeholder="Password" name="password" type="password" value="" autocomplete="off">
						</div>						
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="Login" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>					
			</div>
			<div class="panel-footer">
					<a href="<?php echo URL_SITE_ADMIN; ?>nousername" title="Clicca per recuperare lo username">Username</a> o <a href="<?php echo URL_SITE_ADMIN; ?>nopassword" title="Clicca per recuperare la password">Password</a> dimenticati?
			</div>
		</div>
	</div>
</div>