$(document).ready(function() {
	
	var url = "/admin/transactions/job-order";
	var id = '';

	$('.btn-checklist').on('click', function(e) {
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: url + '/' + 1 + '/checklist',
			dataType: "json",
			success: function (data) {
				console.log(data);
				$('#checklist_modal').modal('show');
			},
			error: function (data) {
			  console.log(data);
			},
		});
	})
})

function addService(value, steps){
	var container = $('#checklist-container');
	
}