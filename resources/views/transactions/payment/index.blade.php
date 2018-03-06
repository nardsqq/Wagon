@extends('main')
@section('content')

 <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</h1>
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
        <li>Transactions</li>
        <li>Process Payment</li>
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
            <strong> Manage your <i>Order Payments</i> here.</strong>
            <br>
            <small>View or Receive an <i><b> Order Payment</b></i>.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                <a id="btn-add" class="btn btn-success" href="{{ route('payment.create') }}"><i class="fa fa-plus-square fa-fw"></i>&nbsp;Process Payment</a>
              </div>
              <div class="panel-title">
                <h4>Orders</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                @include('transactions.payment.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </section>
@endsection

@section('scripts')

@endsection