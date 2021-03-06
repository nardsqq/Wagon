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
        <li>Product</li>
      </ol>
    </div>
  </section>

  @include('maintenance.product.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Products</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, and <i>Delete</i> Operations.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Product</button>
              </div>
              <div class="panel-title">
                <h4>Product</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.product.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('/plugins/selectize/selectize.bootstrap3.css/') }}">
@endsection

@section('scripts')
  <script src="{{ asset('/plugins/selectize/selectize.min.js/') }}"></script>
  <!-- Delay table load until everything else is loaded -->
  <script>
    var select_attrib, select_attrib_instance;
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');
        select_attrib = $('select[name="str_attrib_name[]"]').selectize({
          plugins: ['remove_button'],
          create: true,
          persist: false,
          maxItems: null,
          hideSelected: true,
          valueField: 'int_attrib_id',
          labelField: 'str_attrib_name'
        });
        select_attrib_instance = select_attrib[0].selectize;
        $.get('/admin/maintenance/attrib', function (data) {
          select_attrib_instance.addOption(data);
        });
    });
  </script>

  <script src="{{ asset('/js/ajax/product-ajax.js/') }}"></script>
@endsection
