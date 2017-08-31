$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var url = "/admin/maintenance/product";
  var id = '';

  $('.btn-delete').on('click', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_prod').modal('show');
  });

  $('#btn-del-confirm').on('click', function(e) { 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
    e.preventDefault();

    $.ajax({
        type: "DELETE",
        url: '/admin/maintenance/product/' + id,
        dataType: "json",
        success: function (data) {
            console.log(data);
            console.log(url);

            var table = $('#dataTable').DataTable();
            table.row($("#id" + id)).remove().draw();

            $('#del_prod').modal('hide');

            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": true,
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

            toastr.error("Successfully Deleted Product Record");
        },
        error: function (data) {
            console.log(url + '/' + id);
            console.log('Error:', data);

            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": true,
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

            toastr.error("It seems that this record is still in use in other processes. Record removal failed.");
          }
      });
  });
}); // $(document).ready(function() {});