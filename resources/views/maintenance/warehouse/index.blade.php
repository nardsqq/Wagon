@extends('main')

@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-bar-chart" aria-hidden="true"></i> Maintenance</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <div class="container fadeIn">
    @include('partials._menu')
  </div>

  <section id="breadcrumb">
    <div class="container animated fadeIn">
      <ol class="breadcrumb">
        <li>Admin</li>
        <li>Maintenance</li>
        <li>Warehouse</li>
      </ol>
    </div>
  </section>

  @include('maintenance.warehouse.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Warehouse</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, <i>Deactivate</i> and <i>Delete</i> Operations.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success" data-target="#add_warehouse" data-toggle="modal"><i class="fa fa-plus-square"></i>&nbsp; Add Warehouse</button>
              </div>
              <div class="panel-title">
                <h4>Warehouse</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.warehouse.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('meta')
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection

@section('scripts')

  <!-- Delay table load until everything else is loaded -->
  <script>
        $(window).on('load', function(){
            $('#dataTable').removeAttr('style');
        })
  </script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function(){

      var url = "/admin/maintenance/warehouse";
      var id='';

      $('#warehouse-list').on('click', '.open-modal', function(event) {
        var link_id = $(this).val();
        id = link_id;

        $('#title').text('Edit Warehouse Details');
        $('.modal-header').addClass('modal-header-info').removeClass('modal-header-success');

        $.get(url + '/' + link_id + '/edit', function (data) {
          $('#strWarehouseName').val(data.strWarehouseName);
          $('#txtWarehouseLocation').val(data.txtWarehouseLocation);
          $('#txtWarehouseDesc').val(data.txtWarehouseDesc);
          $('#btn-save').hide();
          $('#btn-edit').show();
          $('#btn-edit').val("update");
          $('#add_warehouse').modal('show');
        })

      });

      $('#btn-add').on('click', function(event) {
        $('#title').text('Add Warehouse');
        $('.modal-header').addClass('modal-header-success').removeClass('modal-header-info');
        $('#formWarehouse').trigger("reset");
        $('#btn-edit').hide();
        $('#btn-save').show();
      });

      $('.modal-footer').on('click', '#btn-save', function(e) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        e.preventDefault();

        var formData = {
          url: $('#link').val(),
          strWarehouseName: $('#strWarehouseName').val(),
          txtWarehouseLocation: $('#txtWarehouseLocation').val(),
          txtWarehouseDesc: $('#txtWarehouseDesc').val()
        };

        var state = $('#btn-save').val();
        var type = "POST";
        var ajaxurl = url;

        if (state == "update") {
            type = "PUT";
            ajaxurl += '/' + id;
        }

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (state == "update"){
                    type: "PUT";
                }

                var row = $("<tr id=id" + data.intWarehouseID +  "></tr>")
                .append(
                    "<td>" + data.strWarehouseName + "</td>" +
                    "<td>" + data.txtWarehouseLocation + "</td>" +
                    "<td>" + data.txtWarehouseDesc + "</td>" +
                    "<button class='btn btn-warning btn-sm btn-detail open-modal' value="+data.intWarehouseID+"><i class='fa fa-edit'></i>&nbsp; Edit</button> " +
                    "<button class='btn btn-danger btn-sm btn-delete' value="+data.intWarehouseID+"><i class='fa fa-trash-o'></i>&nbsp; Delete</button>" +
                    "</td>"
                );

                var table = $('#dataTable').DataTable();
                if (state == "add") { 
                    table.row.add(row).draw();
                } 

                else{ 
                    table.row($("#id"+data.intWarehouseID)).remove();
                    table.row.add(row).draw();
                }

                $("[data-toggle='toggle']").bootstrapToggle('destroy')
                $("[data-toggle='toggle']").bootstrapToggle();
                $('#formWarehouse').trigger("reset");
                $('#add_warehouse').modal('hide')

            },

            error: function (data) {
                toastr.options = {"preventDuplicates": true}
                var errors = data.responseJSON;

                for (i in errors){
                    toastr.warning(errors[i]+'\n','DUPLICATE', {timeOut: 2000});
                }

            }
        });

      });

    });
  </script>

@endsection
