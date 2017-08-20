<script src="{{ asset('/js/main.js/') }}"></script>
{{-- <script src="{{ asset('/js/icheck.js/') }}"></script> --}}

<script>
	$(document).ready(function(){
	    $('#dataTable').DataTable();
	    $('body .dropdown-toggle').dropdown();
	});
</script>

<script>
    $('#table-container').on('draw.dt', '#dataTable', function(){
          $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
          $("[data-toggle='toggle']").bootstrapToggle();
    });
</script>

<script>
	$('input').iCheck({
    radioClass: 'iradio_flat',
    checkboxClass: 'icheckbox_flat',
  });
</script>

@yield('scripts')