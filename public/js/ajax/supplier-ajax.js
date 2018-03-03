$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_supp').on('hide.bs.modal', function() {
    $('#formSupp').trigger('reset');
  });

  var url = "/admin/maintenance/supplier";
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
        var formEditSupp = $('#formEditSupp');

        formEditSupp.find('#str_supplier_name').val(data.str_supplier_name);
        formEditSupp.find('#ed_str_supplier_mobile_num').val(data.str_supplier_mobile_num);
        formEditSupp.find('#ed_str_supplier_tel_num').val(data.str_supplier_tel_num);
        formEditSupp.find('#str_supplier_email').val(data.str_supplier_email);
        formEditSupp.find('#txt_supplier_address').val(data.txt_supplier_address);

        $('#edit_supp').modal('show');
      }
    })

  });

  $('#btn-update').on('click', function(e) {
    e.preventDefault();

    var data = $('#formEditSupp').serialize();
    var url = '/admin/maintenance/supplier/';
    var type = "PUT";

    $.ajax({
      type: type,
      url: url + id,
      data: data,
      dataType: 'json'
    }).done(function(data) {
      $('#formSupp').trigger('reset');
      $('#edit_supp').modal('hide');
      loadTable();
    })
  });

  $(document).on('click', '.btn-delete', function() {
    var link_id = $(this).val();
    id = link_id;
    console.log(id)
    $('#del_supp').modal('show');
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
      url: '/admin/maintenance/supplier/' + id,
      dataType: "json",
      success: function (data) {
        console.log(data);
        console.log(url);

        var table = $('#dataTable').DataTable();
        table.row($("#id" + id)).remove().draw();

        $('#del_supp').modal('hide');

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

        toastr.error("Successfully Deleted Supplier Record");
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
    $('#title').text('Add New Supplier Record');
    $('#supp-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formSupp').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_supp').modal('show');

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
    var method = $('#formSupp').attr('method');
    var url = $('#formSupp').attr('action');
    var formData = $('#formSupp').serialize();

    $.ajax({
      type: method,
      url: url,
      data: formData,
      success:function(data) {
        console.log(data);
        $('#add_supp').modal('hide');
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

          toastr.success("Successfully Added a New Supplier Record");
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
        $('#dataTable').html(data).fadeIn(300);
      }
    })
  } // function loadTable() {}
}); // $(document).ready(function() {});