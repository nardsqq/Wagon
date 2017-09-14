$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_brand').on('hide.bs.modal', function() {
        $('#formBrand').trigger('reset');
  });

  var url = "/admin/maintenance/brand";
  var id = '';

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('.modal-title').text('Edit Brand Details');
    $('#brand-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.get(url + '/' + link_id + '/edit', function (data) {
      console.log(url + '/' + link_id + '/edit');
      console.log(data);

      $('#strBrandName').val(data.strBrandName);
      $('#txtBrandDesc').val(data.txtBrandDesc);
      $('#btn-save').val("update");
      $('#add_brand').modal('show');

    }) 

  });

  $(document).on('click', '.btn-delete', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_brand').modal('show');
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
              $('#del_brand').modal('hide');

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

              toastr.success("Successfully Deleted Brand Record");
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
    $('.modal-title').text('Add New Brand');
    $('#brand-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formBrand').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_brand').modal('show');

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
      strBrandName: $('#strBrandName').val(),
      txtBrandDesc: $('#txtBrandDesc').val()
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
    toastr.info("Successfully Updated Brand Record");

  }

  $.ajax({
      type: type,
      url: my_url,
      data: formData,
      dataType: 'json'
  }).done(function(data) {
      console.log(data);

      var row = $("<tr id=id" + data.intBrandID +  "></tr>")
      .append(
          "<td>" + data.strBrandName + "</td>" +
          "<td>" + data.txtBrandDesc + "</td>" +
          "<td class='text-center'>" +
          "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.intBrandID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
          "<button class='btn btn-danger btn-sm btn-delete' value="+data.intBrandID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
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
        toastr.success("Successfully Added a New Brand Record");

      } 
      else { 
          table.row($("#id"+data.intBrandID)).remove();
          table.row.add(row).draw();
      }
      // $("[data-toggle='toggle']").bootstrapToggle('destroy');
      // $("[data-toggle='toggle']").bootstrapToggle();
      $('#formBrand').trigger("reset");
      $('#add_brand').modal('hide');
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