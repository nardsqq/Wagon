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
        <li>Process Deployment</li>
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
            <strong>Set your <i>Mobilization Schedules</i> here.</strong>
            <br>
            <small>Manage <i><b>Deployments</b></i>.</small>
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
                <div id="deployment-table">
                  <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Order</th>
                        <th class="text-center">Date of Mobilization</th>
                        <th class="text-center">Date of De-Mobilization</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>ORDERSAMPLENUMBER001</td>
                        <td class="text-center">03-09-2018</td>
                        <td class="text-center">03-10-2018</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="deployment-form" style="visibility: hidden;">
                  <form style="margin: 120px;">
                    <div class="form-group">
                      {!! Form::label('order_no', 'Service Order') !!}
                      <div class="form-group">
                        <select name="testzxc" id="testzxc" class="form-control">
                          <option>SO-0004-01</option>
                          <option>SO-0004-02</option>
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
      $("#deployment-table").css("visibility", "hidden");
      $('#deployment-form').removeAttr('style');
    });

    $('#btn-deploy').on('click', function() {
      $('#deploy-modal').modal('hide');
    });
  </script>
@endsection