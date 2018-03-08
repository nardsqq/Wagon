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
        <li>Set Delivery Schedule</li>
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
              <div class="panel-title">
                <h4>Set Delivery Schedule</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                <div class="row">
                  <div class="form-group" style="margin: 20px;">
                    <div :class="col-md-12">
                      {!! Form::label('order_no', 'Order #') !!}
                        <div class="input-group">
                            <input type="text" id="order_no" name="order_no" class="form-control" placeholder="Enter Order #">
                            <span class="input-group-btn" aria-describedby="order-help-block">
                                <button class="btn btn-default" type="button" id="btn-search"><i class="fa fa-search"></i>&nbsp;Search</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                  </div>
                </div>
                <hr>
                <div id="row-row" style="visibility: hidden;">
                  <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Product(s) Ordered</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Self-Jector Purifier</td>
                        <td class="text-center">
                          <button class="btn btn-primary btn-sm btn-detail open-modal"><i class='fa fa-calendar'></i>&nbsp; Set Delivery Details</button>
                        </td>
                      </tr>
                      <tr>
                        <td>Generator Set SAMP-001</td>
                        <td class="text-center">
                          <button class="btn btn-primary btn-sm btn-detail open-modal"><i class='fa fa-calendar'></i>&nbsp; Set Delivery Details</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
@section('scripts')
  <script>
    $('#btn-search').on('click', function() {
      $('#row-row').removeAttr('style');
    })

    $('.open-modal').on('click', function() {
      $('#set-modal').modal('show');
    });

    $('#btn-set').on('click', function() {
      $('#set-modal').modal('hide');
    });
  </script>
@endsection