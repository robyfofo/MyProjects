/* admin/timecard/items.js v.3.0.0. 20/10/2016 */
$(document).ready(function() {
	
	$('#dataDPID').datetimepicker({
		locale: 'it',
		defaultDate: defaultdata,
		format: 'L'
		});
		
	$('#data1DPID').datetimepicker({
		locale: 'it',
		defaultDate: defaultdata1,
		format: 'L'
		});
		
	$('#appdataDPID').datetimepicker({
		locale: 'it',
		defaultDate: defaultappdata,
		format: 'L',
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
		timeZone: null,
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
	
	$("#startHourID").on("dp.change", function (e) {
		var d = new Date(e.date);
		d.setHours(d.getHours()+1);
		console.log(d);
		t = moment(d).format("HH:mm");
		console.log(t);
		$('#endHourID').val(t);
		});	

	$('#starthour1ID').datetimepicker({
		//format:'LT',
		locale: 'it',
		format: 'LT',
 		defaultDate:  moment(defaultTimeIni, 'LT'),
		allowInputToggle: true,
		stepping: '15',
		disabledHours: ['0', '1', '2', '3', '4', '5', '22', '23'],
		timeZone: null,
		});
			
	});