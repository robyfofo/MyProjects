/* admin/timecard/items.js v.3.0.0. 20/10/2016 */
$(document).ready(function() {
	
	$('#dataDPID').datetimepicker({
		locale: 'it',
		defaultDate: defaultdate,
		format: 'YYYY-MM-DD'
		});

	$(".chosen-select").chosen({
		allow_single_deselect: true
		});	
		
	$('#startHourID').datetimepicker({
		//format:'LT',
		locale: 'it',
		format: 'LT',
 		defaultDate:  moment(defaultTimeIni, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		timeZone: null
		});
	$('#endHourID').datetimepicker({
		locale: 'it',
		format: 'LT',
 		defaultDate:  moment(defaultTimeEnd, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		timeZone: null
		});
	
	});