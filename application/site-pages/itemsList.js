/* admin/site-pages/pagesList.js.php v.3.0.0. 04/11/2016 */

$(document).ready(function() {
	
	$('.tree').treegrid({
		'initialState': 'collapsed',
		'saveState': true,
		});
	
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		show_title: false    
		});
		
	});