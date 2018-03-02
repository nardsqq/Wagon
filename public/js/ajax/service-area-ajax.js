$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#add_servarea').on('hide.bs.modal', function() {
        $('#formService').trigger('reset');
        app.reset();
        // removeDesc();
    });

  var url = "/admin/maintenance/service";
  var id = '';

  $(document).on('click', '.open-modal', function() {
    var link_id = $(this).val();
    id = link_id;
    console.log(id);

    $('#title').text('Edit Service');
    $('#service-modal-header').addClass('modal-header-info').removeClass('modal-header-success');
    $('#btn-save').text('Update');
    $('.modal-btn').addClass('btn-info').removeClass('btn-success');
    app.reset();
    // removeDesc();
    $.ajax({
        type: "GET",
        url: url + '/' + id + '/edit',
        data: { int_service_id: id, },
        dataType: "json",
        success: function (data) {
            console.log(data);

            $('#intSA_ServType_ID').val(data.intSA_ServType_ID);
            $("input[name=str_service_name]").val(data.str_service_name);
            $('#dbl_service_price').val(data.dbl_service_price);
            // _.forEach(data.steps, function(step){
            //     addDesc(step.intServStepID, step.strServStepDesc);
            // });
            $('#btn-save').val("update");
            $('#add_servarea').modal('show');
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
      $('#del_servarea').modal('show');
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
            $('#del_servarea').modal('hide');

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

            toastr.success("Successfully Deleted Service Record");
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
      $('#title').text('Add Service');
      $('#servarea-modal-header').addClass('modal-header-success').removeClass('modal-header-info');
      $('#formService').trigger("reset");
      $('#btn-save').text('Submit');
      $('#btn-save').val("add");
      $('.modal-btn').addClass('btn-success').removeClass('btn-info');
      //addDesc();
      $('#add_servarea').modal('show');
    }); 

    $("#btn-save").on('click', function (e) {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      e.preventDefault();
      console.log(e);

      var formData = $("#formService").serialize();
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
      toastr.info("Successfully Updated Service Record");
    }

    console.log("" + type + ": " + my_url);

    $.ajax({
        type: type,
        url: my_url,
        data: formData,
        dataType: 'json'
    }).done(function(data) {
        console.log(data);

        var row = $("<tr id=id" + data.int_service_id +  "></tr>")
        .append(
            "<td>" + data.str_service_name + "</td>" +
            "<td>" + data.dbl_service_price + "</td>" +
            "<td class='text-center'>" +
            "<button class='btn btn-info btn-sm btn-detail open-modal' value="+data.int_service_id+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
            "<button class='btn btn-danger btn-sm btn-delete' value="+data.int_service_id+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
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
            toastr.success("Successfully Added a New Service");
        } 
        else { 
            table.row($("#id"+data.int_service_id)).remove();
            table.row.add(row).draw();
        }
        // $("[data-toggle='toggle']").bootstrapToggle('destroy');
        // $("[data-toggle='toggle']").bootstrapToggle();
        // $('#formService').trigger("reset");
        $('#add_servarea').modal('hide')
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
            toastr.error(errors[i]+'\n','DUPLICATE', {timeOut: 2000});
        }
    });
  }); // $$("#btn-save").on('click', function (e) {});
}); // $(document).ready(function() {});

// Steps 
// function addDesc(stepId='', stepDesc=''){
//     let step = 1 + $('#step-list .step').get().length;

//     $('#step-list').append(`
//       <tr>
//         <td>Sample Data</td>
//         <td class="text-center">
//           <button class="btn btn-danger">Remove</button>
//         </td>
//       </tr>
//     `);

    // <div class="form-group step" data-step="`+step+`">
    //   <div class="input-group">
    //     <input id="strServStepDesc`+step+`" type="text" class="form-control" name="strServStepDesc[`+stepId+`]" value="`+stepDesc+`">
    //     <span class="input-group-addon" title="Remove Step" onclick="removeDesc(`+step+`)">
    //       <i class="fa fa-remove text-danger"></i>
    //     </span>
    //   </div>
    // </div>
// }
// function removeDesc(step = -1){
//     if(step === -1){
//         $('#step-list .step').remove();
//         return;
//     }
//     $('#step-list .step[data-step='+step+']').remove();
//     _.forEach($('#step-list .step').get(), function(value, key){ 
//         let index = key + 1; 
//         if($(value).attr('data-step') !== index){
//             $(value).attr('data-step', index);
//             $(value).find('label').first().attr('for', 'strServStepDesc'+index);
//             $(value).find('label').first()[0].textContent = "Step "+ index;
//             $(value).find('input').first().attr('id', 'strServStepDesc'+index);            
//             $(value).find('span.input-group-addon').attr('onclick', 'removeDesc('+index+')');
//         }
//     });
// }

var app = new Vue({
    el: '#app',
    mounted(){
        //alert('vue');
    },
    data() {
        return {
            descriptions: [],
            description: {
                detail: ''
            }
        }
    },
    methods: {
        addDesc: function(){
            return this.description.detail && !this.isExisting(this.description) ? (this.descriptions.push(this.description), this.description = {
                detail: ''
            }) : null;
        },
        removeDesc: function(index){
            return this.descriptions.splice(index, 1);
        },
        isExisting: function(desc){
            return -1 != _.findIndex(this.descriptions, (d) => { return d.detail == this.description.detail; });
        },
        reset: function(){
            this.description = {
                detail: ''
            };
            this.descriptions = [];
        }
    }
});