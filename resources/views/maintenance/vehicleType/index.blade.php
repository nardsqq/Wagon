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
        <li class="breadcrumb-extend">Delivery Maintenance</li>
        <li class="active">Vehicle Type</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('maintenance.vehicletype.nav')
        </div>

        <div class="col-md-9">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage your <i>Vehicle Categories</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, <i>Deactivate</i> and <i>Delete</i> Operations.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Vehicle Type</button>
              </div>
              <div class="panel-title">
                <h4>Vehicle Type List</h4>
              </div>
            </div>
            <div class="panel-body">
              @include('maintenance.vehicletype.table')
            </div>
          </div>
        </div>
      </div>
    </div>
     @include('maintenance.vehicletype.modal')
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
 <script src="{{ asset('/js/custom/ajax/VehicleTypeAjax.js/') }}"></script>
@endsection