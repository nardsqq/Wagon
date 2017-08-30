@extends('main')

@section('title', '- Edit Product Build')

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
        <li>Product</li>
        <li>Edit Product Build</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Edit Product Build</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.product-build.edit-form')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
