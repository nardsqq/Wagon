$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_delchar').on('hide.bs.modal', function() {
        $('#formDelChar').trigger('reset');
    });

  var url = "/admin/maintenance/delivery-charge";
  var id = '';

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('#title').text('Edit Delivery Charge');
    $('#delchar-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.get(url + '/' + link_id + '/edit', function (data) {
      console.log(url + '/' + link_id + '/edit');
      console.log(data);

      $('#strDelCharName').val(data.strDelCharName);
      $('#decDelCharRate').val(data.decDelCharRate);
      $('#btn-save').val("update");
      $('#add_delchar').modal('show');

    }) 

  });

    $(document).on('click', '.btn-delete', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_delchar').modal('show');
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
      url: '/admin/maintenance/delivery-charge/' + id,
      dataType: "json",
      success: function (data) {
        console.log(data);
        console.log(url);

        var table = $('#dataTable').DataTable();
        table.row($("#id" + id)).remove().draw();

        $('#del_delchar').modal('hide');

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

        toastr.error("Successfully Deleted Delivery Charge Record");
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
    $('#title').text('Add New Delivery Charge');
    $('#delchar-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formDelChar').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_delchar').modal('show');

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
      strDelCharName: $('#strDelCharName').val(),
      decDelCharWeight: $('#decDelCharWeight').val(),
      decDelCharRate: $('#decDelCharRate').val()
    };

    var state = $('#btn-save').val();
    var type = "POST";
    var my_url = url;

  if (state == "update") {
    type = "PUT";
    my_url += '/' + id;

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

    toastr.info("Successfully Updated Delivery Charge Record");
  }

  $.ajax({
    type: type,
    url: my_url,
    data: formData,
    dataType: 'json'
  }).done(function(data) {
      console.log(data);

      var row = $("<tr id=id" + data.intDelCharID +  "></tr>")
      .append(
          "<td>" + data.strDelCharName + "</td>" +
          "<td>" + data.decDelCharRate + "</td>" +
          "<td class='text-center'>" +
          "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.intDelCharID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
          "<button class='btn btn-danger btn-sm btn-delete' value="+data.intDelCharID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
          "</td>"
      );

      var table = $('#dataTable').DataTable();
      
      if (state == "add") { 
          table.row.add(row).draw();
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

          toastr.success("Successfully Added a New Delivery Charge Record");
      } 
      else { 
          table.row($("#id"+data.intDelCharID)).remove();
          table.row.add(row).draw();
      }
      // $("[data-toggle='toggle']").bootstrapToggle('destroy');
      // $("[data-toggle='toggle']").bootstrapToggle();
      $('#formDelChar').trigger("reset");
      $('#add_delchar').modal('hide')

  }).fail(function(data) {
      console.log('Error:', data);
      toastr.options = {"preventDuplicates": true}
      var errors = data.responseJSON;

      for (i in errors){
          toastr.warning(errors[i]+'\n','VALIDATION ERROR', {timeOut: 2000});
      }
    });
  }); // $$("#btn-save").on('click', function (e) {});
}); // $(document).ready(function() {});