$(document).ready(function() {
	
	var url = "/admin/transactions/job-order";
	var id = '';

	$('.btn-checklist').on('click', function(e) {
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: url + '/' + id + '/checklist',
			dataType: "json",
			success: function (data) {
				console.log(data);
				$('#checklist-container').text('');
				_.forEach(data.steps, function(steps, service){
					addServiceChecklist(service, steps);
				});
				$('#checklist_modal').modal('show');
			},
			error: function (data) {
			  console.log(data);
			},
		});
	});

	$("#btn-checklist").on('click', function(e){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var formData = $("#checklist_modal form").serialize();
		var id = $(this).val();
		e.preventDefault();
		$.ajax({
			type: 'PUT',
			url: url + '/' + id + '/checklist',
			data: formData,
			dataType: 'json'
		}).done(function(data) {
			console.log(data);
		});
	});
})

function addServiceChecklist(service, steps){
	var serviceContainer = document.createElement('div')
		serviceContainer.innerText = service;
	_.forEach(steps, (step) => {
		$(serviceContainer).append(`
			<div>
				<label>
					<input `+ (step.intStepStatus == 1 ? 'checked':'') +`  
						title="`+step.strServStepDesc+`" 
						type="checkbox"
						name="step[`+step.intCheckID+`]" 
						value="`+step.intCheckID+`"
					>
						&nbsp;`+step.strServStepDesc+`</label>
			</div>
		`);
	});
	$('#checklist-container').append(serviceContainer);
}