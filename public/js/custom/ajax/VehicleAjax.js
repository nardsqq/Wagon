$(document).ready(function(){
   var url = "/admin/maintenance/vehicle";
   var id='';
   var url2 = "/admin/maintenance/vehicle/checkbox";
   $('#add_vehicle').on('hide.bs.modal', function(){
    $('#formVehicle').trigger("reset");
});
   $('#vehicle-list').on('change', '#isActive',function(e){ 
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
    $('#vehicle-list').on('click', '.open-modal',function(){ 
        var link_id = $(this).val();
        id = link_id;
        $.get(url + '/' + link_id + '/edit', function (data) {
            //success data
            $('#intVehicleTypeNum').val(data.intVehicleTypeNum);
            $('#strVehicleModel').val(data.strVehicleModel);
            $('#strVehiclePlateNumber').val(data.strVehiclePlateNumber);
            $('#intVehicleNetCapacity').val(data.intVehicleNetCapacity);
            $('#intVehicleGrossWeight').val(data.intVehicleGrossWeight);
            $('#btn-save').val("update");
            $('#add_vehicle').modal('show');
        })
    });
    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#btn-save').val("add");
        $('#formVehicle').trigger("reset");
        $('#add_vehicle').modal('show');
    });
    //delete task and remove it from list
    $('#vehicle-list').on('click', '.btn-delete',function(e){ 
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
                var table = $('#dataTable').DataTable();
                table.row($("#id" + link_id)).remove().draw();
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
        if($('#formVehicle').parsley().isValid())
        {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
         e.preventDefault();
         var formData = {
            intVehicleTypeNum: $('#intVehicleTypeNum').val(),
            strVehicleModel: $('#strVehicleModel').val(),
            strVehiclePlateNumber: $('#strVehiclePlateNumber').val(),
            intVehicleNetCapacity: $('#intVehicleNetCapacity').val(),
            intVehicleGrossWeight: $('#intVehicleGrossWeight').val()
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
                var row = $("<tr id=id" + data.intVehicleID +  "></tr>")
                .append(
                    "<td>" + data.strVehicleTypeName + "</td>" +
                    "<td>" + data.strVehicleModel + "</td>" +
                    "<td>" + data.strVehiclePlateNumber + "</td>" +
                    "<td>" + data.intVehicleNetCapacity + "</td>" +
                    "<td>" + data.intVehicleGrossWeight + "</td>" +
                    "<td class='text-center'><input type='checkbox' id='isActive' value=" + data.intVehicleID + " name='isActive' "+checkstate+" data-toggle='toggle' data-style='android' data-onstyle='success' data-offstyle='default' data-on=\"Active\" data-off=\"Inactive\" data-size='mini'></td>"+
                    "<td class='text-center'>" +
                    "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intVehicleID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                    "<button class='btn btn-danger btn-sm btn-delete' value="+data.intVehicleID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                    "</td>"
                );
                var table = $('#dataTable').DataTable();
                if (state == "add"){ //if user added a new record
                    table.row.add(row).draw();
                }else{ //if user updated an existing record`
                    table.row($("#id"+data.intVehicleID)).remove();
                    table.row.add(row).draw();
                }
                $("[data-toggle='toggle']").bootstrapToggle('destroy')                 
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formVehicle').trigger("reset");
                $('#add_vehicle').modal('hide')
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