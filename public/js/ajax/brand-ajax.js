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

    $('#title').text('Edit Brand Details');
    $('.modal-header').addClass('modal-header-info').removeClass('modal-header-success');
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

    $('#btn-add').on('click', function(event) {
      $('#title').text('Add New Brand');
      $('.modal-header').addClass('modal-header-success').removeClass('modal-header-info');
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
        txtBrandDesc: $('#txtBrandDesc').val(),
      };

      var state = $('#btn-save').val();
      var type = "POST";
      var my_url = url;

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
        } 
        else { 
            table.row($("#id"+data.intBrandID)).remove();
            table.row.add(row).draw();
        }
        // $("[data-toggle='toggle']").bootstrapToggle('destroy');
        // $("[data-toggle='toggle']").bootstrapToggle();
        $('#formBrand').trigger("reset");
        $('#add_brand').modal('hide')

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