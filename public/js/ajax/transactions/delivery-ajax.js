$(document).ready(function() {
	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
  
	$('#set-modal').on('hide.bs.modal', function() {
	  $('#delivery_form').trigger('reset');
	});
  
	var url = "/admin/transactions/delivery";
	var id = '';
	var delivery_form = $('#delivery_form');
  
	loadTable();
  
	$(document).on('click', '.open-modal', function() {
	  var id = $(this).val();
	  delivery_form.find('#int_delivery_id').val(id);
	  delivery_form.find('#dat_delivery_date').val($(this).attr('data-date'));
	  delivery_form.find('#int_personnel_id').val($(this).attr('data-personnel'));
	  $('#set-modal').modal('show');
	});
  
	$(document).on('submit', '#delivery_form', function(e) {
	  	e.preventDefault();
		submitForm('#delivery_form');
	});

	
	function submitForm(form_name = ''){
		var form = $(form_name),
			form_data = form.serialize();

		$.ajax({  
			type: form.attr('method'),  
			url: form.attr('action'),  
			data: form_data,  
			dataType: 'json',
			success: function(data) {  
				if(data.alert=='success'){  
					$(form_name).trigger('reset');
					$('#set-modal').modal('hide');
					loadTable();
					toastr.success(data.message, data.title?data.title:'');
				} else {
					alert('Error');
				}
			},  
			error: function (data) {  
				var message = data.responseJSON.message ? data.responseJSON.message : 'Error!';
				var errors = data.responseJSON.message ? '' : data.responseJSON;  
				var error_message = '';
				for(i in errors){  
					error_message += errors[i] + '\n';  
				}  
				alert(error_message);
			}
		});
	}

	function loadTable() {
		$.ajax({
		type: 'get',
		url: url + "-table",
		dataType: 'html',
		success:function(data) {
			$('#dataTable').html(data).fadeIn(300);
			// $('#dataTable').dataTable();
		}
		})
	} // function loadTable() {}
	  
	}); // $(document).ready(function() {});
