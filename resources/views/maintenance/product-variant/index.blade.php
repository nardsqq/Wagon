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
        <li>Product Variant</li>
      </ol>
    </div>
  </section>

  <section id="main">
    
    @include('maintenance.product-variant.modal')

    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Manage <i>Product Variants</i> here.</strong>
            <br>
            <small>Perform <i>Add</i>, <i>Update</i>, and <i>Delete</i> Operations.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Product Variant</button>
              </div>
              <div class="panel-title">
                <h4>Product Variant</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('maintenance.product-variant.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('scripts')
  <script src="{{ asset('/js/vue.js/') }}"></script>
  <!-- Delay table load until everything else is loaded -->
  <script>
    $(window).on('load', function(){
        $('#dataTable').removeAttr('style');
    })

    var app = new Vue({
      el: '#main',
      data: {
        products: {!! json_encode($products) !!},
        product: {!! json_encode($products->first() ?: []) !!},
        specs: [],
        variant: {},
        isFormEdit: false
      },
      methods: {
        reset: function(){
          {{--  $.ajax({
              type: 'GET',
              url: "/admin/maintenance/product-variant/create",
              dataType: 'json'
            }).done(function(data) {
              this.products = data.products;
            });  --}}
            //Vue.nextTick(()=>{
              this.product = this.products ? this.products[0] : {};
              this.specs = [];
              this.variant = {};
              this.isFormEdit = false;
            //});
        }
      }
    });
  </script>

  <script src="{{ asset('/js/ajax/product-variant-ajax.js/') }}"></script>
@endsection
