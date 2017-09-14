$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_mode').on('hide.bs.modal', function() {
    $('#formMode').trigger('reset');
  });

  var url = "/admin/maintenance/mode-of-payment";
  var id = '';

  loadTable();

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('#title').text('Edit Mode Of Payment');
    $('#mode-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.get(url + '/' + link_id + '/edit', function (data) {
      console.log(url + '/' + link_id + '/edit');
      console.log(data);

      $('#strMODName').val(data.strMODName);
      $('#btn-save').val("update");
      $('#add_mode').modal('show');

    }) 

  });

    $(document).on('click', '.btn-delete', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_mode').modal('show');
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
      url: '/admin/maintenance/mode-of-payment/' + id,
      dataType: "json",
      success: function (data) {
        console.log(data);
        console.log(url);

        var table = $('#dataTable').DataTable();
        table.row($("#id" + id)).remove().draw();

        $('#del_mode').modal('hide');

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

        toastr.error("Successfully Deleted Mode Of Payment Record");
        loadTable();
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

  $('#btn-add').on('click', function(event) {
    $('#title').text('Add New Mode Of Payment');
    $('#mode-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formMode').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_mode').modal('show');

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
    var method = $('#formMode').attr('method');
    var url = $('#formMode').attr('action');
    var formData = $('#formMode').serialize();

    $.ajax({
      type: method,
      url: url,
      data: formData,
      success:function(data) {
        console.log(data);
        $('#add_mode').modal('hide');
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

          toastr.success("Successfully Added a New Mode Of Payment Record");
        } 
      }
    })
  }); // $$("#btn-save").on('click', function (e) {});

  function loadTable() {
    $.ajax({
      type: 'get',
      url: url + "-table",
      dataType: 'html',
      success:function(data) {
        $('#dataTable').DataTable();
        $('#dataTable').html(data);
      }
    })
  } // function loadTable() {}
}); // $(document).ready(function() {});