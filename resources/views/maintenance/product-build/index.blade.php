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
        <li>Product Build</li>
      </ol>
    </div>
  </section>

  @include('maintenance.product-build.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <a href="{{ route('product-build.create') }}" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add New Product Build</a>
              </div>
              <div class="panel-title">
                <h4>Product Build</h4>
              </div>
            </div>
            <div class="panel-body">
              <div class="alert alert-success alert-white rounded">
                <div class="icon">
                  <i class="fa fa-info-circle"></i>
                </div>
                <strong>Manage <i>Product Builds</i> here.</strong>
                <br>
                <small>Perform <i>Add</i>, <i>Update</i>, and <i>Delete</i> Operations.</small>
              </div>
              <div id="table-container">
                @include('maintenance.product-build.table')
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
    })
  </script>

  <script>
  $('.multi-attrib').select2({
    dropdownParent: $('#add_product')
  });
  </script>

  <script src="{{ asset('/js/ajax/item-ajax.js/') }}"></script>

@endsection
