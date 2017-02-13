<!-- admin/site-core/nousername.tpl.php v.3.0.0. 04/11/2016 -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Richiesta username. Inserisci email</h3>
			</div>
			<div class="panel-body">
				<form id="applicationForm" class="form-signin" role="form" action="{{ URLSITE }}nousername" method="post">
					<fieldset>
						<div class="form-group">
							<input required class="form-control" placeholder="Indirizzo email" name="email" type="text" autocomplete="off">
						</div>							
						<!-- Change this to a button or input when using this as a form -->
						<input type="hidden" name="method" value="check" />
						<input type="submit" name="submit" value="Invia Email" class="btn btn-lg btn-success btn-block">
					</fieldset>
				</form>
			</div>
			<div class="panel-footer">
					<p>Dopo aver compilato correttamente i campi il sistema cercherà lo username associato all'indirizzo email indicato e vi sarà inviato.<br>
Se dopo la fine della procedura non riceverete l'email controllate che essa non sia nel filtro antispan (se presente) oppure contattare l'amministratore.</p> 
			</div>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-body">
				<p>Torna alla pagina di <a href="{{ URLSITE }}" title="Torna al login">Login</a></p>
			</div>			
		</div>
	</div>
</div>