$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_stock').on('hide.bs.modal', function() {
    $('#formStock').trigger('reset');
  });

  var url = "/admin/transactions/stocks";
  var id = '';

  loadTable();

  $(document).on('click', '.btn-replenish', function() {
    console.log("Success")
    $('#replenish').modal('show');
  });

  $(document).on('click', '.btn-adjust', function() {
    console.log("Success")
    $('#adjust').modal('show');
  });

  $(document).on('click', '.btn-details', function() {
    console.log("Success")
    $('#details').modal('show');
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