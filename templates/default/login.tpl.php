<!-- admin/templates/default/login.tpl.php v.2.6.4. 15/06/2016 -->
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Roberto" >

    <title><?php echo SITE_NAME; ?> - <?php echo $this->App->pageTitle?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Plugin CSS - Dashboard -->
    <link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrapValidator/bootstrapValidator.min.css" rel="stylesheet">
    
    <!-- Other Css -->
    <link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/css/default.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<!-- default vars useful for javascript -->
		<script language="javascript">
			siteUrl='<?php echo URL_SITE; ?>';
			sitePath='<?php echo PATH_SITE; ?>';			
			siteUrlAdmin='<?php echo URL_SITE_ADMIN; ?>';
			siteAdminPath='<?php echo PATH_SITE_ADMIN; ?>';			
			siteTemplateUrl='<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/';
			siteTemplatePath='<?php echo PATH_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/';			
			siteDocumentPath='<?php echo PATH_DOCUMENT; ?>';			
			<?php if (isset($this->App->defaultJavascript) && $this->App->defaultJavascript != '') echo $this->App->defaultJavascript; ?>
		</script>

	</head>

	<body>

    <div class="container">
    		<div class="row">
				<a class="navbar-brand" href="<?php echo URL_SITE; ?>">Amministrazione <small><?php echo CODE_VERSION ?></small> <?php echo SITE_NAME; ?> </a>
			</div>
			<?php 
				$appErrors = Utilities::getMessagesCore(Core::$resultOp);
				list($show,$error,$type,$content) = $appErrors;
				if ($show == true): 
				?>
				<div class="row">
					<div id="systemMessageID" class="col-md-6 col-md-offset-3 alert
						<?php if ($error == 2) echo ' alert-warning'; ?>
						<?php if ($error == 1) echo ' alert-danger'; ?>
						<?php if ($error == 0) echo ' alert-success'; ?>
						">
						<?php echo $content; ?>
					</div>	
				</div>
				<!-- /.row -->
			<?php endif; ?>
			<?php echo $this->pageMainContent; ?>

		</div>
    
		<!-- jQuery -->
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Other JavaScript -->		
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrapValidator/bootstrapValidator.min.js" type="text/javascript"></script>
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrapValidator/language/it_IT.js"></script>
	
		<!-- Application Scripts - Include own application scripts -->    	
    	<?php if(isset($this->App->jscript) && is_array($this->App->jscript)): ?>
    		<?php foreach ($this->App->jscript AS $value): ?>
    		<?php echo $value."\n"; ?>
    		<?php endforeach; ?>
		<?php endif; ?>

	</body>

</html>