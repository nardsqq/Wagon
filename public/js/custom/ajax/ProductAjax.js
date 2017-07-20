$(document).ready(function(){
   var url = "/admin/maintenance/product";
   var id='';
   var url2 = "/admin/maintenance/product/checkbox";
   $('#add_product').on('hide.bs.modal', function(){
    $('#formProduct').trigger("reset");
});
   $('#product-list').on('change', '#isActive',function(e){ 
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
    $('#product-list').on('click', '.open-modal',function(){ 
        var link_id = $(this).val();
        id = link_id;
        $.get(url + '/' + link_id + '/edit', function (data) {
            //success data
            $('#strProductName').val(data.strProductName);
            $('#intProductCategory').val(data.intProductCategory);
            $('#strProductSerialNumber').val(data.strProductSerialNumber);
            $('#btn-save').val("update");
            $('#add_product').modal('show');
        })
    });
    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#formProduct').trigger("reset");
        $('#add_product').modal('show');
    });
    //delete task and remove it from list
    $('#product-list').on('click', '.btn-delete',function(e){ 
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
        if($('#formProduct').parsley().isValid())
        {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault();
         var formData = {
            strProductName: $('#strProductName').val(),
            intProductCategory: $('#intProductCategory').val(),
            strProductSerialNumber: $('#strProductSerialNumber').val()
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
                var row = "<tr id=id" + data.intProductID +  ">"+
                "<td>" + data.strProductName + "</td>" +
                "<td>" + data.strProductCategoryName + "</td>" +
                "<td>" + data.strProductSerialNumber + "</td>" +
                "<td class='text-center'><input type='checkbox' id='isActive' value=" + data.intProductID + " name='isActive' "+checkstate+" data-toggle='toggle' data-style='android' data-onstyle='success' data-offstyle='default' data-on=\"Active\" data-off=\"Inactive\" data-size='mini'></td>"+
                "<td class='text-center'>" +
                "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intProductID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                "<button class='btn btn-danger btn-sm btn-delete' value="+data.intProductID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                "</td>" +
                "</tr>";
                if (state == "add"){ //if user added a new record
                    $('#product-list').append(row);
                }else{ //if user updated an existing record`
                    $("#id"+data.intProductID).replaceWith(row);
                }
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formProduct').trigger("reset");
                $('#add_product').modal('hide')
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