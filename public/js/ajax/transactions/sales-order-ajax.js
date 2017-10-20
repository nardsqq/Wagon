$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_quotation').on('hide.bs.modal', function() {
    $('#formQuotation').trigger('reset');
  });

  var url = "/admin/transactions/sales-order";
  var id = '';

  loadTable();

  $('#btn-add').on('click', function(event) {
    $('#title').text('Add Quotation Record');
    $('#so-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formSO').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_so').modal('show');

  }); 

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