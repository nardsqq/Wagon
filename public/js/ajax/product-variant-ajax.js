$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_prodvar').on('hide.bs.modal', function() {
    $('#formProdVar').trigger('reset');
  });

  var url = "/admin/maintenance/product-variant";
  var id = '';

  loadTable();

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;

    $('.modal-btn').addClass('btn-info').removeClass('btn-success');
    removeAttrib();

    $.ajax({
      type: 'GET',
      url: url + '/' + id + '/edit',
      success: function(data) {
        var formEditVar = $('#formEditVar');

        formEditVar.find('#intV_Brand_ID').val(data.intV_Brand_ID);
        formEditVar.find('#intV_Prod_ID').val(data.intV_Prod_ID);
        formEditVar.find('#strVarPartNum').val(data.strVarPartNum);
        formEditVar.find('#strVarModel').val(data.strVarModel);
        formEditVar.find('#strVarHandle').val(data.strVarHandle);
        formEditVar.find('#intVarReStockLevel').val(data.intVarReStockLevel);
        formEditVar.find('#txtVarDesc').val(data.txtVarDesc);

        $('#edit_prodvar').modal('show');
      }
    })

  });

  $('#btn-update').on('click', function(e) {
    e.preventDefault();

    var data = $('#formEditVar').serialize();
    var url = '/admin/maintenance/product-variant/';
    var type = "PUT";

    $.ajax({
      type: type,
      url: url + id,
      data: data,
      dataType: 'json'
    }).done(function(data) {
      $('#formProdVar').trigger('reset');
      $('#edit_prodvar').modal('hide');
      loadTable();
    })
  });

  $(document).on('click', '.btn-delete', function() {
    var link_id = $(this).val();
    id = link_id;
    console.log(id)
    $('#del_prodvar').modal('show');
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
      url: '/admin/maintenance/product-variant/' + id,
      dataType: "json",
      success: function (data) {
        console.log(data);
        console.log(url);

        var table = $('#dataTable').DataTable();
        table.row($("#id" + id)).remove().draw();

        $('#del_prodvar').modal('hide');

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

        toastr.error("Successfully Deleted Product Variant Record");
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
    $('#title').text('Add New Product Variant');
    $('#prodvar-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formProdVar').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_prodvar').modal('show');

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
    var method = $('#formProdVar').attr('method');
    var url = $('#formProdVar').attr('action');
    var formData = $('#formProdVar').serialize();

    $.ajax({
      type: method,
      url: url,
      data: formData,
      success:function(data) {
        console.log(data);
        $('#add_prodvar').modal('hide');
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

          toastr.success("Successfully Added a New Product Variant Record");
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

// Steps 
function addAttrib(attribId='', attribDesc=''){
    let attrib = 1 + $('#attrib-list .attrib').get().length;

    $('#attrib-list').append(`
        <div class="form-group attrib" data-step="`+attrib+`">
            <div class="col-md-12 input-group">
            <input id="strDimenValue`+attrib+`" type="text" class="form-control" name="strDimenValue[`+attribId+`]" value="`+attribDesc+`">
            <span class="input-group-addon" title="Remove Attribute" onclick="removeAttrib(`+attrib+`)"><i class="fa fa-remove text-danger"></i></span>
            </div>
        </div>
    `);
}
function removeAttrib(attrib = -1){
    if(attrib === -1){
        $('#attrib-list .attrib').remove();
        return;
    }
    $('#attrib-list .attrib[data-step='+attrib+']').remove();
    _.forEach($('#attrib-list .attrib').get(), function(value, key){ 
        let index = key + 1; 
        if($(value).attr('data-step') !== index){
            $(value).attr('data-step', index);
            $(value).find('label').first().attr('for', 'strDimenValue'+index);
            $(value).find('label').first()[0].textContent = "Attribute "+ index;
            $(value).find('input').first().attr('id', 'strDimenValue'+index);            
            $(value).find('span.input-group-addon').attr('onclick', 'removeAttrib('+index+')');
        }
    });
}