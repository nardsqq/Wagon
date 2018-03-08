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
                <h4>Process Deployment</h4>
              </div>
            </div>
            <div class="panel-body">
              <div id="table-container">
                <div class="row">
                  <div class="form-group" style="margin: 20px;">
                      {!! Form::label('order_no', 'Order #') !!}
                      <div class="form-group">
                        <select name="testzxc" id="testzxc">
                          <option>ORDERNUMBER001</option>
                          <option>ORDERNUMBER002</option>
                        </select>
                      </div>
                  </div>
                </div>
                <hr>
                <div id="row-rows" style="visibility: hidden;">
                  <form style="margin: 120px;">
                    <div class="form-group">
                      {!! Form::label('order_no', 'Service Order') !!}
                      <div class="form-group">
                        <select name="testzxc" id="testzxc" class="form-control">
                          <option>Amiel</option>
                          <option>Nards</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Mobilization</label>
                      <input type="date" name="mobi" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>De-Mobilization</label>
                      <input type="date" name="demobi" class="form-control">
                    </div>
                  </form>
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
    $(document).ready(function() {
      $('#testzxc').select2();
    });

    $( "#testzxc" ).change( function() {
      $('#row-rows').removeAttr('style');
    });

    $('.open-modal').on('click', function() {
      $('#set-modal').modal('show');
    });

    $('#btn-set').on('click', function() {
      $('#set-modal').modal('hide');
    });
  </script>
@endsection