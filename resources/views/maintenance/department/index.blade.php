@extends('main')
@section('content')
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/maintenance/productcategory') }}">Maintenance</a></li>
        <li class="breadcrumb-extend">Service Maintenance</li>
        <li class="active">Department</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('maintenance.department.nav')
        </div>

        <div class="col-md-9">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage your <i>Departments</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, <i>Deactivate</i> and <i>Delete</i> Operations.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Department</button>
              </div>
              <div class="panel-title">
                <h4>Department List</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.department.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     @include('maintenance.department.modal')
     </div>
  </section>
@endsection
@section('meta')
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection
@section('scripts')
{{--  <script type="text/javascript">$(document).ready(function(){
    $('#dataTable').DataTable();
  });
 </script> --}}
{{--   <script type="text/javascript">
    $( document ).ready(function() {

      function loadTable(){
        $.ajax({
          type: 'get',
          url: "{{ route('maintenance.department.table') }}",
          dataType: 'html',
          success:function(data)
          {
            $('#table-container').html(data);
            $('#dataTable').DataTable();
            toggle();
          }
        });
      }

      function toggle(){
        $('#isActive').bootstrapToggle();
        $(document).on('change','#isActive',function(){
          var status = $(this).prop("checked") ? 1 : 0,
          id = $(this).data('id');
          console.log(id + " status " + status);

          $.ajax({
            type: 'POST',
            url: '{{ route('maintenance.department.table') }}' + '/' + id,
            data: {'status':status},
            dataType: 'json',
            success:function(data)
            {
              console.log("Status Changed.")
            },
            error:function(jqXHR, status, err)
            {
              console.log(err);
            }
          });
        });
      }
      toggle();
    });
  </script> --}}
  <script src="{{ asset('/js/custom/ajax/DepartmentAjax.js/') }}"></script>
@endsection