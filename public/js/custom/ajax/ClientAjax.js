$(document).ready(function(){
   var url = "/admin/transactions/client";
   var id='';
   $('#add_client').on('hide.bs.modal', function(){
    $('#formClient').trigger("reset");
    });
});
    //display modal form for task editing
    $('#client-list').on('click', '.open-modal',function(){ 
        var link_id = $(this).val();
        id = link_id;
        $.get(url + '/' + link_id + '/edit', function (data) {
            //success data
            $('#strClientName').val(data.strClientName);
            $('#strClientTelephone').val(data.strClientTelephone);
            $('#strClientFax').val(data.strClientFax);
            $('#btn-save').val("update");
            $('#add_client').modal('show');
        })
    });
    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#formClient').trigger("reset");
        $('#add_client').modal('show');
    });
    //delete task and remove it from list
    $('#client-list').on('click', '.btn-delete',function(e){ 
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
        if($('#formClient').parsley().isValid())
        {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault();
         var formData = {
            strClientName: $('#strClientName').val(),
            strClientAddress: $('#strClientAddress').val(),
            strClientTelephone: $('#strClientTelephone').val(),
            strClientFax: $('#strClientFax').val(),
            strClientEmail: $('#strClientEmail').val(),
            strClientMobile: $('#strClientMobile').val()
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
                var row = "<tr id=id" + data.intCliendID +  ">"+
                "<td>" + data.strClientName + "</td>" +
                "<td>" + data.strClientTelephone + "</td>" +
                "<td>" + data.strClientFax + "</td>" +
                "<td class='text-center'>" +
                "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intClientID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                "<button class='btn btn-danger btn-sm btn-delete' value="+data.intClientID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                "</td>" +
                "</tr>";
                if (state == "add"){ //if user added a new record
                    $('#client-list').append(row);
                }else{ //if user updated an existing record`
                    $("#id"+data.intClientID).replaceWith(row);
                }
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formClient').trigger("reset");
                $('#add_client').modal('hide')
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