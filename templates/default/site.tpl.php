<!DOCTYPE html>
<html lang="it">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Framework MYSQL PHP">
		<meta name="author" content="Roberto" >

		<title><?php echo SITE_NAME; ?> - <?php echo $this->App->pageTitle?></title>

		<!-- Bootstrap Core CSS -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Timeline CSS -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/css/timeline.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Other Plugin CSS - Dashboard -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/prettyPhoto/css/prettyPhoto.css" rel="stylesheet">
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrapValidator/bootstrapValidator.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Custom CSS - Dashboard -->
		<link href="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/css/default.css" rel="stylesheet">

    
		<!-- Application Css - Include own application css styles -->    	
		<?php if(isset($this->App->css) && is_array($this->App->css)): ?>
		<?php foreach ($this->App->css AS $value): ?>
		<?php echo $value; ?>
		<?php endforeach; ?>				
		<?php endif; ?>

		<!-- default vars useful for javascript -->
		<script language="javascript">
			siteUrl = '<?php echo URL_SITE; ?>';
			sitePath = '<?php echo PATH_SITE; ?>';			
			siteUrlAdmin = '<?php echo URL_SITE_ADMIN; ?>';
			siteAdminPath = '<?php echo PATH_SITE_ADMIN; ?>';			
			siteTemplateUrl = '<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/';
			siteTemplatePath = '<?php echo PATH_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/';			
			siteDocumentPath = '<?php echo PATH_DOCUMENT; ?>';			
			<?php if (isset($this->App->defaultJavascript) && $this->App->defaultJavascript != '') echo $this->App->defaultJavascript; ?>
		</script>

	</head>

	<body>

		<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom:0;">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo URL_SITE; ?>">Amministrazione <small><?php echo CODE_VERSION ?></small> <?php echo SITE_NAME; ?> </a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i> <?php if (isset($this->App->userLoggedData->name)) echo $this->App->userLoggedData->name; ?> <?php if (isset($this->App->userLoggedData->surname)) echo $this->App->userLoggedData->surname; ?> (<?php echo Permissions::getUserLevelLabel($this->App->user_levels,$this->App->userLoggedData->id_level,$this->App->userLoggedData->is_root); ?>) <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
								<li><a href="<?php echo URL_SITE_ADMIN; ?>profile/NULL/<?php if (isset($this->App->userLoggedData->id)) echo $this->App->userLoggedData->id; ?>"><i class="fa fa-user fa-fw"></i> Profile</a></li>
								<li><a href="<?php echo URL_SITE_ADMIN; ?>password/NULL/<?php if (isset($this->App->userLoggedData->id)) echo $this->App->userLoggedData->id; ?>"><i class="fa fa-gear fa-fw"></i> Password</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo URL_SITE_ADMIN; ?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
 						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">

						<?php foreach($this->App->site_modules AS $sectionKey=>$sectionModules): ?>						
							<?php $x1 = 0; foreach($sectionModules AS $module): ?>							
								<?php if(Permissions::checkAccessUserModule($module->name,$this->App->userLoggedData,$this->App->user_modules_active,$this->App->modulesCore) === true): ?>
									<?php 
									$codemenu = $module->code_menu;
									$codemenu = preg_replace('/{{URLSITEADMIN}}/',URL_SITE_ADMIN,$codemenu);
									$codemenu = preg_replace('/{{URLSITE}}/',URL_SITE,$codemenu);
									$codemenu = preg_replace('/{{LABEL}}/',$module->label,$codemenu);
									$codemenu = preg_replace('/{{NAME}}/',$module->name,$codemenu);												
									/* se active */
									if(Core::$request->action == $module->name) {
										$codemenu = preg_replace('/{{LICLASS}}/','active',$codemenu);
										} else {
											$codemenu = preg_replace('/{{LICLASS}}/','',$codemenu);										
											}
									echo $codemenu; 
									$x1++;								
									?>	
								<?php endif; ?>													
							<?php endforeach; ?>							
							<?php if ($x1 > 0): ?><hr><?php endif; ?>							
						<?php endforeach; ?>
  
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<div id="page-wrapper">
				<div class="row">
                <div class="col-md-8">
						<h1 class="page-header">
							<?php echo $this->App->pageTitle; ?><?php if($this->App->userLoggedData->is_root === 1): ?><small class="appCodeVersion"><?php echo $this->App->codeVersion; ?></small><?php endif; ?>&nbsp;<small><?php echo $this->App->pageSubTitle; ?></small>               
						</h1>
                </div>
                <div class="col-md-4 text-right">                                
                	<?php if (isset($this->App->params->help) && $this->App->params->help != '') : ?>
							<button class="btn btn-info btn-circle btn-help-module" type="button" data-target="#helpModal" data-toggle="modal"><i class="fa fa-info"></i></button>
						<?php endif; ?>
                </div>
            </div>
            <!-- /.row -->

				<?php 
				$appErrors = Utilities::getMessagesCore(Core::$resultOp);
				list($show,$error,$type,$content) = $appErrors;
				if ($show == true): 
				?>
				<div class="row">
					<div id="systemMessageID" class="alert
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
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->
		
		<?php if (isset($this->App->params->help) && $this->App->params->help != '') : ?>
		<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
	  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  					<h4 class="modal-title" id="myModalLabel">Aiuto</h4>
	 				</div>
	 				<div class="modal-body">
						<?php echo nl2br(SanitizeStrings::xss($this->App->params->help)); ?>
	 				</div>
	 				<div class="modal-footer">
	  					<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
	 				</div>
				</div>
				<!-- /.modal-content -->
			</div>
	  		<!-- /.modal-dialog -->
		</div>
		<?php endif; ?> 

		<!-- jQuery -->
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/metisMenu/metisMenu.min.js"></script>


		<!-- Other JavaScript -->	
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>	
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrapValidator/bootstrapValidator.min.js" type="text/javascript"></script>
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/bootstrapValidator/language/it_IT.js"></script>
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/plugins/tinymce/tinymce.min.js" type="text/javascript"></script>
		
		<!-- Application Scripts - Include own application scripts -->    	
    	<?php if(isset($this->App->jscript) && is_array($this->App->jscript)): ?>
    		<?php foreach ($this->App->jscript AS $value): ?>
    		<?php echo $value."\n"; ?>
    		<?php endforeach; ?>
		<?php endif; ?>

		<!-- Application Scripts - Include own application scripts -->    	
    	<?php if(isset($this->App->jscriptLast) && is_array($this->App->jscriptLast)): ?>
    		<?php foreach ($this->App->jscriptLast AS $value): ?>
    		<?php echo $value."\n"; ?>
    		<?php endforeach; ?>
		<?php endif; ?>

		<!-- Custom Theme JavaScript -->
		<script src="<?php echo URL_SITE_ADMIN; ?>templates/<?php echo $this->App->templateUser; ?>/assets/js/sb-admin-2.js"></script>
	</body>
</html>
