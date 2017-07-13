@extends('main')

@section('content')
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><i class="fa fa-tasks" aria-hidden="true"></i> Dashboard</h1>
        </div>
        <div class="col-md-2">

        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li>Admin</li>
        <li>Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="#" class="list-group-item active main-color-bg">
              <i class="fa fa-tasks" aria-hidden="true"></i> Dashboard
            </a>
            <a href="{{ url('/admin/maintenance/productcategory') }}" class="list-group-item"><i class="fa fa-cogs" aria-hidden="true"></i> Maintenance</a>
            <a href="{{ url('/admin/transactions/client') }}" class="list-group-item"><i class="fa fa-bar-chart" aria-hidden="true"></i> Transactions</a>
            <a href="#" class="list-group-item"><i class="fa fa-file" aria-hidden="true"></i> Forms</a>
          </div>
          <div class="well">
            <h4>Disk Space Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
              </div>
            </div>
            <h4>Bandwidth Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">
                35%
              </div>
            </div>
          </div>
        </div>
          <div class="col-md-9">
            <!--Website Overview-->
            <div class="panel panel-default">
              <div class="panel-heading panel-color-bg">
                <h3 class="panel-title">Website and System Overview</h3>
              </div>
              <div class="panel-body">
                <div class = "col-md-3">
                  <div class="well dash-box">
                    <h2><span class="fa fa-users" aria-hidden="true"></span> 13</h2>
                    <h4>Clients</h4>
                  </div>
                </div>
                <div class = "col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 55</h2>
                    <h4>Inquiries</h4>
                  </div>
                </div>
                <div class = "col-md-3">
                  <div class="well dash-box">
                    <h2><span class="fa fa-user" aria-hidden="true"></span> 5</h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class = "col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 11,236</h2>
                    <h4>Page Visits</h4>
                  </div>
                </div>
              </div>
            </div>

            <!--Latest Users-->
            <div class="panel panel-default">
              <div class="panel-heading panel-color-bg">
                <h3 class="panel-title">Latest Users</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">USER001</th>
                      <td>John Bernard Paragas</td>
                      <td>01/30/17</td>
                    </tr>
                    <tr>
                      <th scope="row">USER002</th>
                      <td>Tyron delos Reyes</td>
                      <td>01/16/17</td>
                    </tr>
                    <tr>
                      <th scope="row">USER003</th>
                      <td>Xandra Subiera</td>
                      <td>12/16/17</td>
                    </tr>
                    <tr>
                      <th scope="row">USER004</th>
                      <td>Alvin Caparas</td>
                      <td>11/4/16</td>
                    </tr>
                    <tr>
                      <th scope="row">USER005</th>
                      <td>Junelle Lim</td>
                      <td>10/14/16</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
