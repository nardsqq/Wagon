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
	  $('#set-modal').modal('show');
	});
  
	$('#btn-delivery_form').on('submit', function(e) {
	  e.preventDefault();
		submitForm('#delivery_form');
	});

	function loadTable() {
		$.ajax({
		  type: 'get',
		  url: url + "-table",
		  dataType: 'html',
		  success:function(data) {
			console.log(url);
			console.log(data);
			$('#dataTable').html(data).fadeIn(300);
			// $('#dataTable').dataTable();
		  }
		})
	  } // function loadTable() {}
	  
	}); // $(document).ready(function() {});

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