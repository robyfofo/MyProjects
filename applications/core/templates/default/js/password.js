<<<<<<< HEAD
/* wscms/core/password.js v.1.2.0. 01/12/2019 */
$(document).ready(function() {
	
	/* controllo password */	
	$('#passwordCKID').change(function(){
		var pass = $('#passwordID').val();
		var passCK = $('#passwordCKID').val();
		if(pass !== passCK) {
			bootbox.alert(messages['Le due password non corrispondono!']);
		}
	});
	
});

$('.submittheform').click(function () {
	$('input:invalid').each(function () {
		// Find the tab-pane that this element is inside, and get the id
		var $closest = $(this).closest('.tab-pane');
		var id = $closest.attr('id');
		// Find the link that corresponds to the pane and have it show
		$('.nav a[href="#' + id + '"]').tab('show');
		// Only want to do it once
		return false;
	});
=======
/* wscms/core/password.js v.1.2.0. 01/12/2019 */
$(document).ready(function() {
	
	/* controllo password */	
	$('#passwordCKID').change(function(){
		var pass = $('#passwordID').val();
		var passCK = $('#passwordCKID').val();
		if(pass !== passCK) {
			bootbox.alert(messages['Le due password non corrispondono!']);
		}
	});
	
});

$('.submittheform').click(function () {
	$('input:invalid').each(function () {
		// Find the tab-pane that this element is inside, and get the id
		var $closest = $(this).closest('.tab-pane');
		var id = $closest.attr('id');
		// Find the link that corresponds to the pane and have it show
		$('.nav a[href="#' + id + '"]').tab('show');
		// Only want to do it once
		return false;
	});
>>>>>>> 2bf597720afe94b4b788364b4e0bad0a9b392a96
})