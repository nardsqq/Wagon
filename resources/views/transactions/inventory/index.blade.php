@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-cogs fa-fw" aria-hidden="true"></i> Transactions</h1>
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
        <li>Transactions</li>
        <li>Stocks</li>
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
            <strong>View <i>Stocks</i> here.</strong>
            <br>
            <small>View <i>Stock Status</i> and <i>Products</i>.</small>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="panel-title">
                <h4>Stocks</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('transactions.inventory.table')
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

  <script src="{{ asset('/js/ajax/transactions/inventory-ajax.js/') }}"></script>
@endsection
