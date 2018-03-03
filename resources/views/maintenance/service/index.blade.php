@extends('main')

@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Maintenance</h1>
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
        <li>Service</li>
      </ol>
    </div>
  </section>

  <section id="app">
    @include('maintenance.service.modal')
  </section>
  

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Service</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, and <i>Delete</i> Operations.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Service</button>
              </div>
              <div class="panel-title">
                <h4>Service</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.service.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

@section('styles')
<link href="{{ asset('css/select2.min.css') }}">
@endsection

@section('scripts')

  <!-- Delay table load until everything else is loaded -->
  <script>
    var $select2;
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');
        $select2 = $('#int_material_id').select2();
    })
  </script>

  <script src="{{ asset('/js/app.js/') }}"></script>
  <script src="{{ asset('/js/select2.min.js/') }}"></script>
  <script src="{{ asset('/js/ajax/service-area-ajax.js/') }}"></script>

@endsection
