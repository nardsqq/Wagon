$(document).ready(function() {
	$('#btn-add').on('click', function(e) {
		e.preventDefault();
		$('#add_quote').modal('show');
	})
})