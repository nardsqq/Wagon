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
        <li>Supplier Information</li>
      </ol>
    </div>
  </section>

  @include('maintenance.supplier.modal')

  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Supplier Information</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, and <i>Delete</i> Operations.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Supplier Record</button>
              </div>
              <div class="panel-title">
                <h4>Supplier Information</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.supplier.table')
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

        $('#str_supplier_mobile_num').mask("000-000-0000", {placeholder: "+63-_ _ _-_ _ _-_ _ _ _"});
        $('#str_supplier_tel_num').mask("(000)-0000", {placeholder: "( _ _ _ ) - _ _ _ _"});

        $('#ed_str_supplier_mobile_num').mask("000-000-0000", {placeholder: "+63-_ _ _-_ _ _-_ _ _ _"});
        $('#ed_str_supplier_tel_num').mask("(000)-0000", {placeholder: "( _ _ _ ) - _ _ _ _"});
    })
  </script>

  <script src="{{ asset('/js/ajax/supplier-ajax.js/') }}"></script>
@endsection
