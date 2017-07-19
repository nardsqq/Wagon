$(document).ready(function(){
   var url = "/admin/maintenance/productcategory";
   var id='';
   var url2 = "/admin/maintenance/productcategory/checkbox";
   $('#add_productcategory').on('hide.bs.modal', function(){
    $('#formProductCategory').trigger("reset");
});
   $('#productcategory-list').on('change', '#isActive',function(e){ 
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
    $('#productcategory-list').on('click', '.open-modal',function(){ 
        var link_id = $(this).val();
        id = link_id;
        $.get(url + '/' + link_id + '/edit', function (data) {
            //success data
            $('#strProductCategoryName').val(data.strProductCategoryName);
            $('#strDesc').val(data.strDesc);
            $('#btn-save').val("update");
            $('#add_productcategory').modal('show');
        })
    });
    //display modal form for creating new task
    $('#btn-add').on('click',function(){
        $('#btn-save').val("add");
        $('#formProductCategory').trigger("reset");
        $('#add_productcategory').modal('show');
    });
    //delete task and remove it from list
    $('#productcategory-list').on('click', '.btn-delete',function(e){ 
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
    $("#btn-save").on('click',function (e) {
        if($('#formProductCategory').parsley().isValid())
        {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault();
         var formData = {
            strProductCategoryName: $('#strProductCategoryName').val(),
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
                var row = "<tr id=id" + data.intProductCategoryID +  ">"+
                "<td>" + data.strProductCategoryName + "</td>" +
                "<td>" + data.strDesc + "</td>" +
                "<td class='text-center'><input type='checkbox' id='isActive' value=" + data.intProductCategoryID + " name='isActive' "+checkstate+" data-toggle='toggle' data-style='android' data-onstyle='success' data-offstyle='default' data-on=\"Active\" data-off=\"Inactive\" data-size='mini'></td>"+
                "<td class='text-center'>" +
                "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intProductCategoryID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                "<button class='btn btn-danger btn-sm btn-delete' value="+data.intProductCategoryID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                "</td>" +
                "</tr>";
                if (state == "add"){ //if user added a new record
                    $('#productcategory-list').append(row);
                }else{ //if user updated an existing record`
                    $("#id"+data.intProductCategoryID).replaceWith(row);
                }
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formProductCategory').trigger("reset");
                $('#add_productcategory').modal('hide')
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