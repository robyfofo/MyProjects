<?php
/**
 * Framework siti html-PHP-Mysql
 * PHP Version 7
 * @author Roberto Mantovani (<me@robertomantovani.vr.it>
 * @copyright 2009 Roberto Mantovani
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * admin/site-pages/ajax.php v.3.0.0. 04/11/2016
*/

switch(Core::$request->method) {
	case 'getTemplateDataAjax':
		$id_template = (isset($_POST['id']) && intval($_POST['id']) > 0 ? intval($_POST['id']) : 0);	
		$id_pagina = (isset($_POST['id_pagina']) ? intval($_POST['id_pagina']) : 0);		
		/* carica i dati del template */
		$templateItem = $Module->getTemplatePredefinito($id_template);		
		if (!isset($templateItem->id) || (isset($templateItem->id) && (int)$templateItem->id == 0)) {	
			ToolsStrings::redirect(URL_SITE_ADMIN.Core::$request->action.'/message/1/'.urlencode('Devi creare od attivare almeno un template!'));			
			}
		$templateItem->id_pagina = $id_pagina;
		$json = json_encode((array)$templateItem );
		echo $json;
		die();	
	break;
	
	case 'getTemplateFormTabAjax':
		$id_template = (isset($_POST['id']) && intval($_POST['id']) > 0 ? intval($_POST['id']) : 0);	
		$id_pagina = (isset($_POST['id_pagina']) && intval($_POST['id_pagina']) > 0 ? intval($_POST['id_pagina']) : 0);	
		/* select per i template */
		$templatesItem = $Module->getTemplatesPage();		
		$renderTpl = false;
		$renderAjax = true;		
		$App->templatePage = 'ajax.templateFormTab.tpl.php';
	break;
	}
?>
