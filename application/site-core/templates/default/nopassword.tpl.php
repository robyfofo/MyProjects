<!-- adin/site-core/nopasssword.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ App.lang['nopassword core - intro'] }}</h3>
			</div>
			<div class="panel-body">
				<form id="applicationForm" class="form-signin" role="form" action="{{ URLSITE }}nopassword" method="post">
					<fieldset>
						<div class="form-group">
							<input required class="form-control" placeholder="{{ App.lang['nome utente']|capitalize }}" name="username" type="text" autocomplete="off">
						</div>							
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="{{ App.lang['invia']|capitalize }} {{ App.lang['email']}}" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>					
			</div>
			<div class="panel-footer">
					<p>Dopo aver compilato correttamente i campi il sistema genererà una password casuale che vi sarà inviata nella email indicata nel profilo.<br>
Se dopo la fine delle procedura non riceverete l'email controllate che essa non sia nel filtro antispan (se presente) oppure contattare l'amministratore.{{ App.lang['nopassword core - testo']|raw }}</p> 
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<p>{{ App.lang['torna alla pagina']|capitalize }} <a href="{{ URLSITE }}" title="{{ App.lang['torna alla pagina %PAGE%']|replace({'%PAGE%': App.lang['loggati']})|capitalize }}">{{ App.lang['loggati']|capitalize }}</a></p>
			</div>			
		</div>
	</div>
</div>