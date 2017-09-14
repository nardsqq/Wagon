$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_bprice').on('hide.bs.modal', function() {
        $('#formBPrice').trigger('reset');
    });

  var url = "/admin/maintenance/base-price";
  var id = '';

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;
    console.log(id);

    $('#modal-title').text('Edit Base Price');
    $('#base-price-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');

    $.ajax({
        type: "GET",
        url: url + '/' + id + '/edit',
        data: { intPriceID: id, },
        dataType: "json",
        success: function (data) {
            console.log(data);

            $('#intP_Item_ID').val(data.intP_Item_ID);
            $("input[name=decPriceAmount]").val(data.decPriceAmount);
            $('#btn-save').val("update");
            $('#add_bprice').modal('show');
        },
        error: function (data) {
          console.log(data);
        },
    });
  });

  $(document).on('click', '.btn-delete', function() {
      var link_id = $(this).val();
      id = link_id;
      console.log(id)
      $('#del_bprice').modal('show');
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
            $('#del_bprice').modal('hide');

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

            toastr.success("Successfully Deleted Base Price Record");
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
      $('#modal-title').text('Add Base Price');
      $('#base-price-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
      $('#formBPrice').trigger("reset");
      $('#btn-save').text('Submit');
      $('#btn-save').val("add");
      $('.modal-btn').addClass('btn-success').removeClass('btn-info');
      $('#add_bprice').modal('show');

    }); 

    $("#btn-save").on('click', function (e) {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      e.preventDefault();
      console.log(e);

      var formData = $("#formBPrice").serialize();
      var state = $('#btn-save').val();
      var type = "POST";
      var my_url = url;


    if(state === "add")
      type = "POST";
    else {
      type = "PUT";
      my_url += '/' + id;

      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
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
      toastr.info("Successfully Updated Base Price Record");
    }

    console.log("" + type + ": " + my_url);

    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json'
    }).done(function(data) {
        console.log(data);

        var row = $("<tr id=id" + data.intPriceID +  "></tr>")
        .append(
            "<td>" + data.prodcateg.strProdCategName + "</td>" +
            "<td>" + data.strProdName + "</td>" +
            "<td>" + data.strProdHandle + "</td>" +
            "<td>" + data.strProdSKU + "</td>" +
            "<td class='text-center'>" +
            "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.intProdID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
            "<button class='btn btn-danger btn-sm btn-delete' value="+data.intProdID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
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
            toastr.success("Successfully Added a New Product");
        } 
        else { 
            table.row($("#id"+data.intProdID)).remove();
            table.row.add(row).draw();
        }
        // $("[data-toggle='toggle']").bootstrapToggle('destroy');
        // $("[data-toggle='toggle']").bootstrapToggle();
        $('#formBPrice').trigger("reset");
        $('#add_bprice').modal('hide')
    }).fail(function(data) {
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
          "hideMethod": "fadeOut"
        }

        var errors = data.responseJSON;

        for (i in errors){
            toastr.error(errors[i]+'\n','VALIDATION ERROR', {timeOut: 2000});
        }
    });
  }); // $$("#btn-save").on('click', function (e) {});
}); // $(document).ready(function() {});