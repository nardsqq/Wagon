    <script src="{{ asset('/js/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/jquery-ui.min.js/') }}"></script>
    <script src="{{ asset('/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/bootstrap-toggle.min.js') }}"></script>
    <script src="{{ asset('/toastr-master/build/toastr.min.js') }}"></script>
    <script src="{{ asset('/js/script.js/') }}"></script>
    <script src="{{ asset('/js/parsley.min.js/') }}"></script>

    {{-- <script>
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
    </script> --}}
    @yield('scripts')