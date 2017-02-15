<!-- admin/site-core/login.tpl.php v.1.0.0. 14/02/2017 -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ App.lang['inserisci username e password']|capitalize }}</h3>
			</div>
			<div class="panel-body">
				<form id="no-applicationForm" class="form-signin" role="form" action="{{ URLSITE }}login" method="post" autocomplete="off">
					<fieldset>
						<div class="form-group">
							<input required class="form-control" placeholder="Username" name="username" type="text" autocomplete="off">
						</div>
						<div class="form-group">
							<input required class="form-control" placeholder="Password" name="password" type="password" value="" autocomplete="off">
						</div>						
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="{{ App.lang['loggati']|capitalize }}" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>					
			</div>
			<div class="panel-footer">
					<a href="{{ URLSITE }}nousername" title="{{ App.lang['clicca per recuperare lo username']|capitalize }}">{{ App.lang['username']|capitalize }}</a> o <a href="{{ URLSITE }}nopassword" title="{{ App.lang['clicca per recuperare la password']|capitalize }}">{{ App.lang['password']|capitalize }}</a> {{ App.lang['dimenticati'] }}
			</div>
		</div>
	</div>
</div>