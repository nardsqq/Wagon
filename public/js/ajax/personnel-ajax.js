$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_pers').on('hide.bs.modal', function() {
    $('#formPers').trigger('reset');
  });

  var url = "/admin/maintenance/personnel";
  var id = '';

  loadTable();

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.ajax({
      type: 'GET',
      url: url + '/' + id + '/edit',
      success: function(data) {
        var formEditPers = $('#formEditPers');

        formEditPers.find('#str_personnel_type').val(data.str_personnel_type);
        formEditPers.find('#str_personnel_f_name').val(data.str_personnel_f_name);
        formEditPers.find('#str_personnel_m_name').val(data.str_personnel_m_name);
        formEditPers.find('#str_personnel_l_name').val(data.str_personnel_l_name);
        formEditPers.find('#str_personnel_mobile_num').val(data.str_personnel_mobile_num);

        $('#edit_pers').modal('show');
      }
    })

  });

  $('#btn-update').on('click', function(e) {
    e.preventDefault();

    var data = $('#formEditPers').serialize();
    var url = '/admin/maintenance/personnel/';
    var type = "PUT";

    $.ajax({
      type: type,
      url: url + id,
      data: data,
      dataType: 'json'
    }).done(function(data) {
      $('#formEditPers').trigger('reset');
      $('#edit_pers').modal('hide');
      loadTable();
    })
  });

  $(document).on('click', '.btn-delete', function() {
    var link_id = $(this).val();
    id = link_id;
    console.log(id)
    $('#del_pers').modal('show');
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
      url: '/admin/maintenance/personnel/' + id,
      dataType: "json",
      success: function (data) {
        console.log(data);
        console.log(url);

        var table = $('#dataTable').DataTable();
        table.row($("#id" + id)).remove().draw();

        $('#del_pers').modal('hide');

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

        toastr.error("Successfully Deleted Personnel Record");
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
    $('#title').text('Add New Personnel Record');
    $('#pers-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formPers').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_pers').modal('show');

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
    var method = $('#formPers').attr('method');
    var url = $('#formPers').attr('action');
    var formData = $('#formPers').serialize();

    $.ajax({
      type: method,
      url: url,
      data: formData,
      success:function(data) {
        console.log(JSON.stringify(data));
        $('#add_pers').modal('hide');
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

          toastr.success("Successfully Added a New Personnel Record");
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
        console.log(url);
        console.log(data);
        $('#dataTable').html(data).fadeIn(300);
        // $('#dataTable').dataTable();
      }
    })
  } // function loadTable() {}
}); // $(document).ready(function() {});