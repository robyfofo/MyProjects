/* admin/site-pages/pagesForm.js.php v.3.0.0. 04/11/2016 */
$(document).ready(function() {
	
	/* prende i dati del template corrente */
	getTemplateDetalis();	
	
	$('#applicationForm')
	.bootstrapValidator({
		excluded: [':disabled'],
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
			}
		})
	.on('status.field.bv', function(e, data) {
		var $form     = $(e.target),
		validator = data.bv,
		$tabPane  = data.element.parents('.tab-pane'),
		tabId     = $tabPane.attr('id');
		if (tabId) {
			var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');
			// Add custom class to tab containing the field
			if (data.status == validator.STATUS_INVALID) {
				$icon.removeClass('fa-check').addClass('fa-times');
				} else if (data.status == validator.STATUS_VALID) {
					var isValidTab = validator.isValidContainer($tabPane);
					$icon.removeClass('fa-check fa-times')
					.addClass(isValidTab ? 'fa-check' : 'fa-times');
					}
			}
		});
			
	});
	
function getTemplateDetalis() {
	var id_template = $('#id_templateID').val();	
	var id_pagina = $('#id_paginaID').val();	
	//console.log('id pagina = '+id_pagina);
	$.ajax({
		url: siteUrlAdmin+moduleName+'/getTemplateDataAjax',
		type: "POST",
		data: {'id':id_template,'id_pagina':id_pagina},
		dataType: 'json'
		})
		.done(function(data) {			
			/* genera la tab template */  		
    		getTemplateFormTab(data.id,data.title_it,data.comment_it,data.filename,data.id_pagina);
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch data")
			})
	}
	
function getTemplateFormTab(id,title,comment,filename,idpagina) {		
	$.ajax({
		url: siteUrlAdmin+moduleName+'/getTemplateFormTabAjax',
		type: "POST",
		data: {'id':id,'title':title,'comment':comment,'filename':filename,'id_pagina':idpagina,},
		dataType: 'html'
		})
		.done(function(html) {
			$('#template-tab').html(html);
			pprefresh();
			reloadTemplateFormTab();
  			})
  		.fail(function() {
 			 alert("Ajax failed to fetch data")
			})
	}
	
function reloadTemplateFormTab() {
	$('#id_templateID').change(function(){
		var id = $('#id_templateID').val();
		getTemplateDetalis();
		});		
	
	}	
	


$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});

tinymce.init({
    selector: ".editorHTML",
    browser_spellcheck: true,
    theme: "modern",
    height: 300,
    language: "it",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
   ],
	relative_urls: false,
	remove_script_host: false,
	convert_urls: true,
	document_base_url: siteUrl,
	filemanager_title:"Responsive Filemanager",
	external_filemanager_path: siteUrl+"/filemanager/",
	external_plugins: { "filemanager" : siteUrl+"/filemanager/plugin.min.js"},
	content_css: siteTemplateUrl+"assets/plugins/tinymce/css/content.css",
	image_advtab: true,
	toolbar: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",   
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
 
function pprefresh(){
		$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		show_title: false    
		});
	}
	
	
