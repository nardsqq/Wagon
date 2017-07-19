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
        <li>Personnel</li>
      </ol>
    </div>
  </section>

  @include('maintenance.personnel.modal')
  
  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Personnels</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, <i>Deactivate</i> and <i>Delete</i> Operations.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Personnel</button>
              </div>
              <div class="panel-title">
                <h4>Personnel</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.personnel.table')
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
  <script src="{{ asset('/js/custom/ajax/PersonnelAjax.js/') }}"></script>
@endsection