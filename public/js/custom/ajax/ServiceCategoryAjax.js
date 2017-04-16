$(document).ready(function(){
   var url = "/admin/maintenance/servicecategory";
   var id='';
   var url2 = "/admin/maintenance/servicecategory/checkbox";
   $('#add_servicecategory').on('hide.bs.modal', function(){
    $('#formServiceCategory').trigger("reset");
});
   $('#servicecategory-list').on('change', '#isActive',function(e){ 
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
     e.preventDefault(); 
     var link_id = $(this).val();
     $.ajax({
        url: url2 + '/' + link_id,
        type: "PUT",
        success: function (data) {
            console.log(link_id);
        },
        error: function (data) {
            console.log(url + '/' + link_id);
            console.log('Error:', data);
        }
    });
 });
    //display modal form for task editing
    $('#servicecategory-list').on('click', '.open-modal',function(){ 
        var link_id = $(this).val();
        id = link_id;
        $.get(url + '/' + link_id + '/edit', function (data) {
            //success data
            $('#strServiceCategName').val(data.strServiceCategName);
            $('#strDesc').val(data.strDesc);
            $('#btn-save').val("update");
            $('#add_servicecategory').modal('show');
        })
    });
    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#formServiceCategory').trigger("reset");
        $('#add_servicecategory').modal('show');
    });
    //delete task and remove it from list
    $('#servicecategory-list').on('click', '.btn-delete',function(e){ 
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
     e.preventDefault(); 
     var link_id = $(this).val();
     if (confirm("Delete this record?")) {
         $.ajax({
            url: url + '/' + link_id,
            type: "DELETE",
            success: function (data) {
                console.log(data);
                $("#id" + link_id).remove();
            },
            error: function (data) {
                console.log(url + '/' + link_id);
                console.log('Error:', data);
            }
        });
     }
 });
    //create new task / update existing task
    $("#btn-save").click(function (e) {
        if($('#formServiceCategory').parsley().isValid())
        {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault();
         var formData = {
            strServiceCategName: $('#strServiceCategName').val(),
            strDesc: $('#strDesc').val()
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var my_url = url;
        var checkstate = "checked";
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + id;
        }
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (state == "update"){
                    if(!data.isActive){
                        checkstate = "";
                    }
                }
                var row = "<tr id=id" + data.intServiceCategID +  ">"+
                "<td>" + data.strServiceCategName + "</td>" +
                "<td>" + data.strDesc + "</td>" +
                "<td class='text-center'><input type='checkbox' id='isActive' value=" + data.intServiceCategID + " name='isActive' "+checkstate+" data-toggle='toggle' data-style='android' data-onstyle='success' data-offstyle='default' data-on=\"<i class='fa fa-thumbs-o-up'></i> Active\" data-off=\"<i class='fa fa-thumbs-o-down'></i> Inactive\" data-size='mini'></td>"+
                "<td class='text-center'>" +
                "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intServiceCategID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                "<button class='btn btn-danger btn-sm btn-delete' value="+data.intServiceCategID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                "</td>" +
                "</tr>";
                if (state == "add"){ //if user added a new record
                    $('#servicecategory-list').append(row);
                }else{ //if user updated an existing record`
                    $("#id"+data.intServiceCategID).replaceWith(row);
                }
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formServiceCategory').trigger("reset");
                $('#add_servicecategory').modal('hide')
            },
            error: function (data) {
                toastr.options = {"preventDuplicates": true}
                var errors = data.responseJSON;
                for (i in errors){
                    toastr.warning(errors[i]+'\n','DUPLICATE', {timeOut: 2000});
                }
            }
        });
    }
});
});