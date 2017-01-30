/* admin/projects/items-list.js v.3.0.0. 30/01/2017 */

$(document).ready(function() {

	$('.popoverInfo').popover({
		container: 'body'
		});
		
	$("#myModal").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
		});
		
	});