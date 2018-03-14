@extends('main')

@section('content')
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-tasks" aria-hidden="true"></i> Admin</h1>
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
      {!! Breadcrumbs::render('admin') !!}
    </div>
  </section>
  <section id="main">
    <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Clients</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Orders</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </section>
@endsection
