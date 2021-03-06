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
        <li>Delivery</li>
      </ol>
    </div>
  </section>

  @include('transactions.delivery.modal')
  
  <section id="main">
    <div class="container animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon">
              <i class="fa fa-info-circle"></i>
            </div>
            <strong>Set your <i>Delivery Schedules</i> here.</strong>
            <br>
            <small>Add and manage <i><b>Delivery Schedule Records</b></i>.</small>
          </div>  
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <div class="btn-group pull-right">
                {{--  <a href="{{ route('delivery.create') }}" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Set Delivery Schedule</a>  --}}
                {{-- <button type="button" id="btn-add" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp; Set Delivery Schedule</button> --}}
              </div>
              <div class="panel-title">
                <h4>Delivery</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                <div class="row">
                  
                </div>
                @include('transactions.delivery.table')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
@section('meta')
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection
@section('scripts')
  <script src="{{ asset('/js/ajax/transactions/delivery-ajax.js/') }}"></script>
@endsection