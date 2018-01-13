$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_client').on('hide.bs.modal', function() {
    $('#formClient').trigger('reset');
  });

  var url = "/admin/transactions/client";
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
        var formEditClient = $('#formEditClient');

        formEditClient.find('#strClientName').val(data.strClientName);
        formEditClient.find('#strClientTIN').val(data.strClientTIN);
        formEditClient.find('#strClientAddLotNum').val(data.strClientAddLotNum);
        formEditClient.find('#strClientAddStreet').val(data.strClientAddStreet);
        formEditClient.find('#strClientAddBrgy').val(data.strClientAddBrgy);
        formEditClient.find('#strClientAddCity').val(data.strClientAddCity);
        formEditClient.find('#strClientAddProv').val(data.strClientAddProv);
        formEditClient.find('#strClientTelephone').val(data.strClientTelephone);
        formEditClient.find('#strClientFax').val(data.strClientFax);
        formEditClient.find('#strClientMobile').val(data.strClientMobile);
        formEditClient.find('#strClientEmailAddress').val(data.strClientEmailAddress);

        $('#edit_client').modal('show');
      }
    })

  });

  $('#btn-update').on('click', function(e) {
    e.preventDefault();

    var data = $('#formEditClient').serialize();
    var url = '/admin/transactions/client/';
    var type = "PUT";

    $.ajax({
      type: type,
      url: url + id,
      data: data,
      dataType: 'json'
    }).done(function(data) {
      $('#formEditClient').trigger('reset');
      $('#edit_client').modal('hide');
      loadTable();
    })
  });

  $(document).on('click', '.btn-delete', function() {
    var link_id = $(this).val();
    id = link_id;
    console.log(id)
    $('#del_client').modal('show');
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
      url: '/admin/transactions/client/' + id,
      dataType: "json",
      success: function (data) {
        console.log(data);
        console.log(url);

        var table = $('#dataTable').DataTable();
        table.row($("#id" + id)).remove().draw();

        $('#del_client').modal('hide');

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

        toastr.error("Successfully Deleted Client Record");
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
    $('#title').text('Add Client Record');
    $('#client-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formClient').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_client').modal('show');
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
    var method = $('#formClient').attr('method');
    var url = $('#formClient').attr('action');
    var formData = $('#formClient').serialize();

    $.ajax({
      type: method,
      url: url,
      data: formData,
      success:function(data) {
        console.log(data);
        $('#add_client').modal('hide');
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

          toastr.success("Successfully Added a New Client Record");
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