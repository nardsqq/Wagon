@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Queries</h1>
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
        <li>Queries</li>
        <li>Clients</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Search for <i>Client Records</i> here.</strong>
            <br>
            <small>Search by <i>Client Data</i>.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Queries - Clients</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('queries.client.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('scripts')
  <script>

  </script>
@endsection
