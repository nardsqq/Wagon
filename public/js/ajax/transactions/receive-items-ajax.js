$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_rec').on('hide.bs.modal', function() {
    $('#formReceive').trigger('reset');
  });

  var url = "/admin/transactions/receive-items";
  var id = '';

  loadTable(); 

  $('#btn-add').on('click', function(event) {
    $('#rec-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formReceive').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_rec').modal('show');

  }); 

  $("#btn-save").on('click', function (e) {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    e.preventDefault();
    console.log(e);

    var state = $('#btn-save').val();
    var method = $('#formReceive').attr('method');
     var url = $('#formReceive').attr('action');
    var formData = $('#formReceive').serialize();

    $.ajax({
      type: method,
      url: url,
      data: formData,
      success:function(data) {
        console.log(data);
        $('#add_rec').modal('hide');
        loadTable();
      
        if (state == "add") { 
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

          // pakiedit nalang
          toastr.success("Successfully Completed Transaction");
        } 
      }
    });
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