$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_specs').on('hide.bs.modal', function() {
        $('#formSpecs').trigger('reset');
  });

  var url = "/admin/maintenance/specification";
  var id = '';

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('.modal-title').text('Edit Specification Details');
    $('#specs-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.get(url + '/' + link_id + '/edit', function (data) {
      console.log(url + '/' + link_id + '/edit');
      console.log(data);

      $('#str_specs_name').val(data.str_specs_name);
      $('#str_specs_uom').val(data.str_specs_uom);
      $('#btn-save').val("update");
      $('#add_specs').modal('show');

    }) 

  });

  $(document).on('click', '.btn-delete', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_specs').modal('show');
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
          url: url + '/' + id,
          dataType: "json",
          success: function (data) {
              console.log(data);
              console.log(url);

              var table = $('#dataTable').DataTable();
              table.row($("#id" + id)).remove().draw();
              $('#del_specs').modal('hide');

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

              toastr.success("Successfully Deleted Specification Record");
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

              toastr.error("It seems like this record is still in use in other processes. Record removal failed.");
          }
      });
  }); 

  $('#btn-add').on('click', function(event) {
    $('.modal-title').text('Add New Specification');
    $('#specs-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formSpecs').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_specs').modal('show');

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
      str_specs_name: $('#str_specs_name').val(),
      str_specs_uom: $('#str_specs_uom').val()
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
    toastr.info("Successfully Updated Specification Record");

  }

  $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json'
  }).done(function(data) {
      console.log(data);

      var row = $("<tr id=id" + data.int_specs_id +  "></tr>")
      .append(
          "<td>" + data.str_specs_name + "</td>" +
          "<td>" + data.str_specs_uom + "</td>" +
          "<td class='text-center'>" +
          "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.int_specs_id+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
          "<button class='btn btn-danger btn-sm btn-delete' value="+data.int_specs_id+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
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
        toastr.success("Successfully Added a New Specification Record");

      } 
      else { 
          table.row($("#id"+data.int_specs_id)).remove();
          table.row.add(row).draw();
      }
      // $("[data-toggle='toggle']").bootstrapToggle('destroy');
      // $("[data-toggle='toggle']").bootstrapToggle();
      $('#formSpecs').trigger("reset");
      $('#add_specs').modal('hide');
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