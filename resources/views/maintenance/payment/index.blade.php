@extends('main')
@section('content')
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/maintenance/productcategory') }}">Maintenance</a></li>
        <li class="breadcrumb-extend">Sales Maintenance</li>
        <li class="active">Product</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('maintenance.product.nav')
        </div>

        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Add Product</button>
              </div>
              <div class="panel-title">
                <h4>Product Overview</h4>
              </div>
            </div>
            <div class="panel-body">
              @include('maintenance.product.table')
            </div>
          </div>
        </div>
      </div>
    </div>
     @include('maintenance.product.modal')
     </div>
  </section>
@endsection
@section('meta')
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection
@section('scripts')
{{--  <script type="text/javascript">$(document).ready(function(){
    $('#dataTable').DataTable();
  });
 </script> --}}
 <script src="{{ asset('/js/custom/ajax/PaymentAjax.js/') }}"></script>
@endsection