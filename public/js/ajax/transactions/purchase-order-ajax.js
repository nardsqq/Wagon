$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_po').on('hide.bs.modal', function() {
        $('#formPurchaseOrder').trigger('reset');
  });

  $('#btn-add').on('click', function(event) {
    $('#po-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
    $('#formClient').trigger("reset");
    $('#btn-save').text('Submit');
    $('#btn-save').val("add");
    $('.modal-btn').addClass('btn-success').removeClass('btn-info');
    $('#add_po').modal('show');
  }); 

}); // $(document).ready(function() {});