$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#btn-add').on('click', function(event) {
    $('#attrib-add-panel'). removeAttr("style");
  }); 

  $('#attrib-hide-panel').on('click', function(event) {
    $('#attrib-add-panel').attr('style', 'display: none;');
  }); 

}); // $(document).ready(function() {});