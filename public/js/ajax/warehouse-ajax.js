$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_warehouse').on('hide.bs.modal', function() {
        $('#formWarehouse').trigger('reset');
  });

  var url = "/admin/maintenance/warehouse";
  var cboxurl = "/admin/maintenance/department/checkbox";
  var id = '';

  $(document).on('change', '#intWarehouseStatus', function(e){ 
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
     e.preventDefault(); 
     var link_id = $(this).val();
     $.ajax({
        url: cboxurl + '/' + link_id,
        type: "PUT",
        success: function (data) {
            console.log(link_id);
        },
        error: function (data) {
            console.log(url + '/' + link_id);
            console.log('Error:', data);
        }
    });
 });

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('#title').text('Edit Warehouse Details');
    $('#warehouse-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.get(url + '/' + link_id + '/edit', function (data) {
      console.log(url + '/' + link_id + '/edit');
      console.log(data);

      $('#strWarehouseName').val(data.strWarehouseName);
      $('#txtWarehouseLocation').val(data.txtWarehouseLocation);
      $('#txtWarehouseDesc').val(data.txtWarehouseDesc);
      $('#btn-save').val("update");
      $('#add_warehouse').modal('show');

    }) 

  });

  $(document).on('click', '.btn-delete', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_warehouse').modal('show');
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
          url: '/admin/maintenance/warehouse/' + id,
          dataType: "json",
          success: function (data) {
              console.log(data);
              console.log(url);

              var table = $('#dataTable').DataTable();
              table.row($("#id" + id)).remove().draw();

              $('#del_warehouse').modal('hide');

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

              toastr.success("Successfully Deleted Warehouse Record");
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
    $('#title').text('Add Warehouse');
    $('#warehouse-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formWarehouse').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_warehouse').modal('show');

  }); 

  $("#btn-save").on('click', function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    console.log(e);

    var formData = {
      _token: $('input[name=_token]').val(),
      strWarehouseName: $('#strWarehouseName').val(),
      txtWarehouseLocation: $('#txtWarehouseLocation').val(),
      txtWarehouseDesc: $('#txtWarehouseDesc').val()
    };

    var state = $('#btn-save').val();
    var type = "POST";
    var my_url = url;
    var checkstate = "checked";

  if (state == "update") {
    type = "PUT";
    my_url += '/' + id;
  }

  $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json'
  }).done(function(data) {
      console.log(data);
      if (state == "update"){
          if(!data.intWarehouseStatus){
              checkstate = "";
          }
      }

      var row = $("<tr id=id" + data.intWarehouseID +  "></tr>")
      .append(
          "<td>" + data.strWarehouseName + "</td>" +
          "<td>" + data.txtWarehouseLocation + "</td>" +
          "<td>" + data.txtWarehouseDesc + "</td>" +
          "<td class='text-center'>" +
          "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.intWarehouseID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
          "<button class='btn btn-danger btn-sm btn-delete' value="+data.intWarehouseID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
          "</td>"
      );

      var table = $('#dataTable').DataTable();
      if (state == "add") { 
          table.row.add(row).draw();
      } 
      else { 
          table.row($("#id"+data.intWarehouseID)).remove();
          table.row.add(row).draw();
      }
      $("[data-toggle='toggle']").bootstrapToggle('destroy');
      $("[data-toggle='toggle']").bootstrapToggle();
      $('#formWarehouse').trigger("reset");
      $('#add_warehouse').modal('hide')
  }).fail(function(data) {
    console.log('Error:', data);
        toastr.options = {"preventDuplicates": true}
        var errors = data.responseJSON;

        for (i in errors){
            toastr.warning(errors[i]+'\n','DUPLICATE', {timeOut: 2000});
        }
    });
  }); // $$("#btn-save").on('click', function (e) {});
}); // $(document).ready(function() {});