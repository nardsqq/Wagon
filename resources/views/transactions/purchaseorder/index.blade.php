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

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/maintenance/product') }}">Transactions</a></li>
        <li class="breadcrumb-active">New Purchase Order</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          @include('transactions.purchaseorder.nav')
        </div>

        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">
                <h4>Purchase Order Form</h4>
              </div>
            </div>
            <div class="panel-body">
              @include('transactions.purchaseorder.form')
            </div>
          </div>
        </div>
      </div>
    </div>
   
     
  </section>
@endsection