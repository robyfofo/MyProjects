/* admin/site-tools/clrimgfol.js v.3.0.0. 04/11/2016 */
$(document).ready(function(){
	});
	
$("#deleteID").click(function(e) {
	    e.preventDefault();
	    var location = $(this).attr('href');
	    bootbox.confirm("Sei sicuro?",function(confirmed) {
	        if(confirmed) {
	        window.location.replace(location);
	        }
	    });
	});     