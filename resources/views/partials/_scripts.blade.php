<script src="{{ asset('/js/main.js/') }}"></script>
<script src="{{ asset('/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/datepicker.js') }}"></script>
<script src="{{ asset('/js/jquery.mask.min.js/') }}"></script>

<script type="text/javascript">
  window.loading_screen = window.pleaseWait({
    logo: "/images/MRNIND.png",
    backgroundColor: '#fffff',
    loadingHtml: ""
  });
</script>

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

<!-- Delay table and page load until everything else is loaded -->
<script>
    $(window).on('load', function(){
      window.loading_screen.finish();
      $('#dataTable').removeAttr('style');
    })
</script>

@yield('scripts')