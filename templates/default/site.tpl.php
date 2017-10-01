<!DOCTYPE html>
<html lang="{{ App.lang['user'] }}">
	<head>
	
		<title>{{ App.metaTitlePage|e('html_attr') }}</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="{{ App.metaDescriptionPage|e('html_attr') }}">
		<meta name="keyword" content="{{ App.metaKeywordsPage|e('html_attr') }}">
		<meta name="author" content="Roberto Mantovani">

		<!-- Bootstrap Core CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Timeline CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/timeline.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Other Plugin CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/prettyPhoto/css/prettyPhoto.css" rel="stylesheet">
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Custom CSS - Dashboard -->
		<link href="{{ URLSITE }}templates/{{ App.templateUser }}/assets/css/default.css" rel="stylesheet">

    
		<!-- CSS for Page -->
		{% if App.css is iterable %}							
			{% for key,value in App.css %}
				{{ value|raw }}
			{% endfor %}
		{% endif %}

		<!-- default vars useful for javascript -->
		<script language="javascript">
			siteUrl = '{{ URLSITE }}';
			sitePath = '{{ PATHSITE }}';			
			siteUrlAdmin = '{{ URLSITE }}';		
			siteTemplateUrl = '{{ URLSITE }}templates/{{ App.templateUser }}/';
			siteTemplatePath = '{{ PATHSITE }}templates/{{ App.templateUser }}/';			
			siteDocumentPath = '{{ PATHDOCUMENT }}';		
			
			var messages = new Array();
			messages['Sei sicuro?'] = '{{ App.lang['Sei sicuro?']|e('js') }}';	
			{% if (App.defaultJavascript is defined) and (App.defaultJavascript != '') %}
				{{ App.defaultJavascript|raw }}  	
			{% endif %}
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
					<a class="navbar-brand" href="#">{{ App.globalSettings['site name'] }}  <small>{{ App.globalSettings['code version'] }}</small></a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i> {% if App.userLoggedData.name is defined %}{{ App.userLoggedData.name }}{% endif %} {% if App.userLoggedData.surname is defined %}{{ App.userLoggedData.surname }}{% endif %} ({% if App.userLoggedData.labelRole is defined %}{{ App.userLoggedData.labelRole }}{% endif %}) <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
								<li><a href="{{ URLSITE }}profile/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}"><i class="fa fa-user fa-fw"></i> {{ App.lang['profilo']|capitalize }}</a></li>
								<li><a href="{{ URLSITE }}password/NULL/{% if App.userLoggedData.id is defined %}{{ App.userLoggedData.id }}{% endif %}"><i class="fa fa-gear fa-fw"></i> {{ App.lang['password']|capitalize }}</a></li>
								<li class="divider"></li>
								<li><a href="{{ URLSITE }}logout"><i class="fa fa-sign-out fa-fw"></i> {{ App.lang['logout']|capitalize }}</a></li>
 						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							{% if (App.rightMenu is defined) and (App.rightMenu != '') %}
								{{ App.rightMenu|raw }}
							{% endif %}  
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
							{{ App.pageTitle }}{% if App.userLoggedData.is_root is same as(1) %}<small class="appCodeVersion">{{ App.codeVersion }}</small>{% endif %}&nbsp;<small>{{ App.pageSubTitle }}</small>               
						</h1>
                </div>
                <div class="col-md-4 text-right">                                
                	{% if (App.params.help is defined) and (App.params.help != '') %}
							<button class="btn btn-info btn-circle btn-help-module" type="button" data-target="#helpModal" data-toggle="modal"><i class="fa fa-info"></i></button>
						{% endif %}
                </div>
            </div>
            <!-- /.row -->

				{% if (App.systemMessages is defined) and (App.systemMessages != '') %}
					{{ App.systemMessages|raw }}
				{% endif %}

				
				{{ include(App.templateApp) }}
           
			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->
		
		{% if (App.params.help is defined) and (App.params.help != '') %}
		<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
	  					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  					<h4 class="modal-title" id="myModalLabel">{{ App.lang['aiuto']|capitalize }}</h4>
	 				</div>
	 				<div class="modal-body">
						{{ App.params.help|raw }}
	 				</div>
	 				<div class="modal-footer">
	  					<button type="button" class="btn btn-default" data-dismiss="modal">{{ App.lang['chiudi']|capitalize }}</button>
	 				</div>
				</div>
				<!-- /.modal-content -->
			</div>
	  		<!-- /.modal-dialog -->
		</div>
		{% endif %}

		<!-- jQuery -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/metisMenu/metisMenu.min.js"></script>


		<!-- Other JavaScript -->	
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>	
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/bootstrapValidator.min.js" type="text/javascript"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/bootstrapValidator/language/it_IT.js"></script>
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/plugins/tinymce/tinymce.min.js" type="text/javascript"></script>
		
		
		{% if App.jscript is iterable %}							
			{% for key,value in App.jscript %}
				{{ value|raw }}
			{% endfor %}
		{% endif %}
		
		{% if App.jscriptLast is iterable %}							
			{% for key,value in App.jscriptLast %}
				{{ value|raw }}
			{% endfor %}
		{% endif %}


		<!-- Custom Theme JavaScript -->
		<script src="{{ URLSITE }}templates/{{ App.templateUser }}/assets/js/sb-admin-2.js"></script>
	</body>
</html>
