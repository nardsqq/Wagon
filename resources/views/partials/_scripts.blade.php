<script src="{{ asset('/js/main.js/') }}"></script>
<script src="{{ asset('/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/js/datepicker.js') }}"></script>
<script src="{{ asset('/toastr-master/build/toastr.min.js') }}"></script>
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

<script>
    $(function(){
        @if(session('message'))
              toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
              }

            var type = "{{ session('alert') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ session('desc') }}","{{ session('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ session('desc') }}","{{ session('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ session('desc') }}","{{ session('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ session('desc') }}","{{ session('message') }}");
                    break;
            }
        @endif

        {{--  @foreach($errors->all() as $error) 
            toastr.warning("{{ $error }}","Oops");
        @endforeach   --}}
    });
</script>
@yield('scripts')