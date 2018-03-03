@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Maintenance</h1>
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
        <li>Client</li>
      </ol>
    </div>
  </section>

  @include('transactions.client.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Client Records</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, and <i>Delete</i> Operations.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Client Record</button>
              </div>
              <div class="panel-title">
                <h4>Client</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('transactions.client.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('scripts')

  <!-- Delay table load until everything else is loaded -->
  <script>
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');

        $('#str_client_tin').mask("AAAAA-AAAAA-A-A", {placeholder: "_ _ _ _ _ - _ _ _ _ _ - _ - _"});
        $('#ed_str_client_tin').mask("AAAAA-AAAAA-A-A", {placeholder: "_ _ _ _ _ - _ _ _ _ _ - _ - _"});
    })
  </script>

  <script src="{{ asset('/js/ajax/transactions/client-ajax.js/') }}"></script>
@endsection
