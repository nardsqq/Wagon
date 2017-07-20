$(document).ready(function(){
   var url = "/admin/maintenance/position";
   var id='';
   var url2 = "/admin/maintenance/position/checkbox";
   $('#add_position').on('hide.bs.modal', function(){
    $('#formPosition').trigger("reset");
});
   $('.btn-default').click(function(e){
    if($('#frmSearch').parsley().isValid())
    {
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })
     e.preventDefault();
     var checkstate = "checked";
    $.ajax({
        type: 'POST',
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#position-list').empty();
            $.each(data, function(index, value) {
                console.log(index+" / "+value);
                if(!value.isActive){
                    checkstate = "";
                }
                $('#position-list').append("<tr id=id" + value.intPositionID +  ">"+
                    "<td>" + value.strPositionName + "</td>" +
                    "<td>" + value.strDesc +"</td>" +
                    "<td><input type='checkbox' id='isActive' value=" + value.intPositionID + " name='isActive' "+checkstate+" data-toggle='toggle' data-style='android' data-onstyle='success' data-offstyle='danger' data-on=\"Active\" data-off=\"Inactive\" data-size='mini'></td>"+
                    "<td class='text-center'>" +
                    "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+value.intPositionID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                    "<button class='btn btn-danger btn-sm btn-delete' value="+value.intPositionID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                    "</td>" +
                    "</tr>");
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
            });
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
});
   $('#position-list').on('change', '#isActive',function(e){ 
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
    $('#position-list').on('click', '.open-modal',function(){ 
        var link_id = $(this).val();
        id = link_id;
        $.get(url + '/' + link_id + '/edit', function (data) {
            //success data
            $('#strPositionName').val(data.strPositionName);
            $('#strDesc').val(data.strDesc);
            $('#btn-save').val("update");
            $('#add_position').modal('show');
        })
    });
    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#formPosition').trigger("reset");
        $('#add_position').modal('show');
    });
    //delete task and remove it from list
    $('#position-list').on('click', '.btn-delete',function(e){ 
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
        if($('#formPosition').parsley().isValid())
        {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault();
         var formData = {
            strPositionName: $('#strPositionName').val(),
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
                var row = "<tr id=id" + data.intPositionID +  ">"+
                "<td>" + data.strPositionName + "</td>" +
                "<td>" + data.strDesc + "</td>" +
                "<td class='text-center'><input type='checkbox' id='isActive' value=" + data.intPositionID + " name='isActive' "+checkstate+" data-toggle='toggle' data-style='android' data-onstyle='success' data-offstyle='default' data-on=\"<i class='fa fa-thumbs-o-up'></i> Active\" data-off=\"<i class='fa fa-thumbs-o-down'></i> Inactive\" data-size='mini'></td>"+
                "<td class='text-center'>" +
                "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intPositionID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                "<button class='btn btn-danger btn-sm btn-delete' value="+data.intPositionID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                "</td>" +
                "</tr>";
                if (state == "add"){ //if user added a new record
                    $('#position-list').append(row);
                }else{ //if user updated an existing record`
                    $("#id"+data.intPositionID).replaceWith(row);
                }
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formPosition').trigger("reset");
                $('#add_position').modal('hide')
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