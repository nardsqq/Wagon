$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_attribute').on('hide.bs.modal', function() {
        $('#formAttribute').trigger('reset');
    });

  var url = "/admin/maintenance/attributes";
  var id = '';

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('#title').text('Edit Attribute');
    $('.modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.get(url + '/' + link_id + '/edit', function (data) {
      console.log(url + '/' + link_id + '/edit');
      console.log(data);

      $('#strAttribName').val(data.strAttribName);
      $('#btn-save').val("update");
      $('#add_attribute').modal('show');

    }) 

  }); 

    $('#btn-add').on('click', function(event) {
      $('#title').text('Add Attribute');
      $('.modal-header').addClass('modal-header-success').removeClass('modal-header-info');
      $('#formAttribute').trigger("reset");
      $('#btn-save').text('Submit');
      $('#btn-save').val("add");
      $('.modal-btn').addClass('btn-success').removeClass('btn-info');
      $('#add_attribute').modal('show');

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
        strAttribName: $('#strAttribName').val(),
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

        var row = $("<tr id=id" + data.intAttribID +  "></tr>")
        .append(
            "<td> Product </td>" +
            "<td>" + data.strAttribName + "</td>" +
            "<td class='text-center'>" +
            "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.intAttribID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
            "<button class='btn btn-danger btn-sm btn-delete' value="+data.intAttribID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
            "</td>"
        );

        var table = $('#dataTable').DataTable();
        if (state == "add") { 
            table.row.add(row).draw();
        } 
        else { 
            table.row($("#id"+data.intAttribID)).remove();
            table.row.add(row).draw();
        }
        // $("[data-toggle='toggle']").bootstrapToggle('destroy');
        // $("[data-toggle='toggle']").bootstrapToggle();
        $('#formAttribute').trigger("reset");
        $('#add_attribute').modal('hide')
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